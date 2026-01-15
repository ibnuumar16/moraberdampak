<?php

namespace App\Controllers;
use App\Models\ModelSantri;
use App\Models\ModelArtikel;
use App\Models\ModelPengaturan;
use App\Models\ModelGuru;
use App\Models\ModelProgramUnggulan;
use App\Models\ModelPengumuman;

class Home extends BaseController
{
    public function __construct()
    {
        helper('form');
        helper('text');
        $this->ModelSantri = new ModelSantri();
        $this->ModelArtikel = new ModelArtikel();
        $this->ModelPengaturan = new ModelPengaturan();
        $this->ModelGuru = new ModelGuru();
        $this->ModelProgramUnggulan = new ModelProgramUnggulan();
        $this->ModelPengumuman = new ModelPengumuman();
    }

    public function index()
    {
        $ModelProgramHeader = new \App\Models\ModelProgramHeader();
        $pengaturan = $this->ModelPengaturan->data();

        $data = [
            'title' => 'Home',
            'meta_desc' => $pengaturan['deskripsi'] ?? '',
            'meta_image' => !empty($pengaturan['logo_web']) ? base_url('uploads/' . $pengaturan['logo_web']) : base_url('homepage/img/logo.png'),
            'isi' => 'homepage/home',
            'pengaturan' => $pengaturan,
            'featured_program' => $this->ModelProgramUnggulan->where('is_featured', 1)->first(),
            'program_unggulan' => $this->ModelProgramUnggulan->where('is_featured', 0)->findAll(3),
            'program_header' => $ModelProgramHeader->findAll(),
            'pengumuman' => $this->ModelPengumuman->orderBy('pengumuman_tanggal', 'DESC')->orderBy('pengumuman_id', 'DESC')->findAll(5), // Latest 5
            'artikel' => $this->ModelArtikel->artikel(),
            'pengajar' => $this->ModelGuru->findAll()
        ];
        return view('homepage/layout/gabung', $data);
    }

    public function pengasuh()
    {
        $data = [
            'title' => "Pengasuh",
            'dropdown'=> true,
            'isi' => 'homepage/pengasuh',
            'pengaturan' => $this->ModelPengaturan->data()
        ];

        return view('homepage/layout/gabung', $data);

    }

    public function pesantren()
    {
        $data = [
            'title' => "pesantren",
            'dropdown'=> true,
            'isi' => 'homepage/pesantren',
            'pengaturan' => $this->ModelPengaturan->data()
        ];

        return view('homepage/layout/gabung', $data);

    }

    public function sejarah()
    {
        $data = [
            'title' => "sejarah",
            'dropdown'=> true,
            'isi' => 'homepage/sejarah',
            'pengaturan' => $this->ModelPengaturan->data()
        ];

        return view('homepage/layout/gabung', $data);

    }

    public function pendidikan_pesantren()
    {
        $data = [
            'title' => "pendidikan_pesantren",
            'dropdown'=> true,
            'isi' => 'homepage/pendidikan_pesantren',
            'pengaturan' => $this->ModelPengaturan->data()
        ];

        return view('homepage/layout/gabung', $data);

    }

    public function pendaftaran()
    {
        $data = [
            'title' => "pendaftaran",
            'dropdown'=> true,
            'isi' => 'homepage/pendaftaran',
            'pengaturan' => $this->ModelPengaturan->data()
        ];

        return view('homepage/layout/gabung', $data);

    }

    public function pendidikan_formal()
    {
        $data = [
            'title' => "pendidikan_formal",
            'dropdown'=> true,
            'isi' => 'homepage/pendidikan_formal',
            'pengaturan' => $this->ModelPengaturan->data()
        ];

        return view('homepage/layout/gabung', $data);

    }

    public function artikel()
    {
        $data = [
            'title' => "Artikel",
            'dropdown'=> true,
            'isi' => 'homepage/artikel',
            'artikel' => $this->ModelArtikel->paginateArtikel(6),
            'pager' => $this->ModelArtikel->pager,
            'pengaturan' => $this->ModelPengaturan->data()
        ];
        return view('homepage/layout/gabung', $data);
    }

