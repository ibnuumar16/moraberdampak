<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ComprehensiveSeeder extends Seeder
{
    public function run()
    {
        // 1. Seed Pengaturan (Critical for Dashboard)
        $this->seedPengaturan();

        // 2. Seed Kategori (for Artikel & Galeri)
        $this->seedKategori();
        
        // 2. Seed Halaman (Dynamic Menu Pages)
        $this->seedHalaman();
        
        // 3. Seed Artikel (with kategori)
        $this->seedArtikel();
        
        // 4. Seed Galeri
        $this->seedGaleri();
        
        echo "\n✅ All dummy data berhasil dibuat!\n";
        echo "   - 5 Kategori\n";
        echo "   - 4 Halaman (menu items)\n";
        echo "   - 6 Artikel\n";
        echo "   - 8 Galeri (4 gedung + 4 kegiatan)\n\n";
        echo "🌐 Cek website sekarang untuk lihat perubahan!\n";
    }

    private function seedPengaturan()
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

        $count = $this->db->table('pengaturan')->countAll();
        if ($count == 0) {
            $this->db->table('pengaturan')->insert($data);
        }
    }

    private function seedKategori()
    {
        $data = [
            ['kategori_nama' => 'Berita', 'kategori_slug' => 'berita'],
            ['kategori_nama' => 'Kegiatan', 'kategori_slug' => 'kegiatan'],
            ['kategori_nama' => 'Pengumuman', 'kategori_slug' => 'pengumuman'],
            ['kategori_nama' => 'Artikel', 'kategori_slug' => 'artikel'],
            ['kategori_nama' => 'Info Santri', 'kategori_slug' => 'info-santri'],
        ];

        foreach ($data as $item) {
            $this->db->table('kategori')->insert($item);
        }
    }

    private function seedHalaman()
    {
        $data = [
            [
                'halaman_judul' => 'Tentang Kami',
                'halaman_slug' => 'tentang-kami',
                'halaman_konten' => '<h2>Tentang Pesantren Al-Falahiyah</h2>
                <p>Pondok Pesantren Al-Falahiyah Mlangi adalah lembaga pendidikan Islam yang berdiri sejak tahun 1985. Pesantren ini berlokasi di Yogyakarta dan telah melahirkan ribuan alumni yang tersebar di berbagai daerah.</p>
                <h3>Visi</h3>
                <p>Menjadi lembaga pendidikan Islam terkemuka yang menghasilkan generasi Qurani, berakhlak mulia, dan berwawasan luas.</p>
                <h3>Misi</h3>
                <ul>
                    <li>Menyelenggarakan pendidikan Islam yang berkualitas</li>
                    <li>Membentuk santri yang hafal Al-Quran dan memahami ilmu agama</li>
                    <li>Mengembangkan potensi santri di bidang akademik dan non-akademik</li>
                    <li>Membangun karakter santri yang Islami dan bertanggung jawab</li>
                </ul>'
            ],
            [
                'halaman_judul' => 'Sejarah',
                'halaman_slug' => 'sejarah',
                'halaman_konten' => '<h2>Sejarah Pesantren Al-Falahiyah</h2>
                <p>Pondok Pesantren Al-Falahiyah didirikan oleh KH. Ahmad Zainuddin pada tahun 1985 dengan hanya 15 santri. Berawal dari mushola sederhana, kini pesantren telah berkembang menjadi kompleks pesantren modern dengan fasilitas lengkap.</p>
                <h3>Milestone Penting</h3>
                <ul>
                    <li><strong>1985</strong> - Pendirian pesantren dengan 15 santri perdana</li>
                    <li><strong>1990</strong> - Pembangunan gedung asrama santri putra</li>
                    <li><strong>1995</strong> - Pembukaan program Tahfidz Quran</li>
                    <li><strong>2000</strong> - Pembangunan asrama santri putri</li>
                    <li><strong>2010</strong> - Pendirian Madrasah Diniyah formal</li>
                    <li><strong>2020</strong> - Digitalisasi sistem pendidikan pesantren</li>
                </ul>'
            ],
            [
                'halaman_judul' => 'Program Pendidikan',
                'halaman_slug' => 'program-pendidikan',
                'halaman_konten' => '<h2>Program Pendidikan</h2>
                <p>Pesantren Al-Falahiyah menyediakan berbagai program pendidikan untuk santri:</p>
                
                <h3>1. Program Tahfidz Quran</h3>
                <p>Program unggulan dengan target hafalan 30 juz dalam 4 tahun. Santri dibimbing oleh ustadz/ah yang berpengalaman.</p>
                
                <h3>2. Program Kitab Kuning</h3>
                <p>Mengkaji kitab-kitab klasik dengan metode sorogan dan bandongan. Meliputi fiqh, hadits, tafsir, dan akhlak.</p>
                
                <h3>3. Program Madrasah Diniyah</h3>
                <p>Pendidikan formal setara dengan SMP/SMA dengan kurikulum pesantren.</p>
                
                <h3>4. Program Takhasus</h3>
                <p>Program spesialisasi untuk alumni yang ingin mendalami bidang tertentu seperti tahfidz, fiqh, atau bahasa Arab.</p>'
            ],
            [
                'halaman_judul' => 'Fasilitas',
                'halaman_slug' => 'fasilitas',
                'halaman_konten' => '<h2>Fasilitas Pesantren</h2>
                <p>Al-Falahiyah menyediakan fasilitas lengkap untuk menunjang pendidikan santri:</p>
                
                <h3>Fasilitas Pendidikan</h3>
                <ul>
                    <li>Masjid utama dengan kapasitas 500 jamaah</li>
                    <li>Ruang kelas ber-AC</li>
                    <li>Perpustakaan dengan koleksi 5000+ buku</li>
                    <li>Lab komputer dan multimedia</li>
                    <li>Aula serbaguna</li>
                </ul>
                
                <h3>Fasilitas Asrama</h3>
                <ul>
                    <li>Asrama putra dan putri terpisah</li>
                    <li>Kamar mandi dalam</li>
                    <li>Dapur santri</li>
                    <li>Ruang makan</li>
                    <li>Laundry</li>
                </ul>
                
                <h3>Fasilitas Olahraga</h3>
                <ul>
                    <li>Lapangan futsal</li>
                    <li>Lapangan basket</li>
                    <li>Ruang fitness</li>
                </ul>'
            ]
        ];

        foreach ($data as $item) {
            $this->db->table('halaman')->insert($item);
        }
    }

    private function seedArtikel()
    {
        // Get first user ID (admin)
        $user = $this->db->table('user')->select('id_user')->limit(1)->get()->getRowArray();
        $userId = $user['id_user'] ?? 1;

        // Get kategori IDs
        $kategoriBerita = $this->db->table('kategori')->where('kategori_slug', 'berita')->get()->getRowArray();
        $kategoriKegiatan = $this->db->table('kategori')->where('kategori_slug', 'kegiatan')->get()->getRowArray();
        $kategoriPengumuman = $this->db->table('kategori')->where('kategori_slug', 'pengumuman')->get()->getRowArray();

        $data = [
            [
                'artikel_judul' => 'Penerimaan Santri Baru Tahun 2025/2026',
                'artikel_slug' => 'penerimaan-santri-baru-2025-2026',
                'artikel_konten' => '<p>Pesantren Al-Falahiyah membuka pendaftaran santri baru untuk tahun akademik 2025/2026. Pendaftaran dibuka mulai 1 Januari hingga 30 Juni 2025.</p><p>Program yang tersedia: Tahfidz Quran, Kitab Kuning, dan Takhasus Pesantren.</p>',
                'artikel_sampul' => 'default.jpg',
                'artikel_author' => $userId,
                'artikel_kategori' => $kategoriPengumuman['kategori_id'] ?? 3,
                'artikel_status' => 'publish',
                'artikel_tanggal' => date('Y-m-d H:i:s', strtotime('-2 days'))
            ],
            [
                'artikel_judul' => 'Wisuda Tahfidz Angkatan 15',
                'artikel_slug' => 'wisuda-tahfidz-angkatan-15',
                'artikel_konten' => '<p>Alhamdulillah, Pesantren Al-Falahiyah telah meluluskan 50 santri tahfidz angkatan 15 yang berhasil menyelesaikan hafalan 30 juz.</p><p>Acara wisuda dilaksanakan pada hari Minggu, 15 November 2024 dengan dihadiri wali santri dan tokoh masyarakat.</p>',
                'artikel_sampul' => 'default.jpg',
                'artikel_author' => $userId,
                'artikel_kategori' => $kategoriKegiatan['kategori_id'] ?? 2,
                'artikel_status' => 'publish',
                'artikel_tanggal' => date('Y-m-d H:i:s', strtotime('-5 days'))
            ],
            [
                'artikel_judul' => 'Pesantren Raih Juara 1 MTQ Kabupaten',
                'artikel_slug' => 'juara-1-mtq-kabupaten',
                'artikel_konten' => '<p>Tim qiraat Pesantren Al-Falahiyah berhasil meraih juara 1 pada Musabaqah Tilawatil Quran (MTQ) tingkat kabupaten.</p><p>Prestasi ini menjadi kebanggan tersendiri dan membuktikan kualitas pembinaan tahsin dan tahfidz di pesantren.</p>',
                'artikel_sampul' => 'default.jpg',
                'artikel_author' => $userId,
                'artikel_kategori' => $kategoriBerita['kategori_id'] ?? 1,
                'artikel_status' => 'publish',
                'artikel_tanggal' => date('Y-m-d H:i:s', strtotime('-7 days'))
            ],
            [
                'artikel_judul' => 'Kegiatan Rihlah Ilmiyah ke Masjid Agung',
                'artikel_slug' => 'rihlah-ilmiyah',
                'artikel_konten' => '<p>Santri kelas akhir mengikuti rihlah ilmiyah ke Masjid Agung Yogyakarta untuk mempelajari arsitektur Islam dan sejarah penyebaran Islam di Jawa.</p><p>Kegiatan ini bertujuan untuk menambah wawasan santri tentang sejarah dan budaya Islam Nusantara.</p>',
                'artikel_sampul' => 'default.jpg',
                'artikel_author' => $userId,
                'artikel_kategori' => $kategoriKegiatan['kategori_id'] ?? 2,
                'artikel_status' => 'publish',
                'artikel_tanggal' => date('Y-m-d H:i:s', strtotime('-10 days'))
            ],
            [
                'artikel_judul' => 'Jadwal Libur Semester Genap',
                'artikel_slug' => 'jadwal-libur-semester',
                'artikel_konten' => '<p>Libur semester genap akan dimulai pada tanggal 1 Juni 2025 dan masuk kembali pada tanggal 15 Juli 2025.</p><p>Santri diharapkan memanfaatkan waktu libur untuk muroja\'ah hafalan dan silaturahmi.</p>',
                'artikel_sampul' => 'default.jpg',
                'artikel_author' => $userId,
               'artikel_kategori' => $kategoriPengumuman['kategori_id'] ?? 3,
                'artikel_status' => 'publish',
                'artikel_tanggal' => date('Y-m-d H:i:s', strtotime('-15 days'))
            ],
            [
                'artikel_judul' => 'Tips Menghafal Quran Untuk Pemula',
                'artikel_slug' => 'tips-menghafal-quran',
                'artikel_konten' => '<h3>1. Niat yang Ikhlas</h3><p>Pastinya niat karena Allah adalah kunci utama.</p><h3>2. Istiqomah</h3><p>Konsisten sedikit demi sedikit lebih baik daripada banyak tapi tidak konsisten.</p><h3>3. Muroja\'ah Rutin</h3><p>Mengulang hafalan sangat penting agar tidak mudah lupa.</p>',
                'artikel_sampul' => 'default.jpg',
                'artikel_author' => $userId,
                'artikel_kategori' => $kategoriBerita['kategori_id'] ?? 1,
                'artikel_status' => 'publish',
                'artikel_tanggal' => date('Y-m-d H:i:s', strtotime('-20 days'))
            ]
        ];

        foreach ($data as $item) {
            $this->db->table('artikel')->insert($item);
        }
    }

    private function seedGaleri()
    {
        $data = [
            // Gedung
            ['galeri_judul' => 'Masjid Utama Pesantren', 'galeri_kategori' => 'gedung', 'galeri_foto' => 'dummy-masjid.jpg'],
            ['galeri_judul' => 'Gedung Asrama Santri Putra', 'galeri_kategori' => 'gedung', 'galeri_foto' => 'dummy-asrama-putra.jpg'],
            ['galeri_judul' => 'Gedung Asrama Santri Putri', 'galeri_kategori' => 'gedung', 'galeri_foto' => 'dummy-asrama-putri.jpg'],
            ['galeri_judul' => 'Ruang Kelas dan Perpustakaan', 'galeri_kategori' => 'gedung', 'galeri_foto' => 'dummy-kelas.jpg'],
            
            // Kegiatan
            ['galeri_judul' => 'Wisuda Tahfidz Angkatan 15', 'galeri_kategori' => 'kegiatan', 'galeri_foto' => 'dummy-wisuda.jpg'],
            ['galeri_judul' => 'Kegiatan Muroja\'ah Pagi', 'galeri_kategori' => 'kegiatan', 'galeri_foto' => 'dummy-muroja.jpg'],
            ['galeri_judul' => 'Olahraga Santri - Futsal', 'galeri_kategori' => 'kegiatan', 'galeri_foto' => 'dummy-olahraga.jpg'],
            ['galeri_judul' => 'Rihlah Ilmiyah  Santri', 'galeri_kategori' => 'kegiatan', 'galeri_foto' => 'dummy-rihlah.jpg'],
        ];

        foreach ($data as $item) {
            $this->db->table('galeri')->insert($item);
        }
        
        echo "\n⚠️ NOTE: Dummy images need to be manually placed in uploads/galeri/\n";
        echo "   Or upload real photos from dashboard after seeding.\n";
    }
}
