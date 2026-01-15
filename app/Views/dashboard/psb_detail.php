<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Detail Data Santri</h4>
                <div class="row">
                    <div class="col-md-4 text-center">
                        <?php if($santri['foto_santri']): ?>
                            <img src="<?= base_url('template/gambar/santri/' . $santri['foto_santri']) ?>" class="img-fluid rounded mb-3" style="max-height: 300px;">
                        <?php else: ?>
                            <img src="<?= base_url('template/images/faces/face1.jpg') ?>" class="img-fluid rounded mb-3">
                        <?php endif; ?>
                        <h5><?= esc($santri['nama_santri']) ?></h5>
                        <p class="text-muted"><?= esc($santri['nisn_santri']) ?></p>
                    </div>
                    <div class="col-md-8">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pribadi-tab" data-bs-toggle="tab" data-bs-target="#pribadi" type="button" role="tab">Data Pribadi</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="ortu-tab" data-bs-toggle="tab" data-bs-target="#ortu" type="button" role="tab">Data Orang Tua</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="alamat-tab" data-bs-toggle="tab" data-bs-target="#alamat" type="button" role="tab">Alamat</button>
                            </li>
                        </ul>
                        <div class="tab-content pt-3" id="myTabContent">
                            <div class="tab-pane fade show active" id="pribadi" role="tabpanel">
                                <table class="table table-borderless">
                                    <tr><td width="30%">NIK</td><td>: <?= esc($santri['nik_santri']) ?></td></tr>
                                    <tr><td>Tempat, Tgl Lahir</td><td>: <?= esc($santri['tempat_lahir_santri']) ?>, <?= date('d M Y', strtotime($santri['tanggal_lahir_santri'])) ?></td></tr>
                                    <tr><td>Jenis Kelamin</td><td>: <?= esc($santri['jk_santri']) ?></td></tr>
                                    <tr><td>Agama</td><td>: <?= esc($santri['agama_santri']) ?></td></tr>
                                    <tr><td>Hobi</td><td>: <?= esc($santri['hobi_santri']) ?></td></tr>
                                    <tr><td>Cita-cita</td><td>: <?= esc($santri['cita_cita_santri']) ?></td></tr>
                                    <tr><td>No HP/WA</td><td>: <?= esc($santri['wa_santri']) ?></td></tr>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="ortu" role="tabpanel">
                                <h6 class="mt-3">Ayah</h6>
                                <table class="table table-borderless">
                                    <tr><td width="30%">Nama Ayah</td><td>: <?= esc($santri['nama_ayah_santri']) ?></td></tr>
                                    <tr><td>NIK Ayah</td><td>: <?= esc($santri['nik_ayah_santri']) ?></td></tr>
                                    <tr><td>Pekerjaan</td><td>: <?= esc($santri['pekerjaan_ayah_santri']) ?></td></tr>
                                    <tr><td>No HP</td><td>: <?= esc($santri['telp_ayah_santri']) ?></td></tr>
                                </table>
                                <h6 class="mt-3">Ibu</h6>
                                <table class="table table-borderless">
                                    <tr><td width="30%">Nama Ibu</td><td>: <?= esc($santri['nama_ibu_santri']) ?></td></tr>
                                    <tr><td>NIK Ibu</td><td>: <?= esc($santri['nik_ibu_santri']) ?></td></tr>
                                    <tr><td>Pekerjaan</td><td>: <?= esc($santri['pekerjaan_ibu_santri']) ?></td></tr>
                                    <tr><td>No HP</td><td>: <?= esc($santri['telp_ibu_santri']) ?></td></tr>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="alamat" role="tabpanel">
                                <table class="table table-borderless">
                                    <tr><td width="30%">Alamat Lengkap</td><td>: <?= esc($santri['alamat_santri']) ?></td></tr>
                                    <tr><td>RT / RW</td><td>: <?= esc($santri['rt_santri']) ?> / <?= esc($santri['rw_santri']) ?></td></tr>
                                    <tr><td>Desa/Kelurahan</td><td>: <?= esc($santri['desa_santri']) ?></td></tr>
                                    <tr><td>Kecamatan</td><td>: <?= esc($santri['kecamatan_santri']) ?></td></tr>
                                    <tr><td>Kabupaten/Kota</td><td>: <?= esc($santri['kabupaten_santri']) ?></td></tr>
                                    <tr><td>Provinsi</td><td>: <?= esc($santri['provinsi_santri']) ?></td></tr>
                                    <tr><td>Kode Pos</td><td>: <?= esc($santri['kode_pos_santri']) ?></td></tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="<?= base_url('dashboard/psb_santri') ?>" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
