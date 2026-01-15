<?php

namespace App\Controllers;

use App\Models\ModelSantri;
use App\Models\ModelArtikel;
use App\Models\ModelPengaturan;
use App\Models\ModelHalaman;
use App\Models\ModelQuote;
use App\Models\ModelPengumuman;

use App\Models\ModelGuru;
use App\Models\ModelKategori;
use App\Models\ModelProgramUnggulan;

use CodeIgniter\Controller;

class Dashboard extends Controller
{
    protected $ModelSantri;
    protected $ModelArtikel;
    protected $ModelKategori;
    protected $ModelPengaturan;
    protected $ModelPengguna;
    protected $ModelGaleri;
    protected $ModelHalaman;
    protected $ModelQuote;
    protected $ModelPengumuman;
    protected $ModelGuru;
    protected $ModelProgramUnggulan;
    protected $ModelKategoriPendaftaran;


    public function __construct()
    {
        helper(['form', 'text']);
        $this->ModelSantri = new ModelSantri();
        $this->ModelArtikel = new ModelArtikel();
        $this->ModelKategori = new ModelKategori();
        $this->ModelPengaturan = new ModelPengaturan();
        $this->ModelPengguna = new \App\Models\ModelPengguna();
        $this->ModelGaleri = new \App\Models\ModelGaleri();
        $this->ModelHalaman = new ModelHalaman();
        $this->ModelQuote = new ModelQuote();
        $this->ModelPengumuman = new ModelPengumuman();
        $this->ModelGuru = new ModelGuru();
        $this->ModelProgramUnggulan = new ModelProgramUnggulan();
        $this->ModelProgramHeader = new \App\Models\ModelProgramHeader();
        $this->ModelKategoriPendaftaran = new \App\Models\ModelKategoriPendaftaran();
    }

    public function index()
    {
        // Get chart data
        $chartStats = $this->ModelSantri->getRegistrationsLast7Days();
        $chartLabels = array_column($chartStats, 'date');
        $chartData = array_column($chartStats, 'count');

        $data = [
            'user' => session()->get(),
            'isi' => 'dashboard/dashboard',
            'pengaturan' => $this->ModelPengaturan->data(),
            'jml_santri' => $this->ModelSantri->jumlahsantri(),
            'jml_santri_arsip' => $this->ModelSantri->jumlahsantriarsip(),
            'jml_artikel' => $this->ModelArtikel->countAll(),
            'jml_guru' => $this->ModelGuru->countAll(),
            'jml_user' => $this->ModelPengguna->countAll(),
            'recent_santri' => $this->ModelSantri->orderBy('id_santri', 'DESC')->findAll(5),
            'chart_labels' => json_encode($chartLabels),
            'chart_data' => json_encode($chartData)
        ];
        return view('dashboard/layout/gabung', $data);
    }

    public function setting_website()
    {
        $data = [
            'title' => 'Pengaturan Website',
            'user' => session()->get(),
            'isi' => 'dashboard/setting_website',
            'pengaturan' => $this->ModelPengaturan->data(),
        ];
        return view('dashboard/layout/gabung', $data);
    }

    public function setting_tampilan()
    {
        $data = [
            'title' => 'Pengaturan Tampilan Awal',
            'user' => session()->get(),
            'isi' => 'dashboard/setting_tampilan',
            'pengaturan' => $this->ModelPengaturan->data(),
        ];
        return view('dashboard/layout/gabung', $data);
    }

    public function setting_website_update()
    {
        if (!$this->validate([
            'tahun_akademik' => 'required',
            'nama'           => 'required',
            'deskripsi'      => 'required',
            'logo'           => 'permit_empty|max_size[logo,2048]|is_image[logo]|mime_in[logo,image/png,image/jpg,image/jpeg]',
            'logo_web'       => 'permit_empty|max_size[logo_web,2048]|is_image[logo_web]|mime_in[logo_web,image/png,image/jpg,image/jpeg]',
        ])) {
            return redirect()->to(base_url('/dashboard/setting_website'))->withInput()->with('error', $this->validator->getErrors());
        }

        $fileLogo = $this->request->getFile('logo');
        $fileLogoWeb = $this->request->getFile('logo_web');

        $currentSettings = $this->ModelPengaturan->data();
        
        $newLogoName = $currentSettings['logo'];
        $newLogoWebName = $currentSettings['logo_web'] ?? null;

        if ($fileLogo && $fileLogo->isValid() && !$fileLogo->hasMoved()) {
            $newLogoName = $fileLogo->getRandomName();
            $fileLogo->move('uploads', $newLogoName);
        }

        if ($fileLogoWeb && $fileLogoWeb->isValid() && !$fileLogoWeb->hasMoved()) {
            $newLogoWebName = $fileLogoWeb->getRandomName();
            $fileLogoWeb->move('uploads', $newLogoWebName);
        }

        $data = [
            'tahun_akademik' => $this->request->getPost('tahun_akademik'),
            'nama'           => $this->request->getPost('nama'),

            'deskripsi'      => $this->request->getPost('deskripsi'),
            'logo'           => $newLogoName,
            'logo_web'       => $newLogoWebName,
            'alamat'         => $this->request->getPost('alamat'),
            'telepon'        => $this->request->getPost('telepon'),
            'email'          => $this->request->getPost('email'),
            'link_youtube'   => $this->request->getPost('link_youtube'),
            'link_facebook'  => $this->request->getPost('link_facebook'),
            'link_twitter'   => $this->request->getPost('link_twitter'),
            'link_instagram' => $this->request->getPost('link_instagram'),
            'link_maps'      => $this->request->getPost('link_maps'),
        ];

        $this->ModelPengaturan->updatePengaturan($data);

        return redirect()->to(base_url('/dashboard/setting_website'))->with('success', 'Pengaturan website berhasil diperbarui!');
    }

