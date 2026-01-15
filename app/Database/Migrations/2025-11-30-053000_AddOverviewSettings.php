<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddOverviewSettings extends Migration
{
    public function up()
    {
        $fields = [
            'overview_title' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'overview_desc' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'overview_stats_1_num' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => true,
            ],
            'overview_stats_1_label' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true,
            ],
            'overview_stats_2_num' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => true,
            ],
            'overview_stats_2_label' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true,
            ],
            'overview_stats_3_num' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => true,
            ],
            'overview_stats_3_label' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true,
            ],
            'overview_image' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
        ];
        // Check if column already exists to prevent duplication error
        $db = \Config\Database::connect();
        if (!$db->fieldExists('overview_title', 'pengaturan')) {
            $this->forge->addColumn('pengaturan', $fields);
        }
    }

    public function down()
    {
        $this->forge->dropColumn('pengaturan', [
            'overview_title', 'overview_desc', 
            'overview_stats_1_num', 'overview_stats_1_label',
            'overview_stats_2_num', 'overview_stats_2_label',
            'overview_stats_3_num', 'overview_stats_3_label',
            'overview_image'
        ]);
    }
}
