<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DummyDataSeeder extends Seeder
{
    public function run()
    {
        // 0. Seed User (Admin) - REQUIRED for Artikel
        $adminData = [
            'id_user'   => 1,
            'nama_user' => 'Administrator',
            'username'  => 'admin',
            'password'  => password_hash('admin', PASSWORD_DEFAULT),
            'level'     => '1'
        ];
        
        // Cek apakah user admin dengan ID 1 sudah ada
        if ($this->db->table('user')->where('id_user', 1)->countAllResults() == 0) {
            $this->db->table('user')->insert($adminData);
             echo "Admin user created.\n";
        } else {
             echo "Admin user already exists.\n";
        }
        $authorId = 1;


        // 1. Seed Guru (Teachers)
        $guruData = [
            [
                'guru_nama' => 'KH. Ahmad Dahlan',
                'guru_jabatan' => 'Pimpinan Pondok',
                'guru_foto' => '' // Empty for default
            ],
            [
                'guru_nama' => 'Ustadz Budi Santoso, S.Pd.I',
                'guru_jabatan' => 'Kepala Madrasah',
                'guru_foto' => ''
            ],
            [
                'guru_nama' => 'Ustadzah Siti Aminah, M.Pd',
                'guru_jabatan' => 'Pengasuh Putri',
                'guru_foto' => ''
            ]
        ];
        // Cek guru
        foreach ($guruData as $g) {
             if ($this->db->table('guru')->where('guru_nama', $g['guru_nama'])->countAllResults() == 0) {
                 $this->db->table('guru')->insert($g);
             }
        }
        echo "Guru seeded.\n";


        // 2. Seed Artikel (Articles)
        // Need to ensure categories exist first
        $kategoriData = [
            ['kategori_nama' => 'Berita', 'kategori_slug' => 'berita'],
            ['kategori_nama' => 'Kegiatan', 'kategori_slug' => 'kegiatan'],
            ['kategori_nama' => 'Prestasi', 'kategori_slug' => 'prestasi']
        ];
        // Check if categories exist, if not insert
        foreach ($kategoriData as $k) {
            if ($this->db->table('kategori')->where('kategori_slug', $k['kategori_slug'])->countAllResults() == 0) {
                $this->db->table('kategori')->insert($k);
            }
        }
        
        // Get category IDs
        $catBerita = $this->db->table('kategori')->where('kategori_slug', 'berita')->get()->getRow()->kategori_id;
        $catKegiatan = $this->db->table('kategori')->where('kategori_slug', 'kegiatan')->get()->getRow()->kategori_id;

        $artikelData = [
            [
                'artikel_judul' => 'Penerimaan Santri Baru Tahun Ajaran 2025/2026 Telah Dibuka',
                'artikel_slug' => 'penerimaan-santri-baru-2025',
                'artikel_konten' => '<p>Pondok Pesantren Al-Falahiyah Mlangi resmi membuka pendaftaran santri baru untuk tahun ajaran 2025/2026. Segera daftarkan putra-putri Anda melalui website resmi kami atau datang langsung ke sekretariat pendaftaran.</p>',
                'artikel_sampul' => 'default_artikel.jpg', // Placeholder
                'artikel_author' => $authorId,
                'artikel_kategori' => $catBerita,
                'artikel_status' => 'publish',
                'artikel_tanggal' => date('Y-m-d H:i:s')
            ],
            [
                'artikel_judul' => 'Kegiatan Khotmil Qur\'an Bulanan',
                'artikel_slug' => 'kegiatan-khotmil-quran-bulanan',
                'artikel_konten' => '<p>Alhamdulillah, kegiatan Khotmil Qur\'an bulanan telah terlaksana dengan khidmat. Kegiatan ini diikuti oleh seluruh santri dan asatidz sebagai bentuk rasa syukur dan upaya mendekatkan diri kepada Allah SWT.</p>',
                'artikel_sampul' => 'default_artikel.jpg',
                'artikel_author' => $authorId,
                'artikel_kategori' => $catKegiatan,
                'artikel_status' => 'publish',
                'artikel_tanggal' => date('Y-m-d H:i:s', strtotime('-1 week'))
            ],
            [
                'artikel_judul' => 'Santri Al-Falahiyah Raih Juara 1 Lomba Pidato Bahasa Arab',
                'artikel_slug' => 'santri-juara-pidato-bahasa-arab',
                'artikel_konten' => '<p>Selamat kepada Ananda Fulan bin Fulan yang telah berhasil meraih Juara 1 dalam perlombaan Pidato Bahasa Arab tingkat Kabupaten. Semoga prestasi ini dapat memotivasi santri lainnya untuk terus berprestasi.</p>',
                'artikel_sampul' => 'default_artikel.jpg',
                'artikel_author' => $authorId,
                'artikel_kategori' => $catBerita,
                'artikel_status' => 'publish',
                'artikel_tanggal' => date('Y-m-d H:i:s', strtotime('-2 weeks'))
            ]
        ];
        
        foreach ($artikelData as $a) {
             if ($this->db->table('artikel')->where('artikel_slug', $a['artikel_slug'])->countAllResults() == 0) {
                 $this->db->table('artikel')->insert($a);
             }
        }
        echo "Artikel seeded.\n";


        // 3. Seed Program Unggulan
        $programData = [
            [
                'judul' => 'Tahfidz Al-Qur\'an 30 Juz',
                'deskripsi' => 'Program menghafal Al-Qur\'an dengan target 30 juz mutqin dalam waktu 3 tahun, didampingi oleh muhaffizh bersanad.',
                'gambar' => 'default_program.jpg',
                'kategori' => 'Tahfidz',
                'info_1' => 'Target 3 Tahun',
                'info_2' => 'Sanad Bersambung',
                'is_featured' => 1
            ],
            [
                'judul' => 'Madrasah Diniyah',
                'deskripsi' => 'Kajian kitab kuning (turats) secara mendalam dengan kurikulum berjenjang untuk mencetak kader ulama yang tafaqquh fiddin.',
                'gambar' => 'default_program.jpg',
                'kategori' => 'Kitab Kuning',
                'info_1' => 'Kurikulum Pesantren',
                'info_2' => 'Kajian Kitab',
                'is_featured' => 0
            ],
            [
                'judul' => 'Bahasa Asing (Arab & Inggris)',
                'deskripsi' => 'Pembiasaan bahasa Arab dan Inggris dalam percakapan sehari-hari serta pidato (muhadhoroh) untuk bekal dakwah global.',
                'gambar' => 'default_program.jpg',
                'kategori' => 'Bahasa',
                'info_1' => 'Bilingual Area',
                'info_2' => 'Public Speaking',
                'is_featured' => 0
            ]
        ];
        
        foreach ($programData as $p) {
             if ($this->db->table('program_unggulan')->where('judul', $p['judul'])->countAllResults() == 0) {
                 $this->db->table('program_unggulan')->insert($p);
             }
        }
        echo "Program Unggulan seeded.\n";


        // 4. Seed Galeri
        $galeriData = [
            [
                'galeri_judul' => 'Gedung Asrama Putra',
                'galeri_deskripsi' => 'Fasilitas asrama putra yang nyaman dan representatif.',
                'galeri_gambar' => 'default_galeri.jpg',
                'galeri_kategori' => 'gedung',
                'galeri_tanggal' => date('Y-m-d')
            ],
            [
                'galeri_judul' => 'Kegiatan Belajar Mengajar',
                'galeri_deskripsi' => 'Suasana kegiatan belajar mengajar di kelas.',
                'galeri_gambar' => 'default_galeri.jpg',
                'galeri_kategori' => 'kegiatan',
                'galeri_tanggal' => date('Y-m-d')
            ],
            [
                'galeri_judul' => 'Masjid Pesantren',
                'galeri_deskripsi' => 'Pusat kegiatan ibadah santri.',
                'galeri_gambar' => 'default_galeri.jpg',
                'galeri_kategori' => 'gedung',
                'galeri_tanggal' => date('Y-m-d')
            ]
        ];
        foreach ($galeriData as $g) {
             if ($this->db->table('galeri')->where('galeri_judul', $g['galeri_judul'])->countAllResults() == 0) {
                 $this->db->table('galeri')->insert($g);
             }
        }
        echo "Galeri seeded.\n";


        // 5. Seed Pengumuman
        $pengumumanData = [
            [
                'pengumuman_judul' => 'Libur Semester Ganjil',
                'pengumuman_slug' => 'libur-semester-ganjil',
                'pengumuman_isi' => '<p>Diberitahukan kepada seluruh santri dan wali santri bahwa libur semester ganjil akan dimulai pada tanggal 20 Desember 2024 sampai dengan 5 Januari 2025.</p>',
                'pengumuman_tanggal' => date('Y-m-d'),
                'pengumuman_gambar' => 'default_pengumuman.jpg'
            ],
            [
                'pengumuman_judul' => 'Jadwal Ujian Akhir Semester',
                'pengumuman_slug' => 'jadwal-uas',
                'pengumuman_isi' => '<p>Ujian Akhir Semester (UAS) akan dilaksanakan mulai tanggal 10 Desember 2024. Harap seluruh santri mempersiapkan diri dengan baik.</p>',
                'pengumuman_tanggal' => date('Y-m-d', strtotime('-1 week')),
                'pengumuman_gambar' => 'default_pengumuman.jpg'
            ],
            [
                'pengumuman_judul' => 'Kunjungan Wali Santri',
                'pengumuman_slug' => 'kunjungan-wali-santri',
                'pengumuman_isi' => '<p>Jadwal kunjungan wali santri bulan ini adalah pada hari Ahad, 15 Desember 2024. Mohon mematuhi protokol kesehatan dan tata tertib pesantren.</p>',
                'pengumuman_tanggal' => date('Y-m-d', strtotime('-2 weeks')),
                'pengumuman_gambar' => 'default_pengumuman.jpg'
            ]
        ];
        foreach ($pengumumanData as $pm) {
             if ($this->db->table('pengumuman')->where('pengumuman_slug', $pm['pengumuman_slug'])->countAllResults() == 0) {
                 $this->db->table('pengumuman')->insert($pm);
             }
        }
        echo "Pengumuman seeded.\n";
    }
}
