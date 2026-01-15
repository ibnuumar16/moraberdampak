<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePengumumanTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pengumuman' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => false,
                'auto_increment' => true,
            ],
            'id_ustadz' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => false,
            ],
            'isi_pengumuman' => [
                'type' => 'TEXT',
                'null' => false,
            ],
            'tanggal_pengumuman' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => false,
            ],
        ]);

        $this->forge->addKey('id_pengumuman', true);
        $this->forge->createTable('pengumuman', true);
    }

    public function down()
    {
        $this->forge->dropTable('pengumuman', true);
    }
}
