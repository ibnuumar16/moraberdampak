<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Setting Pengaturan Website</h4>
                        <p class="card-description"> Sesuaikan dengan data website tahun ini </p>

                        <?php if (session()->getFlashdata('success')) : ?>
                            <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
                        <?php endif; ?>
                        <?php if (session()->getFlashdata('error')) : ?>
                            <div class="alert alert-danger">
                                <?= implode('<br>', session()->getFlashdata('error')); ?>
                            </div>
                        <?php endif; ?>

                        <form class="forms-sample" action="<?= base_url('/dashboard/setting_update'); ?>" method="POST" enctype="multipart/form-data">
                            
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
                                <label for="teksArab">Nama Pesantren (Arab - Teks)</label>
                                <input type="text" class="form-control" id="teksArab" name="teks_arab" placeholder="Masukkan teks arab nama pesantren" value="<?= $pengaturan['teks_arab'] ?? ''; ?>">
                            </div>
                            <div class="form-group">
                                <label>Nama Pesantren (Arab - Gambar)</label>
                                <input type="file" class="form-control file-upload-info" name="logo_header_arab">
                                <?php if (!empty($pengaturan['logo_header_arab'])) : ?>
                                    <small>Saat ini: <strong><?= $pengaturan['logo_header_arab']; ?></strong></small>
                                    <img src="<?= base_url('uploads/' . $pengaturan['logo_header_arab']); ?>" height="50" class="d-block mt-2" style="background: #333; padding: 5px;">
                                <?php endif; ?>
                                <input type="hidden" name="old_logo_header_arab" value="<?= $pengaturan['logo_header_arab'] ?? ''; ?>">
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
                            <h5 class="mb-3">Pengumuman Pendaftaran (Banner)</h5>
                            <div class="form-group">
                                <div class="form-check form-check-flat form-check-primary">
                                    <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="announcement_active" value="1" <?= ($pengaturan['announcement_active'] ?? 0) == 1 ? 'checked' : ''; ?>>
                                    Aktifkan Banner Pengumuman
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="announcementText">Teks Pengumuman</label>
                                <input type="text" class="form-control" id="announcementText" name="announcement_text" value="<?= $pengaturan['announcement_text'] ?? ''; ?>" placeholder="Contoh: Pendaftaran Santri Baru Tahun 2025 Dibuka">
                            </div>
                            <div class="form-group">
                                <label for="announcementLink">Link Pengumuman (Opsional)</label>
                                <input type="text" class="form-control" id="announcementLink" name="announcement_link" value="<?= $pengaturan['announcement_link'] ?? ''; ?>" placeholder="Contoh: /home/psb">
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
                            <h5 class="mb-3">Halaman Depan (Hero Section)</h5>
                            <div class="form-group">
                                <label for="heroTitle">Judul Utama (Hero Title)</label>
                                <input type="text" class="form-control" id="heroTitle" name="hero_title" value="<?= $pengaturan['hero_title'] ?? ''; ?>">
                            </div>
                            <div class="form-group">
                                <label>Gambar Arab Hero (Opsional)</label>
                                <input type="file" class="form-control file-upload-info" name="hero_image_arab">
                                <?php if (!empty($pengaturan['hero_image_arab'])) : ?>
                                    <small>Saat ini: <strong><?= $pengaturan['hero_image_arab']; ?></strong></small>
                                    <img src="<?= base_url('uploads/' . $pengaturan['hero_image_arab']); ?>" height="50" class="d-block mt-2" style="background: #333; padding: 5px;">
                                <?php endif; ?>
                                <input type="hidden" name="old_hero_image_arab" value="<?= $pengaturan['hero_image_arab'] ?? ''; ?>">
                            </div>
                            <div class="form-group">
                                <label for="heroDesc">Deskripsi Utama (Hero Description)</label>
                                <textarea class="form-control" id="heroDesc" name="hero_desc" rows="3"><?= $pengaturan['hero_desc'] ?? ''; ?></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="heroBtnText">Teks Tombol</label>
                                        <input type="text" class="form-control" id="heroBtnText" name="hero_btn_text" value="<?= $pengaturan['hero_btn_text'] ?? ''; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="heroBtnUrl">Link Tombol</label>
                                        <input type="text" class="form-control" id="heroBtnUrl" name="hero_btn_url" value="<?= $pengaturan['hero_btn_url'] ?? ''; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Background Hero Image</label>
                                <input type="file" class="form-control file-upload-info" name="hero_bg">
                                <?php if (!empty($pengaturan['hero_bg'])) : ?>
                                    <small>Saat ini: <strong><?= $pengaturan['hero_bg']; ?></strong></small>
                                    <img src="<?= base_url('uploads/' . $pengaturan['hero_bg']); ?>" width="150" class="d-block mt-2">
                                <?php endif; ?>
                                <input type="hidden" name="old_hero_bg" value="<?= $pengaturan['hero_bg'] ?? ''; ?>">
                            </div>

                            <hr>
                            <h5 class="mb-3">Sambutan Pimpinan</h5>
                            <div class="form-group">
                                <label for="namaPimpinan">Nama Pimpinan</label>
                                <input type="text" class="form-control" id="namaPimpinan" name="nama_pimpinan" value="<?= $pengaturan['nama_pimpinan'] ?? ''; ?>">
                            </div>
                            <div class="form-group">
                                <label for="sambutanPimpinan">Isi Sambutan</label>
                                <textarea class="form-control" id="sambutanPimpinan" name="sambutan_pimpinan" rows="5"><?= $pengaturan['sambutan_pimpinan'] ?? ''; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Foto Pimpinan</label>
                                <input type="file" class="form-control file-upload-info" name="foto_pimpinan">
                                <?php if (!empty($pengaturan['foto_pimpinan'])) : ?>
                                    <small>Saat ini: <strong><?= $pengaturan['foto_pimpinan']; ?></strong></small>
                                    <img src="<?= base_url('uploads/' . $pengaturan['foto_pimpinan']); ?>" width="100" class="d-block mt-2">
                                <?php endif; ?>
                                <input type="hidden" name="old_foto_pimpinan" value="<?= $pengaturan['foto_pimpinan'] ?? ''; ?>">
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

                            <button type="submit" class="btn btn-primary me-2">Simpan Perubahan</button>
                            <button type="reset" class="btn btn-light">Batal</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
