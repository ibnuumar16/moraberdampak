<main class="main">

  <!-- Page Title -->
  <div class="page-title" data-aos="fade">
    <div class="heading">
      <div class="container">
        <div class="row d-flex justify-content-center text-center">
          <div class="col-lg-8">
            <h1 class="display-4 fw-bold text-white"><?= esc($halaman['halaman_judul']); ?></h1>
            <?php if (!empty($halaman['halaman_deskripsi'])): ?>
                <p class="lead text-white-50 mb-0"><?= esc($halaman['halaman_deskripsi']); ?></p>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div><!-- End Page Title -->

  <!-- Page Content Section -->
  <section id="page-content" class="page-content section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-10">
          
          <div class="content-wrapper bg-white p-5 shadow-sm rounded" data-aos="fade-up" data-aos-delay="100">
            <!-- Content Body -->
            <div class="article-content">
                <?= $halaman['halaman_konten']; ?>
            </div>
            
            <!-- Share/Meta (Optional) -->
            <div class="border-top mt-5 pt-4 d-flex justify-content-between align-items-center text-muted small">
                <span>Terakhir diperbarui: <?= date('d F Y', strtotime($halaman['updated_at'] ?? date('Y-m-d'))); ?></span>
                <div class="share-buttons">
                    <span class="me-2">Bagikan:</span>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode(current_url()); ?>" target="_blank" class="text-muted me-2"><i class="bi bi-facebook"></i></a>
                    <a href="https://twitter.com/intent/tweet?url=<?= urlencode(current_url()); ?>&text=<?= urlencode($halaman['halaman_judul']); ?>" target="_blank" class="text-muted me-2"><i class="bi bi-twitter"></i></a>
                    <a href="https://wa.me/?text=<?= urlencode($halaman['halaman_judul'] . ' ' . current_url()); ?>" target="_blank" class="text-muted"><i class="bi bi-whatsapp"></i></a>
                </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>

</main>

<style>
/* Custom Styles for Page Detail */
<?php
    $heroBg = !empty($pengaturan['hero_bg']) ? base_url('uploads/' . $pengaturan['hero_bg']) : base_url('homepage/img/arab-5.png');
?>
.page-title {
    background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('<?= $heroBg; ?>?v=<?= time(); ?>') center/cover no-repeat !important;
    padding: 100px 0;
    margin-bottom: 0;
}

.page-title .heading h1 {
    text-shadow: 0 2px 4px rgba(0,0,0,0.3);
}

.content-wrapper {
    margin-top: -50px; /* Overlap effect */
    position: relative;
    z-index: 2;
}

.article-content {
    font-size: 1.1rem;
    line-height: 1.8;
    color: #444;
}

.article-content h2 {
    margin-top: 2rem;
    margin-bottom: 1rem;
    font-weight: 700;
    color: var(--heading-color);
}

.article-content h3 {
    margin-top: 1.5rem;
    margin-bottom: 1rem;
    font-weight: 600;
    color: var(--heading-color);
}

.article-content p {
    margin-bottom: 1.5rem;
}

.article-content ul, .article-content ol {
    margin-bottom: 1.5rem;
    padding-left: 1.5rem;
}

.article-content img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
    margin: 1.5rem 0;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

.article-content blockquote {
    border-left: 4px solid var(--accent-color);
    padding-left: 1.5rem;
    font-style: italic;
    color: #666;
    margin: 1.5rem 0;
    background: #f9f9f9;
    padding: 1.5rem;
    border-radius: 0 8px 8px 0;
}
</style>
