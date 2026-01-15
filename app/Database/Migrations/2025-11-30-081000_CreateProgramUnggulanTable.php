<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProgramUnggulanTable extends Migration
{
    public function up()
    {
        // Drop old table to replace schema
        $this->forge->dropTable('program_unggulan', true);

        $this->forge->addField([
            'program_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'program_judul' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'program_deskripsi' => [
                'type' => 'TEXT',
            ],
            'program_icon' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
        ]);
        $this->forge->addKey('program_id', true);
        $this->forge->createTable('program_unggulan');
    }

    public function down()
    {
        $this->forge->dropTable('program_unggulan');
    }
}
