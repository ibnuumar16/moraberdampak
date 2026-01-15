<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class FixHalamanSeeder extends Seeder
{
    public function run()
    {
        $db = \Config\Database::connect();

        // Check if column exists
        $query = $db->query("SHOW COLUMNS FROM halaman LIKE 'halaman_deskripsi'");
        $result = $query->getResult();

        if (empty($result)) {
            // Add column if it doesn't exist
            $db->query("ALTER TABLE halaman ADD COLUMN halaman_deskripsi TEXT NULL AFTER halaman_judul");
            echo "Column 'halaman_deskripsi' added successfully.\n";
        } else {
            echo "Column 'halaman_deskripsi' already exists.\n";
        }
    }
}
