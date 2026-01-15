<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdatePengaturanArabAnnouncement extends Migration
{
    public function up()
    {
        $fields = [
            'logo_header_arab' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'hero_image_arab' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'announcement_active' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 0,
            ],
            'announcement_text' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'announcement_link' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
        ];

        $this->forge->addColumn('pengaturan', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('pengaturan', ['logo_header_arab', 'hero_image_arab', 'announcement_active', 'announcement_text', 'announcement_link']);
    }
}
