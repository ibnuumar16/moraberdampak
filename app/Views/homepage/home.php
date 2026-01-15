
  <main class="main">

    <!-- Hero Section -->
    <?php if ($pengaturan['section_hero'] ?? 1) : ?>
    <?php
    $heroBg = !empty($pengaturan['hero_bg']) ? base_url('uploads/' . $pengaturan['hero_bg']) : base_url('homepage/img/arab-5.png');
    ?>
    <section id="hero" class="hero section">
      <div class="hero-container" style="background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('<?= $heroBg; ?>?v=<?= time(); ?>') center/cover no-repeat !important;">
        <div class="hero-content">
          
          <?php if (!empty($pengaturan['hero_image_arab'])) : ?>
              <img src="<?= base_url('uploads/' . $pengaturan['hero_image_arab']); ?>" alt="Arabic Name" class="img-fluid mb-3" style="max-height: 150px;">
          <?php endif; ?>
          <h1 class="judul"><?= $pengaturan['hero_title'] ?? 'PP. INGGRIS INOVASI BANGSA'; ?></h1>
          <p><?= $pengaturan['hero_desc'] ?? 'Tempat terbaik untuk membentuk generasi Qurani yang cakap berbahasa Inggris dan siap bersaing di era global. Lingkungan Islami, program unggulan, dan pembinaan karakter terpadu.'; ?></p>
          
          <div class="cta-buttons">
            <a href="<?= $pengaturan['hero_btn_url'] ?? base_url('pendaftaran'); ?>" class="btn-apply">
                <?= $pengaturan['hero_btn_text'] ?? 'Daftar Sekarang'; ?>
            </a>
            <a href="<?= base_url('halaman/tentang-kami'); ?>" class="btn-tour">Tentang Pesantren</a>
          </div>
          
          <?php if (!empty($pengumuman)) : ?>
          <div id="announcementTrigger" class="announcement" style="cursor: pointer; position: relative; z-index: 21;" data-bs-toggle="modal" data-bs-target="#announcementModal">
            <div class="announcement-badge">Baru</div>
            <p><?= $pengumuman[0]['pengumuman_judul']; ?></p>
          </div>
          <?php endif; ?>
        </div>
      </div>


      <?php if ($pengaturan['section_program_header'] ?? 1) : ?>
      <div class="highlights-container container">
        <div class="row row-cols-1 row-cols-md-<?= (!empty($program_header) && count($program_header) > 0) ? count($program_header) : 3; ?> g-4">
            <?php if (!empty($program_header)) : ?>
                <?php foreach ($program_header as $ph) : ?>
                <div class="col">
                  <div class="program-card text-center p-4 h-100 shadow-sm rounded bg-white">
                    <div class="icon-box mb-3">
                      <i class="<?= $ph['icon']; ?>" style="font-size: 2.5rem; color: var(--primary-color);"></i>
                    </div>
                    <h5 class="fw-bold mb-3" style="color: var(--primary-color);"><?= $ph['judul']; ?></h5>
                    <p class="text-muted mb-0">
                      <?= $ph['deskripsi']; ?>
                    </p>
                  </div>
                </div>
                <?php endforeach; ?>
            <?php else : ?>
                <!-- Fallback Content if no data -->
                <div class="col">
                  <div class="program-card text-center p-4 h-100 shadow-sm rounded bg-white">
                    <div class="icon-box mb-3">
                      <i class="bi bi-book-half" style="font-size: 2.5rem; color: var(--primary-color);"></i>
                    </div>
                    <h5 class="fw-bold mb-3" style="color: var(--primary-color);">Program Tahfidz & Tadris</h5>
                    <p class="text-muted mb-0">
                      Pembelajaran Al-Qur’an yang terstruktur dengan target hafalan, disertai pemahaman dan pengajaran metode tartil yang benar.
                    </p>
                  </div>
                </div>
                <div class="col">
                  <div class="program-card text-center p-4 h-100 shadow-sm rounded bg-white">
                    <div class="icon-box mb-3">
                      <i class="bi bi-translate" style="font-size: 2.5rem; color: var(--primary-color);"></i>
                    </div>
                    <h5 class="fw-bold mb-3" style="color: var(--primary-color);">Khusus Bahasa Inggris</h5>
                    <p class="text-muted mb-0">
                      Pembinaan intensif kemampuan berbahasa Inggris secara aktif dalam keseharian santri untuk menunjang daya saing global.
                    </p>
                  </div>
                </div>
                <div class="col">
                  <div class="program-card text-center p-4 h-100 shadow-sm rounded bg-white">
                    <div class="icon-box mb-3">
                      <i class="bi bi-heart-fill" style="font-size: 2.5rem; color: var(--primary-color);"></i>
                    </div>
                    <h5 class="fw-bold mb-3" style="color: var(--primary-color);">Pembinaan Karakter Islami</h5>
                    <p class="text-muted mb-0">
                      Penanaman nilai-nilai adab, kedisiplinan, dan tanggung jawab melalui pendekatan kehidupan pesantren yang terpadu.
                    </p>
                  </div>
                </div>
            <?php endif; ?>
        </div>
      </div>
      <?php endif; ?>

    </section><!-- /Hero Section -->
    <?php endif; ?>

    <!-- About Section -->
    <?php if ($pengaturan['section_sambutan'] ?? 1) : ?>
    <section id="about" class="about section">

      <div class="container">

        <div class="row gy-5">

          <div class="col-lg-6">
            <div class="image-wrapper">
              <?php if (!empty($pengaturan['foto_pimpinan'])) : ?>
                  <img src="<?= base_url('uploads/' . $pengaturan['foto_pimpinan']); ?>" height="20%" alt="Pimpinan" class="img-fluid">
              <?php else : ?>
                  <img src="<?= base_url();?>homepage/img/pengasuh.png" height="20%" alt="Campus Overview" class="img-fluid">
              <?php endif; ?>
              
              <div class="experience-badge">
                <div class="text"><?= $pengaturan['nama_pimpinan'] ?? 'Ustadz Ahmad Lailatus Sibyan, S.Pd., M.A.'; ?></div>
                <div class="text"><i>Pimpinan Pesantren</i></div>
              </div>
            </div>
          </div>


          <div class="col-lg-6">
            <div class="content">
              <h3>Sambutan Pimpinan</h3>
              <div class="mission-statement">
                <p><em><?= nl2br($pengaturan['sambutan_pimpinan'] ?? 'Assalamu`alaikum Warahmatullahi Wabarakaatuh...'); ?></em></p>
              </div>
              

              <a href="about.html" class="btn-learn-more">
                Learn More About Us
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>

          

        </div>

      </div>

    </section><!-- /About Section -->
    <?php endif; ?>

    <!-- mulai artikal -->
    <?php if ($pengaturan['section_berita'] ?? 1) : ?>
    <section id="recent-news" class="recent-news section">

  <!-- Section Title -->
      <div class="container section-title text-center">
        <h2><?= $pengaturan['berita_title'] ?? 'Artikel & Berita'; ?></h2>
        <p><?= $pengaturan['berita_desc'] ?? 'Kabar terbaru seputar kegiatan pesantren, inspirasi santri, dan info seputar Penerimaan Santri Baru 2025.'; ?></p>
      </div>
      <!-- End Section Title -->

      <div class="container">
        <div class="row gy-4 justify-content-center">
          <?php if (!empty($artikel)): ?>

            <?php
            // Urutkan artikel dari tanggal terbaru ke lama
            usort($artikel, function($a, $b) {
              return strtotime($b['artikel_tanggal']) - strtotime($a['artikel_tanggal']);
            });

            // Ambil hanya 4 artikel terbaru
            $artikel_terbaru = array_slice($artikel, 0, 4);
            ?>

            <?php foreach ($artikel_terbaru as $a): ?>
              <div class="col-xl-3 col-md-6 col-sm-10 d-flex">
                <div class="post-box flex-fill">
                  <div class="post-img">
                    <img src="<?= base_url('uploads/' . $a['artikel_sampul']); ?>" class="img-fluid rounded" alt="<?= esc($a['artikel_judul']); ?>">
                  </div>
                  <div class="meta">
                    <span class="post-date">
                      <?= date('l, d F Y', strtotime($a['artikel_tanggal'])); ?>
                    </span>
                    <span class="post-author"> / <?= esc($a['artikel_author']); ?></span>
                  </div>
                  <h3 class="post-title"><?= esc($a['artikel_judul']); ?></h3>
                  <p><?= character_limiter(strip_tags($a['artikel_konten']), 120); ?></p>
                  <a href="<?= base_url('home/detail/' . $a['artikel_slug']); ?>" class="readmore stretched-link">
                    <span>Selengkapnya</span> <i class="bi bi-arrow-right"></i>
                  </a>
                </div>
              </div>
            <?php endforeach; ?>

          <?php else: ?>
            <div class="col-12 text-center">
              <p>Belum ada artikel yang dipublikasikan.</p>
            </div>
          <?php endif; ?>
        </div>

        <?php if (count($artikel) > 4): ?>
          <div class="text-center mt-5">
            <a href="<?= base_url('artikel'); ?>" class="btn btn-outline-primary px-4 py-2 rounded-pill">
              Lihat Semua Artikel
            </a>
          </div>
        <?php endif; ?>
      </div>

    </section>
    <?php endif; ?>
    <!-- akhiri artikel -->

    <!-- program unggulan -->
