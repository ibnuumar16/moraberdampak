<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Pengaturan Tampilan Awal (Homepage)</h4>
                        <p class="card-description"> Sesuaikan tampilan halaman depan website </p>

                        <?php if (session()->getFlashdata('success')) : ?>
                            <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
                        <?php endif; ?>
                        <?php if (session()->getFlashdata('error')) : ?>
                            <div class="alert alert-danger">
                                <?= implode('<br>', session()->getFlashdata('error')); ?>
                            </div>
                        <?php endif; ?>

                        <form class="forms-sample" action="<?= base_url('/dashboard/setting_tampilan_update'); ?>" method="POST" enctype="multipart/form-data">
                            
                            <h5 class="mb-3">Visibilitas Bagian Homepage</h5>
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <div class="form-check form-check-flat form-check-primary">
                                        <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" id="check_section_hero" name="section_hero" value="1" <?= ($pengaturan['section_hero'] ?? 1) == 1 ? 'checked' : ''; ?>>
                                        Hero Section
                                        </label>
                                    </div>
                                </div>


                                <div class="col-md-3">
                                    <div class="form-check form-check-flat form-check-primary">
                                        <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" id="check_section_program_header" name="section_program_header" value="1" <?= ($pengaturan['section_program_header'] ?? 1) == 1 ? 'checked' : ''; ?>>
                                        Program Header (Highlight)
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check form-check-flat form-check-primary">
                                        <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" id="check_section_sambutan" name="section_sambutan" value="1" <?= ($pengaturan['section_sambutan'] ?? 1) == 1 ? 'checked' : ''; ?>>
                                        Sambutan
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check form-check-flat form-check-primary">
                                        <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" id="check_section_berita" name="section_berita" value="1" <?= ($pengaturan['section_berita'] ?? 1) == 1 ? 'checked' : ''; ?>>
                                        Berita/Artikel
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check form-check-flat form-check-primary">
                                        <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" id="check_section_program_unggulan" name="section_program_unggulan" value="1" <?= ($pengaturan['section_program_unggulan'] ?? 1) == 1 ? 'checked' : ''; ?>>
                                        Program Unggulan
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check form-check-flat form-check-primary">
                                        <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" id="check_section_donasi" name="section_donasi" value="1" <?= ($pengaturan['section_donasi'] ?? 1) == 1 ? 'checked' : ''; ?>>
                                        Donasi
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check form-check-flat form-check-primary">
                                        <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" id="check_section_guru" name="section_guru" value="1" <?= ($pengaturan['section_guru'] ?? 1) == 1 ? 'checked' : ''; ?>>
                                        Guru/Pengajar
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            
                            <div id="settings_section_hero">
                                <h5 class="mb-3">Hero Section (Bagian Atas)</h5>
                                <div class="form-group">
                                    <label for="heroTitle">Judul Utama (Hero Title)</label>
                                    <input type="text" class="form-control" id="heroTitle" name="hero_title" value="<?= $pengaturan['hero_title'] ?? ''; ?>">
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
                                
                                <h5 class="mb-3 mt-4">Pengaturan Popup Pengumuman</h5>
                                <div class="form-group">
                                    <div class="form-check form-check-flat form-check-primary">
                                        <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="announcement_active" value="1" <?= ($pengaturan['announcement_active'] ?? 0) == 1 ? 'checked' : ''; ?>>
                                        Tampilkan Popup Pengumuman Otomatis saat Website Dibuka
                                        </label>
                                    </div>
                                    <small class="text-muted">Jika dicentang, pengumuman terbaru akan langsung muncul sebagai popup ketika pengunjung membuka halaman utama.</small>
                                </div>
                            </div>



                            <hr>
                            <!-- Program Header Settings -->


                            <!-- PSB Settings -->


                            <!-- Sambutan Settings -->
                            <div id="settings_section_sambutan">
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
                            </div>

                            <!-- Overview Section Settings -->
                            <div id="settings_section_overview">
                                <hr>
                                <h5 class="mb-3">Overview (Pendidikan Karakter)</h5>
                                <div class="form-group">
                                    <label>Judul Overview</label>
                                    <input type="text" class="form-control" name="overview_title" value="<?= $pengaturan['overview_title'] ?? 'Pendidikan Karakter & Kompetensi Global'; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi Overview</label>
                                    <textarea class="form-control" name="overview_desc" rows="4"><?= $pengaturan['overview_desc'] ?? 'Pondok Pesantren Inggris Inovasi Bangsa berkomitmen menyiapkan santri yang unggul dalam bahasa Inggris, berakhlak mulia, cinta Al-Qur’an, dan mampu berpikir kritis melalui pembelajaran terintegrasi antara agama dan sains.'; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Gambar Overview</label>
                                    <input type="file" class="form-control file-upload-info" name="overview_image">
                                    <?php if (!empty($pengaturan['overview_image'])) : ?>
                                        <small>Saat ini: <strong><?= $pengaturan['overview_image']; ?></strong></small>
                                        <img src="<?= base_url('uploads/' . $pengaturan['overview_image']); ?>" width="100" class="d-block mt-2">
                                    <?php endif; ?>
                                    <input type="hidden" name="old_overview_image" value="<?= $pengaturan['overview_image'] ?? ''; ?>">
                                </div>
                                
                                <h6 class="mt-4">Statistik</h6>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Angka 1</label>
                                            <input type="text" class="form-control" name="overview_stats_1_num" value="<?= $pengaturan['overview_stats_1_num'] ?? '30+'; ?>">
                                            <label class="mt-2">Label 1</label>
                                            <input type="text" class="form-control" name="overview_stats_1_label" value="<?= $pengaturan['overview_stats_1_label'] ?? 'Santri Aktif'; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Angka 2</label>
                                            <input type="text" class="form-control" name="overview_stats_2_num" value="<?= $pengaturan['overview_stats_2_num'] ?? '100%'; ?>">
                                            <label class="mt-2">Label 2</label>
                                            <input type="text" class="form-control" name="overview_stats_2_label" value="<?= $pengaturan['overview_stats_2_label'] ?? 'Bisa Baca Al-Qur\'an'; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Angka 3</label>
                                            <input type="text" class="form-control" name="overview_stats_3_num" value="<?= $pengaturan['overview_stats_3_num'] ?? '4'; ?>">
                                            <label class="mt-2">Label 3</label>
                                            <input type="text" class="form-control" name="overview_stats_3_label" value="<?= $pengaturan['overview_stats_3_label'] ?? 'Program Unggulan'; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Berita Settings -->


                            <!-- Program Unggulan Settings -->


                            <!-- JS Script -->
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    const sections = [
                                        'hero', 'program_header', 'psb', 'sambutan', 'berita', 'program_unggulan', 'donasi', 'guru'
                                    ];

                                    sections.forEach(section => {
                                        const checkbox = document.getElementById('check_section_' + section);
                                        const settingsDiv = document.getElementById('settings_section_' + section);

                                        if (checkbox && settingsDiv) {
                                            // Initial state
                                            settingsDiv.style.display = checkbox.checked ? 'block' : 'none';

                                            // Change event
                                            checkbox.addEventListener('change', function() {
                                                settingsDiv.style.display = this.checked ? 'block' : 'none';
                                            });
                                        }
                                    });
                                });
                            </script>

                            <button type="submit" class="btn btn-primary me-2">Simpan Perubahan</button>
                            <button type="reset" class="btn btn-light">Batal</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
