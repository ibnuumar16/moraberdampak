<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tambah Halaman Baru</h4>
                        <p class="card-description">Halaman akan otomatis muncul di menu header website</p>
                        
                        <?php if (session()->getFlashdata('error')): ?>
                            <div class="alert alert-danger">
                                <?php foreach (session()->getFlashdata('error') as $error): ?>
                                    <?= $error; ?><br>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        
                        <form action="<?= base_url('dashboard/simpan_halaman'); ?>" method="POST">
                            <div class="form-group">
                                <label for="halaman_judul">Judul Halaman *</label>
                                <input type="text" class="form-control" id="halaman_judul" name="halaman_judul" placeholder="Contoh: Tentang Kami, Sejarah, dll" required>
                            </div>

                            <div class="form-group">
                                <label for="halaman_deskripsi">Deskripsi Singkat</label>
                                <input type="text" class="form-control" id="halaman_deskripsi" name="halaman_deskripsi" placeholder="Contoh: Informasi lengkap mengenai profil pesantren">
                                <small class="text-muted">Ditampilkan di bawah judul halaman.</small>
                            </div>
                            
                            <div class="form-group">
                                <label for="halaman_jenis">Jenis Halaman</label>
                                <?php $jenis = request()->getGet('jenis'); ?>
                                <select class="form-control" id="halaman_jenis" name="halaman_jenis">
                                    <option value="profil" <?= $jenis == 'profil' ? 'selected' : ''; ?>>Profil (Dropdown Menu)</option>
                                    <option value="page" <?= $jenis == 'page' ? 'selected' : ''; ?>>Page (Menu Atas)</option>
                                </select>
                                <small class="text-muted">
                                    <b>Profil:</b> Muncul di dalam dropdown menu "Profil".<br>
                                    <b>Page:</b> Muncul sebagai menu utama di header (sebelah Home/Profil).
                                </small>
                            </div>

                            <div class="form-group">
                                <label for="halaman_slug">Slug URL *</label>
                                <input type="text" class="form-control" id="halaman_slug" name="halaman_slug" placeholder="tentang-kami" required>
                                <small class="form-text text-muted">
                                    Slug untuk URL. Contoh: tentang-kami → <code><?= base_url('halaman/tentang-kami'); ?></code><br>
                                    Gunakan huruf kecil dan tanda hubung (-), tanpa spasi. Contoh: sejarah-pesantren
                                </small>
                            </div>
                            
                            <div class="form-group">
                                <label for="halaman_konten">Konten Halaman *</label>
                                <textarea class="form-control" id="editor" name="halaman_konten" rows="15" placeholder="Masukkan konten halaman..." required></textarea>
                                <small class="form-text text-muted">Konten halaman dalam format HTML. Bisa copy paste dari editor rich text.</small>
                                <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
                                <script>
                                    CKEDITOR.replace('editor');
                                </script>
                            </div>
                            
                            <button type="submit" class="btn btn-primary mr-2">Simpan & Tambahkan ke Menu</button>
                            <a href="<?= base_url('dashboard/halaman'); ?>" class="btn btn-light">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Auto-generate slug dari judul
document.getElementById('halaman_judul').addEventListener('input', function() {
    const judul = this.value;
    const slug = judul.toLowerCase()
        .replace(/[^a-z0-9\s-]/g, '') // Remove special chars
        .replace(/\s+/g, '-') // Replace spaces with -
        .replace(/-+/g, '-'); // Replace multiple - with single -
    
    // Only auto-fill if slug is empty
    if (document.getElementById('halaman_slug').value === '') {
        document.getElementById('halaman_slug').value = slug;
    }
});
</script>
