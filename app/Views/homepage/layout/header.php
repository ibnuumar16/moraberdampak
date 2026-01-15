<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  
  <!-- Primary Meta Tags -->
  <title><?= isset($title) ? esc($title) . ' - ' . ($pengaturan['nama'] ?? 'Pesantren') : ($pengaturan['nama'] ?? 'Pondok Pesantren Inggris Inovasi Bangsa'); ?></title>
  <meta name="title" content="<?= isset($title) ? esc($title) : ($pengaturan['nama'] ?? ''); ?>">
  <meta name="description" content="<?= isset($meta_desc) && !empty($meta_desc) ? esc($meta_desc) : ($pengaturan['deskripsi'] ?? ''); ?>">
  <meta name="keywords" content="pesantren, pendidikan islam, pondok pesantren, santri, <?= isset($title) ? esc($title) : ''; ?>">
  <meta name="author" content="<?= $pengaturan['nama'] ?? 'Pesantren'; ?>">

  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?= current_url(); ?>">
  <meta property="og:title" content="<?= isset($title) ? esc($title) : ($pengaturan['nama'] ?? ''); ?>">
  <meta property="og:description" content="<?= isset($meta_desc) && !empty($meta_desc) ? esc($meta_desc) : ($pengaturan['deskripsi'] ?? ''); ?>">
  <meta property="og:image" content="<?= isset($meta_image) && !empty($meta_image) ? $meta_image : (base_url('uploads/' . ($pengaturan['logo_web'] ?? ''))); ?>">

  <!-- Twitter -->
  <meta property="twitter:card" content="summary_large_image">
  <meta property="twitter:url" content="<?= current_url(); ?>">
  <meta property="twitter:title" content="<?= isset($title) ? esc($title) : ($pengaturan['nama'] ?? ''); ?>">
  <meta property="twitter:description" content="<?= isset($meta_desc) && !empty($meta_desc) ? esc($meta_desc) : ($pengaturan['deskripsi'] ?? ''); ?>">
  <meta property="twitter:image" content="<?= isset($meta_image) && !empty($meta_image) ? $meta_image : (base_url('uploads/' . ($pengaturan['logo_web'] ?? ''))); ?>">

  <!-- Canonical Link -->
  <link rel="canonical" href="<?= current_url(); ?>">

  <!-- JSON-LD Schema for Organization -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "EducationalOrganization",
    "name": "<?= $pengaturan['nama'] ?? 'Pondok Pesantren'; ?>",
    "url": "<?= base_url(); ?>",
    "logo": "<?= base_url('uploads/' . ($pengaturan['logo'] ?? '')); ?>",
    "description": "<?= $pengaturan['deskripsi'] ?? ''; ?>",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "<?= $pengaturan['alamat'] ?? ''; ?>"
    },
    "contactPoint": {
      "@type": "ContactPoint",
      "telephone": "<?= $pengaturan['telepon'] ?? ''; ?>",
      "contactType": "customer service"
    }
  }
  </script>

  <!-- Favicons -->
  <?php if (!empty($pengaturan['logo'])) : ?>
      <link href="<?= base_url('uploads/' . $pengaturan['logo']); ?>" rel="icon">
      <link href="<?= base_url('uploads/' . $pengaturan['logo']); ?>" rel="apple-touch-icon">
  <?php else : ?>
      <link href="<?= base_url();?>homepage/img/pib.png" rel="icon">
      <link href="<?= base_url();?>homepage/img/pib.png" rel="apple-touch-icon">
  <?php endif; ?>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url();?>homepage/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url();?>homepage/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= base_url();?>homepage/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="<?= base_url();?>homepage/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="<?= base_url();?>homepage/css/main.css?v=<?= time(); ?>" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Abdul Chalim ibnu umar
  ======================================================== -->
</head>

<body class="index-page">
  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="<?= base_url();?>" class="logo d-flex align-items-center">
        <?php if (!empty($pengaturan['logo_web'])) : ?>
            <img src="<?= base_url('uploads/' . $pengaturan['logo_web']); ?>" alt="Logo">
        <?php else : ?>
            <img src="<?= base_url();?>homepage/img/logo.png" alt="">
        <?php endif; ?>
        <!-- <h1 class="sitename"><b>PPIIB</b></h1> -->
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="<?= base_url();?>" class="<?= uri_string() == '' || uri_string() == 'home' ? 'active' : '' ?>">Home</a></li>
          
          <?php
          // Fetch dynamic menu items
          $halamanModel = new \App\Models\ModelHalaman();
          $menuProfil = $halamanModel->getByType('profil');
          $menuPages = $halamanModel->getByType('page');
          ?>

          <?php if (!empty($menuProfil)): ?>
          <li class="dropdown"><a href="#"><span>Profil</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <?php foreach ($menuProfil as $menu): ?>
              <li><a href="<?= base_url('halaman/' . $menu['halaman_slug']); ?>"><?= esc($menu['halaman_judul']); ?></a></li>
              <?php endforeach; ?>
            </ul>
          </li>
          <?php endif; ?>

          <?php if (!empty($menuPages)): ?>
            <?php foreach ($menuPages as $page): ?>
            <li><a href="<?= base_url('halaman/' . $page['halaman_slug']); ?>"><?= esc($page['halaman_judul']); ?></a></li>
            <?php endforeach; ?>
          <?php endif; ?>

          <li><a href="<?= base_url('home/artikel'); ?>" class="<?= uri_string() == 'home/artikel' ? 'active' : '' ?>">Artikel</a></li>
          <li><a href="<?= base_url('home/galeri'); ?>" class="<?= uri_string() == 'home/galeri' ? 'active' : '' ?>">Galeri</a></li>
          <li><a href="<?= base_url('home/contact'); ?>" class="<?= uri_string() == 'home/contact' ? 'active' : '' ?>">Contact</a></li>
          <li><a href="<?= base_url('pendaftaran'); ?>" class="<?= uri_string() == 'pendaftaran' ? 'active' : '' ?>">PSB</a></li>
          <li><a href="<?= base_url('login'); ?>" class="btn-get-started" style="margin-left: 15px; padding: 8px 20px; border-radius: 50px;">Login</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>
