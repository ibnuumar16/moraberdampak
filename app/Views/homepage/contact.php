<main class="main">

  <!-- Page Title -->
  <div class="page-title" data-aos="fade">
    <div class="heading">
      <div class="container">
        <div class="row d-flex justify-content-center text-center">
          <div class="col-lg-8">
            <h1 class="">Hubungi Kami</h1>
            <p class="mb-0">Kami siap melayani Anda. Silakan hubungi kami untuk informasi lebih lanjut mengenai pendaftaran, program pendidikan, atau kerjasama.</p>
          </div>
        </div>
      </div>
    </div>
  </div><!-- End Page Title -->

  <!-- Contact Section -->
  <section id="contact" class="contact section">

    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <div class="row gy-4 mb-5 justify-content-center">

        <div class="col-lg-4 col-md-6">
          <div class="info-card d-flex flex-column align-items-center text-center p-4 h-100" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-wrapper mb-4">
                <i class="bi bi-geo-alt"></i>
            </div>
            <h3>Alamat</h3>
            <p><?= $pengaturan['alamat'] ?? 'Alamat belum diatur'; ?></p>
          </div>
        </div><!-- End Info Card -->

        <div class="col-lg-4 col-md-6">
          <div class="info-card d-flex flex-column align-items-center text-center p-4 h-100" data-aos="fade-up" data-aos-delay="300">
            <div class="icon-wrapper mb-4">
                <i class="bi bi-telephone"></i>
            </div>
            <h3>Telepon / WhatsApp</h3>
            <p class="mb-1">
                <a href="https://wa.me/<?= preg_replace('/[^0-9]/', '', $pengaturan['telepon'] ?? ''); ?>" target="_blank" class="text-decoration-none text-dark">
                    <?= $pengaturan['telepon'] ?? '-'; ?>
                </a>
            </p>
            <small class="text-muted">Senin - Sabtu, 08:00 - 16:00 WIB</small>
          </div>
        </div><!-- End Info Card -->

        <div class="col-lg-4 col-md-6">
          <div class="info-card d-flex flex-column align-items-center text-center p-4 h-100" data-aos="fade-up" data-aos-delay="400">
            <div class="icon-wrapper mb-4">
                <i class="bi bi-envelope"></i>
            </div>
            <h3>Email</h3>
            <p>
                <a href="mailto:<?= $pengaturan['email'] ?? ''; ?>" class="text-decoration-none text-dark">
                    <?= $pengaturan['email'] ?? '-'; ?>
                </a>
            </p>
            <small class="text-muted">Kirimkan pertanyaan Anda kapan saja</small>
          </div>
        </div><!-- End Info Card -->

      </div>

      <div class="row gy-4 mt-3">

        <div class="col-lg-6" data-aos="fade-right" data-aos-delay="300">
            <div class="map-container shadow-sm rounded overflow-hidden h-100 position-relative">
                <?php if (!empty($pengaturan['link_maps'])): ?>
                    <!-- Map Logic -->
                    <?php if (strpos($pengaturan['link_maps'], '<iframe') !== false): ?>
                        <div class="ratio ratio-16x9 h-100">
                            <?= $pengaturan['link_maps']; ?>
                        </div>
                    <?php elseif (strpos($pengaturan['link_maps'], 'google.com/maps/embed') !== false): ?>
                        <iframe src="<?= $pengaturan['link_maps']; ?>" class="w-100 h-100 border-0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" style="min-height: 400px;"></iframe>
                    <?php else: ?>
                        <div class="d-flex align-items-center justify-content-center bg-light h-100 p-5 text-center">
                            <div>
                                <i class="bi bi-map fs-1 text-muted mb-3"></i>
                                <h5>Lokasi Pesantren</h5>
                                <a href="<?= $pengaturan['link_maps']; ?>" target="_blank" class="btn btn-primary mt-2">
                                    <i class="bi bi-box-arrow-up-right me-2"></i> Buka di Google Maps
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php else: ?>
                    <div class="d-flex align-items-center justify-content-center bg-light h-100 p-5">
                        <p class="text-muted">Lokasi belum diatur.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="col-lg-6" data-aos="fade-left" data-aos-delay="400">
            <div class="social-card h-100 p-5 d-flex flex-column justify-content-center shadow-sm rounded bg-white">
                <h3 class="fw-bold mb-4">Terhubung Dengan Kami</h3>
                <p class="text-muted mb-5">Ikuti perkembangan terbaru dan kegiatan santri melalui media sosial resmi kami. Jangan lewatkan informasi menarik lainnya!</p>
                
                <div class="row g-3">
                    <?php if (!empty($pengaturan['link_facebook'])): ?>
                    <div class="col-sm-6">
                        <a href="<?= $pengaturan['link_facebook']; ?>" target="_blank" class="social-btn facebook d-flex align-items-center p-3 rounded text-decoration-none">
                            <i class="bi bi-facebook fs-4 me-3"></i>
                            <span class="fw-medium">Facebook</span>
                        </a>
                    </div>
                    <?php endif; ?>
                    
                    <?php if (!empty($pengaturan['link_instagram'])): ?>
                    <div class="col-sm-6">
                        <a href="<?= $pengaturan['link_instagram']; ?>" target="_blank" class="social-btn instagram d-flex align-items-center p-3 rounded text-decoration-none">
                            <i class="bi bi-instagram fs-4 me-3"></i>
                            <span class="fw-medium">Instagram</span>
                        </a>
                    </div>
                    <?php endif; ?>
                    
                    <?php if (!empty($pengaturan['link_youtube'])): ?>
                    <div class="col-sm-6">
                        <a href="<?= $pengaturan['link_youtube']; ?>" target="_blank" class="social-btn youtube d-flex align-items-center p-3 rounded text-decoration-none">
                            <i class="bi bi-youtube fs-4 me-3"></i>
                            <span class="fw-medium">YouTube</span>
                        </a>
                    </div>
                    <?php endif; ?>
                    
                    <?php if (!empty($pengaturan['link_twitter'])): ?>
                    <div class="col-sm-6">
                        <a href="<?= $pengaturan['link_twitter']; ?>" target="_blank" class="social-btn twitter d-flex align-items-center p-3 rounded text-decoration-none">
                            <i class="bi bi-twitter fs-4 me-3"></i>
                            <span class="fw-medium">Twitter</span>
                        </a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

      </div>

    </div>

  </section><!-- /Contact Section -->