<?php if ($pengaturan['section_program_unggulan'] ?? 1) : ?>
<section id="featured-programs" class="featured-programs section">

  <!-- Section Title -->
  <div class="container section-title">
    <h2><?= $pengaturan['program_unggulan_title'] ?? 'Program Unggulan'; ?></h2>
    <p><?= $pengaturan['program_unggulan_desc'] ?? 'Pondok Pesantren Inggris Inovasi Bangsa menghadirkan program unggulan yang mengintegrasikan ilmu agama, bahasa, dan pengembangan diri untuk membentuk santri Qurani dan berdaya saing global.'; ?></p>
  </div>
  <!-- End Section Title -->

  <div class="container">
    <div class="featured-programs-wrapper">

      <!-- Overview Section -->
      <div class="programs-overview">
        <div class="overview-content">
          <h2><?= $pengaturan['overview_title'] ?? 'Pendidikan Karakter & Kompetensi Global'; ?></h2>
          <p><?= $pengaturan['overview_desc'] ?? 'Pondok Pesantren Inggris Inovasi Bangsa berkomitmen menyiapkan santri yang unggul dalam bahasa Inggris, berakhlak mulia, cinta Al-Qur’an, dan mampu berpikir kritis melalui pembelajaran terintegrasi antara agama dan sains.'; ?></p>
          <div class="overview-stats">
            <div class="stat-item">
              <span class="stat-number"><?= $pengaturan['overview_stats_1_num'] ?? '30+'; ?></span>
              <span class="stat-label"><?= $pengaturan['overview_stats_1_label'] ?? 'Santri Aktif'; ?></span>
            </div>
            <div class="stat-item">
              <span class="stat-number"><?= $pengaturan['overview_stats_2_num'] ?? '100%'; ?></span>
              <span class="stat-label"><?= $pengaturan['overview_stats_2_label'] ?? 'Bisa Baca Al-Qur\'an'; ?></span>
            </div>
            <div class="stat-item">
              <span class="stat-number"><?= $pengaturan['overview_stats_3_num'] ?? '4'; ?></span>
              <span class="stat-label"><?= $pengaturan['overview_stats_3_label'] ?? 'Program Unggulan'; ?></span>
            </div>
          </div>
        </div>
        <div class="overview-image">
          <?php if (!empty($pengaturan['overview_image'])) : ?>
            <img src="<?= base_url('uploads/' . $pengaturan['overview_image']); ?>" alt="Education" class="img-fluid">
          <?php else : ?>
            <img src="<?= base_url();?>homepage/img/gambar1.png" alt="Education" class="img-fluid">
          <?php endif; ?>
        </div>
      </div>

      <!-- Showcase Section -->
      <div class="programs-showcase">

        <!-- Featured Program -->
        <?php if (!empty($featured_program)) : ?>
        <div class="program-card featured-program">
          <div class="card-image">
            <img src="<?= base_url('uploads/program_unggulan/' . $featured_program['gambar']); ?>" alt="<?= $featured_program['judul']; ?>" class="img-fluid">
            <div class="program-badge">
              <i class="bi bi-star-fill"></i>
              <span>Program Utama</span>
            </div>
          </div>
          <div class="card-content">
            <div class="program-category"><?= $featured_program['kategori']; ?></div>
            <h3><?= $featured_program['judul']; ?></h3>
            <p><?= $featured_program['deskripsi']; ?></p>
            <div class="program-meta">
              <?php if ($featured_program['info_1']) : ?>
              <div class="meta-item">
                <i class="bi bi-clock"></i>
                <span><?= $featured_program['info_1']; ?></span>
              </div>
              <?php endif; ?>
              <?php if ($featured_program['info_2']) : ?>
              <div class="meta-item">
                <i class="bi bi-award"></i>
                <span><?= $featured_program['info_2']; ?></span>
              </div>
              <?php endif; ?>
            </div>
            <div class="card-footer">
              <a href="#" class="learn-more">Selengkapnya</a>
              <div class="enrollment">
                <i class="bi bi-people"></i>
                <span>150 santri</span>
              </div>
            </div>
          </div>
        </div>
        <?php endif; ?>

        <!-- Other Programs -->
        <div class="programs-list">
          <?php if (!empty($program_unggulan)) : ?>
            <?php foreach ($program_unggulan as $p) : ?>
            <div class="program-item">
              <div class="item-visual">
                <img src="<?= base_url('uploads/program_unggulan/' . $p['gambar']); ?>" alt="<?= $p['judul']; ?>" class="img-fluid">
              </div>
              <div class="item-details">
                <div class="item-category"><?= $p['kategori']; ?></div>
                <h4><?= $p['judul']; ?></h4>
                <p><?= $p['deskripsi']; ?></p>
                <div class="item-info">
                  <?php if ($p['info_1']) : ?><span><?= $p['info_1']; ?></span><?php endif; ?>
                  <?php if ($p['info_2']) : ?><span><?= $p['info_2']; ?></span><?php endif; ?>
                </div>
              </div>
              <div class="item-action">
                <i class="bi bi-arrow-right-circle"></i>
              </div>
            </div>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>

      </div>

    </div>
  </div>

