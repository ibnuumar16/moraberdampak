<?php
// Pastikan $artikel sudah dikirim dari controller
?>

<main class="main">

  <!-- Page Title -->
  <div class="container section-title text-center" style="margin-top: 40px;">
    <h2>News</h2>
    <p>Informasi terbaru seputar kegiatan, pengumuman, dan artikel dari pesantren.</p>
  </div>
  <!-- End Page Title -->

  <!-- News Hero Section -->
  <section id="news-hero" class="news-hero section">
    <div class="container">
      <div class="row g-4">

        <!-- Main Content Area -->
        <div class="col-lg-8">

          <?php if (!empty($artikel)): ?>
            <?php $featured = $artikel[0]; ?>
            <!-- Featured Article -->
            <article class="featured-post position-relative mb-4">
              <img src="<?= base_url('uploads/' . $featured['artikel_sampul']) ?>" 
                   alt="<?= esc($featured['artikel_judul']) ?>" class="img-fluid">
              <div class="post-overlay">
                <div class="post-content">
                  <div class="post-meta">
                    <span class="date"><?= date('d M Y', strtotime($featured['artikel_tanggal'])) ?></span>
                  </div>
                  <h2 class="post-title">
                    <a href="<?= base_url('home/detail/' . $featured['artikel_slug']) ?>">
                      <?= esc($featured['artikel_judul']) ?>
                    </a>
                  </h2>
                  <div class="post-author">
                    <span>by</span>
                    <a href="#"><?= esc($featured['nama_author']) ?></a>
                  </div>
                </div>
              </div>
            </article>
          <?php endif; ?>

          <!-- Secondary Articles -->
          <div class="row g-4">
            <?php foreach (array_slice($artikel, 1, 6) as $row): ?>
              <div class="col-md-6">
                <article class="secondary-post">
                  <div class="post-image">
                    <img src="<?= base_url('uploads/' . $row['artikel_sampul']) ?>" 
                         alt="<?= esc($row['artikel_judul']) ?>" class="img-fluid">
                  </div>
                  <div class="post-content">
                    <div class="post-meta">
                      <span class="date"><?= date('d M Y', strtotime($row['artikel_tanggal'])) ?></span>
                    </div>
                    <h3 class="post-title">
                      <a href="<?= base_url('home/detail/' . $row['artikel_slug']) ?>">
                        <?= esc($row['artikel_judul']) ?>
                      </a>
                    </h3>
                    <div class="post-author">
                      <span>by</span>
                      <a href="#"><?= esc($row['nama_author']) ?></a>
                    </div>
                  </div>
                </article>
              </div>
            <?php endforeach; ?>
          </div>

            <!-- Pagination -->
            <div class="col-12 mt-4">
                <?= $pager->links('artikel', 'default_full') ?>
            </div>

        </div><!-- End Main Content -->

        <!-- Sidebar -->
        <div class="col-lg-4 sidebar">
            
            <style>
              .sidebar .widget-item {
                background: #fff;
                padding: 30px;
                margin-bottom: 30px;
                box-shadow: 0 4px 16px rgba(0, 0, 0, 0.05);
                border-radius: 10px;
                border: 1px solid #eee;
              }
              
              .sidebar .widget-title {
                font-size: 20px;
                font-weight: 700;
                padding: 0;
                margin: 0 0 20px 0;
                color: var(--heading-color);
                position: relative;
              }
              
              .sidebar .search-widget form {
                background: #fff;
                border: 1px solid #ddd;
                padding: 3px 10px;
                position: relative;
                border-radius: 50px;
                transition: 0.3s;
              }
              
              .sidebar .search-widget form:focus-within {
                border-color: var(--accent-color);
                box-shadow: 0 0 0 4px rgba(17, 96, 93, 0.1); /* Using accent color with opacity */
              }
              
              .sidebar .search-widget input {
                border: 0;
                padding: 4px;
                border-radius: 4px;
                width: calc(100% - 40px);
                outline: none;
                color: var(--default-color);
              }
              
              .sidebar .search-widget button {
                background: var(--accent-color);
                color: #fff;
                border: 0;
                border-radius: 50%;
                width: 36px;
                height: 36px;
                position: absolute;
                top: 3px;
                right: 3px;
                transition: 0.3s;
                display: flex;
                align-items: center;
                justify-content: center;
              }
              
              .sidebar .search-widget button:hover {
                background: color-mix(in srgb, var(--accent-color), black 10%);
              }
              
              .sidebar .categories-widget ul {
                list-style: none;
                padding: 0;
                margin: 0;
              }
              
              .sidebar .categories-widget ul li {
                padding-bottom: 10px;
                margin-bottom: 10px;
                border-bottom: 1px solid #eee;
              }
              
              .sidebar .categories-widget ul li:last-child {
                border-bottom: none;
                margin-bottom: 0;
                padding-bottom: 0;
              }
              
              .sidebar .categories-widget ul li a {
                color: var(--default-color);
                transition: 0.3s;
                display: flex;
                align-items: center;
                justify-content: space-between;
              }
              
              .sidebar .categories-widget ul li a:hover {
                color: var(--accent-color);
              }
              
              .sidebar .categories-widget ul li a span {
                background: #f4f4f4;
                color: #888;
                padding: 2px 10px;
                border-radius: 50px;
                font-size: 12px;
                transition: 0.3s;
              }
              
              .sidebar .categories-widget ul li a:hover span {
                background: var(--accent-color);
                color: #fff;
              }
              
              .sidebar .recent-posts-widget .post-item {
                display: flex;
                margin-bottom: 20px;
                align-items: center;
              }
              
              .sidebar .recent-posts-widget .post-item:last-child {
                margin-bottom: 0;
              }
              
              .sidebar .recent-posts-widget img {
                width: 80px;
                height: 60px;
                object-fit: cover;
                border-radius: 5px;
                margin-right: 15px;
              }
              
              .sidebar .recent-posts-widget h4 {
                font-size: 15px;
                font-weight: 600;
                margin-bottom: 5px;
              }
              
              .sidebar .recent-posts-widget h4 a {
                color: var(--default-color);
                transition: 0.3s;
              }
              
              .sidebar .recent-posts-widget h4 a:hover {
                color: var(--accent-color);
              }
              
              .sidebar .recent-posts-widget time {
                display: block;
                font-size: 12px;
                color: #888;
              }
            </style>

            <div class="widgets-container">
              
              <!-- Search Widget -->
              <div class="search-widget widget-item">
                <h3 class="widget-title">Cari Artikel</h3>
                <form action="<?= base_url('home/search'); ?>" method="GET">
                  <input type="text" name="q" placeholder="Cari artikel..." required>
                  <button type="submit" title="Search"><i class="bi bi-search"></i></button>
                </form>
              </div>

              <!-- Categories Widget -->
              <div class="categories-widget widget-item">
                <h3 class="widget-title">Kategori</h3>
                <ul class="mt-3">
                  <?php 
                  $kategoriModel = new \App\Models\ModelKategori();
                  $allKategori = $kategoriModel->findAll();
                  // Optional: Count articles per category if needed, for now just listing
                  ?>
                  <?php foreach ($allKategori as $kat): ?>
                  <li>
                    <a href="<?= base_url('home/kategori/' . $kat['kategori_id']); ?>">
                      <?= esc($kat['kategori_nama']); ?>
                      <span><i class="bi bi-chevron-right"></i></span>
                    </a>
                  </li>
                  <?php endforeach; ?>
                </ul>
              </div>

              <!-- Latest Posts Widget -->
              <div class="recent-posts-widget widget-item">
                <h3 class="widget-title">Artikel Terbaru</h3>
                <?php foreach (array_slice($artikel, 0, 5) as $latest): ?>
                <div class="post-item">
                  <img src="<?= base_url('uploads/' . $latest['artikel_sampul']); ?>" alt="<?= esc($latest['artikel_judul']); ?>" class="flex-shrink-0">
                  <div>
                    <h4><a href="<?= base_url('home/detail/' . $latest['artikel_slug']); ?>"><?= esc($latest['artikel_judul']); ?></a></h4>
                    <time datetime="<?= $latest['artikel_tanggal']; ?>"><?= date('d M Y', strtotime($latest['artikel_tanggal'])); ?></time>
                  </div>
                </div><!-- End recent post item-->
                <?php endforeach; ?>
              </div>

            </div>
        </div>

      </div>
    </div>
  </section><!-- /News Hero Section -->

</main>
