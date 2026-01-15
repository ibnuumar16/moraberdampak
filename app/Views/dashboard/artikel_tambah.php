<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tambah Artikel</h4>

                        <form class="forms-sample" action="<?= base_url('/dashboard/simpan_artikel'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="judulArtikel">Judul Artikel</label>
                                <input type="text" class="form-control" id="judulArtikel" name="artikel_judul" placeholder="Masukkan judul artikel" required>
                            </div>

                            <div class="form-group">
                                <label for="kategoriArtikel">Kategori</label>
                                <select class="form-control" id="kategoriArtikel" name="artikel_kategori" required>
                                    <option value="">Pilih Kategori</option>
                                    <?php foreach ($kategori as $k) : ?>
                                        <option value="<?= $k['kategori_id']; ?>"><?= esc($k['kategori_nama']); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <textarea  id="editor" name="artikel_konten"></textarea>
                            <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
                            <script>
                                CKEDITOR.replace('editor');
                            </script>


                            <div class="form-group">
                                <label>Gambar Sampul</label>
                                <input type="file" class="form-control" name="artikel_sampul">
                            </div>

                            <button type="submit" class="btn btn-primary me-2">Simpan</button>
                            <button type="reset" class="btn btn-light">Batal</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
