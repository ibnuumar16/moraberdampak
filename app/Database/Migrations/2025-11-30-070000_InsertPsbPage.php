<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class InsertPsbPage extends Migration
{
    public function up()
    {
        $data = [
            'halaman_judul'     => 'Informasi Pendaftaran',
            'halaman_slug'      => 'psb',
            'halaman_konten'    => '<p>Isi informasi pendaftaran santri baru di sini. Jelaskan syarat, ketentuan, dan alur pendaftaran.</p>',
            'halaman_jenis'     => 'psb'
        ];

        $this->db->table('halaman')->insert($data);
    }

    public function down()
    {
        $this->db->table('halaman')->where('halaman_slug', 'psb')->delete();
    }
}
