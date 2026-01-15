<?php

namespace App\Libraries;

use CodeIgniter\Files\File;

class UpdateService
{
    protected $updateUrl = 'https://update.undanganaesthetic.my.id';
    // FIX: Hardcoded IP to bypass DNS propagation issues on client side
    protected $serverIp = '103.247.8.66'; 
    protected $tempPath;
    protected $backupPath;

    public function __construct()
    {
        $this->tempPath = WRITEPATH . 'uploads/temp_update/';
        $this->backupPath = WRITEPATH . 'uploads/backups/';
        
        if (!is_dir($this->tempPath)) mkdir($this->tempPath, 0755, true);
        if (!is_dir($this->backupPath)) mkdir($this->backupPath, 0755, true);
    }

    /**
     * Helper to perform cURL request with forced DNS resolution
     */
    private function performRequest($url, $sink = null)
    {
        $ch = curl_init();
        
        $options = [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false, // Bypass SSL cert check for simplicity, ensure server has valid cert in prod
            CURLOPT_TIMEOUT => 600, // Increased timeout to 10 minutes for large files
            CURLOPT_FOLLOWLOCATION => true,
            // FORCE RESOLVE: Map domain to IP directly
            CURLOPT_RESOLVE => ["update.undanganaesthetic.my.id:443:{$this->serverIp}"]
        ];

        if ($sink) {
            $fp = fopen($sink, 'w+');
            if ($fp === false) {
                return ['success' => false, 'error' => "Cannot open file for writing: $sink"];
            }
            $options[CURLOPT_FILE] = $fp;
            // Disable return transfer for file download so it writes to stream
            $options[CURLOPT_RETURNTRANSFER] = false; 
        }

        curl_setopt_array($ch, $options);
        
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);
        
        curl_close($ch);
        if ($sink && isset($fp)) fclose($fp);

        if ($response === false) {
            return ['success' => false, 'error' => $error];
        }

        if ($httpCode !== 200) {
            return ['success' => false, 'error' => "HTTP Error: $httpCode"];
        }

        return ['success' => true, 'body' => $response];
    }

    public function checkVersion()
    {
        try {
            $result = $this->performRequest($this->updateUrl . '/latest.json');
            
            if (!$result['success']) {
                return ['status' => false, 'message' => $result['error']];
            }
            
            $data = json_decode($result['body'], true);
            
            if (!$data) return ['status' => false, 'message' => 'Invalid server response (JSON decode failed)'];

            // Get current version from DB
            $db = \Config\Database::connect();
            $tableExists = $db->tableExists('system_versions');
            
            $currentVersion = '1.0.0';
            if ($tableExists) {
                $current = $db->table('system_versions')
                            ->orderBy('id', 'DESC')
                            ->limit(1)
                            ->get()
                            ->getRow();
                if ($current) {
                    $currentVersion = $current->version;
                }
            }
            
            return [
                'status' => true,
                'current_version' => $currentVersion,
                'remote_version' => $data['version'],
                'has_update' => version_compare($data['version'], $currentVersion, '>'),
                'details' => $data
            ];
            
        } catch (\Exception $e) {
            return ['status' => false, 'message' => $e->getMessage()];
        }
    }

    public function downloadUpdate($version)
    {
        $files = ['app.zip', 'public.zip', 'migrations.zip'];
        
        foreach ($files as $file) {
            try {
                $url = $this->updateUrl . "/updates/{$version}/{$file}";
                $savePath = $this->tempPath . $file;
                
                $result = $this->performRequest($url, $savePath);
                
                if (!$result['success']) {
                    return ['success' => false, 'message' => "Gagal download $file: " . $result['error']];
                }
            } catch (\Exception $e) {
                return ['success' => false, 'message' => "Exception $file: " . $e->getMessage()];
            }
        }
        
        return ['success' => true];
    }

    public function extractFiles()
    {
        $zip = new \ZipArchive();
        
        // Extract App
        if ($zip->open($this->tempPath . 'app.zip') === TRUE) {
            $zip->extractTo(APPPATH . '../'); // Extract to app folder parent
            $zip->close();
        }
        
        // Extract Public
        if ($zip->open($this->tempPath . 'public.zip') === TRUE) {
            $zip->extractTo(FCPATH);
            $zip->close();
        }
        
        // Extract Migrations
        if ($zip->open($this->tempPath . 'migrations.zip') === TRUE) {
            $zip->extractTo(APPPATH . 'Database/Migrations/');
            $zip->close();
        }
        
        return true;
    }

    public function runMigration()
    {
        $migrate = \Config\Services::migrations();
        
        try {
            $migrate->latest();
            return true;
        } catch (\Throwable $e) {
            return false;
        }
    }
    
    public function backup()
    {
        helper('backup');
        return create_system_backup($this->backupPath);
    }

    public function getBackups()
    {
        helper('filesystem');
        $map = directory_map($this->backupPath);
        $backups = [];

        if (!$map) return [];

        foreach ($map as $file) {
            if (strpos($file, '.zip') !== false) {
                $filePath = $this->backupPath . $file;
                $backups[] = [
                    'filename' => $file,
                    'size' => $this->formatSize(filesize($filePath)),
                    'date' => date('Y-m-d H:i:s', filemtime($filePath)),
                    'timestamp' => filemtime($filePath)
                ];
            }
        }
        
        // Sort by newest first
        usort($backups, function($a, $b) {
            return $b['timestamp'] - $a['timestamp'];
        });

        return $backups;
    }

    public function restore($filename)
    {
        $filePath = $this->backupPath . basename($filename);
        
        if (!file_exists($filePath)) {
            return ['status' => false, 'message' => 'File backup tidak ditemukan.'];
        }

        $zip = new \ZipArchive();
        if ($zip->open($filePath) === TRUE) {
            // Extract to Root (FCPATH/../)
            // Note: Backup zip structure is created relative to root, e.g. "app/...", "public/..."
            $extractPath = FCPATH . '../';
            $zip->extractTo($extractPath);
            $zip->close();
            return ['status' => true, 'message' => 'Sistem berhasil dipulihkan ke versi backup.'];
        } else {
            return ['status' => false, 'message' => 'Gagal membuka file backup json.'];
        }
    }

    private function formatSize($bytes)
    {
        if ($bytes >= 1073741824) {
            return number_format($bytes / 1073741824, 2) . ' GB';
        } elseif ($bytes >= 1048576) {
            return number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            return number_format($bytes / 1024, 2) . ' KB';
        } elseif ($bytes > 1) {
            return $bytes . ' bytes';
        } elseif ($bytes == 1) {
            return $bytes . ' byte';
        } else {
            return '0 bytes';
        }
    }
}
