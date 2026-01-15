<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddHalamanDeskripsi extends Migration
{
    public function up()
    {
        $fields = [
            'halaman_deskripsi' => [
                'type'       => 'TEXT',
                'null'       => true,
                'after'      => 'halaman_judul',
            ],
        ];
        $db = \Config\Database::connect();
        if (!$db->fieldExists('halaman_deskripsi', 'halaman')) {
            $this->forge->addColumn('halaman', $fields);
        }
    }

    public function down()
    {
        $this->forge->dropColumn('halaman', 'halaman_deskripsi');
    }
}
