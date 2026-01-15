<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\UpdateService;

class UpdateSystem extends BaseController
{
    protected $updateService;

    public function __construct()
    {
        $this->updateService = new UpdateService();
    }

    public function index()
    {
        // Role check removed as per user request to allow all users
        // if (!in_array(session()->get('level'), ['admin', 'administrator'])) { ... }
        
        // Load Settings & User
        $modelPengaturan = new \App\Models\ModelPengaturan();
        
        $data = [
            'title' => 'Update Sistem',
            'isi'   => 'update/index',
            'user'  => session()->get(),
            'pengaturan' => $modelPengaturan->data(),
            'currentVersion' => $this->getCurrentVersion(),
            'backups' => $this->updateService->getBackups()
        ];
        
        return view('dashboard/layout/gabung', $data);
    }
    
    public function check()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setStatusCode(403);
        }
        
        $result = $this->updateService->checkVersion();
        
        return $this->response->setJSON($result);
    }

    public function rollback()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setStatusCode(403);
        }

        // Increase time limit for restore
        set_time_limit(0);
        
        $filename = $this->request->getPost('filename');
        if (!$filename) {
            return $this->response->setJSON(['status' => false, 'message' => 'Filename invalid.']);
        }
        
        $result = $this->updateService->restore($filename);
        
        return $this->response->setJSON($result);
    }
    
    public function run_update()
    {
        // Increase time limit for large downloads
        set_time_limit(0);
        ini_set('memory_limit', '512M');

        if (!$this->request->isAJAX()) {
            return $this->response->setStatusCode(403);
        }
        
        // 1. Backup Code
        if (!$this->updateService->backup()) {
            return $this->response->setJSON([
                'status' => false, 
                'message' => 'Gagal membuat backup sistem. Update dibatalkan.'
            ]);
        }
        
        $versionInfo = $this->request->getPost('version');
        
        // 2. Download Update
        $downloadResult = $this->updateService->downloadUpdate($versionInfo);
        if (!$downloadResult['success']) {
             return $this->response->setJSON([
                'status' => false, 
                'message' => $downloadResult['message']
            ]);
        }
        
        // 3. Extract Files
         if (!$this->updateService->extractFiles()) {
             return $this->response->setJSON([
                'status' => false, 
                'message' => 'Gagal mengekstrak file update.'
            ]);
        }
        
        // 4. Run Migrations
        if (!$this->updateService->runMigration()) {
             return $this->response->setJSON([
                'status' => false, 
                'message' => 'Gagal menjalankan migrasi database. Mohon cek log.'
            ]);
        }
        
        // 5. Update Record
        $db = \Config\Database::connect();
        $db->table('system_versions')->insert([
            'version' => $versionInfo,
            'applied_at' => date('Y-m-d H:i:s'),
            'status' => 'success'
        ]);
        
        return $this->response->setJSON([
            'status' => true, 
             'message' => 'Update sistem berhasil! Halaman akan direfresh.'
        ]);
    }
    
    protected function getCurrentVersion()
    {
        $db = \Config\Database::connect();
        $query = $db->table('system_versions')->orderBy('id', 'DESC')->get()->getRow();
        return $query ? $query->version : '1.0.0';
    }
}