    public function setting_tampilan_update()
    {
        if (!$this->validate([
            'hero_bg'        => 'permit_empty|max_size[hero_bg,4096]|is_image[hero_bg]|mime_in[hero_bg,image/png,image/jpg,image/jpeg]',
            'foto_pimpinan'  => 'permit_empty|max_size[foto_pimpinan,2048]|is_image[foto_pimpinan]|mime_in[foto_pimpinan,image/png,image/jpg,image/jpeg]',
            'logo_header_arab' => 'permit_empty|max_size[logo_header_arab,2048]|is_image[logo_header_arab]|mime_in[logo_header_arab,image/png,image/jpg,image/jpeg]',
            'hero_image_arab'  => 'permit_empty|max_size[hero_image_arab,2048]|is_image[hero_image_arab]|mime_in[hero_image_arab,image/png,image/jpg,image/jpeg]',
            'overview_image'   => 'permit_empty|max_size[overview_image,2048]|is_image[overview_image]|mime_in[overview_image,image/png,image/jpg,image/jpeg]',
        ])) {
            return redirect()->to(base_url('/dashboard/setting_tampilan'))->withInput()->with('error', $this->validator->getErrors());
        }

        $fileHeroBg = $this->request->getFile('hero_bg');
        $fileFotoPimpinan = $this->request->getFile('foto_pimpinan');
        $fileLogoHeaderArab = $this->request->getFile('logo_header_arab');
        $fileHeroImageArab = $this->request->getFile('hero_image_arab');
        $fileOverviewImage = $this->request->getFile('overview_image');

        $currentSettings = $this->ModelPengaturan->data();
        
        $newHeroBgName = $currentSettings['hero_bg'] ?? null;
        $newFotoPimpinanName = $currentSettings['foto_pimpinan'] ?? null;
        $newLogoHeaderArabName = $currentSettings['logo_header_arab'] ?? null;
        $newHeroImageArabName = $currentSettings['hero_image_arab'] ?? null;
        $newOverviewImageName = $currentSettings['overview_image'] ?? null;

        if ($fileHeroBg && $fileHeroBg->isValid() && !$fileHeroBg->hasMoved()) {
            $newHeroBgName = $fileHeroBg->getRandomName();
            $fileHeroBg->move('uploads', $newHeroBgName);
        }

        if ($fileFotoPimpinan && $fileFotoPimpinan->isValid() && !$fileFotoPimpinan->hasMoved()) {
            $newFotoPimpinanName = $fileFotoPimpinan->getRandomName();
            $fileFotoPimpinan->move('uploads', $newFotoPimpinanName);
        }

        if ($fileLogoHeaderArab && $fileLogoHeaderArab->isValid() && !$fileLogoHeaderArab->hasMoved()) {
            $newLogoHeaderArabName = $fileLogoHeaderArab->getRandomName();
            $fileLogoHeaderArab->move('uploads', $newLogoHeaderArabName);
        }

        if ($fileHeroImageArab && $fileHeroImageArab->isValid() && !$fileHeroImageArab->hasMoved()) {
            $newHeroImageArabName = $fileHeroImageArab->getRandomName();
            $fileHeroImageArab->move('uploads', $newHeroImageArabName);
        }

        if ($fileOverviewImage && $fileOverviewImage->isValid() && !$fileOverviewImage->hasMoved()) {
            $newOverviewImageName = $fileOverviewImage->getRandomName();
            $fileOverviewImage->move('uploads', $newOverviewImageName);
        }

        $data = [
            'teks_arab'      => $this->request->getPost('teks_arab'),
            'logo_header_arab' => $newLogoHeaderArabName,
            'hero_title'     => $this->request->getPost('hero_title'),
            'hero_desc'      => $this->request->getPost('hero_desc'),
            'hero_bg'        => $newHeroBgName,
            'hero_image_arab' => $newHeroImageArabName,
            'hero_btn_text'  => $this->request->getPost('hero_btn_text'),
            'hero_btn_url'   => $this->request->getPost('hero_btn_url'),
            'sambutan_pimpinan' => $this->request->getPost('sambutan_pimpinan'),
            'foto_pimpinan'  => $newFotoPimpinanName,
            'nama_pimpinan'  => $this->request->getPost('nama_pimpinan'),
            'announcement_active' => $this->request->getPost('announcement_active') ? 1 : 0,
            'announcement_text' => $this->request->getPost('announcement_text'),
            'announcement_link' => $this->request->getPost('announcement_link'),
            'section_hero' => $this->request->getPost('section_hero') ? 1 : 0,
            'section_program_header' => $this->request->getPost('section_program_header') ? 1 : 0,
            'section_psb' => $this->request->getPost('section_psb') ? 1 : 0,
            'section_sambutan' => $this->request->getPost('section_sambutan') ? 1 : 0,
            'section_berita' => $this->request->getPost('section_berita') ? 1 : 0,
            'section_program_unggulan' => $this->request->getPost('section_program_unggulan') ? 1 : 0,
            'section_donasi' => $this->request->getPost('section_donasi') ? 1 : 0,
            'section_guru' => $this->request->getPost('section_guru') ? 1 : 0,
            'program_header_title' => $this->request->getPost('program_header_title'),
            'program_header_desc' => $this->request->getPost('program_header_desc'),
            'psb_title' => $this->request->getPost('psb_title'),
            'psb_desc' => $this->request->getPost('psb_desc'),
            'berita_title' => $this->request->getPost('berita_title'),
            'berita_desc' => $this->request->getPost('berita_desc'),
            'program_unggulan_title' => $this->request->getPost('program_unggulan_title'),
            'program_unggulan_desc' => $this->request->getPost('program_unggulan_desc'),
            'donasi_title' => $this->request->getPost('donasi_title'),
            'donasi_desc' => $this->request->getPost('donasi_desc'),
            'guru_title' => $this->request->getPost('guru_title'),
            'guru_desc' => $this->request->getPost('guru_desc'),
            'overview_title' => $this->request->getPost('overview_title'),
            'overview_desc' => $this->request->getPost('overview_desc'),
            'overview_image' => $newOverviewImageName,
            'overview_stats_1_num' => $this->request->getPost('overview_stats_1_num'),
            'overview_stats_1_label' => $this->request->getPost('overview_stats_1_label'),
            'overview_stats_2_num' => $this->request->getPost('overview_stats_2_num'),
            'overview_stats_2_label' => $this->request->getPost('overview_stats_2_label'),
            'overview_stats_3_num' => $this->request->getPost('overview_stats_3_num'),
            'overview_stats_3_label' => $this->request->getPost('overview_stats_3_label'),
        ];

        $this->ModelPengaturan->updatePengaturan($data);

        return redirect()->to(base_url('/dashboard/setting_tampilan'))->with('success', 'Pengaturan tampilan berhasil diperbarui!');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('success', 'Anda telah logout.');
    }

    public function santri()
    {
        $data = [
            'title' => 'Santri',
            'user' => session()->get(),
            'isi' => 'dashboard/santri',
            'jml_santri' => $this->ModelSantri->jumlahsantri(),
            'pengaturan' => $this->ModelPengaturan->data(),
            'data_santri' => $this->ModelSantri->allData(),
        ];
        return view('dashboard/layout/gabung', $data);
    }

    public function arsip()
    {
        $data = [
            'title' => 'Arsip Santri',
            'user' => session()->get(),
            'isi' => 'dashboard/santri',
            'jml_santri' => $this->ModelSantri->jumlahsantri(),
            'pengaturan' => $this->ModelPengaturan->data(),
            'data_santri' => $this->ModelSantri->allData_arsip(),
        ];
        return view('dashboard/layout/gabung', $data);
    }

    public function wawancara()
    {
        $data = [
            'title' => 'Alumni (Coming Soon)',
            'user' => session()->get(),
            'isi' => 'dashboard/dashboard', // Placeholder, redirect to dashboard or a coming soon page
            'pengaturan' => $this->ModelPengaturan->data(),
            'jml_santri' => $this->ModelSantri->jumlahsantri(),
            'jml_santri_arsip' => $this->ModelSantri->jumlahsantriarsip(),
        ];
        session()->setFlashdata('info', 'Fitur Alumni masih dalam pengembangan.');
        return view('dashboard/layout/gabung', $data);
    }

