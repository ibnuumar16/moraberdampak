<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tambah Guru/Asatidz</h4>
                        <p class="card-description"> Masukkan data guru baru </p>

                        <?php if (session()->getFlashdata('error')) : ?>
                            <div class="alert alert-danger">
                                <?= implode('<br>', session()->getFlashdata('error')); ?>
                            </div>
                        <?php endif; ?>

                        <form class="forms-sample" action="<?= base_url('/dashboard/simpan_guru'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="guruNama">Nama Lengkap</label>
                                <input type="text" class="form-control" id="guruNama" name="guru_nama" placeholder="Nama Lengkap Guru" required>
                            </div>
                            <div class="form-group">
                                <label for="guruJabatan">Jabatan</label>
                                <input type="text" class="form-control" id="guruJabatan" name="guru_jabatan" placeholder="Contoh: Pengajar Fiqih / Kepala Madrasah">
                            </div>
                            <div class="form-group">
                                <label>Foto Guru</label>
                                <input type="file" class="form-control file-upload-info" name="guru_foto">
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Simpan</button>
                            <a href="<?= base_url('/dashboard/guru'); ?>" class="btn btn-light">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
