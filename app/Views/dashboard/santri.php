<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
            <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            Data <?= $title; ?> 
                            <?php if ($title == 'Santri') : ?>
                                <?= esc($pengaturan['tahun_akademik']) ?>
                            <?php endif; ?>
                        </h4>
                        <div class="table-responsive">
                            <table id="myTable" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>NIS Santri</th>
                                        <th>Nama</th>
                                        <th>Kategori</th>
                                        <th>Alamat</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($data_santri as $s) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= esc($s['nis_santri']); ?></td>
                                            <td><?= esc($s['nama_santri']); ?></td>
                                            <td>
                                                <?php if ($s['kategori_santri'] == 1): ?>
                                                    Mahasiswa - Tahfidz
                                                <?php elseif ($s['kategori_santri'] == 2): ?>
                                                    Mahasiswa - Sekolah
                                                <?php elseif ($s['kategori_santri'] == 3): ?>
                                                    Mahasiswa - Kitab
                                                <?php elseif ($s['kategori_santri'] == 4): ?>
                                                    Mahasiswa - Sekolah
                                                <?php elseif ($s['kategori_santri'] == 5): ?>
                                                    Takhasus Pesantren
                                                <?php else: ?>
                                                    - Tidak Diketahui -
                                                <?php endif; ?>
                                            </td>

                                            <td><?= esc($s['kabupaten_santri']); ?></td>
                                            <td>
                                                <a href="<?= base_url('dashboard/santri_edit/' . $s['id_santri']); ?>" class="btn btn-warning btn-sm">Edit</a>
                                                <a href="<?= base_url('dashboard/santri_hapus/' . $s['id_santri']); ?>" class="btn btn-danger btn-sm" data-confirm="Yakin ingin menghapus <?= esc($s['nama_santri']); ?>?">Hapus</a>
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