    public function santri_edit($id)
    {
        $santri = $this->ModelSantri->find($id);

        if (!$santri) {
            return redirect()->to(base_url('dashboard/santri'))->with('error', 'Santri tidak ditemukan.');
        }

        $data = [
            'title' => 'Edit Santri',
            'user' => session()->get(),
            'isi' => 'dashboard/santri_edit',
            'santri' => $santri,
            'pengaturan' => $this->ModelPengaturan->data(),
        ];

        return view('dashboard/layout/gabung', $data);
    }

    public function santri_hapus($id)
    {
        $santri = $this->ModelSantri->find($id);

        if (!$santri) {
            return redirect()->to(base_url('dashboard/santri'))->with('error', 'Santri tidak ditemukan.');
        }

        $this->ModelSantri->delete($id);
        return redirect()->to(base_url('dashboard/santri'))->with('success', 'Santri berhasil dihapus.');
    }

    public function santri_update($id)
    {
        $santriModel = new ModelSantri();
        $santri = $santriModel->find($id);

        if (!$santri) {
            return redirect()->to(base_url('dashboard/santri'))->with('error', 'Data santri tidak ditemukan.');
        }

        // Ambil data yang diizinkan dan pastikan semuanya string
        // Ambil data yang diizinkan dan pastikan semuanya string
    $data = $this->request->getPost([
        'nama_santri', 'nis_santri', 'nisn_santri', 'kip_santri', 
        'pkh_santri', 'kks_santri', 'nik_santri', 'tempat_lahir_santri', 
        'tanggal_lahir_santri', 'jk_santri', 'agama_santri', 'hobi_santri', 
        'cita_cita_santri', 'kewarganegaraan_santri', 'status_rumah_santri', 
        'status_mukim_santri', 'email_santri', 'wa_santri', 'kk_santri', 
        'tanggal_masuk', 'tahun_masuk_santri', 'jml_saudara_santri', 
        'anakke_santri', 'kategori_santri', 'foto_santri', 'password_santri', 
        'nik_ayah_santri', 'nama_ayah_santri', 'tempat_lahir_ayah_santri', 
        'tanggal_lahir_ayah_santri', 'pekerjaan_ayah_santri', 
        'pendidikan_ayah_santri', 'telp_ayah_santri', 'penghasilan_ayah_santri', 
        'nik_ibu_santri', 'nama_ibu_santri', 'tempat_lahir_ibu_santri', 
        'tanggal_lahir_ibu_santri', 'pekerjaan_ibu_santri', 'pendidikan_ibu_santri', 
        'telp_ibu_santri', 'penghasilan_ibu_santri', 'wali_santri', 'wa_wali', 
        'alamat_santri', 'rt_santri', 'rw_santri', 'desa_santri', 'kecamatan_santri', 
        'kabupaten_santri', 'provinsi_santri', 'kode_pos_santri'
    ]);


        // Konversi semua input ke string untuk menghindari error
        foreach ($data as $key => $value) {
            $data[$key] = (string)$value;
        }

        // Cek apakah ada file foto yang diunggah
        $foto = $this->request->getFile('foto_santri');
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $newName = $foto->getRandomName();
            $foto->move('uploads', $newName);

            // Hapus foto lama jika ada
            if (!empty($santri['foto_santri']) && file_exists('uploads/' . $santri['foto_santri'])) {
                unlink('uploads/' . $santri['foto_santri']);
            }

            $data['foto_santri'] = $newName;
        }


        // Update data santri
        $santriModel->update($id, $data);

