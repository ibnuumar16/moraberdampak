<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Pengumuman</h4>
                        <p class="card-description"> Perbarui data pengumuman </p>

                        <?php if (session()->getFlashdata('error')) : ?>
                            <div class="alert alert-danger">
                                <?= implode('<br>', session()->getFlashdata('error')); ?>
                            </div>
                        <?php endif; ?>

                        <form class="forms-sample" action="<?= base_url('/dashboard/update_pengumuman/' . $pengumuman['pengumuman_id']); ?>" method="POST" enctype="multipart/form-data">
                            
                            <div class="form-group">
                                <label for="pengumumanJudul">Judul Pengumuman</label>
                                <input type="text" class="form-control" id="pengumumanJudul" name="pengumuman_judul" value="<?= $pengumuman['pengumuman_judul']; ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="pengumumanTanggal">Tanggal</label>
                                <input type="date" class="form-control" id="pengumumanTanggal" name="pengumuman_tanggal" value="<?= $pengumuman['pengumuman_tanggal']; ?>" required>
                            </div>

                            <div class="form-group">
                                <label>Gambar (Opsional)</label>
                                <input type="file" class="form-control file-upload-info" name="pengumuman_gambar">
                                <?php if (!empty($pengumuman['pengumuman_gambar'])) : ?>
                                    <small>Saat ini: <strong><?= $pengumuman['pengumuman_gambar']; ?></strong></small>
                                    <img src="<?= base_url('uploads/pengumuman/' . $pengumuman['pengumuman_gambar']); ?>" width="150" class="d-block mt-2">
                                <?php endif; ?>
                            </div>

                            <div class="form-group">
                                <label for="pengumumanIsi">Isi Pengumuman</label>
                                <textarea class="form-control" id="pengumumanIsi" name="pengumuman_isi" rows="6" required><?= $pengumuman['pengumuman_isi']; ?></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary me-2">Simpan Perubahan</button>
                            <a href="<?= base_url('dashboard/pengumuman'); ?>" class="btn btn-light">Batal</a>
                        </form>
                        
                        <script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
                        <script>
                            CKEDITOR.replace('pengumumanIsi');
                        </script>

                    </div>
                </div>
            </div>
        </div>
    </div>
