<main class="main">

  <!-- Page Title -->
  <!-- Page Title -->
  <div class="container section-title text-center" style="margin-top: 40px;">
    <h2>Galeri Pesantren</h2>
    <p>Dokumentasi kegiatan, fasilitas, dan momen-momen berharga di lingkungan pesantren.</p>
  </div><!-- End Page Title -->

  <!-- Galeri Section -->
  <section id="galeri" class="galeri section">
    <div class="container">

      <!-- Filter Buttons -->
      <div class="row justify-content-center mb-4">
        <div class="col-lg-8 text-center">
          <div class="galeri-filters">
            <button class="filter-btn active" data-filter="*">Semua</button>
            <button class="filter-btn" data-filter=".gedung">Gedung</button>
            <button class="filter-btn" data-filter=".kegiatan">Kegiatan</button>
          </div>
        </div>
      </div>

      <!-- Galeri Grid -->
      <div class="row galeri-container gy-4">

        <?php if (empty($galeri)): ?>
          <div class="col-12 text-center">
            <p class="text-muted">Belum ada foto di galeri</p>
          </div>
        <?php else: ?>

          <?php foreach ($galeri as $item): ?>
          <div class="col-lg-4 col-md-6 galeri-item <?= esc($item['galeri_kategori']); ?>">
            <div class="galeri-wrap">
              <img src="<?= base_url('uploads/galeri/' . esc($item['galeri_foto'])); ?>" class="img-fluid galeri-img" alt="<?= esc($item['galeri_judul']); ?>">
              <div class="galeri-info">
                <h4><?= esc($item['galeri_judul']); ?></h4>
                <p class="mb-0"><span class="badge bg-primary"><?= ucfirst($item['galeri_kategori']); ?></span></p>
                <div class="galeri-links">
                  <a href="<?= base_url('uploads/galeri/' . esc($item['galeri_foto'])); ?>" class="galeri-lightbox" data-gallery="galeri-<?= $item['galeri_kategori']; ?>" title="<?= esc($item['galeri_judul']); ?>">
                    <i class="bi bi-zoom-in"></i>
                  </a>
                </div>
              </div>
            </div>
          </div><!-- End Galeri Item -->
          <?php endforeach; ?>

        <?php endif; ?>

      </div><!-- End Galeri Container -->

      <!-- Pagination -->
      <div class="row mt-4">
        <div class="col-12">
          <?= $pager->links('galeri', 'default_full') ?>
        </div>
      </div>

    </div>
  </section><!-- /Galeri Section -->

</main>

<!-- Include GLightbox CSS & JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" />
<script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>

<style>
.galeri-filters {
  padding: 0;
  margin: 0 0 40px 0;
}

.galeri-filters .filter-btn {
  font-size: 14px;
  font-weight: 600;
  color: #555;
  margin: 0 10px;
  padding: 8px 20px;
  border: 2px solid #ddd;
  border-radius: 50px;
  background: white;
  cursor: pointer;
  transition: all 0.3s;
}

.galeri-filters .filter-btn:hover,
.galeri-filters .filter-btn.active {
  background: #4154f1;
  color: white;
  border-color: #4154f1;
}

.galeri-container {
  transition: all 0.3s ease-in-out;
}

.galeri-item {
  animation: fadeInUp 0.5s ease-in-out;
  margin-bottom: 30px;
}

@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.galeri-item.hide {
  display: none;
}

.galeri-wrap {
  position: relative;
  overflow: hidden;
  border-radius: 10px;
  box-shadow: 0 4px 16px rgba(1, 41, 112, 0.1);
  transition: transform 0.3s ease-in-out;
  background: #fff;
}

.galeri-wrap:hover {
  transform: translateY(-10px);
  box-shadow: 0 8px 24px rgba(1, 41, 112, 0.15);
}

.galeri-wrap .galeri-img {
  width: 100%;
  height: 300px;
  object-fit: cover;
  transition: transform 0.5s;
}

.galeri-wrap:hover .galeri-img {
  transform: scale(1.1);
}

.galeri-wrap .galeri-info {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  background: linear-gradient(to top, rgba(0, 0, 0, 0.8), transparent);
  color: white;
  padding: 20px;
  transition: all 0.3s;
  opacity: 0;
  transform: translateY(20px);
}

.galeri-wrap:hover .galeri-info {
  opacity: 1;
  transform: translateY(0);
}

.galeri-wrap .galeri-info h4 {
  font-size: 18px;
  font-weight: 700;
  margin-bottom: 5px;
  color: white;
}

.galeri-wrap .galeri-info .badge {
  font-size: 12px;
  padding: 5px 10px;
}

.galeri-wrap .galeri-links {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  opacity: 0;
  transition: all 0.3s;
}

.galeri-wrap:hover .galeri-links {
  opacity: 1;
}

.galeri-wrap .galeri-links a {
  color: white;
  font-size: 28px;
  background: rgba(65, 84, 241, 0.9);
  width: 60px;
  height: 60px;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  border-radius: 50%;
  transition: all 0.3s;
}

.galeri-wrap .galeri-links a:hover {
  background: rgba(65, 84, 241, 1);
  transform: scale(1.1);
}
</style>

<script>
// Initialize GLightbox
const lightbox = GLightbox({
  selector: '.galeri-lightbox',
  touchNavigation: true,
  loop: true,
  autoplayVideos: true
});

// Filter functionality
document.addEventListener('DOMContentLoaded', function() {
  const filterBtns = document.querySelectorAll('.filter-btn');
  const galeriItems = document.querySelectorAll('.galeri-item');

  filterBtns.forEach(btn => {
    btn.addEventListener('click', function() {
      // Remove active class from all buttons
      filterBtns.forEach(b => b.classList.remove('active'));
      // Add active class to clicked button
      this.classList.add('active');

      const filter = this.getAttribute('data-filter');

      galeriItems.forEach(item => {
        if (filter === '*' || item.classList.contains(filter.substring(1))) {
          item.classList.remove('hide');
          item.style.display = 'block';
        } else {
          item.classList.add('hide');
          item.style.display = 'none';
        }
      });
    });
  });
});
</script>
