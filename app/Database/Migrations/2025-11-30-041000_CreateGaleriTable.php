<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateGaleriTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'galeri_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => false,
                'auto_increment' => true,
            ],
            'galeri_judul' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'galeri_kategori' => [
                'type'       => 'ENUM',
                'constraint' => ['gedung', 'kegiatan'],
                'null'       => false,
            ],
            'galeri_foto' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
        ]);

        $this->forge->addKey('galeri_id', true);
        $this->forge->createTable('galeri', true);
    }

    public function down()
    {
        $this->forge->dropTable('galeri', true);
    }
}