</main>

<style>
/* Custom Styles for Contact Page */
.page-title {
    background-color: var(--surface-color);
    padding: 60px 0;
}

.info-card {
    background: #fff;
    border-radius: 15px;
    box-shadow: 0 5px 25px rgba(0,0,0,0.05);
    transition: all 0.3s ease;
    border: 1px solid rgba(0,0,0,0.03);
}

.info-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 30px rgba(0,0,0,0.1);
}

.info-card .icon-wrapper {
    width: 70px;
    height: 70px;
    background: var(--accent-color);
    color: #fff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 28px;
    margin-bottom: 20px;
    box-shadow: 0 8px 16px rgba(var(--accent-color-rgb), 0.3);
}

.info-card h3 {
    font-size: 20px;
    font-weight: 700;
    margin-bottom: 10px;
    color: var(--heading-color);
}

.info-card p {
    color: var(--default-color);
    font-size: 15px;
}

.social-card {
    background: #fff;
}

.social-btn {
    transition: all 0.3s ease;
    border: 1px solid #eee;
}

.social-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.08);
}

.social-btn.facebook { color: #1877F2; background: rgba(24, 119, 242, 0.05); }
.social-btn.facebook:hover { background: #1877F2; color: #fff; }

.social-btn.instagram { color: #E4405F; background: rgba(228, 64, 95, 0.05); }
.social-btn.instagram:hover { background: #E4405F; color: #fff; }

.social-btn.youtube { color: #FF0000; background: rgba(255, 0, 0, 0.05); }
.social-btn.youtube:hover { background: #FF0000; color: #fff; }

.social-btn.twitter { color: #1DA1F2; background: rgba(29, 161, 242, 0.05); }
.social-btn.twitter:hover { background: #1DA1F2; color: #fff; }

.map-container {
    min-height: 400px;
}
</style>
