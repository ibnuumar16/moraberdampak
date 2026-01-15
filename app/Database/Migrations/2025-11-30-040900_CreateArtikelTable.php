<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateArtikelTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'artikel_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => false,
                'auto_increment' => true,
            ],
            'artikel_tanggal' => [
                'type' => 'DATETIME',
                'null' => false,
            ],
            'artikel_judul' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'artikel_slug' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'artikel_konten' => [
                'type' => 'LONGTEXT',
                'null' => false,
            ],
            'artikel_sampul' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'artikel_author' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => false,
            ],
            'artikel_kategori' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => false,
            ],
            'artikel_status' => [
                'type'       => 'ENUM',
                'constraint' => ['publish', 'draft'],
                'null'       => false,
            ],
        ]);

        $this->forge->addKey('artikel_id', true);
        $this->forge->createTable('artikel', true);
    }

    public function down()
    {
        $this->forge->dropTable('artikel', true);
    }
}
