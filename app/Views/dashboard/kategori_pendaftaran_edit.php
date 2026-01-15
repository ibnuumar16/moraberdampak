<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Edit Kategori Pendaftaran</h3>
                        <h6 class="font-weight-normal mb-0">Edit data kategori pendaftaran.</h6>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <?php if (session()->getFlashdata('error')) : ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error!</strong> Periksa kembali inputan anda.
                                <ul>
                                    <?php foreach (session()->getFlashdata('error') as $error) : ?>
                                        <li><?= esc($error) ?></li>
                                    <?php endforeach ?>
                                </ul>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>

                        <form class="forms-sample" action="<?= base_url('/dashboard/update_kategori_pendaftaran/' . $kategori['id_kategori']); ?>" method="post">
                            <?= csrf_field(); ?>
                            <div class="form-group">
                                <label for="nama_kategori">Jenjang Pendaftaran</label>
                                <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="<?= esc($kategori['nama_kategori']); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea class="form-control" id="keterangan" name="keterangan" rows="4"><?= esc($kategori['keterangan']); ?></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Simpan Perubahan</button>
                            <a href="<?= base_url('/dashboard/kategori_pendaftaran'); ?>" class="btn btn-light">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
