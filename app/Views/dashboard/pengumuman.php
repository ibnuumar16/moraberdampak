<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Manajemen Pengumuman</h4>
                        <p class="card-description">
                            Kelola pengumuman yang akan ditampilkan di dashboard dan website
                        </p>
                        
                        <?php if (session()->getFlashdata('success')) : ?>
                            <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
                        <?php endif; ?>

                        <a href="<?= base_url('dashboard/tambah_pengumuman'); ?>" class="btn btn-primary btn-sm mb-3">
                            <i class="ti-plus"></i> Tambah Pengumuman
                        </a>

                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Judul Pengumuman</th>
                                        <th>Penulis</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; foreach ($pengumuman as $p) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= date('d M Y', strtotime($p['pengumuman_tanggal'])); ?></td>
                                        <td><?= $p['pengumuman_judul']; ?></td>
                                        <td><?= $p['pengumuman_author']; ?></td>
                                        <td>
                                            <a href="<?= base_url('dashboard/edit_pengumuman/' . $p['pengumuman_id']); ?>" class="btn btn-warning btn-sm">
                                                <i class="ti-pencil"></i>
                                            </a>
                                            <a href="<?= base_url('dashboard/hapus_pengumuman/' . $p['pengumuman_id']); ?>" class="btn btn-danger btn-sm" data-confirm="Yakin ingin menghapus pengumuman ini?">
                                                <i class="ti-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
