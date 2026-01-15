<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class FixPengumumanTable extends Migration
{
    public function up()
    {
        // Drop existing table if exists to ensure clean slate matching Model
        $this->forge->dropTable('pengumuman', true);

        $this->forge->addField([
            'pengumuman_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'pengumuman_judul' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'pengumuman_isi' => [
                'type' => 'TEXT',
            ],
            'pengumuman_tanggal' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'pengumuman_author' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],
        ]);
        $this->forge->addKey('pengumuman_id', true);
        $this->forge->createTable('pengumuman');
    }

    public function down()
    {
        $this->forge->dropTable('pengumuman');
    }
}
