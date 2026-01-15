<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $pengaturan['nama'] ?? 'Dashboard Pesantren'; ?></title>


    <!-- Plugins: CSS -->
    <link rel="stylesheet" href="<?= base_url()?>/aset_dashboard_2/vendors/feather/feather.css">
    <link rel="stylesheet" href="<?= base_url()?>/aset_dashboard_2/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url()?>/aset_dashboard_2/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?= base_url()?>/aset_dashboard_2/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url()?>/aset_dashboard_2/vendors/mdi/css/materialdesignicons.min.css">

    <!-- Tambahkan di dalam <head> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/header@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/list@latest"></script>

    <!-- Custom Styles -->
    <link rel="stylesheet" href="<?= base_url()?>/aset_dashboard_2/css/style.css">
    <?php if (!empty($pengaturan['logo'])) : ?>
        <link rel="shortcut icon" href="<?= base_url('uploads/' . $pengaturan['logo']); ?>" />
    <?php else : ?>
        <link rel="shortcut icon" href="<?= base_url()?>/aset_dashboard_2/images/favicon.png" />
    <?php endif; ?>

    <style>
        /* Premium Dashboard Styles */
        :root {
            --primary-color: #11605d; /* Match homepage green */
            --secondary-color: #167f7a;
        }
        .navbar .navbar-brand-wrapper {
            background: var(--primary-color);
        }
        .navbar .navbar-menu-wrapper {
            background: var(--primary-color); /* Make full header green */
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            color: #fff;
        }
        .navbar .navbar-brand-wrapper .navbar-brand {
            color: #fff;
            font-size: 1.2rem;
            font-weight: 700;
        }
        /* Navbar icons and text color fix for dark background */
        .navbar .navbar-menu-wrapper .navbar-nav .nav-item .nav-link {
            color: #fff;
        }
        .navbar .navbar-menu-wrapper .navbar-nav .nav-item .nav-link i {
            color: #fff;
        }
        .navbar .navbar-toggler {
            color: #fff;
            padding: 10px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }
        /* Hover effect for top navbar buttons */
        .navbar .navbar-toggler:hover,
        .navbar .navbar-menu-wrapper .navbar-nav .nav-item .nav-link:hover {
            background-color: #ffffff;
            color: var(--primary-color) !important;
            border-radius: 8px;
        }
        .navbar .navbar-menu-wrapper .navbar-nav .nav-item .nav-link:hover i,
        .navbar .navbar-toggler:hover span {
            color: var(--primary-color) !important;
        }
        
        /* Sidebar Styling */
        .sidebar {
            background: #ffffff; /* White background as requested */
        }
        .sidebar .nav .nav-item .nav-link {
            color: var(--primary-color); /* Teal text */
            margin-bottom: 5px;
            border-radius: 8px;
        }
        .sidebar .nav .nav-item .nav-link i {
            color: var(--primary-color); /* Teal icons */
        }
        .sidebar .nav .nav-item .nav-link .menu-title {
            color: var(--primary-color);
        }
        .sidebar .nav .nav-item .nav-link .menu-arrow {
            color: var(--primary-color);
        }
        
        /* Active & Hover States - "Button" look */
        .sidebar .nav .nav-item.active > .nav-link,
        .sidebar .nav .nav-item:hover > .nav-link {
            background: var(--primary-color); /* Teal background */
            color: #fff !important; /* White text */
        }
        .sidebar .nav .nav-item.active > .nav-link i,
        .sidebar .nav .nav-item:hover > .nav-link i,
        .sidebar .nav .nav-item.active > .nav-link .menu-title,
        .sidebar .nav .nav-item:hover > .nav-link .menu-title,
        .sidebar .nav .nav-item.active > .nav-link .menu-arrow,
        .sidebar .nav .nav-item:hover > .nav-link .menu-arrow {
            color: #fff !important;
        }

        /* Fix Sidebar Sub-menu Background */
        .sidebar .nav .sub-menu {
            background: #ffffff !important;
        }
        .sidebar .nav .sub-menu .nav-item .nav-link {
            color: var(--primary-color) !important; /* Green text to match header */
            font-weight: 500;
        }
        .sidebar .nav .sub-menu .nav-item .nav-link:hover {
            color: var(--secondary-color) !important;
            background: rgba(17, 96, 93, 0.05);
        }

        .card {
            border-radius: 15px;
            border: none;
            box-shadow: 0 0 20px rgba(0,0,0,0.05);
        }
        .brand-logo img {
            height: 50px !important;
            width: auto !important;
        }
        /* Global Premium Tweaks */
        .table {
            border-collapse: separate;
            border-spacing: 0 10px;
        }
        .table tr {
            background: #fff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.02);
            transition: transform 0.2s;
        }
        .table tr:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }
        .table td, .table th {
            border: none;
            padding: 1.2rem 1rem;
            vertical-align: middle;
        }
        .table td:first-child, .table th:first-child {
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
        }
        .table td:last-child, .table th:last-child {
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
        }
        .btn {
            border-radius: 8px;
            padding: 0.6rem 1.2rem;
            font-weight: 600;
        }
        .form-control {
            border-radius: 8px;
            padding: 0.8rem 1rem;
            border: 1px solid #eee;
            background: #fcfcfc;
        }
        .form-control:focus {
            background: #fff;
            box-shadow: 0 0 0 3px rgba(25, 135, 84, 0.1);
            border-color: var(--primary-color);
        }
    </style>
