<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Edit Informasi Pendaftaran (PSB)</h3>
                        <h6 class="font-weight-normal mb-0">Atur konten halaman informasi pendaftaran santri baru.</h6>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <?php if (session()->getFlashdata('success')) : ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?= session()->getFlashdata('success'); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>

                        <form class="forms-sample" action="<?= base_url('/dashboard/update_psb'); ?>" method="post">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="halaman_id" value="<?= $halaman['halaman_id']; ?>">
                            
                            <div class="form-group">
                                <label for="halaman_konten">Konten Halaman</label>
                                <textarea class="form-control" id="summernote" name="halaman_konten" rows="20"><?= $halaman['halaman_konten']; ?></textarea>
                            </div>
                            
                            <button type="submit" class="btn btn-primary mr-2">Simpan Perubahan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Initialize Summernote -->
    <!-- Initialize CKEditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#summernote'), {
                toolbar: [
                    'heading', '|',
                    'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', '|',
                    'insertTable', 'mediaEmbed', 'undo', 'redo'
                ],
                height: 400
            })
            .catch(error => {
                console.error(error);
            });
    </script>
