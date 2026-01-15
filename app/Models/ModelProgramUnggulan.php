<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelProgramUnggulan extends Model
{
    protected $table            = 'program_unggulan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['judul', 'kategori', 'deskripsi', 'gambar', 'info_1', 'info_2', 'is_featured'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
