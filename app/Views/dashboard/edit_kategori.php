<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Kategori</h4>
                        <p class="card-description"> Perbarui data kategori </p>

                        <?php if (session()->getFlashdata('success')) : ?>
                            <div class="alert alert-success">
                                <?= session()->getFlashdata('success'); ?>
                            </div>
                        <?php endif; ?>
                        <?php if (session()->getFlashdata('error')) : ?>
                            <div class="alert alert-danger">
                                <?= session()->getFlashdata('error'); ?>
                            </div>
                        <?php endif; ?>

                        <form class="forms-sample" action="<?= base_url('/dashboard/update_kategori/' . $kategori['kategori_id']); ?>" method="POST">
                            <div class="form-group">
                                <label for="kategoriNama">Nama Kategori</label>
                                <input type="text" class="form-control" id="kategoriNama" name="kategori_nama" value="<?= esc($kategori['kategori_nama']); ?>" required>
                            </div>
                            
                            <button type="submit" class="btn btn-primary me-2">Update</button>
                            <a href="<?= base_url('/dashboard/kategori'); ?>" class="btn btn-light">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>