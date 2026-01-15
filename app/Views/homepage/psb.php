<main class="main">

  <!-- Page Title -->
  <div class="container section-title text-center" style="margin-top: 40px;">
    <h2>Informasi PSB</h2>
    <p>Informasi Pendaftaran Santri Baru</p>
  </div>
  <!-- End Page Title -->

  <style>
    .btn-primary {
      background-color: #11605d !important;
      border-color: #11605d !important;
    }
    .btn-primary:hover {
      background-color: #0e4d4a !important;
      border-color: #0e4d4a !important;
    }
  </style>

<section class="section bg-gray">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="card border-0 shadow-sm rounded-lg">
            <div class="card-body p-5">
                <div class="content">
                    <?= $halaman['halaman_konten']; ?>
                </div>

                <div class="text-center mt-5">
                    <h4 class="mb-4">Sudah siap mendaftar?</h4>
                    <a href="<?= base_url('pendaftaran/form'); ?>" class="btn btn-primary btn-lg px-5 py-3 font-weight-bold shadow">
                        <i class="bi bi-pencil-square mr-2"></i> ISI FORMULIR PENDAFTARAN
                    </a>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>
</main>
