<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="card-title"><?= $title; ?></h4>
                            <a href="<?= base_url('/dashboard/tambah_guru'); ?>" class="btn btn-primary btn-sm">
                                <i class="mdi mdi-plus"></i> Tambah Guru
                            </a>
                        </div>

                        <?php if (session()->getFlashdata('success')) : ?>
                            <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
                        <?php endif; ?>

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Foto</th>
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; foreach ($guru as $g) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td>
                                                <?php if (!empty($g['guru_foto'])) : ?>
                                                    <img src="<?= base_url('uploads/' . $g['guru_foto']); ?>" alt="Foto Guru" style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;">
                                                <?php else : ?>
                                                    <img src="<?= base_url('images/default-user.png'); ?>" alt="Default" style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;">
                                                <?php endif; ?>
                                            </td>
                                            <td><?= $g['guru_nama']; ?></td>
                                            <td><?= $g['guru_jabatan']; ?></td>
                                            <td>
                                                <a href="<?= base_url('/dashboard/edit_guru/' . $g['guru_id']); ?>" class="btn btn-warning btn-sm">
                                                    <i class="mdi mdi-pencil"></i>
                                                </a>
                                                <a href="<?= base_url('/dashboard/hapus_guru/' . $g['guru_id']); ?>" class="btn btn-danger btn-sm" data-confirm="Yakin ingin menghapus data ini?">
                                                    <i class="mdi mdi-delete"></i>
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
