<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddSectionTitlesToPengaturan extends Migration
{
    public function up()
    {
        $fields = [
            'program_header_title' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
                'after'      => 'section_program_header'
            ],
            'program_header_desc' => [
                'type'       => 'TEXT',
                'null'       => true,
                'after'      => 'program_header_title'
            ],
            'psb_title' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
                'after'      => 'section_psb'
            ],
            'psb_desc' => [
                'type'       => 'TEXT',
                'null'       => true,
                'after'      => 'psb_title'
            ],
            'berita_title' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
                'after'      => 'section_berita'
            ],
            'berita_desc' => [
                'type'       => 'TEXT',
                'null'       => true,
                'after'      => 'berita_title'
            ],
            'program_unggulan_title' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
                'after'      => 'section_program_unggulan'
            ],
            'program_unggulan_desc' => [
                'type'       => 'TEXT',
                'null'       => true,
                'after'      => 'program_unggulan_title'
            ],
            'donasi_title' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
                'after'      => 'section_donasi'
            ],
            'donasi_desc' => [
                'type'       => 'TEXT',
                'null'       => true,
                'after'      => 'donasi_title'
            ],
            'guru_title' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
                'after'      => 'section_guru'
            ],
            'guru_desc' => [
                'type'       => 'TEXT',
                'null'       => true,
                'after'      => 'guru_title'
            ],
        ];

        $this->forge->addColumn('pengaturan', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('pengaturan', [
            'program_header_title', 'program_header_desc',
            'psb_title', 'psb_desc',
            'berita_title', 'berita_desc',
            'program_unggulan_title', 'program_unggulan_desc',
            'donasi_title', 'donasi_desc',
            'guru_title', 'guru_desc'
        ]);
    }
}
