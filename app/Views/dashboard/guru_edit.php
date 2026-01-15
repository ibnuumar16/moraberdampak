<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Guru/Asatidz</h4>
                        <p class="card-description"> Edit data guru </p>

                        <?php if (session()->getFlashdata('error')) : ?>
                            <div class="alert alert-danger">
                                <?= implode('<br>', session()->getFlashdata('error')); ?>
                            </div>
                        <?php endif; ?>

                        <form class="forms-sample" action="<?= base_url('/dashboard/update_guru/' . $guru['guru_id']); ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="guruNama">Nama Lengkap</label>
                                <input type="text" class="form-control" id="guruNama" name="guru_nama" value="<?= $guru['guru_nama']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="guruJabatan">Jabatan</label>
                                <input type="text" class="form-control" id="guruJabatan" name="guru_jabatan" value="<?= $guru['guru_jabatan']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Foto Guru</label>
                                <input type="file" class="form-control file-upload-info" name="guru_foto">
                                <?php if (!empty($guru['guru_foto'])) : ?>
                                    <small>Foto saat ini:</small><br>
                                    <img src="<?= base_url('uploads/' . $guru['guru_foto']); ?>" width="100" class="mt-2 mb-2">
                                <?php endif; ?>
                                <input type="hidden" name="old_foto" value="<?= $guru['guru_foto']; ?>">
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Update</button>
                            <a href="<?= base_url('/dashboard/guru'); ?>" class="btn btn-light">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
