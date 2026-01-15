<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TentangKamiSeeder extends Seeder
{
    public function run()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('halaman');

        // Check if exists
        $exists = $builder->where('halaman_slug', 'tentang-kami')->countAllResults();

        if ($exists == 0) {
            $data = [
                'halaman_judul' => 'Tentang Kami',
                'halaman_slug' => 'tentang-kami',
                'halaman_konten' => '<p>Ini adalah halaman Tentang Kami. Silakan edit konten ini melalui dashboard.</p>',
                'halaman_jenis' => 'profil', // Assuming 'profil' is a valid type based on Dashboard code
                'halaman_deskripsi' => 'Profil singkat Pondok Pesantren'
            ];
            $builder->insert($data);
            echo "Page 'Tentang Kami' created.\n";
        } else {
            echo "Page 'Tentang Kami' already exists.\n";
        }
    }
}
