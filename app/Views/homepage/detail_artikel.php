<main class="main">

  <!-- Page Title -->
  <!-- Page Title -->
  <div class="container section-title text-center" style="margin-top: 40px;">
    <h2><?= esc($artikel['artikel_judul']); ?></h2>
    <p>
      <?= date('d M Y', strtotime($artikel['artikel_tanggal'])); ?> | <?= esc($artikel['nama_author'] ?? 'Admin'); ?>
    </p>
  </div><!-- End Page Title -->

  <div class="container">
    <div class="row">

      <!-- Main Content Column -->
      <div class="col-lg-8">

        <!-- Blog Details Section -->
        <section id="blog-details" class="blog-details section">
          <div class="container">

            <article class="article">

              <!-- Judul Artikel -->


              <!-- Meta Artikel -->
              <div class="meta-top">
                <ul>
                  <li class="d-flex align-items-center">
                    <i class="bi bi-person"></i> <a href="#"><?= esc($artikel['artikel_author']); ?></a>
                  </li>
                  <li class="d-flex align-items-center">
                    <i class="bi bi-clock"></i> <time datetime="<?= esc($artikel['artikel_tanggal']); ?>"><?= date('M d, Y', strtotime($artikel['artikel_tanggal'])); ?></time>
                  </li>
                  <li class="d-flex align-items-center">
                    <i class="bi bi-folder"></i> <a href="<?= base_url('home/kategori/' . $artikel['kategori_id']); ?>"><?= esc($artikel['kategori_nama']); ?></a>
                  </li>
                </ul>
              </div><!-- End meta top -->

              <!-- Featured Image -->
              <div class="post-img">
                <img src="<?= base_url('/uploads/' . esc($artikel['artikel_sampul'])); ?>" alt="<?= esc($artikel['artikel_judul']); ?>" class="img-fluid">
              </div>

              <!-- Konten Artikel -->
              <div class="content">
                <?= $artikel['artikel_konten']; ?>
              </div><!-- End post content -->

              <!-- Tags/Categories -->
              <div class="meta-bottom">
                <i class="bi bi-folder"></i>
                <ul class="cats">
                  <li><a href="<?= base_url('home/kategori/' . $artikel['kategori_id']); ?>"><?= esc($artikel['kategori_nama']); ?></a></li>
                </ul>

                <i class="bi bi-tags"></i>
                <ul class="tags">
                  <li><a href="#">Artikel</a></li>
                </ul>
              </div><!-- End meta bottom -->

              <!-- Share Buttons -->
              <div class="share-buttons mt-4 pt-3 border-top">
                <span class="fw-bold me-2">Bagikan:</span>
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode(current_url()); ?>" target="_blank" class="btn btn-sm btn-outline-primary me-1"><i class="bi bi-facebook"></i> Facebook</a>
                <a href="https://twitter.com/intent/tweet?url=<?= urlencode(current_url()); ?>&text=<?= urlencode($artikel['artikel_judul']); ?>" target="_blank" class="btn btn-sm btn-outline-info me-1"><i class="bi bi-twitter"></i> Twitter</a>
                <a href="https://wa.me/?text=<?= urlencode($artikel['artikel_judul'] . ' ' . current_url()); ?>" target="_blank" class="btn btn-sm btn-outline-success"><i class="bi bi-whatsapp"></i> WhatsApp</a>
              </div>

            </article>

            <!-- Related Articles Section -->
            <?php if (!empty($related_artikel)): ?>
            <div class="related-posts mt-5">
              <h4 class="related-posts-title">Artikel Terkait</h4>
              <div class="row gy-4">
                <?php foreach ($related_artikel as $related): ?>
                <div class="col-lg-6">
                  <div class="post-item">
                    <img src="<?= base_url('/uploads/' . esc($related['artikel_sampul'])); ?>" alt="<?= esc($related['artikel_judul']); ?>" class="img-fluid">
                    <div class="post-content d-flex flex-column">
                      <h5 class="post-title">
                        <a href="<?= base_url('home/detail/' . $related['artikel_slug']); ?>"><?= esc($related['artikel_judul']); ?></a>
                      </h5>
                      <div class="meta d-flex align-items-center">
                        <div class="d-flex align-items-center">
                          <i class="bi bi-clock"></i> <time datetime="<?= $related['artikel_tanggal']; ?>"><?= date('M d, Y', strtotime($related['artikel_tanggal'])); ?></time>
                        </div>
                        <span class="px-2 mx-2">/</span>
                        <div class="d-flex align-items-center">
                          <i class="bi bi-folder"></i> <?= esc($related['kategori_nama']); ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php endforeach; ?>
              </div>
            </div>
            <?php endif; ?>

          </div>
        </section><!-- /Blog Details Section -->

      </div>

      <!-- Sidebar Column -->
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

        <!-- Search Widget -->
        <div class="widgets-container">
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
            <?php foreach ($latest_artikel as $latest): ?>
            <div class="post-item">
              <img src="<?= base_url('/uploads/' . esc($latest['artikel_sampul'])); ?>" alt="<?= esc($latest['artikel_judul']); ?>" class="flex-shrink-0">
              <div>
                <h4><a href="<?= base_url('home/detail/' . $latest['artikel_slug']); ?>"><?= esc($latest['artikel_judul']); ?></a></h4>
                <time datetime="<?= $latest['artikel_tanggal']; ?>"><?= date('d M Y', strtotime($latest['artikel_tanggal'])); ?></time>
              </div>
            </div><!-- End recent post item-->
            <?php endforeach; ?>
          </div><!--/Recent Posts Widget -->

        </div>

      </div>

    </div>
  </div>

</main>

<style>


.related-posts .related-posts-title {
  font-size: 24px;
  font-weight: 700;
  margin-bottom: 30px;
  color: #012970;
}

.related-posts .post-item {
  background-color: #fff;
  box-shadow: 0 4px 16px rgba(1, 41, 112, 0.1);
  border-radius: 8px;
  overflow: hidden;
  transition: 0.3s;
}

.related-posts .post-item:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 24px rgba(1, 41, 112, 0.15);
}

.related-posts .post-item img {
  width: 100%;
  height: 200px;
  object-fit: cover;
}

.related-posts .post-content {
  padding: 20px;
}

.related-posts .post-title {
  font-size: 18px;
  font-weight: 600;
  margin-bottom: 10px;
}

.related-posts .post-title a {
  color: #012970;
  transition: 0.3s;
}

.related-posts .post-title a:hover {
  color: #4154f1;
}

.related-posts .meta {
  font-size: 13px;
  color: #6c757d;
}

.related-posts .meta i {
  margin-right: 5px;
}
</style>
