<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePenggunaTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'pengguna_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => false,
                'auto_increment' => true,
            ],
            'pengguna_nama' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => false,
            ],
            'pengguna_email' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'pengguna_username' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => false,
            ],
            'pengguna_password' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'pengguna_level' => [
                'type'       => 'ENUM',
                'constraint' => ['admin', 'penulis', 'pengurus'],
                'null'       => false,
            ],
            'pengguna_status' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => false,
            ],
            'pengguna_foto' => [
                'type'       => 'VARCHAR',
                'constraint' => 225,
                'null'       => false,
            ],
        ]);

        $this->forge->addKey('pengguna_id', true);
        $this->forge->createTable('pengguna', true);
    }

    public function down()
    {
        $this->forge->dropTable('pengguna', true);
    }
}