</head>
<body>
    <div class="container-scroller">
        <!-- Navbar -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo mr-5" href="<?= base_url('dashboard'); ?>">
                    <?php if (!empty($pengaturan['logo_web'])) : ?>
                        <img src="<?= base_url('uploads/' . $pengaturan['logo_web']); ?>" class="mr-2" alt="logo"/>
                    <?php else : ?>
                        <img src="<?= base_url()?>/homepage/img/logo.png" class="mr-2" alt="logo"/>
                    <?php endif; ?>
                </a>
                <a class="navbar-brand brand-logo-mini" href="<?= base_url('dashboard'); ?>">
                     <?php if (!empty($pengaturan['logo_web'])) : ?>
                        <img src="<?= base_url('uploads/' . $pengaturan['logo_web']); ?>" alt="logo"/>
                    <?php else : ?>
                        <img src="<?= base_url()?>/homepage/img/logo.png" alt="logo"/>
                    <?php endif; ?>
                </a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>
                
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                            <?php 
                                $fotoProfile = !empty($user['foto']) ? base_url('uploads/user/' . $user['foto']) : 'https://ui-avatars.com/api/?name=' . urlencode(session()->get('nama_user')) . '&background=11605d&color=fff';
                            ?>
                            <img src="<?= $fotoProfile; ?>" alt="profile" onerror="this.onerror=null; this.src='https://ui-avatars.com/api/?name=<?= urlencode(session()->get('nama_user')); ?>&background=11605d&color=fff';"/>
                            <span class="ml-2 d-none d-lg-inline text-dark font-weight-bold"><?= session()->get('nama_user'); ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                            <a class="dropdown-item" href="<?= base_url('dashboard/setting_website'); ?>">
                                <i class="ti-settings text-primary"></i> Settings
                            </a>
                            <a class="dropdown-item" href="<?= base_url('update-system'); ?>">
                                <i class="ti-cloud-down text-primary"></i> Update
                            </a>
                            <a class="dropdown-item" href="<?= base_url('dashboard/logout'); ?>">
                                <i class="ti-power-off text-primary"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="icon-menu"></span>
                </button>
            </div>
        </nav>

        <!-- Sidebar -->
        <div class="container-fluid page-body-wrapper">
            <nav class="sidebar sidebar-offcanvas " id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('dashboard') ?>">
                            <i class="icon-grid menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#ui-master" aria-expanded="false" aria-controls="ui-master">
                            <i class="icon-layout menu-icon"></i>
                            <span class="menu-title">Master Data</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="ui-master">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="<?= base_url('dashboard/santri') ?>">Data Santri</a></li>
                                <li class="nav-item"> <a class="nav-link" href="<?= base_url('dashboard/guru') ?>">Data Guru/Asatidz</a></li>
                                <li class="nav-item"> <a class="nav-link" href="<?= base_url('dashboard/pengguna') ?>">Manajemen User</a></li>
                                <li class="nav-item"> <a class="nav-link" href="<?= base_url('dashboard/kategori_pendaftaran') ?>">Kategori Pendaftaran</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#ui-content" aria-expanded="false" aria-controls="ui-content">
                            <i class="icon-paper menu-icon"></i>
                            <span class="menu-title">Konten Website</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="ui-content">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="<?= base_url('dashboard/artikel') ?>">Artikel & Berita</a></li>
                                <li class="nav-item"> <a class="nav-link" href="<?= base_url('dashboard/kategori') ?>">Kategori Artikel</a></li>
                                <li class="nav-item"> <a class="nav-link" href="<?= base_url('dashboard/galeri') ?>">Galeri Foto</a></li>
                                <li class="nav-item"> <a class="nav-link" href="<?= base_url('dashboard/profil') ?>">Manajemen Profil</a></li>
                                <li class="nav-item"> <a class="nav-link" href="<?= base_url('dashboard/menu_halaman') ?>">Manajemen Menu Utama</a></li>
                                <li class="nav-item"> <a class="nav-link" href="<?= base_url('dashboard/program_unggulan') ?>">Program Unggulan</a></li>
                                <li class="nav-item"> <a class="nav-link" href="<?= base_url('dashboard/program_header') ?>">Program Header (Highlight)</a></li>
                                <li class="nav-item"> <a class="nav-link" href="<?= base_url('dashboard/pengumuman') ?>">Pengumuman</a></li>
                                <li class="nav-item"> <a class="nav-link" href="<?= base_url('dashboard/psb') ?>">Informasi PSB</a></li>
                                <li class="nav-item"> <a class="nav-link" href="<?= base_url('dashboard/quote') ?>">Quote/Kutipan</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#ui-settings" aria-expanded="false" aria-controls="ui-settings">
                            <i class="icon-contract menu-icon"></i>
                            <span class="menu-title">Pengaturan</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="ui-settings">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="<?= base_url('dashboard/setting_website') ?>">Identitas Website</a></li>
                                <li class="nav-item"> <a class="nav-link" href="<?= base_url('dashboard/setting_tampilan') ?>">Tampilan Depan</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('update-system') ?>">
                            <i class="ti-cloud-down menu-icon"></i>
                            <span class="menu-title">Update System</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('dashboard/logout') ?>">
                            <i class="ti-power-off menu-icon"></i>
                            <span class="menu-title">Logout</span>
                        </a>
                    </li>
                </ul>
            </nav>
