<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tambah Pengguna Baru</h4>
                        <p class="card-description">Buat pengguna baru untuk sistem</p>
                        
                        <?php if (session()->getFlashdata('error')): ?>
                            <div class="alert alert-danger">
                                <?php foreach (session()->getFlashdata('error') as $error): ?>
                                    <?= $error; ?><br>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        
                        <form action="<?= base_url('dashboard/simpan_pengguna'); ?>" method="POST">
                            <div class="form-group">
                                <label for="pengguna_nama">Nama Lengkap *</label>
                                <input type="text" class="form-control" id="pengguna_nama" name="pengguna_nama" placeholder="Nama lengkap" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="pengguna_email">Email *</label>
                                <input type="email" class="form-control" id="pengguna_email" name="pengguna_email" placeholder="email@example.com" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="pengguna_username">Username *</label>
                                <input type="text" class="form-control" id="pengguna_username" name="pengguna_username" placeholder="Username untuk login" required>
                                <small class="form-text text-muted">Minimal 4 karakter, akan digunakan untuk login</small>
                            </div>
                            
                            <div class="form-group">
                                <label for="pengguna_password">Password *</label>
                                <input type="password" class="form-control" id="pengguna_password" name="pengguna_password" placeholder="Password" required>
                                <small class="form-text text-muted">Minimal 6 karakter</small>
                            </div>
                            
                            <div class="form-group">
                                <label for="pengguna_level">Level/Role *</label>
                                <select class="form-control" id="pengguna_level" name="pengguna_level" required>
                                    <option value="">-- Pilih Level --</option>
                                    <option value="admin">Admin (Full Access)</option>
                                    <option value="psb">PSB (Data Santri)</option>
                                    <option value="penulis">Tim Media (Artikel & Galeri)</option>
                                    <option value="pengurus">Pengurus (Limited)</option>
                                </select>
                                <small class="form-text text-muted">
                                    <strong>Admin:</strong> Full access semua fitur<br>
                                    <strong>PSB:</strong> Kelola data santri masuk<br>
                                    <strong>Tim Media:</strong> Kelola artikel dan galeri<br>
                                    <strong>Pengurus:</strong> Limited access
                                </small>
                            </div>
                            
                            <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                            <a href="<?= base_url('dashboard/pengguna'); ?>" class="btn btn-light">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
