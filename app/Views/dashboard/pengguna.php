<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="card-title">Manajemen Pengguna</h4>
                            <a href="<?= base_url('dashboard/tambah_pengguna'); ?>" class="btn btn-primary">
                                <i class="bi bi-plus-circle"></i> Tambah Pengguna
                            </a>
                        </div>
                        
                        <?php if (session()->getFlashdata('success')): ?>
                            <div class="alert alert-success mt-3"><?= session()->getFlashdata('success'); ?></div>
                        <?php endif; ?>
                        
                        <div class="table-responsive mt-3">
                            <table id="myTable" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Level/Role</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($pengguna as $p): ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= esc($p['pengguna_nama']); ?></td>
                                            <td><?= esc($p['pengguna_username']); ?></td>
                                            <td><?= esc($p['pengguna_email']); ?></td>
                                            <td>
                                                <?php
                                                $levelBadges = [
                                                    'admin' => 'badge-danger',
                                                    'psb' => 'badge-info',
                                                    'penulis' => 'badge-warning',
                                                    'pengurus' => 'badge-success'
                                                ];
                                                $badgeClass = $levelBadges[$p['pengguna_level']] ?? 'badge-secondary';
                                                ?>
                                                <span class="badge <?= $badgeClass; ?>">
                                                    <?= strtoupper($p['pengguna_level']); ?>
                                                </span>
                                            </td>
                                            <td>
                                                <?php if ($p['pengguna_status'] == 1): ?>
                                                    <span class="badge badge-success">Aktif</span>
                                                <?php else: ?>
                                                    <span class="badge badge-secondary">Nonaktif</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('dashboard/edit_pengguna/' . $p['pengguna_id']); ?>" class="btn btn-warning btn-sm">Edit</a>
                                                <a href="<?= base_url('dashboard/hapus_pengguna/' . $p['pengguna_id']); ?>" class="btn btn-danger btn-sm" data-confirm="Yakin ingin menghapus <?= esc($p['pengguna_nama']); ?>?">Hapus</a>
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
</div>
