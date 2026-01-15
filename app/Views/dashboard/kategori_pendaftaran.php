<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Manajemen Kategori Pendaftaran</h3>
                        <h6 class="font-weight-normal mb-0">Kelola jenis pendaftaran santri baru.</h6>
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="justify-content-end d-flex">
                            <a href="<?= base_url('/dashboard/tambah_kategori_pendaftaran'); ?>" class="btn btn-primary btn-icon-text">
                                <i class="ti-plus btn-icon-prepend"></i> Tambah Kategori
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <?php if (session()->getFlashdata('success')) : ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?= session()->getFlashdata('success'); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Jenjang Pendaftaran</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; foreach ($kategori as $k) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= esc($k['nama_kategori']); ?></td>
                                            <td><?= esc($k['keterangan']); ?></td>
                                            <td>
                                                <a href="<?= base_url('dashboard/edit_kategori_pendaftaran/' . $k['id_kategori']); ?>" class="btn btn-warning btn-sm btn-icon-text">
                                                    <i class="ti-pencil btn-icon-prepend"></i> Edit
                                                </a>
                                                <a href="<?= base_url('dashboard/hapus_kategori_pendaftaran/' . $k['id_kategori']); ?>" class="btn btn-danger btn-sm btn-icon-text" onclick="return confirm('Yakin ingin menghapus kategori ini?')">
                                                    <i class="ti-trash btn-icon-prepend"></i> Hapus
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
