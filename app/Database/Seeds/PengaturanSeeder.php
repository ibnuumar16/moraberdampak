<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PengaturanSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'tahun_akademik' => '2025/2026',
            'nama' => 'Pondok Pesantren Inggris Inovasi Bangsa',
            'deskripsi' => 'Membangun generasi muslim unggul melalui pendidikan berbasis nilai Islami dan pengembangan karakter.',
            'logo' => 'logo.png',
            'link_youtube' => 'https://youtube.com',
            'link_facebook' => 'https://facebook.com',
            'link_twitter' => 'https://twitter.com',
            'link_instagram' => 'https://instagram.com'
        ];

        // Check if data exists
        $count = $this->db->table('pengaturan')->countAll();

        if ($count == 0) {
            $this->db->table('pengaturan')->insert($data);
            echo "✅ Data Pengaturan berhasil dibuat!\n";
        } else {
            echo "⚠️ Data Pengaturan sudah ada, skip seeding.\n";
        }
    }
}
