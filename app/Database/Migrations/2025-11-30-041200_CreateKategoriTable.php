<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKategoriTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'kategori_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => false,
                'auto_increment' => true,
            ],
            'kategori_nama' => [
                'type'       => 'VARCHAR',
                'constraint' => 225,
                'null'       => false,
            ],
            'kategori_slug' => [
                'type'       => 'VARCHAR',
                'constraint' => 225,
                'null'       => false,
            ],
        ]);

        $this->forge->addKey('kategori_id', true);
        $this->forge->createTable('kategori', true);
    }

    public function down()
    {
        $this->forge->dropTable('kategori', true);
    }
}
