<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelHalaman extends Model
{
    protected $table = 'halaman';
    protected $primaryKey = 'halaman_id';
    protected $allowedFields = [
        'halaman_judul',
        'halaman_deskripsi',
        'halaman_slug',
        'halaman_konten',
        'halaman_jenis'
    ];
    protected $useTimestamps = false;

    /**
     * Get all active pages for menu
     */
    public function getMenuItems()
    {
        return $this->where('halaman_jenis', 'profil')->orderBy('halaman_id', 'ASC')->findAll();
    }

    /**
     * Get pages by type
     */
    public function getByType($type)
    {
        return $this->where('halaman_jenis', $type)->orderBy('halaman_id', 'ASC')->findAll();
    }

    /**
     * Get page by slug
     */
    public function getBySlug($slug)
    {
        return $this->where('halaman_slug', $slug)->first();
    }

    /**
     * Check if slug exists
     */
    public function slugExists($slug, $excludeId = null)
    {
        $builder = $this->where('halaman_slug', $slug);
        
        if ($excludeId) {
            $builder->where('halaman_id !=', $excludeId);
        }
        
        return $builder->countAllResults() > 0;
    }
}
