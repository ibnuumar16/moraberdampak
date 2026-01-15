<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Halaman</h4>
                        <p class="card-description">Edit konten halaman website</p>
                        
                        <?php if (session()->getFlashdata('error')): ?>
                            <div class="alert alert-danger">
                                <?php foreach (session()->getFlashdata('error') as $error): ?>
                                    <?= $error; ?><br>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        
                        <form action="<?= base_url('dashboard/update_halaman/' . $halaman['halaman_id']); ?>" method="POST">
                            <div class="form-group">
                                <label for="halaman_judul">Judul Halaman *</label>
                                <input type="text" class="form-control" id="halaman_judul" name="halaman_judul" value="<?= esc($halaman['halaman_judul']); ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="halaman_deskripsi">Deskripsi Singkat</label>
                                <input type="text" class="form-control" id="halaman_deskripsi" name="halaman_deskripsi" value="<?= esc($halaman['halaman_deskripsi'] ?? ''); ?>" placeholder="Contoh: Informasi lengkap mengenai profil pesantren">
                                <small class="text-muted">Ditampilkan di bawah judul halaman.</small>
                            </div>
                            
                            <div class="form-group">
                                <label for="halaman_jenis">Jenis Halaman</label>
                                <select class="form-control" id="halaman_jenis" name="halaman_jenis">
                                    <option value="profil" <?= $halaman['halaman_jenis'] == 'profil' ? 'selected' : ''; ?>>Profil (Dropdown Menu)</option>
                                    <option value="page" <?= $halaman['halaman_jenis'] == 'page' ? 'selected' : ''; ?>>Page (Menu Atas)</option>
                                </select>
                                <small class="text-muted">
                                    <b>Profil:</b> Muncul di dalam dropdown menu "Profil".<br>
                                    <b>Page:</b> Muncul sebagai menu utama di header (sebelah Home/Profil).
                                </small>
                            </div>

                            <div class="form-group">
                                <label for="halaman_slug">Slug URL *</label>
                                <input type="text" class="form-control" id="halaman_slug" name="halaman_slug" value="<?= esc($halaman['halaman_slug']); ?>" readonly>
                                <small class="form-text text-muted">Slug tidak dapat diubah untuk menjaga konsistensi link.</small>
                            </div>
                            
                            <div class="form-group">
                                <label for="halaman_konten">Konten Halaman *</label>
                                <textarea class="form-control" id="editor" name="halaman_konten" rows="15" required><?= esc($halaman['halaman_konten']); ?></textarea>
                                <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
                                <script>
                                    CKEDITOR.replace('editor');
                                </script>
                            </div>
                            
                            <button type="submit" class="btn btn-primary mr-2">Simpan Perubahan</button>
                            <a href="<?= base_url('dashboard/halaman'); ?>" class="btn btn-light">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

