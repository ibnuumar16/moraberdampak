<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class FixDbSeeder extends Seeder
{
    public function run()
    {
        $this->db->query("DROP TABLE IF EXISTS program_unggulan");
        $this->db->query("CREATE TABLE program_unggulan (
            id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            judul VARCHAR(255) NOT NULL,
            kategori VARCHAR(100),
            deskripsi TEXT,
            gambar VARCHAR(255),
            info_1 VARCHAR(100),
            info_2 VARCHAR(100),
            is_featured BOOLEAN DEFAULT 0,
            created_at DATETIME,
            updated_at DATETIME
        )");
        echo "Table program_unggulan recreated successfully.\n";
    }
}