</section>
<?php endif; ?>
<!-- akhir program unggulan -->



<!-- Call To Action Section -->
<?php if ($pengaturan['section_donasi'] ?? 1) : ?>
<section id="call-to-action" class="call-to-action section light-background">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-5">
        <div class="content-wrapper">
          <div class="badge">
            <i class="bi bi-building"></i>
            <span>Galang Dana Pembangunan</span>
          </div>

          <h2><?= $pengaturan['donasi_title'] ?? 'Bersama Membangun Masa Depan Pesantren'; ?></h2>

          <p>
            <?= $pengaturan['donasi_desc'] ?? 'Bantu kami mewujudkan gedung baru yang nyaman dan modern untuk mendukung proses belajar santri yang semakin berkualitas.'; ?>
          </p>

          <div class="highlight-stats">
            <div class="stat-group">
              <div class="stat-item">
                <span class="number">0</span>
                <span class="label">Donatur Peduli</span>
              </div>
              <div class="stat-item">
                <span class="number">Rp 0</span>
                <span class="label">Dana Terkumpul</span>
              </div>
            </div>
          </div>

          <div class="action-buttons">
            <button class="btn-primary" data-bs-toggle="modal" data-bs-target="#qrisModal">
              Donasi Sekarang
            </button>
            <a href="tentang.html" class="btn-secondary">
              <span>Pelajari Program Kami</span>
              <i class="bi bi-arrow-right"></i>
            </a>
          </div>
        </div>
      </div>

      <div class="col-lg-7">
        <div class="visual-section">
          <div class="main-image-container">
            <img src="<?= base_url();?>homepage/img/gambar3.jpeg" alt="Santri belajar" class="main-image">
            <div class="overlay-gradient"></div>
          </div>

          <div class="feature-cards">
            <div class="feature-card achievement">
              <div class="icon">
                <i class="bi bi-heart-fill"></i>
              </div>
              <div class="content">
                <h4>Donasi Tepat Sasaran</h4>
                <p>Dana langsung digunakan untuk pembangunan fasilitas</p>
              </div>
            </div>

            <div class="feature-card transparency">
              <div class="icon">
                <i class="bi bi-shield-check"></i>
              </div>
              <div class="content">
                <h4>Transparansi Laporan</h4>
                <p>Update progres pembangunan secara berkala</p>
              </div>
            </div>

            <div class="feature-card community">
              <div class="icon">
                <i class="bi bi-people-fill"></i>
              </div>
              <div class="content">
                <h4>Bergabung dengan Komunitas</h4>
                <p>Wujudkan perubahan bersama para donatur lainnya</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal QRIS -->
  <div class="modal fade" id="qrisModal" tabindex="-1" aria-labelledby="qrisModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content text-center p-4">
        <button type="button" class="btn-close ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
        <h5 id="qrisModalLabel" class="mb-3">Scan QRIS untuk Berdonasi</h5>

        <img src="<?= base_url();?>homepage/img/qris.jpeg" alt="QRIS Donasi" class="img-fluid rounded shadow" style="max-width: 300px; margin: auto;">

        <div class="mt-3">
          <a href="<?= base_url();?>homepage/img/qris.jpeg" download="QRIS_Pesantren_Inovasi_Bangsa.png" class="btn btn-outline-primary px-3 py-2 d-inline-flex align-items-center gap-2">
            <i class="bi bi-download"></i>
            Download QRIS
          </a>
        </div>

        <p class="mt-3 text-muted">Terima kasih atas dukungan dan kepedulian Anda 💖</p>

        <a href="https://wa.me/6289670161691?text=Halo%20admin,%20saya%20sudah%20melakukan%20donasi%20melalui%20QRIS.%20Berikut%20bukti%20konfirmasinya:"
           target="_blank"
           class="btn btn-success mt-3 px-4 py-2 d-inline-flex align-items-center gap-2">
          <i class="bi bi-whatsapp"></i>
          Konfirmasi via WhatsApp
        </a>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>
