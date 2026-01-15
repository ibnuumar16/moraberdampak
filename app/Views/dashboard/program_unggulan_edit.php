<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><?= $title; ?></h4>
            <form class="forms-sample" action="<?= base_url('dashboard/program_unggulan_update/' . $program['id']); ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <label>Judul Program</label>
                    <input type="text" class="form-control" name="judul" value="<?= $program['judul']; ?>" required>
                </div>
                <div class="form-group">
                    <label>Kategori</label>
                    <input type="text" class="form-control" name="kategori" value="<?= $program['kategori']; ?>" required>
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" rows="4" required><?= $program['deskripsi']; ?></textarea>
                </div>
                <div class="form-group">
                    <label>Info Tambahan 1 (Opsional)</label>
                    <input type="text" class="form-control" name="info_1" value="<?= $program['info_1']; ?>">
                </div>
                <div class="form-group">
                    <label>Info Tambahan 2 (Opsional)</label>
                    <input type="text" class="form-control" name="info_2" value="<?= $program['info_2']; ?>">
                </div>
                <div class="form-group">
                    <label>Gambar (Biarkan kosong jika tidak ingin mengganti)</label>
                    <input type="file" name="gambar" class="form-control file-upload-info">
                    <?php if ($program['gambar']) : ?>
                        <div class="mt-2">
                            <img src="<?= base_url('uploads/program_unggulan/' . $program['gambar']); ?>" alt="Current Image" style="width: 150px;">
                        </div>
                    <?php endif; ?>
                </div>
                <div class="form-check form-check-flat form-check-primary">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="is_featured" value="1" <?= $program['is_featured'] ? 'checked' : ''; ?>>
                        Jadikan Program Utama (Featured)
                    </label>
                </div>
                <button type="submit" class="btn btn-primary mr-2">Update</button>
                <a href="<?= base_url('dashboard/program_unggulan'); ?>" class="btn btn-light">Batal</a>
            </form>
        </div>
    </div>
</div>
