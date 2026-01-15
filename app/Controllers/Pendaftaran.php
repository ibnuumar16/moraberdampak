<?php

namespace App\Controllers;

use App\Models\ModelSantri;
use App\Models\ModelPengaturan;
use App\Models\ModelKategoriPendaftaran;

class Pendaftaran extends BaseController
{
    protected $ModelSantri;
    protected $ModelPengaturan;
    protected $ModelKategoriPendaftaran;

    protected $ModelHalaman;

    public function __construct()
    {
        $this->ModelSantri = new ModelSantri();
        $this->ModelPengaturan = new ModelPengaturan();
        $this->ModelKategoriPendaftaran = new ModelKategoriPendaftaran();
        $this->ModelHalaman = new \App\Models\ModelHalaman();
        helper(['form', 'url']);
    }

    public function index()
    {
        $psbPage = $this->ModelHalaman->where('halaman_slug', 'psb')->first();
        
        // Fallback if page not found in DB
        if (!$psbPage) {
            $psbPage = [
                'halaman_judul' => 'Informasi Pendaftaran',
                'halaman_slug' => 'psb',
                'halaman_konten' => '<p>Belum ada informasi pendaftaran. Silahkan hubungi admin untuk mengisi konten ini.</p>',
                'halaman_jenis' => 'psb'
            ];
            
            // Optional: Try to auto-insert if missing (Lazy repair)
            try {
                $this->ModelHalaman->insert($psbPage);
            } catch (\Exception $e) {
                // Ignore insertion error, just show default
            }
        }
        
        $data = [
            'title' => 'Informasi Pendaftaran',
            'pengaturan' => $this->ModelPengaturan->data(),
            'halaman' => $psbPage,
            'isi' => 'homepage/psb'
        ];
        return view('homepage/layout/gabung', $data);
    }

    public function form()
    {
        $data = [
            'title' => 'Formulir Pendaftaran Santri Baru',
            'pengaturan' => $this->ModelPengaturan->data(),
            'kategori' => $this->ModelKategoriPendaftaran->findAll(),
            'isi' => 'homepage/pendaftaran'
        ];
        return view('homepage/layout/gabung', $data);
    }

    public function submit()
    {
        if (!$this->validate([
            'nama_santri' => 'required',
            'nisn_santri' => 'required|numeric',
            'nik_santri' => 'required|numeric',
            'tempat_lahir_santri' => 'required',
            'tanggal_lahir_santri' => 'required|valid_date',
            'jk_santri' => 'required',
            'alamat_santri' => 'required',
            'nama_ayah_santri' => 'required',
            'nama_ibu_santri' => 'required',
            'wa_santri' => 'required|numeric',
            'kategori_santri' => 'required'
        ])) {
            return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
        }

        // Get active academic year
        $tahunAkademik = $this->ModelPengaturan->data()['tahun_akademik'];

        $data = [
            'nama_santri' => $this->request->getPost('nama_santri'),
            'nisn_santri' => $this->request->getPost('nisn_santri'),
            'nik_santri' => $this->request->getPost('nik_santri'),
            'tempat_lahir_santri' => $this->request->getPost('tempat_lahir_santri'),
            'tanggal_lahir_santri' => $this->request->getPost('tanggal_lahir_santri'),
            'jk_santri' => $this->request->getPost('jk_santri'),
            'alamat_santri' => $this->request->getPost('alamat_santri'),
            'kabupaten_santri' => $this->request->getPost('kabupaten_santri'),
            'provinsi_santri' => $this->request->getPost('provinsi_santri'),
            'nama_ayah_santri' => $this->request->getPost('nama_ayah_santri'),
            'nama_ibu_santri' => $this->request->getPost('nama_ibu_santri'),
            'wa_santri' => $this->request->getPost('wa_santri'),
            'kategori_santri' => $this->request->getPost('kategori_santri'),
            'tanggal_masuk' => date('Y-m-d'),
            'tahun_masuk_santri' => $tahunAkademik,
            'status_mukim_santri' => 'Mukim', // Default
            'foto_santri' => 'default.png',
            'password_santri' => password_hash('123456', PASSWORD_DEFAULT) // Default password
        ];

        $this->ModelSantri->save($data);

        return redirect()->to('/pendaftaran')->with('success', 'Pendaftaran berhasil! Silakan hubungi admin untuk konfirmasi.');
    }
}
