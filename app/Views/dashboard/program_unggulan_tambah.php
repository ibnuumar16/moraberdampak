<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><?= $title; ?></h4>
            <form class="forms-sample" action="<?= base_url('dashboard/program_unggulan_simpan'); ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <label>Judul Program</label>
                    <input type="text" class="form-control" name="judul" placeholder="Contoh: Pengembangan Bahasa Inggris" required>
                </div>
                <div class="form-group">
                    <label>Kategori</label>
                    <input type="text" class="form-control" name="kategori" placeholder="Contoh: Bahasa, Tahfidz, Literasi" required>
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" rows="4" required></textarea>
                </div>
                <div class="form-group">
                    <label>Info Tambahan 1 (Opsional)</label>
                    <input type="text" class="form-control" name="info_1" placeholder="Contoh: 4 Tahun / Berjenjang">
                </div>
                <div class="form-group">
                    <label>Info Tambahan 2 (Opsional)</label>
                    <input type="text" class="form-control" name="info_2" placeholder="Contoh: Beasiswa TOEFL / Sertifikat">
                </div>
                <div class="form-group">
                    <label>Gambar</label>
                    <input type="file" name="gambar" class="form-control file-upload-info" required>
                </div>
                <div class="form-check form-check-flat form-check-primary">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="is_featured" value="1">
                        Jadikan Program Utama (Featured)
                    </label>
                </div>
                <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                <a href="<?= base_url('dashboard/program_unggulan'); ?>" class="btn btn-light">Batal</a>
            </form>
        </div>
    </div>
</div>
