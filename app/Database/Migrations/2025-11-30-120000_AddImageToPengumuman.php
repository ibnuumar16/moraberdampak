<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddImageToPengumuman extends Migration
{
    public function up()
    {
        $fields = [
            'pengumuman_gambar' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
                'after'      => 'pengumuman_isi'
            ],
        ];

        $this->forge->addColumn('pengumuman', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('pengumuman', 'pengumuman_gambar');
    }
}
