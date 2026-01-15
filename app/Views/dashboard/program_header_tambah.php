<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tambah Item Program Header</h4>
                        <form action="<?= base_url('dashboard/simpan_program_header'); ?>" method="post">
                            <div class="form-group">
                                <label>Judul</label>
                                <input type="text" class="form-control" name="judul" required placeholder="Contoh: Program Tahfidz">
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" rows="4" required placeholder="Deskripsi singkat..."></textarea>
                            </div>
                            <div class="form-group">
                                <label>Icon Class (Bootstrap Icons)</label>
                                <input type="text" class="form-control" name="icon" required placeholder="Contoh: bi bi-book-half">
                                <small class="form-text text-muted">
                                    Cari icon di <a href="https://icons.getbootstrap.com/" target="_blank">Bootstrap Icons</a> dan copy class-nya.
                                </small>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                            <a href="<?= base_url('dashboard/program_header'); ?>" class="btn btn-light">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
