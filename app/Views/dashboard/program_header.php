<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Manajemen Program Header</h4>
                        <p class="card-description">
                            Kelola item yang tampil di bagian "Program Header" (Highlight) di homepage.
                        </p>
                        
                        <?php if (session()->getFlashdata('success')) : ?>
                            <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
                        <?php endif; ?>

                        <a href="<?= base_url('dashboard/tambah_program_header'); ?>" class="btn btn-primary btn-sm mb-3">
                            <i class="ti-plus"></i> Tambah Item
                        </a>

                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Icon</th>
                                        <th>Judul</th>
                                        <th>Deskripsi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; foreach ($program_header as $ph) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><i class="<?= $ph['icon']; ?>" style="font-size: 20px;"></i> (<?= $ph['icon']; ?>)</td>
                                        <td><?= $ph['judul']; ?></td>
                                        <td><?= $ph['deskripsi']; ?></td>
                                        <td>
                                            <a href="<?= base_url('dashboard/edit_program_header/' . $ph['id']); ?>" class="btn btn-warning btn-sm">
                                                <i class="ti-pencil"></i>
                                            </a>
                                            <a href="<?= base_url('dashboard/hapus_program_header/' . $ph['id']); ?>" class="btn btn-danger btn-sm" data-confirm="Yakin ingin menghapus item ini?">
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
