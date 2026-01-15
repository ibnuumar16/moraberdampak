<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Data Santri</h4>
                        <form action="<?= base_url('dashboard/santri_update/' . esc((string)$santri['id_santri'], 'attr')); ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field(); ?>

                            <?php foreach ($santri as $key => $value) : ?>
                                <?php if ($key !== 'id_santri' && $key !== 'foto_santri') : ?>
                                    <div class="form-group">
                                        <label for="<?= esc((string)$key, 'attr'); ?>"><?= ucwords(str_replace('_', ' ', $key)); ?></label>
                                        <input 
                                            type="text" 
                                            class="form-control" 
                                            id="<?= esc((string)$key, 'attr'); ?>" 
                                            name="<?= esc((string)$key, 'attr'); ?>" 
                                            value="<?= esc((string)$value, 'attr'); ?>" 
                                            required
                                        >
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>

                            <div class="form-group">
                                <label for="foto_santri">Foto Santri</label>
                                <input type="file" class="form-control" id="foto_santri" name="foto_santri">
                                <?php if (!empty($santri['foto_santri']) && file_exists('uploads/' . $santri['foto_santri'])) : ?>
                                    <small>Foto saat ini: <strong><?= esc((string)$santri['foto_santri']); ?></strong></small>
                                    <br>
                                    <img src="<?= base_url('uploads/' . esc((string)$santri['foto_santri'], 'attr')); ?>" width="100">
                                <?php endif; ?>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            <a href="<?= base_url('dashboard/santri'); ?>" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
