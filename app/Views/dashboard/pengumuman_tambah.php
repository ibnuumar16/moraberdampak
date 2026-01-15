<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tambah Pengumuman</h4>
                        <p class="card-description"> Buat pengumuman baru </p>

                        <?php if (session()->getFlashdata('error')) : ?>
                            <div class="alert alert-danger">
                                <?= implode('<br>', session()->getFlashdata('error')); ?>
                            </div>
                        <?php endif; ?>

                        <form class="forms-sample" action="<?= base_url('/dashboard/simpan_pengumuman'); ?>" method="POST" enctype="multipart/form-data">
                            
                            <div class="form-group">
                                <label for="pengumumanJudul">Judul Pengumuman</label>
                                <input type="text" class="form-control" id="pengumumanJudul" name="pengumuman_judul" placeholder="Contoh: Libur Hari Raya Idul Fitri" required>
                            </div>

                            <div class="form-group">
                                <label for="pengumumanTanggal">Tanggal</label>
                                <input type="date" class="form-control" id="pengumumanTanggal" name="pengumuman_tanggal" value="<?= date('Y-m-d'); ?>" required>
                            </div>

                            <div class="form-group">
                                <label>Gambar (Opsional)</label>
                                <input type="file" class="form-control file-upload-info" name="pengumuman_gambar">
                            </div>

                            <div class="form-group">
                                <label for="pengumumanIsi">Isi Pengumuman</label>
                                <textarea class="form-control" id="pengumumanIsi" name="pengumuman_isi" rows="6" placeholder="Tulis isi pengumuman di sini..." required></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary me-2">Simpan</button>
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
