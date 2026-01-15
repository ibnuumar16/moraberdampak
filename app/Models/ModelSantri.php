<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSantri extends Model
{
    protected $table = 'santri';
    protected $primaryKey = 'id_santri';

    protected $allowedFields = [
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
    ];


    public function allData()
    {
        // Ambil tahun akademik dari tabel pengaturan
        $tahunAkademik = $this->db->table('pengaturan')
            ->select('tahun_akademik')
            ->get()
            ->getRowArray();

        // Pastikan tahun akademik tersedia untuk menghindari error
        if (!$tahunAkademik || empty($tahunAkademik['tahun_akademik'])) {
            return [];
        }

        return $this->where('tahun_masuk_santri', $tahunAkademik['tahun_akademik'])
            ->findAll(); // Mengembalikan semua data yang cocok
    }

    public function allData_arsip()
    {
        return $this->findAll();
    }

    public function jumlahsantri()
    {
        // Ambil tahun akademik dari tabel pengaturan
        $tahunAkademik = $this->db->table('pengaturan')
            ->select('tahun_akademik')
            ->get()
            ->getRowArray();

        // Pastikan tahun akademik tersedia untuk menghindari error
        if (!$tahunAkademik || empty($tahunAkademik['tahun_akademik'])) {
            return 0;
        }

        return $this->where('tahun_masuk_santri', $tahunAkademik['tahun_akademik'])
            ->countAllResults();
    }

    public function jumlahsantriarsip()
    {
        // Jika ada kolom status yang menandakan arsip, bisa ditambahkan kondisinya
        return $this->countAllResults();
    }

    public function cek_nik($nik)
    {
        return $this->where('nik_santri', $nik)->first();
    }

    public function add($data)
    {
        $response = $this->db->table('santri')->insert($data);
        return $response;
    }

    public function getRegistrationsLast7Days()
    {
        $startDate = date('Y-m-d', strtotime('-6 days'));
        $endDate = date('Y-m-d');
        
        $query = $this->select("DATE(tanggal_masuk) as date, COUNT(*) as count")
            ->where("DATE(tanggal_masuk) >= '$startDate'")
            ->where("DATE(tanggal_masuk) <= '$endDate'")
            ->groupBy("DATE(tanggal_masuk)")
            ->findAll();
            
        // Fill in missing dates with 0
        $result = [];
        $map = [];
        foreach ($query as $row) {
            $map[$row['date']] = $row['count'];
        }
        
        for ($i = 6; $i >= 0; $i--) {
            $date = date('Y-m-d', strtotime("-$i days"));
            $result[] = [
                'date' => date('d M', strtotime($date)), // Format for chart label e.g. "20 Nov"
                'count' => isset($map[$date]) ? (int)$map[$date] : 0
            ];
        }
        
        return $result;
    }
}
