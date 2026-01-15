<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddContactInfoToPengaturan extends Migration
{
    public function up()
    {
        $fields = [
            'alamat' => [
                'type'       => 'TEXT',
                'null'       => true,
                'after'      => 'nama'
            ],
            'telepon' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => true,
                'after'      => 'alamat'
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
                'after'      => 'telepon'
            ],
            'link_maps' => [
                'type'       => 'TEXT',
                'null'       => true,
                'after'      => 'link_instagram'
            ],
        ];

        $this->forge->addColumn('pengaturan', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('pengaturan', ['alamat', 'telepon', 'email', 'link_maps']);
    }
}
