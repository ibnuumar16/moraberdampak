<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelArtikel;
use App\Models\ModelHalaman;
use App\Models\ModelProgramUnggulan;

class Sitemap extends BaseController
{
    public function index()
    {
        $ModelArtikel = new ModelArtikel();
        $ModelHalaman = new ModelHalaman();
        $ModelProgram = new ModelProgramUnggulan();

        $data = [];

        // Static Pages
        $data[] = [
            'loc' => base_url(),
            'lastmod' => date('Y-m-d'),
            'priority' => '1.0',
            'changefreq' => 'daily'
        ];
        $data[] = [
            'loc' => base_url('home/artikel'),
            'lastmod' => date('Y-m-d'),
            'priority' => '0.8',
            'changefreq' => 'daily'
        ];
        $data[] = [
            'loc' => base_url('home/galeri'),
            'lastmod' => date('Y-m-d'),
            'priority' => '0.8',
            'changefreq' => 'weekly'
        ];
        $data[] = [
            'loc' => base_url('home/contact'),
            'lastmod' => date('Y-m-d'),
            'priority' => '0.5',
            'changefreq' => 'monthly'
        ];
        $data[] = [
            'loc' => base_url('pendaftaran'),
            'lastmod' => date('Y-m-d'),
            'priority' => '0.9',
            'changefreq' => 'monthly'
        ];

        // Dynamic Pages (Halaman)
        $halaman = $ModelHalaman->findAll();
        foreach ($halaman as $page) {
            $data[] = [
                'loc' => base_url('halaman/' . $page['halaman_slug']),
                'lastmod' => date('Y-m-d', strtotime($page['created_at'] ?? date('Y-m-d'))),
                'priority' => '0.7',
                'changefreq' => 'monthly'
            ];
        }

        // Articles
        $artikel = $ModelArtikel->findAll();
        foreach ($artikel as $art) {
            $data[] = [
                'loc' => base_url('home/detail/' . $art['artikel_slug']),
                'lastmod' => date('Y-m-d', strtotime($art['artikel_tanggal'])),
                'priority' => '0.8',
                'changefreq' => 'weekly'
            ];
        }

        // Generate XML
        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        
        foreach ($data as $url) {
            $xml .= '<url>';
            $xml .= '<loc>' . $url['loc'] . '</loc>';
            $xml .= '<lastmod>' . $url['lastmod'] . '</lastmod>';
            $xml .= '<changefreq>' . $url['changefreq'] . '</changefreq>';
            $xml .= '<priority>' . $url['priority'] . '</priority>';
            $xml .= '</url>';
        }
        
        $xml .= '</urlset>';

        return $this->response->setContentType('text/xml')->setBody($xml);
    }
}