        return redirect()->to(base_url('dashboard/santri_edit/') . $id)->with('success', 'Data santri berhasil diperbarui.');
    }


    // Menampilkan daftar kategori
    public function kategori()
    {
        $data = [
            'title' => 'Kategori',
            'user' => session()->get(),
            'isi' => 'dashboard/kategori',
            'pengaturan' => $this->ModelPengaturan->data(),
            'kategori' => $this->ModelKategori->findAll()
        ];
        return view('dashboard/layout/gabung', $data);
    }

    // Form tambah kategori
    public function tambah_kategori()
    {
        $data = [
            'title' => 'tambah kategori',
            'user' => session()->get(),
            'isi' => 'dashboard/tambah_kategori',
            'pengaturan' => $this->ModelPengaturan->data(),
        ];

        return view('dashboard/layout/gabung', $data);
    }

    // Simpan kategori baru
    public function simpan_kategori()
    {
        $this->ModelKategori->save([
            'kategori_nama' => $this->request->getPost('kategori_nama'),
            'kategori_slug' => url_title($this->request->getPost('kategori_nama'), '-', true)
        ]);

        return redirect()->to('/dashboard/kategori')->with('success', 'Kategori berhasil ditambahkan');
    }

    // Form edit kategori
    public function edit_kategori($id)
    {
        $data = [
            'title' => 'edit kategori',
            'user' => session()->get(),
            'isi' => 'dashboard/edit_kategori',
            'pengaturan' => $this->ModelPengaturan->data(),
            'kategori' => $this->ModelKategori->find($id)
        ];

        return view('dashboard/layout/gabung', $data);
    }

    // Update kategori
    public function update_kategori($id)
    {
        $this->ModelKategori->update($id, [
            'kategori_nama' => $this->request->getPost('kategori_nama'),
            'kategori_slug' => url_title($this->request->getPost('kategori_nama'), '-', true)
        ]);

        return redirect()->to('/dashboard/kategori')->with('success', 'Kategori berhasil diperbarui');
    }

    // Hapus kategori
    public function hapus_kategori($id)
    {
        $this->ModelKategori->delete($id);
        return redirect()->to('/dashboard/kategori')->with('success', 'Kategori berhasil dihapus');
    }

    

    // ======================== ARTIKEL ========================

    // Tampilkan daftar artikel
    public function artikel()
    {
        $data = [
            'title' => 'Data Artikel',
            'user' => session()->get(),
            'isi' => 'dashboard/artikel',
            'pengaturan' => $this->ModelPengaturan->data(),
            'artikel' => $this->ModelArtikel->findAllWithRelations()
        ];

        return view('dashboard/layout/gabung', $data);
    }

    // Form tambah artikel
    public function tambah_artikel()
    {
        $data = [
            'title' => 'Tambah Artikel',
            'user' => session()->get(),
            'isi' => 'dashboard/artikel_tambah',
            'pengaturan' => $this->ModelPengaturan->data(),
            'kategori' => $this->ModelKategori->findAll()
        ];

        return view('dashboard/layout/gabung', $data);
    }

    // Simpan artikel baru
    public function simpan_artikel()
    {
        $file = $this->request->getFile('artikel_sampul');
        $sampul = '';

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $sampul = $file->getRandomName();
            $file->move('uploads', $sampul);
        }

        $this->ModelArtikel->save([
            'artikel_judul' => $this->request->getPost('artikel_judul'),
            'artikel_slug' => url_title($this->request->getPost('artikel_judul'), '-', true),
            'artikel_konten' => $this->request->getPost('artikel_konten'),
            'artikel_kategori' => $this->request->getPost('artikel_kategori'),
            'artikel_author' => session()->get('id_user'),
            'artikel_tanggal' => date('Y-m-d'),
            'artikel_status' => 'publish',
            'artikel_sampul' => $sampul
        ]);

        return redirect()->to('/dashboard/artikel')->with('success', 'Artikel berhasil ditambahkan');
    }

    // Form edit artikel
    public function edit_artikel($id)
    {
        $data = [
            'title' => 'Edit Artikel',
            'user' => session()->get(),
            'isi' => 'dashboard/artikel_edit',
            'pengaturan' => $this->ModelPengaturan->data(),
            'kategori' => $this->ModelKategori->findAll(),
            'artikel' => $this->ModelArtikel->find($id)
        ];

        return view('dashboard/layout/gabung', $data);
    }

    // Update artikel
    public function update_artikel($id)
    {
        $artikel = $this->ModelArtikel->find($id);
        $file = $this->request->getFile('artikel_sampul');
        $sampul = $artikel['artikel_sampul'];

        if ($file && $file->isValid() && !$file->hasMoved()) {
            if (!empty($artikel['artikel_sampul']) && file_exists('uploads/' . $artikel['artikel_sampul'])) {
                unlink('uploads/' . $artikel['artikel_sampul']);
            }
            $sampul = $file->getRandomName();
            $file->move('uploads', $sampul);
        }

        $this->ModelArtikel->update($id, [
            'artikel_judul' => $this->request->getPost('artikel_judul'),
            'artikel_slug' => url_title($this->request->getPost('artikel_judul'), '-', true),
            'artikel_konten' => $this->request->getPost('artikel_konten'),
            'artikel_kategori' => $this->request->getPost('artikel_kategori'),
            'artikel_status' => 'publish',
            'artikel_sampul' => $sampul
        ]);

        return redirect()->to('/dashboard/artikel')->with('success', 'Artikel berhasil diperbarui');
    }

    // Hapus artikel
    public function hapus_artikel($id)
    {
        $artikel = $this->ModelArtikel->find($id);
        if (!empty($artikel['artikel_sampul']) && file_exists('uploads/' . $artikel['artikel_sampul'])) {
            unlink('uploads/' . $artikel['artikel_sampul']);
        }

        $this->ModelArtikel->delete($id);
        return redirect()->to('/dashboard/artikel')->with('success', 'Artikel berhasil dihapus');
    }

    // ======================== USER MANAGEMENT ========================

    // List all users
    public function pengguna()
    {
        $data = [
            'title' => 'Manajemen Pengguna',
            'user' => session()->get(),
            'isi' => 'dashboard/pengguna',
            'pengaturan' => $this->ModelPengaturan->data(),
            'pengguna' => $this->ModelPengguna->findAll()
        ];

        return view('dashboard/layout/gabung', $data);
    }

    // Form tambah pengguna
    public function tambah_pengguna()
    {
        $data = [
            'title' => 'Tambah Pengguna',
            'user' => session()->get(),
            'isi' => 'dashboard/pengguna_tambah',
            'pengaturan' => $this->ModelPengaturan->data(),
        ];

        return view('dashboard/layout/gabung', $data);
    }

    // Simpan pengguna baru
    public function simpan_pengguna()
    {
        // Validation
        if (!$this->validate([
            'pengguna_nama' => 'required|min_length[3]',
            'pengguna_email' => 'required|valid_email',
            'pengguna_username' => 'required|min_length[4]|is_unique[pengguna.pengguna_username]',
            'pengguna_password' => 'required|min_length[6]',
            'pengguna_level' => 'required|in_list[admin,psb,penulis,pengurus]'
        ])) {
            return redirect()->to('/dashboard/tambah_pengguna')->with('error', $this->validator->getErrors());
        }

        $data = [
            'pengguna_nama' => $this->request->getPost('pengguna_nama'),
            'pengguna_email' => $this->request->getPost('pengguna_email'),
            'pengguna_username' => $this->request->getPost('pengguna_username'),
            'pengguna_password' => password_hash($this->request->getPost('pengguna_password'), PASSWORD_DEFAULT),
            'pengguna_level' => $this->request->getPost('pengguna_level'),
            'pengguna_status' => 1, // Active by default
            'pengguna_foto' => 'default.png'
        ];

        $this->ModelPengguna->save($data);
        return redirect()->to('/dashboard/pengguna')->with('success', 'Pengguna berhasil ditambahkan');
    }

    // Form edit pengguna
    public function edit_pengguna($id)
    {
        $data = [
            'title' => 'Edit Pengguna',
            'user' => session()->get(),
            'isi' => 'dashboard/pengguna_edit',
            'pengaturan' => $this->ModelPengaturan->data(),
            'pengguna' => $this->ModelPengguna->find($id)
        ];

        return view('dashboard/layout/gabung', $data);
    }

    // Update pengguna
    public function update_pengguna($id)
    {
        $pengguna = $this->ModelPengguna->find($id);

        // Build validation rules
        $rules = [
            'pengguna_nama' => 'required|min_length[3]',
            'pengguna_email' => 'required|valid_email',
            'pengguna_level' => 'required|in_list[admin,psb,penulis,pengurus]'
        ];

        // Only validate password if provided
        if ($this->request->getPost('pengguna_password')) {
            $rules['pengguna_password'] = 'min_length[6]';
        }

        if (!$this->validate($rules)) {
            return redirect()->to('/dashboard/edit_pengguna/' . $id)->with('error', $this->validator->getErrors());
        }

        $data = [
            'pengguna_nama' => $this->request->getPost('pengguna_nama'),
            'pengguna_email' => $this->request->getPost('pengguna_email'),
            'pengguna_level' => $this->request->getPost('pengguna_level'),
            'pengguna_status' => $this->request->getPost('pengguna_status') ?? 1
        ];

        // Only update password if provided
        if ($this->request->getPost('pengguna_password')) {
            $data['pengguna_password'] = password_hash($this->request->getPost('pengguna_password'), PASSWORD_DEFAULT);
        }

        $this->ModelPengguna->update($id, $data);
        return redirect()->to('/dashboard/pengguna')->with('success', 'Pengguna berhasil diperbarui');
    }

    // Hapus pengguna
    public function hapus_pengguna($id)
    {
        $this->ModelPengguna->delete($id);
        return redirect()->to('/dashboard/pengguna')->with('success', 'Pengguna berhasil dihapus');
    }

    // ======================== GALERI MANAGEMENT ========================

    // List all galeri
    public function galeri()
    {
        $data = [
            'title' => 'Galeri',
            'user' => session()->get(),
            'isi' => 'dashboard/galeri',
            'pengaturan' => $this->ModelPengaturan->data(),
            'galeri' => $this->ModelGaleri->orderBy('galeri_id', 'DESC')->findAll()
        ];

        return view('dashboard/layout/gabung', $data);
    }

    // Form tambah galeri
    public function tambah_galeri()
    {
        $data = [
            'title' => 'Tambah Foto Galeri',
            'user' => session()->get(),
            'isi' => 'dashboard/galeri_tambah',
            'pengaturan' => $this->ModelPengaturan->data(),
        ];

        return view('dashboard/layout/gabung', $data);
    }

    // Simpan galeri (support multiple uploads)
    public function simpan_galeri()
    {
        $files = $this->request->getFiles();

        if (empty($files['galeri_foto'])) {
            return redirect()->to('/dashboard/tambah_galeri')->with('error', 'Pilih minimal 1 foto');
        }

        $judul = $this->request->getPost('galeri_judul');
        $kategori = $this->request->getPost('galeri_kategori');
        
        $uploaded = 0;
        foreach ($files['galeri_foto'] as $file) {
            if ($file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move('uploads/galeri', $newName);

                $this->ModelGaleri->save([
                    'galeri_judul' => $judul,
                    'galeri_kategori' => $kategori,
                    'galeri_foto' => $newName
                ]);
                $uploaded++;
            }
        }

        return redirect()->to('/dashboard/galeri')->with('success', $uploaded . ' foto berhasil diupload');
    }

    // Form edit galeri
    public function edit_galeri($id)
    {
        $data = [
            'title' => 'Edit Galeri',
            'user' => session()->get(),
            'isi' => 'dashboard/galeri_edit',
            'pengaturan' => $this->ModelPengaturan->data(),
            'galeri' => $this->ModelGaleri->find($id)
        ];

        return view('dashboard/layout/gabung', $data);
    }

    // Update galeri
    public function update_galeri($id)
    {
        $galeri = $this->ModelGaleri->find($id);
        $file = $this->request->getFile('galeri_foto');
        $foto = $galeri['galeri_foto'];

        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Delete old photo
            if (!empty($galeri['galeri_foto']) && file_exists('uploads/galeri/' . $galeri['galeri_foto'])) {
                unlink('uploads/galeri/' . $galeri['galeri_foto']);
            }
            $foto = $file->getRandomName();
            $file->move('uploads/galeri', $foto);
        }

        $this->ModelGaleri->update($id, [
            'galeri_judul' => $this->request->getPost('galeri_judul'),
            'galeri_kategori' => $this->request->getPost('galeri_kategori'),
            'galeri_foto' => $foto
        ]);

        return redirect()->to('/dashboard/galeri')->with('success', 'Galeri berhasil diperbarui');
    }

    // Hapus galeri
    public function hapus_galeri($id)
    {
        $galeri = $this->ModelGaleri->find($id);
        if (!empty($galeri['galeri_foto']) && file_exists('uploads/galeri/' . $galeri['galeri_foto'])) {
            unlink('uploads/galeri/' . $galeri['galeri_foto']);
        }

        $this->ModelGaleri->delete($id);
        return redirect()->to('/dashboard/galeri')->with('success', 'Galeri berhasil dihapus');
    }

    // ======================== HALAMAN/PAGES MANAGEMENT ========================

    // List profil pages (dropdown)
    public function profil()
    {
        // Fetch both 'profil' and 'psb' types
        $halaman = $this->ModelHalaman->whereIn('halaman_jenis', ['profil', 'psb'])->findAll();

        $data = [
            'title' => 'Manajemen Profil',
            'user' => session()->get(),
            'isi' => 'dashboard/halaman',
            'pengaturan' => $this->ModelPengaturan->data(),
            'halaman' => $halaman,
            'jenis_halaman' => 'profil' // Untuk identifikasi di view
        ];

        return view('dashboard/layout/gabung', $data);
    }

    // List menu halaman pages (top menu)
    public function menu_halaman()
    {
        $data = [
            'title' => 'Manajemen Menu Halaman',
            'user' => session()->get(),
            'isi' => 'dashboard/halaman',
            'pengaturan' => $this->ModelPengaturan->data(),
            'halaman' => $this->ModelHalaman->getByType('page'),
            'jenis_halaman' => 'page' // Untuk identifikasi di view
        ];

        return view('dashboard/layout/gabung', $data);
    }

    // Legacy method redirect (optional, or keep for all)
    public function halaman()
    {
        return redirect()->to('dashboard/profil');
    }

    // Form tambah halaman
    public function tambah_halaman()
    {
        $data = [
            'title' => 'Tambah Halaman Baru',
            'user' => session()->get(),
            'isi' => 'dashboard/halaman_tambah',
            'pengaturan' => $this->ModelPengaturan->data(),
        ];

        return view('dashboard/layout/gabung', $data);
    }

    // Simpan halaman baru
    public function simpan_halaman()
    {
        // Validation
        if (!$this->validate([
            'halaman_judul' => 'required|min_length[3]',
            'halaman_slug' => 'required|alpha_dash|is_unique[halaman.halaman_slug]',
            'halaman_konten' => 'required'
        ])) {
            return redirect()->to('/dashboard/tambah_halaman')->with('error', $this->validator->getErrors());
        }

        $data = [
            'halaman_judul' => $this->request->getPost('halaman_judul'),
            'halaman_deskripsi' => $this->request->getPost('halaman_deskripsi'),
            'halaman_slug' => $this->request->getPost('halaman_slug'),
            'halaman_jenis' => $this->request->getPost('halaman_jenis'),
            'halaman_konten' => $this->request->getPost('halaman_konten')
        ];

        $this->ModelHalaman->save($data);
        
        $redirectUrl = $data['halaman_jenis'] == 'profil' ? '/dashboard/profil' : '/dashboard/menu_halaman';
        return redirect()->to($redirectUrl)->with('success', 'Halaman berhasil ditambahkan');
    }

    // Form edit halaman
    public function edit_halaman($id)
    {
        $data = [
            'title' => 'Edit Halaman',
            'user' => session()->get(),
            'isi' => 'dashboard/halaman_edit',
            'pengaturan' => $this->ModelPengaturan->data(),
            'halaman' => $this->ModelHalaman->find($id)
        ];

        return view('dashboard/layout/gabung', $data);
    }

    // Update halaman
    public function update_halaman($id)
    {
        // Build validation rules
        $rules = [
            'halaman_judul' => 'required|min_length[3]',
            'halaman_konten' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/dashboard/edit_halaman/' . $id)->with('error', $this->validator->getErrors());
        }

        $data = [
            'halaman_judul' => $this->request->getPost('halaman_judul'),
            'halaman_deskripsi' => $this->request->getPost('halaman_deskripsi'),
            'halaman_jenis' => $this->request->getPost('halaman_jenis'),
            'halaman_konten' => $this->request->getPost('halaman_konten')
        ];

        $this->ModelHalaman->update($id, $data);
        
        $redirectUrl = $data['halaman_jenis'] == 'profil' ? '/dashboard/profil' : '/dashboard/menu_halaman';
        return redirect()->to($redirectUrl)->with('success', 'Halaman berhasil diperbarui');
    }

    // Hapus halaman
    public function hapus_halaman($id)
    {
        $halaman = $this->ModelHalaman->find($id);
        if ($halaman) {
            // Prevent deletion of protected pages
            $protected_slugs = ['tentang-kami'];
            if (in_array($halaman['halaman_slug'], $protected_slugs)) {
                return redirect()->back()->with('error', 'Halaman ini dilindungi dan tidak dapat dihapus.');
            }

            $this->ModelHalaman->delete($id);
            // Redirect based on type
            $redirectUrl = $halaman['halaman_jenis'] == 'profil' ? '/dashboard/profil' : '/dashboard/menu_halaman';
            return redirect()->to($redirectUrl)->with('success', 'Halaman berhasil dihapus');
        }
        return redirect()->back()->with('error', 'Halaman tidak ditemukan');
    }


    // QUOTE MANAGEMENT
    // --------------------------------------------------------------------
    public function quote()
    {
        $data = [
            'title' => 'Manajemen Quote',
            'user' => session()->get(),
            'isi' => 'dashboard/quote',
            'quote' => $this->ModelQuote->getQuotes(),
            'pengaturan' => $this->ModelPengaturan->data(),
        ];
        return view('dashboard/layout/gabung', $data);
    }

    public function tambah_quote()
    {
        $data = [
            'title' => 'Tambah Quote',
            'user' => session()->get(),
            'isi' => 'dashboard/quote_tambah',
            'pengaturan' => $this->ModelPengaturan->data(),
        ];
        return view('dashboard/layout/gabung', $data);
    }

    public function simpan_quote()
    {
        $file = $this->request->getFile('quote_foto');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('uploads/quote/', $newName);
        } else {
            $newName = 'default.jpg';
        }

        $data = [
            'quote' => $this->request->getPost('quote'),
            'quote_author' => $this->request->getPost('quote_author'),
            'quote_judul' => $this->request->getPost('quote_judul'),
            'quote_foto' => $newName
        ];

        $this->ModelQuote->insert($data);
        session()->setFlashdata('pesan', 'Data Quote berhasil ditambahkan.');
        return redirect()->to(base_url('dashboard/quote'));
    }

    public function edit_quote($id)
    {
        $data = [
            'title' => 'Edit Quote',
            'user' => session()->get(),
            'isi' => 'dashboard/quote_edit',
            'quote' => $this->ModelQuote->find($id),
            'pengaturan' => $this->ModelPengaturan->data(),
        ];
        return view('dashboard/layout/gabung', $data);
    }

    public function update_quote($id)
    {
        $quote = $this->ModelQuote->find($id);
        $file = $this->request->getFile('quote_foto');
        $foto = $quote['quote_foto'];

        if ($file && $file->isValid() && !$file->hasMoved()) {
            if ($quote['quote_foto'] != 'default.jpg' && file_exists('uploads/quote/' . $quote['quote_foto'])) {
                unlink('uploads/quote/' . $quote['quote_foto']);
            }
            $foto = $file->getRandomName();
            $file->move('uploads/quote/', $foto);
        }

        $data = [
            'quote' => $this->request->getPost('quote'),
            'quote_author' => $this->request->getPost('quote_author'),
            'quote_judul' => $this->request->getPost('quote_judul'),
            'quote_foto' => $foto
        ];

        $this->ModelQuote->update($id, $data);
        session()->setFlashdata('pesan', 'Data Quote berhasil diperbarui.');
        return redirect()->to(base_url('dashboard/quote'));
    }

    public function hapus_quote($id)
    {
        $quote = $this->ModelQuote->find($id);
        if ($quote['quote_foto'] != 'default.jpg' && file_exists('uploads/quote/' . $quote['quote_foto'])) {
            unlink('uploads/quote/' . $quote['quote_foto']);
        }
        $this->ModelQuote->delete($id);
        session()->setFlashdata('pesan', 'Data Quote berhasil dihapus.');
        return redirect()->to(base_url('dashboard/quote'));
    }

    // --------------------------------------------------------------------
    // PENGUMUMAN MANAGEMENT
    // --------------------------------------------------------------------
    public function pengumuman()
    {
        $data = [
            'title' => 'Manajemen Pengumuman',
            'user' => session()->get(),
            'isi' => 'dashboard/pengumuman',
            'pengumuman' => $this->ModelPengumuman->getPengumuman(),
            'pengaturan' => $this->ModelPengaturan->data(),
        ];
        return view('dashboard/layout/gabung', $data);
    }

    public function tambah_pengumuman()
    {
        $data = [
            'title' => 'Tambah Pengumuman',
            'user' => session()->get(),
            'isi' => 'dashboard/pengumuman_tambah',
            'pengaturan' => $this->ModelPengaturan->data(),
        ];
        return view('dashboard/layout/gabung', $data);
    }

    public function simpan_pengumuman()
    {
        $file = $this->request->getFile('pengumuman_gambar');
        $gambar = '';

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $gambar = $file->getRandomName();
            $file->move('uploads/pengumuman', $gambar);
        }

        $data = [
            'pengumuman_judul' => $this->request->getPost('pengumuman_judul'),
            'pengumuman_isi' => $this->request->getPost('pengumuman_isi'),
            'pengumuman_tanggal' => date('Y-m-d'),
            'pengumuman_gambar' => $gambar
        ];

        $this->ModelPengumuman->insert($data);
        session()->setFlashdata('pesan', 'Data Pengumuman berhasil ditambahkan.');
        return redirect()->to(base_url('dashboard/pengumuman'));
    }

    public function edit_pengumuman($id)
    {
        $data = [
            'title' => 'Edit Pengumuman',
            'user' => session()->get(),
            'isi' => 'dashboard/pengumuman_edit',
            'pengumuman' => $this->ModelPengumuman->find($id),
            'pengaturan' => $this->ModelPengaturan->data(),
        ];
        return view('dashboard/layout/gabung', $data);
    }

    public function update_pengumuman($id)
    {
        $pengumuman = $this->ModelPengumuman->find($id);
        $file = $this->request->getFile('pengumuman_gambar');
        $gambar = $pengumuman['pengumuman_gambar'];

        if ($file && $file->isValid() && !$file->hasMoved()) {
            if (!empty($pengumuman['pengumuman_gambar']) && file_exists('uploads/pengumuman/' . $pengumuman['pengumuman_gambar'])) {
                unlink('uploads/pengumuman/' . $pengumuman['pengumuman_gambar']);
            }
            $gambar = $file->getRandomName();
            $file->move('uploads/pengumuman', $gambar);
        }

        $data = [
            'pengumuman_judul' => $this->request->getPost('pengumuman_judul'),
            'pengumuman_isi' => $this->request->getPost('pengumuman_isi'),
            'pengumuman_gambar' => $gambar
        ];

        $this->ModelPengumuman->update($id, $data);
        session()->setFlashdata('pesan', 'Data Pengumuman berhasil diperbarui.');
        return redirect()->to(base_url('dashboard/pengumuman'));
    }

    public function hapus_pengumuman($id)
    {
        $pengumuman = $this->ModelPengumuman->find($id);
        if (!empty($pengumuman['pengumuman_gambar']) && file_exists('uploads/pengumuman/' . $pengumuman['pengumuman_gambar'])) {
            unlink('uploads/pengumuman/' . $pengumuman['pengumuman_gambar']);
        }
        $this->ModelPengumuman->delete($id);
        session()->setFlashdata('pesan', 'Data Pengumuman berhasil dihapus.');
        return redirect()->to(base_url('dashboard/pengumuman'));
    }

    // --------------------------------------------------------------------
    // PSB MANAGEMENT (DATA SANTRI)
    // --------------------------------------------------------------------
    public function psb_santri()
    {
        $data = [
            'title' => 'Data Santri Baru (PSB)',
            'user' => session()->get(),
            'isi' => 'dashboard/psb_santri',
            'santri' => $this->ModelSantri->allData(),
            'pengaturan' => $this->ModelPengaturan->data(),
        ];
        return view('dashboard/layout/gabung', $data);
    }

    public function detail_santri($id)
    {
        $data = [
            'title' => 'Detail Santri',
            'user' => session()->get(),
            'isi' => 'dashboard/psb_detail',
            'santri' => $this->ModelSantri->find($id),
            'pengaturan' => $this->ModelPengaturan->data(),
        ];
        return view('dashboard/layout/gabung', $data);
    }
    // ======================== GURU/ASATIDZ MANAGEMENT ========================

    public function guru()
    {
        $data = [
            'title' => 'Manajemen Guru/Asatidz',
            'user' => session()->get(),
            'isi' => 'dashboard/guru',
            'pengaturan' => $this->ModelPengaturan->data(),
            'guru' => $this->ModelGuru->findAll()
        ];
        return view('dashboard/layout/gabung', $data);
    }

    public function tambah_guru()
    {
        $data = [
            'title' => 'Tambah Guru',
            'user' => session()->get(),
            'isi' => 'dashboard/guru_tambah',
            'pengaturan' => $this->ModelPengaturan->data(),
        ];
        return view('dashboard/layout/gabung', $data);
    }

    public function simpan_guru()
    {
        if (!$this->validate([
            'guru_nama' => 'required',
            'guru_foto' => 'permit_empty|max_size[guru_foto,2048]|is_image[guru_foto]|mime_in[guru_foto,image/png,image/jpg,image/jpeg]',
        ])) {
            return redirect()->to('/dashboard/tambah_guru')->with('error', $this->validator->getErrors());
        }

        $fileFoto = $this->request->getFile('guru_foto');
        $namaFoto = null;

        if ($fileFoto && $fileFoto->isValid() && !$fileFoto->hasMoved()) {
            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move('uploads/', $namaFoto);
        }

        $this->ModelGuru->save([
            'guru_nama' => $this->request->getPost('guru_nama'),
            'guru_jabatan' => $this->request->getPost('guru_jabatan'),
            'guru_foto' => $namaFoto
        ]);

        return redirect()->to('/dashboard/guru')->with('success', 'Data guru berhasil ditambahkan');
    }

    public function edit_guru($id)
    {
        $data = [
            'title' => 'Edit Guru',
            'user' => session()->get(),
            'isi' => 'dashboard/guru_edit',
            'pengaturan' => $this->ModelPengaturan->data(),
            'guru' => $this->ModelGuru->find($id)
        ];
        return view('dashboard/layout/gabung', $data);
    }

    public function update_guru($id)
    {
        if (!$this->validate([
            'guru_nama' => 'required',
            'guru_foto' => 'permit_empty|max_size[guru_foto,2048]|is_image[guru_foto]|mime_in[guru_foto,image/png,image/jpg,image/jpeg]',
        ])) {
            return redirect()->to('/dashboard/edit_guru/' . $id)->with('error', $this->validator->getErrors());
        }

        $fileFoto = $this->request->getFile('guru_foto');
        $namaFoto = $this->request->getPost('old_foto');

        if ($fileFoto && $fileFoto->isValid() && !$fileFoto->hasMoved()) {
            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move('uploads/', $namaFoto);
        }

        $this->ModelGuru->update($id, [
            'guru_nama' => $this->request->getPost('guru_nama'),
            'guru_jabatan' => $this->request->getPost('guru_jabatan'),
            'guru_foto' => $namaFoto
        ]);

        return redirect()->to('/dashboard/guru')->with('success', 'Data guru berhasil diperbarui');
    }

    public function hapus_guru($id)
    {
        $this->ModelGuru->delete($id);
        return redirect()->to('/dashboard/guru')->with('success', 'Data guru berhasil dihapus');
    }

    // --- Program Unggulan Management ---





    // --- Program Header Management ---

    public function program_header()
    {
        $data = [
            'title' => 'Program Header (Highlight)',
            'user' => session()->get(),
            'isi' => 'dashboard/program_header',
            'pengaturan' => $this->ModelPengaturan->data(),
            'program_header' => $this->ModelProgramHeader->findAll()
        ];
        return view('dashboard/layout/gabung', $data);
    }

    public function tambah_program_header()
    {
        $data = [
            'title' => 'Tambah Program Header',
            'user' => session()->get(),
            'isi' => 'dashboard/program_header_tambah',
            'pengaturan' => $this->ModelPengaturan->data(),
        ];
        return view('dashboard/layout/gabung', $data);
    }

    public function simpan_program_header()
    {
        if (!$this->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'icon' => 'required',
        ])) {
            return redirect()->to('/dashboard/tambah_program_header')->with('error', $this->validator->getErrors());
        }

        $this->ModelProgramHeader->save([
            'judul' => $this->request->getPost('judul'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'icon' => $this->request->getPost('icon')
        ]);

        return redirect()->to('/dashboard/program_header')->with('success', 'Item berhasil ditambahkan');
    }

    public function edit_program_header($id)
    {
        $data = [
            'title' => 'Edit Program Header',
            'user' => session()->get(),
            'isi' => 'dashboard/program_header_edit',
            'pengaturan' => $this->ModelPengaturan->data(),
            'program_header' => $this->ModelProgramHeader->find($id)
        ];
        return view('dashboard/layout/gabung', $data);
    }

    public function update_program_header($id)
    {
        if (!$this->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'icon' => 'required',
        ])) {
            return redirect()->to('/dashboard/edit_program_header/' . $id)->with('error', $this->validator->getErrors());
        }

        $this->ModelProgramHeader->update($id, [
            'judul' => $this->request->getPost('judul'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'icon' => $this->request->getPost('icon')
        ]);

        return redirect()->to('/dashboard/program_header')->with('success', 'Item berhasil diperbarui');
    }

    public function hapus_program_header($id)
    {
        $this->ModelProgramHeader->delete($id);
        return redirect()->to('/dashboard/program_header')->with('success', 'Item berhasil dihapus');
    }
    // --------------------------------------------------------------------
    // Program Unggulan Methods
    // --------------------------------------------------------------------

    public function program_unggulan()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $data = [
            'title' => 'Program Unggulan',
            'program_unggulan' => $this->ModelProgramUnggulan->findAll(),
            'isi' => 'dashboard/program_unggulan'
        ];

        return view('dashboard/layout/gabung', $data);
    }

    public function program_unggulan_tambah()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $data = [
            'title' => 'Tambah Program Unggulan',
            'isi' => 'dashboard/program_unggulan_tambah'
        ];

        return view('dashboard/layout/gabung', $data);
    }

    public function program_unggulan_simpan()
    {
        if (!$this->validate([
            'judul' => 'required',
            'kategori' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'uploaded[gambar]|max_size[gambar,2048]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
        ])) {
            return redirect()->to('/dashboard/program_unggulan_tambah')->withInput()->with('error', $this->validator->getErrors());
        }

        $fileGambar = $this->request->getFile('gambar');
        $namaGambar = $fileGambar->getRandomName();
        $fileGambar->move('uploads/program_unggulan', $namaGambar);

        $this->ModelProgramUnggulan->save([
            'judul' => $this->request->getPost('judul'),
            'kategori' => $this->request->getPost('kategori'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'gambar' => $namaGambar,
            'info_1' => $this->request->getPost('info_1'),
            'info_2' => $this->request->getPost('info_2'),
            'is_featured' => $this->request->getPost('is_featured') ? 1 : 0,
        ]);

        return redirect()->to('/dashboard/program_unggulan')->with('success', 'Program berhasil ditambahkan');
    }

    public function program_unggulan_edit($id)
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        $data = [
            'title' => 'Edit Program Unggulan',
            'program' => $this->ModelProgramUnggulan->find($id),
            'isi' => 'dashboard/program_unggulan_edit'
        ];

        return view('dashboard/layout/gabung', $data);
    }

    public function program_unggulan_update($id)
    {
        if (!$this->validate([
            'judul' => 'required',
            'kategori' => 'required',
            'deskripsi' => 'required',
        ])) {
            return redirect()->to('/dashboard/program_unggulan_edit/' . $id)->withInput()->with('error', $this->validator->getErrors());
        }

        $data = [
            'judul' => $this->request->getPost('judul'),
            'kategori' => $this->request->getPost('kategori'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'info_1' => $this->request->getPost('info_1'),
            'info_2' => $this->request->getPost('info_2'),
            'is_featured' => $this->request->getPost('is_featured') ? 1 : 0,
        ];

        $fileGambar = $this->request->getFile('gambar');
        if ($fileGambar->isValid() && !$fileGambar->hasMoved()) {
            $namaGambar = $fileGambar->getRandomName();
            $fileGambar->move('uploads/program_unggulan', $namaGambar);
            $data['gambar'] = $namaGambar;
        }

        $this->ModelProgramUnggulan->update($id, $data);

        return redirect()->to('/dashboard/program_unggulan')->with('success', 'Program berhasil diperbarui');
    }

    public function program_unggulan_hapus($id)
    {
        $this->ModelProgramUnggulan->delete($id);
        return redirect()->to('/dashboard/program_unggulan')->with('success', 'Program berhasil dihapus');
    }
    // ======================== KATEGORI PENDAFTARAN ========================

    // List kategori pendaftaran
    public function kategori_pendaftaran()
    {
        $data = [
            'title' => 'Kategori Pendaftaran',
            'user' => session()->get(),
            'isi' => 'dashboard/kategori_pendaftaran',
            'pengaturan' => $this->ModelPengaturan->data(),
            'kategori' => $this->ModelKategoriPendaftaran->findAll()
        ];
        return view('dashboard/layout/gabung', $data);
    }

    // Form tambah kategori pendaftaran
    public function tambah_kategori_pendaftaran()
    {
        $data = [
            'title' => 'Tambah Kategori Pendaftaran',
            'user' => session()->get(),
            'isi' => 'dashboard/kategori_pendaftaran_tambah',
            'pengaturan' => $this->ModelPengaturan->data(),
        ];
        return view('dashboard/layout/gabung', $data);
    }
    // Simpan kategori pendaftaran
    public function simpan_kategori_pendaftaran()
    {
        if (!$this->validate([
            'nama_kategori' => 'required'
        ])) {
            return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
        }

        $this->ModelKategoriPendaftaran->save([
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'keterangan' => $this->request->getPost('keterangan'),
            'biaya' => 0
        ]);

        return redirect()->to('/dashboard/kategori_pendaftaran')->with('success', 'Kategori pendaftaran berhasil ditambahkan');
    }

    // Form edit kategori pendaftaran
    public function edit_kategori_pendaftaran($id)
    {
        $data = [
            'title' => 'Edit Kategori Pendaftaran',
            'user' => session()->get(),
            'isi' => 'dashboard/kategori_pendaftaran_edit',
            'pengaturan' => $this->ModelPengaturan->data(),
            'kategori' => $this->ModelKategoriPendaftaran->find($id)
        ];
        return view('dashboard/layout/gabung', $data);
    }

    // Update kategori pendaftaran
    public function update_kategori_pendaftaran($id)
    {
        if (!$this->validate([
            'nama_kategori' => 'required'
        ])) {
            return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
        }

        $this->ModelKategoriPendaftaran->save([
            'id_kategori' => $id,
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'keterangan' => $this->request->getPost('keterangan'),
            'biaya' => 0
        ]);

        return redirect()->to('/dashboard/kategori_pendaftaran')->with('success', 'Kategori pendaftaran berhasil diperbarui');
    }

    // Hapus kategori pendaftaran
    public function hapus_kategori_pendaftaran($id)
    {
        $this->ModelKategoriPendaftaran->delete($id);
        return redirect()->to('/dashboard/kategori_pendaftaran')->with('success', 'Kategori pendaftaran berhasil dihapus');
    }

    // ======================== PSB PAGE MANAGEMENT ========================

    public function psb()
    {
        // Get the PSB page data
        $psbPage = $this->ModelHalaman->where('halaman_slug', 'psb')->first();

        // If not exists (should exist via migration), create dummy or handle error
        if (!$psbPage) {
            return redirect()->to('dashboard')->with('error', 'Halaman PSB tidak ditemukan.');
        }

        $data = [
            'title' => 'Edit Informasi Pendaftaran',
            'user' => session()->get(),
            'isi' => 'dashboard/psb_edit', 
            'pengaturan' => $this->ModelPengaturan->data(),
            'halaman' => $psbPage
        ];

        return view('dashboard/layout/gabung', $data);
    }

    public function update_psb()
    {
        $id = $this->request->getPost('halaman_id');
        
        $this->ModelHalaman->save([
            'halaman_id' => $id,
            'halaman_konten' => $this->request->getPost('halaman_konten')
        ]);

        return redirect()->to('/dashboard/psb')->with('success', 'Informasi Pendaftaran berhasil diperbarui');
    }
}