<!-- /Call To Action Section -->


<!-- Pengajar Section -->
<?php if ($pengaturan['section_guru'] ?? 1) : ?>
<section id="pengajar" class="testimonials section light-background">

  <!-- Section Title -->
  <div class="container section-title text-center">
    <h2><?= $pengaturan['guru_title'] ?? 'Ustadz & Ustadzah Pengajar'; ?></h2>
    <p><?= $pengaturan['guru_desc'] ?? 'Para pengajar yang berpengalaman dan berdedikasi dalam mendidik generasi penerus bangsa.'; ?></p>
  </div>
  <!-- End Section Title -->

  <div class="container">

    <div class="testimonials-slider swiper init-swiper">
      <script type="application/json" class="swiper-config">
        {
          "slidesPerView": 1,
          "loop": true,
          "speed": 600,
          "autoplay": {
            "delay": 2000
          },
          "navigation": {
            "nextEl": ".swiper-button-next",
            "prevEl": ".swiper-button-prev"
          },
          "breakpoints": {
            "768": {
              "slidesPerView": 2
            },
            "1200": {
              "slidesPerView": 3
            }
          }
        }
      </script>

      <div class="swiper-wrapper">
        <?php foreach ($pengajar as $p): ?>
          <div class="swiper-slide">
            <div class="testimonial-item text-center">
              <div class="featured-img-wrapper mb-3 d-flex justify-content-center">
                  <?php if (!empty($p['guru_foto'])) : ?>
                    <img src="<?= base_url('uploads/' . $p['guru_foto']); ?>" 
                        class="featured-img pengajar-foto shadow-sm" 
                        alt="<?= $p['guru_nama']; ?>" style="width: 100%; height: 300px; object-fit: cover; border-radius: 10px;">
                  <?php else : ?>
                    <img src="<?= base_url('homepage/img/pengajar/default.png'); ?>" 
                        class="featured-img pengajar-foto shadow-sm" 
                        alt="<?= $p['guru_nama']; ?>" style="width: 100%; height: 300px; object-fit: cover; border-radius: 10px;">
                  <?php endif; ?>
                </div>

              <h3 class="fw-bold"><?= $p['guru_nama']; ?></h3>
              <p class="mt-2 fst-italic">
                "<?= $p['guru_jabatan']; ?>"
              </p>
              <span class="text-muted small d-block">Pengajar Pesantren</span>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

      <!-- Navigation -->
      <div class="swiper-navigation w-100 d-flex align-items-center justify-content-center mt-3">
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
      </div>

    </div>

  </div>

</section>
<?php endif; ?>

<!-- /Pengajar Section -->


  </main>

  <!-- Announcement Modal -->
  <?php if (!empty($pengumuman)) : ?>
  <div class="modal fade" id="announcementModal" tabindex="-1" aria-labelledby="announcementModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="announcementModalLabel"><?= $pengumuman[0]['pengumuman_judul']; ?></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <?php if (!empty($pengumuman[0]['pengumuman_gambar'])) : ?>
                <img src="<?= base_url('uploads/pengumuman/' . $pengumuman[0]['pengumuman_gambar']); ?>" class="img-fluid mb-3 rounded" alt="Pengumuman">
            <?php endif; ?>
            <div class="announcement-content">
                <?= $pengumuman[0]['pengumuman_isi']; ?>
            </div>
            <small class="text-muted mt-3 d-block">Diposting pada: <?= date('d F Y', strtotime($pengumuman[0]['pengumuman_tanggal'])); ?></small>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>
  <?php endif; ?>


