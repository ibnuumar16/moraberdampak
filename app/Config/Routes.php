<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Homepage Routes
$routes->get('/', 'Home::index');
$routes->get('home', 'Home::index');
$routes->get('home/artikel', 'Home::artikel');
$routes->get('home/detail/(:segment)', 'Home::detail/$1');
$routes->get('home/search', 'Home::search');
$routes->get('home/kategori/(:num)', 'Home::kategori/$1');
$routes->get('home/galeri', 'Home::galeri');
$routes->get('home/form', 'Home::form');
$routes->post('home/tambahsantri', 'Home::tambahsantri');

// Login Routes
$routes->get('login', 'Login::index');
$routes->post('login/auth', 'Login::auth');
$routes->get('login/logout', 'Login::logout');

// Dashboard Routes (Protected)
$routes->group('dashboard', ['filter' => 'auth'], function ($routes) {
    // Dashboard Home
    $routes->get('/', 'Dashboard::index');
    $routes->get('logout', 'Dashboard::logout');
    
    // Settings
    $routes->get('setting_website', 'Dashboard::setting_website');
    $routes->post('setting_website_update', 'Dashboard::setting_website_update');
    $routes->get('setting_tampilan', 'Dashboard::setting_tampilan');
    $routes->post('setting_tampilan_update', 'Dashboard::setting_tampilan_update');
    
    // Santri Management
    $routes->get('santri', 'Dashboard::santri');
    $routes->get('arsip', 'Dashboard::arsip');
    $routes->get('santri_edit/(:num)', 'Dashboard::santri_edit/$1');
    $routes->post('santri_update/(:num)', 'Dashboard::santri_update/$1');
    $routes->get('santri_hapus/(:num)', 'Dashboard::santri_hapus/$1');
    
    // Guru Management
    $routes->get('guru', 'Dashboard::guru');
    $routes->get('tambah_guru', 'Dashboard::tambah_guru');
    $routes->post('simpan_guru', 'Dashboard::simpan_guru');
    $routes->get('edit_guru/(:num)', 'Dashboard::edit_guru/$1');
    $routes->post('update_guru/(:num)', 'Dashboard::update_guru/$1');
    $routes->get('hapus_guru/(:num)', 'Dashboard::hapus_guru/$1');

    // Program Unggulan Management
    $routes->get('program_unggulan', 'Dashboard::program_unggulan');
    $routes->get('tambah_program', 'Dashboard::tambah_program');
    $routes->post('simpan_program', 'Dashboard::simpan_program');
    $routes->get('edit_program/(:num)', 'Dashboard::edit_program/$1');
    $routes->post('update_program/(:num)', 'Dashboard::update_program/$1');
    $routes->get('hapus_program/(:num)', 'Dashboard::hapus_program/$1');

    // Pengumuman Management
    $routes->get('pengumuman', 'Dashboard::pengumuman');
    $routes->get('tambah_pengumuman', 'Dashboard::tambah_pengumuman');
    $routes->post('simpan_pengumuman', 'Dashboard::simpan_pengumuman');
    $routes->get('edit_pengumuman/(:num)', 'Dashboard::edit_pengumuman/$1');
    $routes->post('update_pengumuman/(:num)', 'Dashboard::update_pengumuman/$1');
    $routes->get('hapus_pengumuman/(:num)', 'Dashboard::hapus_pengumuman/$1');
    
    // Kategori Management
    $routes->get('kategori', 'Dashboard::kategori');
    $routes->get('tambah_kategori', 'Dashboard::tambah_kategori');
    $routes->post('simpan_kategori', 'Dashboard::simpan_kategori');
    $routes->get('edit_kategori/(:num)', 'Dashboard::edit_kategori/$1');
    $routes->post('update_kategori/(:num)', 'Dashboard::update_kategori/$1');
    $routes->get('hapus_kategori/(:num)', 'Dashboard::hapus_kategori/$1');
    
    // Artikel Management
    $routes->get('artikel', 'Dashboard::artikel');
    $routes->get('tambah_artikel', 'Dashboard::tambah_artikel');
    $routes->post('simpan_artikel', 'Dashboard::simpan_artikel');
    $routes->get('edit_artikel/(:num)', 'Dashboard::edit_artikel/$1');
    $routes->post('update_artikel/(:num)', 'Dashboard::update_artikel/$1');
    $routes->get('hapus_artikel/(:num)', 'Dashboard::hapus_artikel/$1');
    
    // User/Pengguna Management
    $routes->get('pengguna', 'Dashboard::pengguna');
    $routes->get('tambah_pengguna', 'Dashboard::tambah_pengguna');
    $routes->post('simpan_pengguna', 'Dashboard::simpan_pengguna');
    $routes->get('edit_pengguna/(:num)', 'Dashboard::edit_pengguna/$1');
    $routes->post('update_pengguna/(:num)', 'Dashboard::update_pengguna/$1');
    $routes->get('hapus_pengguna/(:num)', 'Dashboard::hapus_pengguna/$1');
    
    // Galeri Management
    $routes->get('galeri', 'Dashboard::galeri');
    $routes->get('tambah_galeri', 'Dashboard::tambah_galeri');
    $routes->post('simpan_galeri', 'Dashboard::simpan_galeri');
    $routes->get('edit_galeri/(:num)', 'Dashboard::edit_galeri/$1');
    $routes->post('update_galeri/(:num)', 'Dashboard::update_galeri/$1');
    $routes->get('hapus_galeri/(:num)', 'Dashboard::hapus_galeri/$1');
    
    // Halaman/Pages Management (Dynamic Menu)
    $routes->get('halaman', 'Dashboard::halaman');
    $routes->get('tambah_halaman', 'Dashboard::tambah_halaman');
    $routes->post('simpan_halaman', 'Dashboard::simpan_halaman');
    $routes->get('edit_halaman/(:num)', 'Dashboard::edit_halaman/$1');
    $routes->post('update_halaman/(:num)', 'Dashboard::update_halaman/$1');
    $routes->get('hapus_halaman/(:num)', 'Dashboard::hapus_halaman/$1');

    // Quote Management
    $routes->get('quote', 'Dashboard::quote');
    $routes->get('tambah_quote', 'Dashboard::tambah_quote');
    $routes->post('simpan_quote', 'Dashboard::simpan_quote');
    $routes->get('edit_quote/(:num)', 'Dashboard::edit_quote/$1');
    $routes->post('update_quote/(:num)', 'Dashboard::update_quote/$1');
    $routes->get('hapus_quote/(:num)', 'Dashboard::hapus_quote/$1');
});

// Dynamic Pages Route (must be last to avoid conflicts)
$routes->get('halaman/(:segment)', 'Home::halaman/$1');


// Update System Routes
$routes->group('update-system', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'UpdateSystem::index');
    $routes->get('check', 'UpdateSystem::check');
    $routes->post('run', 'UpdateSystem::run_update');
});

// SEO Routes
$routes->get('sitemap.xml', 'Sitemap::index');

$routes->setAutoRoute(true);
