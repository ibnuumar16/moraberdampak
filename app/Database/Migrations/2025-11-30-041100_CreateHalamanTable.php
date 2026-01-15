<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateHalamanTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'halaman_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => false,
                'auto_increment' => true,
            ],
            'halaman_judul' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'halaman_slug' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'halaman_konten' => [
                'type' => 'LONGTEXT',
                'null' => false,
            ],
        ]);

        $this->forge->addKey('halaman_id', true);
        $this->forge->createTable('halaman', true);
    }

    public function down()
    {
        $this->forge->dropTable('halaman', true);
    }
}
