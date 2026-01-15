<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Manajemen Quote</h4>
                <a href="<?= base_url('dashboard/tambah_quote') ?>" class="btn btn-primary mb-3">Tambah Quote</a>
                
                <?php if(session()->getFlashdata('pesan')): ?>
                    <div class="alert alert-success"><?= session()->getFlashdata('pesan') ?></div>
                <?php endif; ?>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Foto</th>
                                <th>Judul</th>
                                <th>Quote</th>
                                <th>Author</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach($quote as $q): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><img src="<?= base_url('uploads/quote/' . $q['quote_foto']) ?>" style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;"></td>
                                <td><?= esc($q['quote_judul']) ?></td>
                                <td><?= substr(esc($q['quote']), 0, 50) ?>...</td>
                                <td><?= esc($q['quote_author']) ?></td>
                                <td>
                                    <a href="<?= base_url('dashboard/edit_quote/' . $q['quote_id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="<?= base_url('dashboard/hapus_quote/' . $q['quote_id']) ?>" class="btn btn-danger btn-sm" data-confirm="Yakin ingin menghapus?">Hapus</a>
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
