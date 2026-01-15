<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPengguna extends Model
{
    protected $table = 'pengguna';
    protected $primaryKey = 'pengguna_id';
    protected $allowedFields = [
        'pengguna_nama',
        'pengguna_email',
        'pengguna_username',
        'pengguna_password',
        'pengguna_level',
        'pengguna_status',
        'pengguna_foto'
    ];
    protected $useTimestamps = false;

    /**
     * Get all active users
     */
    public function getActiveUsers()
    {
        return $this->where('pengguna_status', 1)->findAll();
    }

    /**
     * Get user by username
     */
    public function getUserByUsername($username)
    {
        return $this->where('pengguna_username', $username)->first();
    }

    /**
     * Get users by level/role
     */
    public function getUsersByRole($role)
    {
        return $this->where('pengguna_level', $role)->findAll();
    }

    /**
     * Check if username exists
     */
    public function usernameExists($username, $excludeId = null)
    {
        $builder = $this->where('pengguna_username', $username);
        
        if ($excludeId) {
            $builder->where('pengguna_id !=', $excludeId);
        }
        
        return $builder->countAllResults() > 0;
    }

    /**
     * Check if email exists
     */
    public function emailExists($email, $excludeId = null)
    {
        $builder = $this->where('pengguna_email', $email);
        
        if ($excludeId) {
            $builder->where('pengguna_id !=', $excludeId);
        }
        
        return $builder->countAllResults() > 0;
    }
}
