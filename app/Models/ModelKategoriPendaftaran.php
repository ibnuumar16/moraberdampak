<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKategoriPendaftaran extends Model
{
    protected $table = 'kategori_pendaftaran';
    protected $primaryKey = 'id_kategori';
    protected $allowedFields = ['nama_kategori', 'keterangan', 'biaya'];
    protected $useTimestamps = true;
}