    public function detail($slug)
    {
        // Ambil artikel berdasarkan slug dan sertakan kategori dan penulis
        $artikel = $this->ModelArtikel->select('artikel.*, kategori.kategori_nama, kategori.kategori_id, user.nama_user AS artikel_author')
                                      ->join('kategori', 'kategori.kategori_id = artikel.artikel_kategori')
                                      ->join('user', 'user.id_user = artikel.artikel_author')
                                      ->where('artikel_slug', $slug)
                                      ->first();
    
        // Cek apakah artikel ditemukan
        if (!$artikel) {
            // Jika artikel tidak ditemukan, redirect atau tampilkan pesan error
            session()->setFlashdata('error', 'Artikel tidak ditemukan.');
            return redirect()->to(base_url('home/artikel'));
        }

        // Ambil artikel terbaru (5 artikel)
        $latestArtikel = $this->ModelArtikel->getLatest(5);

        // Ambil artikel terkait (by kategori, exclude current article, 4 artikel)
        $relatedArtikel = $this->ModelArtikel->getRelated($artikel['artikel_kategori'], $artikel['artikel_id'], 4);
    
        // Prepare Meta Description (strip tags and limit length)
        $meta_desc = strip_tags($artikel['artikel_konten']);
        $meta_desc = word_limiter($meta_desc, 20);

        // Prepare Meta Image
        $meta_image = !empty($artikel['artikel_sampul']) ? base_url('uploads/' . $artikel['artikel_sampul']) : base_url('homepage/img/logo.png');

        // Data untuk ditampilkan pada view
        $data = [
            'title' => $artikel['artikel_judul'],
            'meta_desc' => $meta_desc,
            'meta_image' => $meta_image,
            'artikel' => $artikel,
            'latest_artikel' => $latestArtikel,
            'related_artikel' => $relatedArtikel,
            'isi' => 'homepage/detail_artikel', // Nama view yang akan menampilkan detail artikel
            'pengaturan' => $this->ModelPengaturan->data()
        ];
    
        return view('homepage/layout/gabung', $data);
    }
    


    public function form()
    {
        helper('form');
        $data = [
            'title' => "form",
            'dropdown'=> true,
            'isi' => 'homepage/form',
            'pengaturan' => $this->ModelPengaturan->data()
        ];

        return view('homepage/layout/gabung', $data);

    }

    // Search articles
    public function search()
    {
        $keyword = $this->request->getGet('q');
        
        $data = [
            'title' => 'Hasil Pencarian: ' . $keyword,
            'dropdown' => true,
            'isi' => 'homepage/artikel',
            'artikel' => $this->ModelArtikel->search($keyword),
            'pager' => $this->ModelArtikel->pager,
            'keyword' => $keyword,
            'pengaturan' => $this->ModelPengaturan->data()
        ];

        return view('homepage/layout/gabung', $data);
    }

    // Filter by kategori
    public function kategori($kategori_id)
    {
        $kategoriModel = new \App\Models\ModelKategori();
        $kategori = $kategoriModel->find($kategori_id);

        if (!$kategori) {
            return redirect()->to(base_url('home/artikel'));
        }

        $data = [
            'title' => 'Kategori: ' . $kategori['kategori_nama'],
            'dropdown' => true,
            'isi' => 'homepage/artikel',
            'artikel' => $this->ModelArtikel->getByKategori($kategori_id),
            'pager' => $this->ModelArtikel->pager,
            'kategori' => $kategori,
            'pengaturan' => $this->ModelPengaturan->data()
        ];

        return view('homepage/layout/gabung', $data);
    }

    // Galeri page
    public function galeri()
    {
        $galeriModel = new \App\Models\ModelGaleri();
        
        $data = [
            'title' => 'Galeri',
            'dropdown' => true,
            'isi' => 'homepage/galeri',
            'galeri' => $galeriModel->paginateGaleri(12),
            'pager' => $galeriModel->pager,
            'galeri_gedung' => $galeriModel->getByKategori('gedung'),
            'galeri_kegiatan' => $galeriModel->getByKategori('kegiatan'),
            'pengaturan' => $this->ModelPengaturan->data()
        ];

        return view('homepage/layout/gabung', $data);
    }

    // Display dynamic halaman
    public function halaman($slug)
    {
        $halamanModel = new \App\Models\ModelHalaman();
        $halaman = $halamanModel->getBySlug($slug);

        if (!$halaman) {
            return redirect()->to(base_url('home'));
        }

        $data = [
            'title' => $halaman['halaman_judul'],
            'dropdown' => true,
            'isi' => 'homepage/halaman_detail',
            'halaman' => $halaman,
            'pengaturan' => $this->ModelPengaturan->data()
        ];

        return view('homepage/layout/gabung', $data);
    }

