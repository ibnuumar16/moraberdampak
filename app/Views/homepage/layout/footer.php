<footer class="bg-dark text-light pt-4 pb-3">
  <div class="container">
    <div class="row gy-4">
      <!-- Kolom 1 -->
      <div class="col-md-5 text-center text-md-start">
        <!-- Logo: Full width di mobile, kecil di desktop -->
        <div class="mb-3">
          <?php if (!empty($pengaturan['logo_web'])) : ?>
            <img src="<?= base_url('uploads/' . $pengaturan['logo_web']); ?>" alt="Logo Pesantren" class="img-fluid w-100 w-md-auto" style="max-height: 80px;">
          <?php else : ?>
            <img src="<?= base_url();?>homepage/img/logo.png" alt="Logo Pesantren" class="img-fluid w-100 w-md-auto">
          <?php endif; ?>
        </div>
        <p class="fs-6 mb-2">
          <?= !empty($pengaturan['deskripsi']) ? esc($pengaturan['deskripsi']) : 'Membangun generasi muslim unggul melalui pendidikan berbasis nilai Islami dan pengembangan karakter.'; ?>
        </p>
        <ul class="list-unstyled fs-6 mb-0">
          <li><i class="bi bi-geo-alt-fill me-2"></i><?= !empty($pengaturan['alamat']) ? esc($pengaturan['alamat']) : 'Alamat belum diatur'; ?></li>
          <li><i class="bi bi-telephone-fill me-2"></i><?= !empty($pengaturan['telepon']) ? esc($pengaturan['telepon']) : '-'; ?></li>
          <li><i class="bi bi-envelope-fill me-2"></i><?= !empty($pengaturan['email']) ? esc($pengaturan['email']) : '-'; ?></li>
        </ul>
      </div>

      <!-- Kolom 2 -->
      <div class="col-md-3 text-center text-md-start ">
        <h6 class="fw-bold text-success mb-2 fs-5">Menu Utama</h6>
        <ul class="list-unstyled mb-0 fs-6">
          <li><a href="<?= base_url(); ?>" class="text-light text-decoration-none d-block py-1">Beranda</a></li>
          <li><a href="<?= base_url('halaman/tentang-kami'); ?>" class="text-light text-decoration-none d-block py-1">Tentang Kami</a></li>
          <li><a href="<?= base_url('home/pendidikan_pesantren'); ?>" class="text-light text-decoration-none d-block py-1">Program Pendidikan</a></li>
          <li><a href="<?= base_url('home/pendaftaran'); ?>" class="text-light text-decoration-none d-block py-1">Pendaftaran Santri</a></li>
          <li><a href="<?= base_url('home/artikel'); ?>" class="text-light text-decoration-none d-block py-1">Artikel & Berita</a></li>
          <li><a href="<?= base_url('home/contact'); ?>" class="text-light text-decoration-none d-block py-1">Kontak</a></li>
        </ul>
      </div>

      <!-- Kolom 3 -->
      <div class="col-md-4 text-center text-md-start">
        <h6 class="fw-bold text-success mb-2 fs-5">Lokasi Pesantren</h6>
        <div class="ratio ratio-16x9 rounded overflow-hidden">
          <?php if (!empty($pengaturan['link_maps'])): ?>
              <?php if (strpos($pengaturan['link_maps'], '<iframe') !== false): ?>
                  <?= $pengaturan['link_maps']; ?>
              <?php elseif (strpos($pengaturan['link_maps'], 'google.com/maps/embed') !== false): ?>
                   <iframe src="<?= $pengaturan['link_maps']; ?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              <?php else: ?>
                  <!-- Fallback for normal links -->
                  <div class="d-flex align-items-center justify-content-center bg-light h-100">
                      <a href="<?= $pengaturan['link_maps']; ?>" target="_blank" class="btn btn-primary">
                          <i class="bi bi-map me-2"></i> Buka di Google Maps
                      </a>
                  </div>
              <?php endif; ?>
          <?php else: ?>
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.8524717297214!2d110.41782177532535!3d-7.805438292214887!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a57715b5133cd%3A0x147b89c972a1675c!2sPondok%20Pesantren%20Inggris%20Inovasi%20Bangsa!5e0!3m2!1sid!2sid!4v1761326924200!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <hr class="border-secondary mt-4 mb-3">

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center text-center text-md-start fs-6">
      <p class="mb-2 mb-md-0">&copy; <?= date('Y'); ?> <strong><?= !empty($pengaturan['nama']) ? esc($pengaturan['nama']) : 'PP. Inggris Inovasi Bangsa'; ?></strong>. Semua hak cipta dilindungi x moragister.</p>
      <div>
        <?php if (!empty($pengaturan['link_facebook'])): ?>
        <a href="<?= $pengaturan['link_facebook']; ?>" class="text-light me-3" target="_blank"><i class="bi bi-facebook"></i> Facebook</a>
        <?php endif; ?>
        <?php if (!empty($pengaturan['link_instagram'])): ?>
        <a href="<?= $pengaturan['link_instagram']; ?>" class="text-light me-3" target="_blank"><i class="bi bi-instagram"></i> Instagram</a>
        <?php endif; ?>
  <!-- Vendor JS Files -->
  <script src="<?= base_url();?>homepage/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url();?>homepage/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?= base_url();?>homepage/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?= base_url();?>homepage/js/main.js"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Check if Bootstrap is loaded
      if (typeof bootstrap !== 'undefined') {
          var myModalEl = document.getElementById('announcementModal');
          if (myModalEl) {
              var myModal = new bootstrap.Modal(myModalEl);
              var trigger = document.getElementById('announcementTrigger');

              // Auto show if image exists
              <?php if (!empty($pengumuman) && !empty($pengumuman[0]['pengumuman_gambar'])) : ?>
                  myModal.show();
              <?php endif; ?>

              if (trigger) {
                  trigger.addEventListener('click', function(e) {
                      e.preventDefault();
                      myModal.show();
                  });
              }
          }
      } else {
          console.error('Bootstrap is not loaded');
      }
    });
  </script>

</body>

</html>