<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="card-title"><?= $title; ?></h4>
                            <a href="<?= base_url('dashboard/tambah_halaman' . (isset($jenis_halaman) ? '?jenis=' . $jenis_halaman : '')); ?>" class="btn btn-primary">
                                <i class="bi bi-plus-circle"></i> Tambah Baru
                            </a>
                        </div>
                        <p class="card-description">Halaman yang dibuat akan otomatis muncul di menu header website</p>
                        
                        <?php if (session()->getFlashdata('success')): ?>
                            <div class="alert alert-success mt-3"><?= session()->getFlashdata('success'); ?></div>
                        <?php endif; ?>
                        
                        <div class="table-responsive mt-3">
                            <table id="myTable" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Judul Halaman</th>
                                        <th>Slug (URL)</th>
                                        <th>Link</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($halaman)): ?>
                                        <tr>
                                            <td colspan="5" class="text-center">Belum ada halaman</td>
                                        </tr>
                                    <?php else: ?>
                                        <?php $no = 1; ?>
                                        <?php foreach ($halaman as $h): ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= esc($h['halaman_judul']); ?></td>
                                                <td><code><?= esc($h['halaman_slug']); ?></code></td>
                                                <td>
                                                    <a href="<?= base_url('halaman/' . $h['halaman_slug']); ?>" target="_blank" class="btn btn-sm btn-info">
                                                        <i class="bi bi-eye"></i> Lihat
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="<?= base_url('dashboard/edit_halaman/' . $h['halaman_id']); ?>" class="btn btn-warning btn-sm">Edit</a>
                                                    <?php if ($h['halaman_slug'] !== 'tentang-kami'): ?>
                                                        <a href="<?= base_url('dashboard/hapus_halaman/' . $h['halaman_id']); ?>" class="btn btn-danger btn-sm" data-confirm="Yakin ingin menghapus halaman <?= esc($h['halaman_judul']); ?>?">Hapus</a>
                                                    <?php else: ?>
                                                        <button class="btn btn-secondary btn-sm" disabled title="Halaman ini dilindungi">Hapus</button>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

