<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPengaturan extends Model
{
    protected $table = 'pengaturan';
    protected $primaryKey = 'id_pengaturan';
    
    protected $allowedFields = [
        'nama', 'alamat', 'telepon', 'email', 'deskripsi', 
        'facebook', 'instagram', 'youtube', 'tahun_akademik',
        'logo_web', 'teks_arab', 'hero_title', 'hero_desc', 'hero_bg', 
        'hero_btn_text', 'hero_btn_url', 'sambutan_pimpinan', 
        'foto_pimpinan', 'nama_pimpinan',
        'link_maps', 'link_facebook', 'link_instagram', 'link_youtube', 'link_twitter',
        'logo_header_arab', 'hero_image_arab', 'announcement_active', 'announcement_text', 'announcement_link',
        'section_hero', 'section_program_header', 'section_psb', 'section_sambutan',
        'section_berita', 'section_program_unggulan', 'section_donasi', 'section_guru',
        'program_header_title', 'program_header_desc',
        'psb_title', 'psb_desc',
        'berita_title', 'berita_desc',
        'program_unggulan_title', 'program_unggulan_desc',
        'donasi_title', 'donasi_desc',
        'guru_title', 'guru_desc',
        'overview_title', 'overview_desc',
        'overview_stats_1_num', 'overview_stats_1_label',
        'overview_stats_2_num', 'overview_stats_2_label',
        'overview_stats_3_num', 'overview_stats_3_label',
        'overview_image'
    ];

    public function allData()
    {
        return $this->db->table('pengaturan')
            ->get()->getResultArray();
    }

    public function data()
    {
        return $this->db->table('pengaturan')
            ->get()->getRowArray();
    }

    public function updatePengaturan($data)
    {
        $firstRow = $this->first();
        if ($firstRow) {
            return $this->update($firstRow['id_pengaturan'], $data);
        }
        return false;
    }
}
