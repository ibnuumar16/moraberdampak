<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelProgramHeader extends Model
{
    protected $table            = 'program_header';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['judul', 'deskripsi', 'icon'];
}
