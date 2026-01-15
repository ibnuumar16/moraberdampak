<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateQuoteTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_quote' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => false,
                'auto_increment' => true,
            ],
            'nama_quote' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'jabatan_quote' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'isi_quote' => [
                'type' => 'LONGTEXT',
                'null' => false,
            ],
            'foto_quote' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
        ]);

        $this->forge->addKey('id_quote', true);
        $this->forge->createTable('quote', true);
    }

    public function down()
    {
        $this->forge->dropTable('quote', true);
    }
}
