<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdatePengaturanTable extends Migration
{
    public function up()
    {
        $fields = [
            'logo_web' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'teks_arab' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'hero_title' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'hero_desc' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'hero_bg' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'hero_btn_text' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'hero_btn_url' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'sambutan_pimpinan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'foto_pimpinan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'nama_pimpinan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
        ];

        $this->forge->addColumn('pengaturan', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('pengaturan', [
            'logo_web', 'teks_arab', 'hero_title', 'hero_desc', 
            'hero_bg', 'hero_btn_text', 'hero_btn_url', 
            'sambutan_pimpinan', 'foto_pimpinan', 'nama_pimpinan'
        ]);
    }
}