    public function donasi()
    {
        $data = [
            'title' => 'Donasi',
            'dropdown' => true,
            'isi' => 'homepage/donasi',
            'pengaturan' => $this->ModelPengaturan->data()
        ];
        return view('homepage/layout/gabung', $data);
    }



    public function tambahsantri()
{
    $nik = trim($this->request->getPost('nik'));

    // Cek apakah NIK sudah terdaftar
    if ($this->ModelSantri->cek_nik($nik)) {
        session()->setFlashdata('setengah', 'MAAF, NIK ANDA SUDAH TERDAFTAR, HUBUNGI SEKRETARIS PONDOK JIKA PERLU BANTUAN !!!');
        return redirect()->to(base_url('home/form'));
    }

    // Ambil file foto (jika diunggah)
    $foto = $this->request->getFile('foto');
    $nama_foto = null; // Default tanpa foto

    if ($foto && $foto->isValid()) {
        // Validasi format file
        $allowedExtensions = ['jpg', 'jpeg', 'png'];
        if (!in_array($foto->getClientExtension(), $allowedExtensions)) {
            session()->setFlashdata('setengah', 'Format foto tidak valid! Harap unggah file dengan format JPG, JPEG, atau PNG.');
            return redirect()->to(base_url('home/form'));
        }

        $nama_foto = $foto->getRandomName();
    }

    $tanggal_masuk = date('Y-m-d');

    $data = [
        // Data Baru
        'jml_saudara_santri' => trim($this->request->getPost('saudara')),
        'anakke_santri' => trim($this->request->getPost('anakke')),
        'tempat_lahir_ayah_santri' => trim($this->request->getPost('tempat_lahir_ayah')),
        'tanggal_lahir_ayah_santri' => trim($this->request->getPost('tanggal_lahir_ayah')),
        'tempat_lahir_ibu_santri' => trim($this->request->getPost('tempat_lahir_ibu')),
        'tanggal_lahir_ibu_santri' => trim($this->request->getPost('tanggal_lahir_ibu')),
        'tanggal_masuk' => $tanggal_masuk,
        'tahun_masuk_santri' => 2025,

        // Data Lama
        'kategori_santri' => trim($this->request->getPost('kategori')),
        'nama_santri' => trim($this->request->getPost('nama')),
        'nik_santri' => $nik,
        'password_santri' => password_hash(trim($this->request->getPost('password')), PASSWORD_DEFAULT),
        'nisn_santri' => trim($this->request->getPost('nisn')),
        'kip_santri' => trim($this->request->getPost('kip')),
        'pkh_santri' => trim($this->request->getPost('pkh')),
        'kks_santri' => trim($this->request->getPost('kks')),
        'tempat_lahir_santri' => trim($this->request->getPost('tempat_lahir')),
        'tanggal_lahir_santri' => trim($this->request->getPost('tanggal_lahir')),
        'jk_santri' => trim($this->request->getPost('jenis_kelamin')),
        'agama_santri' => trim($this->request->getPost('agama')),
        'hobi_santri' => trim($this->request->getPost('hobi')),
        'email_santri' => trim($this->request->getPost('email_santri')),
        'wa_santri' => trim($this->request->getPost('no_hp/wa')),
        'cita_cita_santri' => trim($this->request->getPost('cita_cita')),
        'kewarganegaraan_santri' => trim($this->request->getPost('kewarganegaraan')),
        'status_rumah_santri' => trim($this->request->getPost('status_rumah')),
        'status_mukim_santri' => trim($this->request->getPost('status_mukim')),
        'alamat_santri' => trim($this->request->getPost('alamat')),
        'rt_santri' => trim($this->request->getPost('rt')),
        'rw_santri' => trim($this->request->getPost('rw')),
        'desa_santri' => trim($this->request->getPost('desa')),
        'kecamatan_santri' => trim($this->request->getPost('kecamatan')),
        'kabupaten_santri' => trim($this->request->getPost('kabupaten')),
        'provinsi_santri' => trim($this->request->getPost('provinsi')),
        'kode_pos_santri' => trim($this->request->getPost('kode_pos')),
        'kk_santri' => trim($this->request->getPost('kk')),
        'nik_ayah_santri' => trim($this->request->getPost('nik_ayah')),
        'nama_ayah_santri' => trim($this->request->getPost('nama_ayah')),
        'pekerjaan_ayah_santri' => trim($this->request->getPost('pekerjaan_ayah')),
        'pendidikan_ayah_santri' => trim($this->request->getPost('pendidikan_ayah')),
        'telp_ayah_santri' => trim($this->request->getPost('hp_ayah')),
        'penghasilan_ayah_santri' => trim($this->request->getPost('penghasilan_ayah')),
        'nik_ibu_santri' => trim($this->request->getPost('nik_ibu')),
        'nama_ibu_santri' => trim($this->request->getPost('nama_ibu')),
        'pekerjaan_ibu_santri' => trim($this->request->getPost('pekerjaan_ibu')),
        'pendidikan_ibu_santri' => trim($this->request->getPost('pendidikan_ibu')),
        'telp_ibu_santri' => trim($this->request->getPost('hp_ibu')),
        'penghasilan_ibu_santri' => trim($this->request->getPost('penghasilan_ibu')),
        'wali_santri' => trim($this->request->getPost('wali')),
        'wa_wali' => trim($this->request->getPost('hp_wali')),
        'foto_santri' => $nama_foto
    ];

    // Simpan data ke database
$inputdata = $this->ModelSantri->add($data);

// **KIRIM NOTIFIKASI WHATSAPP**
// Tentukan link grup berdasarkan jenis kelamin jika diperlukan

if ($inputdata) {
    // Kirim pesan WhatsApp setelah data berhasil disimpan
    $data_santri = [
        'api_key' => 'mjd3ojpBjacFmGIRgfnb3PGLigcjoW', // Ganti dengan API Key asli
        'sender' => '087700000000', // Ganti dengan nomor pengirim
        'number' => $data['wa_santri'], // Nomor santri
        'message' => "Assalamu'alaikum Warohmatullohi Wabarokatuh

Selamat anda telah bergabung sebagai santri baru di Pondok pesantren Ulumul Qur'an Al-Qindiliyyah Tahun ajaran 2025, data anda telah tersimpan sebagai santri baru tahun ajaran 2025, informasi mengenai penerimaan santri baru silahkan bergabung di grup '' WALI SANTRI 2025 '' link https://chat.whatsapp.com/FnLYa4ZnqjS1D2xeEVoYlp
terimakasih

Wassalamu'alaikum Warohmatullohi Wabarokatuh
        
*NB: Balas Pesan Ini jika Link Tidak bisa digunakan*"
    ];

    // Kirim pesan ke santri
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => 'https://gateway.baitulabidindarussalam.ponpes.id/send-message',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($data_santri),
        CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
    ]);
    $response = curl_exec($curl);
    curl_close($curl);

