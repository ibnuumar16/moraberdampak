<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tambah Quote</h4>
                <form action="<?= base_url('dashboard/simpan_quote') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Judul Quote</label>
                        <input type="text" name="quote_judul" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Isi Quote</label>
                        <textarea name="quote" class="form-control" rows="4" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Author / Tokoh</label>
                        <input type="text" name="quote_author" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Foto Tokoh</label>
                        <input type="file" name="quote_foto" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?= base_url('dashboard/quote') ?>" class="btn btn-light">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>
