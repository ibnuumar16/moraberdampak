<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Pengaturan Identitas Website</h4>
                        <p class="card-description"> Atur identitas utama, logo, dan kontak pesantren </p>

                        <?php if (session()->getFlashdata('success')) : ?>
                            <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
                        <?php endif; ?>
                        <?php if (session()->getFlashdata('error')) : ?>
                            <div class="alert alert-danger">
                                <?= implode('<br>', session()->getFlashdata('error')); ?>
                            </div>
                        <?php endif; ?>

                        <form class="forms-sample" action="<?= base_url('/dashboard/setting_website_update'); ?>" method="POST" enctype="multipart/form-data">
                            
                            <h5 class="mb-3">Identitas Umum</h5>
                            <div class="form-group">
                                <label for="tahunAkademik">Tahun Akademik</label>
                                <input type="text" class="form-control" id="tahunAkademik" name="tahun_akademik" placeholder="Contoh: 2024/2025" value="<?= $pengaturan['tahun_akademik'] ?? ''; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="namaPondok">Nama Pesantren (Login & Footer)</label>
                                <input type="text" class="form-control" id="namaPondok" name="nama" placeholder="Masukkan nama pesantren" value="<?= $pengaturan['nama'] ?? ''; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="deskripsiPondok">Deskripsi Singkat</label>
                                <textarea class="form-control" id="deskripsiPondok" name="deskripsi" rows="3" placeholder="Masukkan deskripsi singkat" required><?= $pengaturan['deskripsi'] ?? ''; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Logo Login (Kecil)</label>
                                <input type="file" class="form-control file-upload-info" name="logo">
                                <?php if (!empty($pengaturan['logo'])) : ?>
                                    <small>Saat ini: <strong><?= $pengaturan['logo']; ?></strong></small>
                                    <img src="<?= base_url('uploads/' . $pengaturan['logo']); ?>" width="50" class="d-block mt-2">
                                <?php endif; ?>
                                <input type="hidden" name="old_logo" value="<?= $pengaturan['logo'] ?? ''; ?>">
                            </div>
                            <div class="form-group">
                                <label>Logo Website (Header)</label>
                                <input type="file" class="form-control file-upload-info" name="logo_web">
                                <?php if (!empty($pengaturan['logo_web'])) : ?>
                                    <small>Saat ini: <strong><?= $pengaturan['logo_web']; ?></strong></small>
                                    <img src="<?= base_url('uploads/' . $pengaturan['logo_web']); ?>" width="100" class="d-block mt-2" style="background: #ddd; padding: 5px;">
                                <?php endif; ?>
                                <input type="hidden" name="old_logo_web" value="<?= $pengaturan['logo_web'] ?? ''; ?>">
                            </div>

                            <hr>
                            <h5 class="mb-3">Kontak & Alamat</h5>
                            <div class="form-group">
                                <label for="alamat">Alamat Lengkap</label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="2"><?= $pengaturan['alamat'] ?? ''; ?></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="telepon">Telepon/WA</label>
                                        <input type="text" class="form-control" id="telepon" name="telepon" value="<?= $pengaturan['telepon'] ?? ''; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" value="<?= $pengaturan['email'] ?? ''; ?>">
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <h5 class="mb-3">Media Sosial</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="youtubeLink">Link YouTube</label>
                                        <input type="text" class="form-control" id="youtubeLink" name="link_youtube" value="<?= $pengaturan['link_youtube'] ?? ''; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="facebookLink">Link Facebook</label>
                                        <input type="text" class="form-control" id="facebookLink" name="link_facebook" value="<?= $pengaturan['link_facebook'] ?? ''; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="twitterLink">Link Twitter/X</label>
                                        <input type="text" class="form-control" id="twitterLink" name="link_twitter" value="<?= $pengaturan['link_twitter'] ?? ''; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="instagramLink">Link Instagram</label>
                                        <input type="text" class="form-control" id="instagramLink" name="link_instagram" value="<?= $pengaturan['link_instagram'] ?? ''; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="mapsLink">Link Google Maps</label>
                                        <input type="text" class="form-control" id="mapsLink" name="link_maps" value="<?= $pengaturan['link_maps'] ?? ''; ?>" placeholder="https://maps.google.com/...">
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary me-2">Simpan Perubahan</button>
                            <button type="reset" class="btn btn-light">Batal</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
