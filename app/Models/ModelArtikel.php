<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelArtikel extends Model
{
    protected $table = 'artikel';
    protected $primaryKey = 'artikel_id';
    protected $allowedFields = [
        'artikel_judul',
        'artikel_slug',
        'artikel_konten',
        'artikel_sampul',
        'artikel_author',
        'artikel_kategori',
        'artikel_status',
        'artikel_tanggal'
    ];

    /**
     * Get published articles with kategori and author info
     */
    public function artikel()
    {
        return $this->select('artikel.*, kategori.kategori_nama, user.nama_user AS nama_author')
                    ->join('kategori', 'kategori.kategori_id = artikel.artikel_kategori', 'left')
                    ->join('user', 'user.id_user = artikel.artikel_author', 'left')
                    ->where('artikel_status', 'publish')
                    ->orderBy('artikel_tanggal', 'DESC')
                    ->findAll();
    }

    public function paginateArtikel($perPage = 6)
    {
        return $this->select('artikel.*, kategori.kategori_nama, user.nama_user AS nama_author')
                    ->join('kategori', 'kategori.kategori_id = artikel.artikel_kategori', 'left')
                    ->join('user', 'user.id_user = artikel.artikel_author', 'left')
                    ->where('artikel_status', 'publish')
                    ->orderBy('artikel_tanggal', 'DESC')
                    ->paginate($perPage, 'artikel');
    }

    /**
     * Get latest articles
     */
    public function getLatest($limit = 5)
    {
        return $this->select('artikel.*, kategori.kategori_nama')
                    ->join('kategori', 'kategori.kategori_id = artikel.artikel_kategori', 'left')
                    ->where('artikel_status', 'publish')
                    ->orderBy('artikel_tanggal', 'DESC')
                    ->limit($limit)
                    ->findAll();
    }

    /**
     * Get related articles by same category
     */
    public function getRelated($kategori_id, $current_artikel_id, $limit = 4)
    {
        return $this->select('artikel.*, kategori.kategori_nama')
                    ->join('kategori', 'kategori.kategori_id = artikel.artikel_kategori', 'left')
                    ->where('artikel_kategori', $kategori_id)
                    ->where('artikel_id !=', $current_artikel_id)
                    ->where('artikel_status', 'publish')
                    ->orderBy('artikel_tanggal', 'DESC')
                    ->limit($limit)
                    ->findAll();
    }

    /**
     * Get articles by category
     */
    public function getByKategori($kategori_id)
    {
        return $this->select('artikel.*, kategori.kategori_nama, user.nama_user AS nama_author')
                    ->join('kategori', 'kategori.kategori_id = artikel.artikel_kategori', 'left')
                    ->join('user', 'user.id_user = artikel.artikel_author', 'left')
                    ->where('artikel_kategori', $kategori_id)
                    ->where('artikel_status', 'publish')
                    ->orderBy('artikel_tanggal', 'DESC')
                    ->paginate(6, 'artikel');
    }

    /**
     * Search articles
     */
    public function search($keyword)
    {
        return $this->select('artikel.*, kategori.kategori_nama, user.nama_user AS nama_author')
                    ->join('kategori', 'kategori.kategori_id = artikel.artikel_kategori', 'left')
                    ->join('user', 'user.id_user = artikel.artikel_author', 'left')
                    ->where('artikel_status', 'publish')
                    ->groupStart()
                        ->like('artikel_judul', $keyword)
                        ->orLike('artikel_konten', $keyword)
                    ->groupEnd()
                    ->orderBy('artikel_tanggal', 'DESC')
                    ->paginate(6, 'artikel');
    }
    /**
     * Get all articles with relations for dashboard
     */
    public function findAllWithRelations()
    {
        return $this->select('artikel.*, kategori.kategori_nama, user.nama_user AS nama_author')
                    ->join('kategori', 'kategori.kategori_id = artikel.artikel_kategori', 'left')
                    ->join('user', 'user.id_user = artikel.artikel_author', 'left')
                    ->orderBy('artikel_tanggal', 'DESC')
                    ->findAll();
    }
}
