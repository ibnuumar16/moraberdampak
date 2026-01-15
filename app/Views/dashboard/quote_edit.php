<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Quote</h4>
                <form action="<?= base_url('dashboard/update_quote/' . $quote['quote_id']) ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Judul/Konteks</label>
                        <input type="text" class="form-control" name="quote_judul" value="<?= esc($quote['quote_judul']) ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Isi Quote</label>
                        <textarea class="form-control" name="quote" rows="4" required><?= esc($quote['quote']) ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Tokoh (Author)</label>
                        <input type="text" class="form-control" name="quote_author" value="<?= esc($quote['quote_author']) ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Foto Tokoh</label>
                        <input type="file" class="form-control" name="quote_foto">
                        <small class="text-muted">Biarkan kosong jika tidak ingin mengubah foto.</small>
                        <?php if($quote['quote_foto']): ?>
                            <br><img src="<?= base_url('uploads/quote/' . $quote['quote_foto']) ?>" width="100" class="mt-2">
                        <?php endif; ?>
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Update</button>
                    <a href="<?= base_url('dashboard/quote') ?>" class="btn btn-light">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>
