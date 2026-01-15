<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SantriSeeder extends Seeder
{
    public function run()
    {
        // Get active academic year
        $pengaturan = $this->db->table('pengaturan')->get()->getRowArray();
        $tahunAkademik = $pengaturan['tahun_akademik'] ?? date('Y');

        $data = [
            [
                'nama_santri' => 'Ahmad Fulan',
                'nis_santri' => '2025001',
                'nisn_santri' => '0012345678',
                'tempat_lahir_santri' => 'Yogyakarta',
                'tanggal_lahir_santri' => '2010-05-15',
                'jk_santri' => 'L',
                'alamat_santri' => 'Jl. Malioboro No. 12',
                'kabupaten_santri' => 'Sleman',
                'provinsi_santri' => 'DI Yogyakarta',
                'tanggal_masuk' => date('Y-m-d'), // Today
                'tahun_masuk_santri' => $tahunAkademik,
                'status_mukim_santri' => 'Mukim',
                'kategori_santri' => 'Reguler',
                'foto_santri' => 'default.png'
            ],
            [
                'nama_santri' => 'Siti Aminah',
                'nis_santri' => '2025002',
                'nisn_santri' => '0012345679',
                'tempat_lahir_santri' => 'Bantul',
                'tanggal_lahir_santri' => '2011-08-20',
                'jk_santri' => 'P',
                'alamat_santri' => 'Jl. Parangtritis Km 5',
                'kabupaten_santri' => 'Bantul',
                'provinsi_santri' => 'DI Yogyakarta',
                'tanggal_masuk' => date('Y-m-d', strtotime('-1 day')), // Yesterday
                'tahun_masuk_santri' => $tahunAkademik,
                'status_mukim_santri' => 'Mukim',
                'kategori_santri' => 'Reguler',
                'foto_santri' => 'default.png'
            ],
            [
                'nama_santri' => 'Budi Santoso',
                'nis_santri' => '2025003',
                'nisn_santri' => '0012345680',
                'tempat_lahir_santri' => 'Sleman',
                'tanggal_lahir_santri' => '2010-12-10',
                'jk_santri' => 'L',
                'alamat_santri' => 'Jl. Kaliurang Km 10',
                'kabupaten_santri' => 'Sleman',
                'provinsi_santri' => 'DI Yogyakarta',
                'tanggal_masuk' => date('Y-m-d', strtotime('-2 days')), // 2 days ago
                'tahun_masuk_santri' => $tahunAkademik,
                'status_mukim_santri' => 'Laju',
                'kategori_santri' => 'Reguler',
                'foto_santri' => 'default.png'
            ]
        ];

        // Using Query Builder
        $this->db->table('santri')->insertBatch($data);
    }
}
