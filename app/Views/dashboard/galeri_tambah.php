<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Upload Foto Galeri</h4>
                        <p class="card-description">Upload multiple foto dengan kategori gedung atau kegiatan</p>
                        
                        <?php if (session()->getFlashdata('error')): ?>
                            <div class="alert alert-danger"><?= session()->getFlashdata('error'); ?></div>
                        <?php endif; ?>
                        
                        <form action="<?= base_url('dashboard/simpan_galeri'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="galeri_judul">Judul/Caption *</label>
                                <input type="text" class="form-control" id="galeri_judul" name="galeri_judul" placeholder="Masukkan judul/deskripsi foto" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="galeri_kategori">Kategori *</label>
                                <select class="form-control" id="galeri_kategori" name="galeri_kategori" required>
                                    <option value="">-- Pilih Kategori --</option>
                                    <option value="gedung">Gedung</option>
                                    <option value="kegiatan">Kegiatan</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label>Upload Foto * (Bisa pilih multiple)</label>
                                <input type="file" class="form-control" name="galeri_foto[]" accept="image/*" multiple required>
                                <small class="form-text text-muted">Format: JPG, JPEG, PNG. Bisa upload multiple foto sekaligus.</small>
                            </div>
                            
                            <button type="submit" class="btn btn-primary mr-2">Upload</button>
                            <a href="<?= base_url('dashboard/galeri'); ?>" class="btn btn-light">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
