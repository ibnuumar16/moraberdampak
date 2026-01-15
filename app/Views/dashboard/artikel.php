<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            Data <?= $title; ?> 
                        </h4>
                        <a href="<?= base_url('dashboard/tambah_artikel'); ?>" class="btn btn-primary mb-3">Tambah Artikel</a>
                        <div class="table-responsive">
                            <table id="myTable" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Judul</th>
                                        <th>Slug</th>
                                        <th>Tanggal</th>
                                        <th>Author</th>
                                        <th>Kategori</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($artikel as $a) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= esc($a['artikel_judul']); ?></td>
                                            <td><?= esc($a['artikel_slug']); ?></td>
                                            <td><?= esc($a['artikel_tanggal']); ?></td>
                                            <td><?= esc($a['artikel_author']); ?></td>
                                            <td><?= esc($a['artikel_kategori']); ?></td>
                                            <td>
                                                <a href="<?= base_url('dashboard/edit_artikel/' . $a['artikel_id']); ?>" class="btn btn-warning btn-sm">Edit</a>
                                                <a href="<?= base_url('dashboard/hapus_artikel/' . $a['artikel_id']); ?>" class="btn btn-danger btn-sm" data-confirm="Yakin ingin menghapus <?= esc($a['artikel_judul']); ?>?">Hapus</a>
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
