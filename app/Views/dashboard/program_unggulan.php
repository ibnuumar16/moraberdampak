<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><?= $title; ?></h4>
            <a href="<?= base_url('dashboard/program_unggulan_tambah'); ?>" class="btn btn-primary mb-3">Tambah Program</a>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Featured</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($program_unggulan as $p) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td>
                                <?php if ($p['gambar']) : ?>
                                    <img src="<?= base_url('uploads/program_unggulan/' . $p['gambar']); ?>" alt="Gambar" style="width: 100px; height: auto; border-radius: 0;">
                                <?php else : ?>
                                    -
                                <?php endif; ?>
                            </td>
                            <td><?= $p['judul']; ?></td>
                            <td><?= $p['kategori']; ?></td>
                            <td>
                                <?php if ($p['is_featured']) : ?>
                                    <span class="badge badge-success">Utama</span>
                                <?php else : ?>
                                    <span class="badge badge-secondary">Biasa</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?= base_url('dashboard/program_unggulan_edit/' . $p['id']); ?>" class="btn btn-warning btn-sm">
                                    <i class="ti-pencil"></i>
                                </a>
                                <a href="<?= base_url('dashboard/program_unggulan_hapus/' . $p['id']); ?>" class="btn btn-danger btn-sm" data-confirm="Yakin ingin menghapus program ini?">
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
