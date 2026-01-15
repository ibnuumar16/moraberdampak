<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelGaleri extends Model
{
    protected $table = 'galeri';
    protected $primaryKey = 'galeri_id';
    protected $allowedFields = [
        'galeri_judul',
        'galeri_kategori',
        'galeri_foto'
    ];
    protected $useTimestamps = false;

    /**
     * Get galeri by category
     */
    public function getByKategori($kategori)
    {
        return $this->where('galeri_kategori', $kategori)
                    ->orderBy('galeri_id', 'DESC')
                    ->findAll();
    }

    /**
     * Get all galeri grouped by category
     */
    public function getAllGrouped()
    {
        return [
            'gedung' => $this->getByKategori('gedung'),
            'kegiatan' => $this->getByKategori('kegiatan')
        ];
    }

    /**
     * Get latest galeri items
     */
    public function getLatest($limit = 12)
    {
        return $this->orderBy('galeri_id', 'DESC')
                    ->limit($limit)
                    ->findAll();
    }

    public function paginateGaleri($perPage = 12)
    {
        return $this->orderBy('galeri_id', 'DESC')
                    ->paginate($perPage, 'galeri');
    }
}
