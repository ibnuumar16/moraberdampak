<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddHalamanJenisToHalaman extends Migration
{
    public function up()
    {
        $fields = [
            'halaman_jenis' => [
                'type'       => 'ENUM',
                'constraint' => ['profil', 'page'],
                'default'    => 'profil',
                'after'      => 'halaman_slug'
            ],
        ];
        $this->forge->addColumn('halaman', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('halaman', 'halaman_jenis');
    }
}
