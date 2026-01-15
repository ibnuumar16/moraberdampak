<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddSectionTogglesToPengaturan extends Migration
{
    public function up()
    {
        $fields = [
            'section_hero' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 1,
                'after'      => 'announcement_link'
            ],
            'section_program_header' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 1,
                'after'      => 'section_hero'
            ],
            'section_psb' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 1,
                'after'      => 'section_program_header'
            ],
            'section_sambutan' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 1,
                'after'      => 'section_psb'
            ],
            'section_berita' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 1,
                'after'      => 'section_sambutan'
            ],
            'section_program_unggulan' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 1,
                'after'      => 'section_berita'
            ],
            'section_donasi' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 1,
                'after'      => 'section_program_unggulan'
            ],
            'section_guru' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 1,
                'after'      => 'section_donasi'
            ],
        ];

        $this->forge->addColumn('pengaturan', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('pengaturan', [
            'section_hero',
            'section_program_header',
            'section_psb',
            'section_sambutan',
            'section_berita',
            'section_program_unggulan',
            'section_donasi',
            'section_guru'
        ]);
    }
}
