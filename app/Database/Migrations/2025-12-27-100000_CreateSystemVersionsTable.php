<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSystemVersionsTable extends Migration
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
            'version' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'applied_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['success', 'failed', 'rollback'],
                'default'    => 'success',
            ],
            'log' => [
                'type' => 'TEXT',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('system_versions');
    }

    public function down()
    {
        $this->forge->dropTable('system_versions');
    }
}
