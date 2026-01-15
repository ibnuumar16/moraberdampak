<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class FixOverviewSeeder extends Seeder
{
    public function run()
    {
        // We use a try-catch block or just simple queries. 
        // Since the error is "Unknown column", we assume they are missing.
        // We'll add them one by one or in a single statement.
        
        $sql = "ALTER TABLE pengaturan 
                ADD COLUMN overview_title VARCHAR(255) NULL,
                ADD COLUMN overview_desc TEXT NULL,
                ADD COLUMN overview_stats_1_num VARCHAR(50) NULL,
                ADD COLUMN overview_stats_1_label VARCHAR(100) NULL,
                ADD COLUMN overview_stats_2_num VARCHAR(50) NULL,
                ADD COLUMN overview_stats_2_label VARCHAR(100) NULL,
                ADD COLUMN overview_stats_3_num VARCHAR(50) NULL,
                ADD COLUMN overview_stats_3_label VARCHAR(100) NULL,
                ADD COLUMN overview_image VARCHAR(255) NULL";

        try {
            $this->db->query($sql);
            echo "Columns added successfully to pengaturan table.\n";
        } catch (\Throwable $th) {
            // If it fails, it might be because some columns exist. 
            // We'll try adding them one by one to be safe.
            echo "Batch add failed, trying individual columns...\n";
            
            $columns = [
                "overview_title VARCHAR(255) NULL",
                "overview_desc TEXT NULL",
                "overview_stats_1_num VARCHAR(50) NULL",
                "overview_stats_1_label VARCHAR(100) NULL",
                "overview_stats_2_num VARCHAR(50) NULL",
                "overview_stats_2_label VARCHAR(100) NULL",
                "overview_stats_3_num VARCHAR(50) NULL",
                "overview_stats_3_label VARCHAR(100) NULL",
                "overview_image VARCHAR(255) NULL"
            ];

            foreach ($columns as $col) {
                try {
                    $this->db->query("ALTER TABLE pengaturan ADD COLUMN $col");
                    echo "Added $col\n";
                } catch (\Throwable $e) {
                    echo "Skipped $col (maybe exists)\n";
                }
            }
        }
    }
}
