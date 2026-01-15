<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Santri Baru (PSB)</h4>
                <div class="table-responsive">
                    <table class="table table-hover" id="dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Lengkap</th>
                                <th>NISN</th>
                                <th>Jenis Kelamin</th>
                                <th>Asal Kota</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach($santri as $s): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= esc($s['nama_santri']) ?></td>
                                <td><?= esc($s['nisn_santri']) ?></td>
                                <td><?= esc($s['jk_santri']) ?></td>
                                <td><?= esc($s['kabupaten_santri']) ?></td>
                                <td><label class="badge badge-success">Baru</label></td>
                                <td>
                                    <a href="<?= base_url('dashboard/detail_santri/' . $s['id_santri']) ?>" class="btn btn-info btn-sm">Detail</a>
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

<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>
