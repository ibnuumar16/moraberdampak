<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Artikel</h4>

                        <form class="forms-sample" action="<?= base_url('/dashboard/update_artikel/' . $artikel['artikel_id']); ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="judulArtikel">Judul Artikel</label>
                                <input type="text" class="form-control" id="judulArtikel" name="artikel_judul" value="<?= esc($artikel['artikel_judul']); ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="kategoriArtikel">Kategori</label>
                                <select class="form-control" id="kategoriArtikel" name="artikel_kategori" required>
                                    <?php foreach ($kategori as $k) : ?>
                                        <option value="<?= $k['kategori_id']; ?>" <?= $k['kategori_id'] == $artikel['artikel_kategori'] ? 'selected' : ''; ?>>
                                            <?= esc($k['kategori_nama']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <textarea  id="editor" name="artikel_konten"><?= esc($artikel['artikel_konten']); ?></textarea>
                            <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
                            <script>
                                CKEDITOR.replace('editor');
                            </script>


                            <div class="form-group">
                                <label>Gambar Sampul</label>
                                <input type="file" class="form-control" name="artikel_sampul">
                                <?php if (!empty($artikel['artikel_sampul'])) : ?>
                                    <br>
                                    <img src="<?= base_url('uploads/' . $artikel['artikel_sampul']); ?>" width="100">
                                    <input type="hidden" name="old_sampul" value="<?= $artikel['artikel_sampul']; ?>">
                                <?php endif; ?>
                            </div>

                            <button type="submit" class="btn btn-primary me-2">Simpan</button>
                            <a href="<?= base_url('dashboard/artikel'); ?>" class="btn btn-light">Batal</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
