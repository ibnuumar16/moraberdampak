<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="card-title">Galeri Foto</h4>
                            <a href="<?= base_url('dashboard/tambah_galeri'); ?>" class="btn btn-primary">
                                <i class="bi bi-plus-circle"></i> Upload Foto
                            </a>
                        </div>
                        
                        <?php if (session()->getFlashdata('success')): ?>
                            <div class="alert alert-success mt-3"><?= session()->getFlashdata('success'); ?></div>
                        <?php endif; ?>
                        
                        <div class="row mt-4">
                            <?php if (empty($galeri)): ?>
                                <div class="col-12 text-center">
                                    <p class="text-muted">Belum ada foto di galeri</p>
                                </div>
                            <?php else: ?>
                                <?php foreach ($galeri as $g): ?>
                                <div class="col-md-3 mb-4">
                                    <div class="card h-100">
                                        <img src="<?= base_url('uploads/galeri/' . esc($g['galeri_foto'])); ?>" class="card-img-top" style="height: 200px; object-fit: cover;" alt="<?= esc($g['galeri_judul']); ?>">
                                        <div class="card-body">
                                            <h6 class="card-title"><?= esc($g['galeri_judul']); ?></h6>
                                            <p class="card-text">
                                                <span class="badge <?= $g['galeri_kategori'] == 'gedung' ? 'badge-info' : 'badge-success'; ?>">
                                                    <?= ucfirst($g['galeri_kategori']); ?>
                                                </span>
                                            </p>
                                            <div class="btn-group btn-group-sm" role="group">
                                                <a href="<?= base_url('dashboard/edit_galeri/' . $g['galeri_id']); ?>" class="btn btn-warning">Edit</a>
                                                <a href="<?= base_url('dashboard/hapus_galeri/' . $g['galeri_id']); ?>" class="btn btn-danger" data-confirm="Yakin ingin menghapus foto ini?">Hapus</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