    // Pindahkan foto jika ada
    if ($nama_foto) {
        $foto->move('template/gambar/santri', $nama_foto);
    }

    session()->setFlashdata('selesai', 'TERIMAKASIH, DATA BERHASIL DISIMPAN DAN BISA KELUAR !!');
} else {
    session()->setFlashdata('setengah', 'DATA GAGAL DI INPUT');
}

    

    return redirect()->to(base_url('home/form'));
}

    public function contact()
    {
        $data = [
            'title' => 'Contact',
            'dropdown' => true,
            'isi' => 'homepage/contact',
            'pengaturan' => $this->ModelPengaturan->data()
        ];
        return view('homepage/layout/gabung', $data);
    }

    public function debug_menu()
    {
        $model = new \App\Models\ModelHalaman();
        $pages = $model->findAll();
        
        echo "<h1>All Pages</h1>";
        echo "<table border='1'><tr><th>ID</th><th>Judul</th><th>Slug</th><th>Jenis</th></tr>";
        foreach ($pages as $page) {
            echo "<tr>";
            echo "<td>" . $page['halaman_id'] . "</td>";
            echo "<td>" . $page['halaman_judul'] . "</td>";
            echo "<td>" . $page['halaman_slug'] . "</td>";
            echo "<td>" . $page['halaman_jenis'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";

        echo "<h2>ByType('page')</h2>";
        $menuPages = $model->getByType('page');
        echo "<pre>";
        print_r($menuPages);
        echo "</pre>";

        echo "<h2>ByType('profil')</h2>";
        $menuProfil = $model->getByType('profil');
        echo "<pre>";
        print_r($menuProfil);
        echo "</pre>";
    }
}
