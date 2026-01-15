<?php

if (!function_exists('create_system_backup')) {
    function create_system_backup($destinationPath)
    {
        $rootPath = realpath(FCPATH . '../');
        $zip = new ZipArchive();
        $filename = 'backup_' . date('Y-m-d_H-i-s') . '.zip';
        $zipFile = $destinationPath . $filename;

        if ($zip->open($zipFile, ZipArchive::CREATE | ZipArchive::OVERWRITE)) {
            
            // Recursive function to add files
            $files = new RecursiveIteratorIterator(
                new RecursiveDirectoryIterator($rootPath),
                RecursiveIteratorIterator::LEAVES_ONLY
            );

            foreach ($files as $name => $file) {
                // Skip directories (they would be added automatically)
                if (!$file->isDir()) {
                    $filePath = $file->getRealPath();
                    $relativePath = substr($filePath, strlen($rootPath) + 1);

                    // Exclude heavy or sensitive folders
                    if (strpos($relativePath, 'writable') === 0 || 
                        strpos($relativePath, '.git') === 0 ||
                        strpos($relativePath, 'vendor') === 0) {
                        continue;
                    }

                    $zip->addFile($filePath, $relativePath);
                }
            }

            $zip->close();
            return $filename;
        }
        return false;
    }
}
