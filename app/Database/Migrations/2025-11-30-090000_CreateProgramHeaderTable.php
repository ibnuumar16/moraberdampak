<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProgramHeaderTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'judul' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'deskripsi' => [
                'type' => 'TEXT',
            ],
            'icon' => [
                'type'       => 'VARCHAR',
                'constraint' => '100', // CSS class e.g., 'bi bi-book'
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('program_header', true);
    }

    public function down()
    {
        $this->forge->dropTable('program_header');
    }
}
