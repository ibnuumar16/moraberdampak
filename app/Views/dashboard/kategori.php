<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            Data <?= $title; ?> 
                        </h4>
                        <a href="<?= base_url('dashboard/tambah_kategori'); ?>" class="btn btn-primary mb-3">Tambah Kategori</a>
                        <div class="table-responsive">
                            <table id="myTable" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Kategori</th>
                                        <th>Slug</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($kategori as $k) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= esc($k['kategori_nama']); ?></td>
                                            <td><?= esc($k['kategori_slug']); ?></td>
                                            <td>
                                                <a href="<?= base_url('dashboard/edit_kategori/' . $k['kategori_id']); ?>" class="btn btn-warning btn-sm">Edit</a>
                                                <a href="<?= base_url('dashboard/hapus_kategori/' . $k['kategori_id']); ?>" class="btn btn-danger btn-sm" data-confirm="Yakin ingin menghapus <?= esc($k['kategori_nama']); ?>?">Hapus</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div> <!-- table-responsive -->
                    </div> <!-- card-body -->
                </div> <!-- card -->
            </div>
        </div>
    </div>
