<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPengumuman extends Model
{
    protected $table = 'pengumuman';
    protected $primaryKey = 'pengumuman_id';
    protected $allowedFields = ['pengumuman_judul', 'pengumuman_isi', 'pengumuman_tanggal', 'pengumuman_author', 'pengumuman_gambar'];

    public function getPengumuman()
    {
        return $this->orderBy('pengumuman_tanggal', 'DESC')->findAll();
    }
    
    public function getLatest($limit = 5)
    {
        return $this->orderBy('pengumuman_tanggal', 'DESC')->limit($limit)->findAll();
    }
}
