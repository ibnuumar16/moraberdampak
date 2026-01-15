<section class="page-title-section overlay" data-background="<?= base_url('homepage/images/backgrounds/page-title.jpg') ?>">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <ul class="list-inline custom-breadcrumb">
          <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="<?= base_url() ?>">Home</a></li>
          <li class="list-inline-item text-white h3 font-secondary nasted">Pendaftaran</li>
        </ul>
        <p class="text-lighten">Bergabunglah bersama kami menjadi bagian dari keluarga besar Pondok Pesantren.</p>
      </div>
    </div>
  </div>
</section>

<style>
  /* Override primary color to match header */
  .bg-primary {
    background-color: #11605d !important;
  }
  .text-primary {
    color: #11605d !important;
  }
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
            <div class="card-header bg-primary text-white text-center py-4 rounded-top">
                <h3 class="text-white mb-0">Formulir Pendaftaran Santri Baru</h3>
                <p class="mb-0 opacity-75">Tahun Akademik <?= $pengaturan['tahun_akademik']; ?></p>
            </div>
            <div class="card-body p-5">
                <?php if (session()->getFlashdata('success')) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <h4 class="alert-heading">Alhamdulillah!</h4>
                        <p><?= session()->getFlashdata('success'); ?></p>
                        <hr>
                        <p class="mb-0">Silakan simpan bukti pendaftaran ini atau hubungi admin untuk informasi lebih lanjut.</p>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('error')) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Mohon Maaf!</strong> Ada kesalahan dalam pengisian formulir:
                        <ul class="mb-0 mt-2">
                            <?php foreach (session()->getFlashdata('error') as $error) : ?>
                                <li><?= esc($error) ?></li>
                            <?php endforeach ?>
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('pendaftaran/submit'); ?>" method="post" class="needs-validation" novalidate>
                    <?= csrf_field(); ?>
                    
                    <!-- Data Santri -->
                    <h5 class="text-primary mb-4 border-bottom pb-2"><i class="ti-user mr-2"></i>Data Calon Santri</h5>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nama_santri" class="font-weight-bold">Nama Lengkap <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nama_santri" name="nama_santri" required placeholder="Sesuai Ijazah/Akte">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="jk_santri" class="font-weight-bold">Jenis Kelamin <span class="text-danger">*</span></label>
                            <select class="form-control" id="jk_santri" name="jk_santri" required>
                                <option value="">-- Pilih --</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="nisn_santri" class="font-weight-bold">NISN <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="nisn_santri" name="nisn_santri" required placeholder="Nomor Induk Siswa Nasional">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="nik_santri" class="font-weight-bold">NIK <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="nik_santri" name="nik_santri" required placeholder="Nomor Induk Kependudukan">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="tempat_lahir_santri" class="font-weight-bold">Tempat Lahir <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="tempat_lahir_santri" name="tempat_lahir_santri" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="tanggal_lahir_santri" class="font-weight-bold">Tanggal Lahir <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="tanggal_lahir_santri" name="tanggal_lahir_santri" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="kategori_santri" class="font-weight-bold">Kategori Pendaftaran <span class="text-danger">*</span></label>
                            <select class="form-control" id="kategori_santri" name="kategori_santri" required>
                                <option value="">-- Pilih Kategori --</option>
                                <?php foreach($kategori as $k): ?>
                                    <option value="<?= $k['nama_kategori']; ?>"><?= $k['nama_kategori']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <!-- Data Tambahan Santri -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="agama_santri" class="font-weight-bold">Agama</label>
                            <select class="form-control" id="agama_santri" name="agama_santri">
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddha">Buddha</option>
                                <option value="Konghucu">Konghucu</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="hobi_santri" class="font-weight-bold">Hobi</label>
                            <input type="text" class="form-control" id="hobi_santri" name="hobi_santri">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="cita_cita_santri" class="font-weight-bold">Cita-cita</label>
                            <input type="text" class="form-control" id="cita_cita_santri" name="cita_cita_santri">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="kewarganegaraan_santri" class="font-weight-bold">Kewarganegaraan</label>
                            <select class="form-control" id="kewarganegaraan_santri" name="kewarganegaraan_santri">
                                <option value="WNI">WNI</option>
                                <option value="WNA">WNA</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="status_rumah_santri" class="font-weight-bold">Status Rumah</label>
                            <select class="form-control" id="status_rumah_santri" name="status_rumah_santri">
                                <option value="Milik Sendiri">Milik Sendiri</option>
                                <option value="Sewa/Kontrak">Sewa/Kontrak</option>
                                <option value="Menumpang">Menumpang</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="status_mukim_santri" class="font-weight-bold">Status Mukim</label>
                            <select class="form-control" id="status_mukim_santri" name="status_mukim_santri">
                                <option value="Mukim">Mukim (Asrama)</option>
                                <option value="Non-Mukim">Non-Mukim (Pulang Pergi)</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email_santri" class="font-weight-bold">Email</label>
                            <input type="email" class="form-control" id="email_santri" name="email_santri">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="kk_santri" class="font-weight-bold">No. KK</label>
                            <input type="number" class="form-control" id="kk_santri" name="kk_santri">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="anakke_santri" class="font-weight-bold">Anak Ke-</label>
                            <input type="number" class="form-control" id="anakke_santri" name="anakke_santri">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="jml_saudara_santri" class="font-weight-bold">Jumlah Saudara</label>
                            <input type="number" class="form-control" id="jml_saudara_santri" name="jml_saudara_santri">
                        </div>
                    </div>

                    <!-- Kartu Bantuan (Opsional) -->
                    <h5 class="text-primary mb-4 border-bottom pb-2 mt-4"><i class="ti-wallet mr-2"></i>Kartu Bantuan (Jika Ada)</h5>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="kip_santri" class="font-weight-bold">No. KIP</label>
                            <input type="text" class="form-control" id="kip_santri" name="kip_santri">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="pkh_santri" class="font-weight-bold">No. PKH</label>
                            <input type="text" class="form-control" id="pkh_santri" name="pkh_santri">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="kks_santri" class="font-weight-bold">No. KKS</label>
                            <input type="text" class="form-control" id="kks_santri" name="kks_santri">
                        </div>
                    </div>

                    <!-- Data Orang Tua -->
                    <h5 class="text-primary mb-4 border-bottom pb-2 mt-4"><i class="ti-id-badge mr-2"></i>Data Orang Tua</h5>
                    <div class="row">
                        <!-- Ayah -->
                        <div class="col-12"><h6 class="font-weight-bold text-secondary">Data Ayah</h6></div>
                        <div class="col-md-6 mb-3">
                            <label for="nama_ayah_santri" class="font-weight-bold">Nama Ayah <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nama_ayah_santri" name="nama_ayah_santri" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="nik_ayah_santri" class="font-weight-bold">NIK Ayah</label>
                            <input type="number" class="form-control" id="nik_ayah_santri" name="nik_ayah_santri">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="tempat_lahir_ayah_santri" class="font-weight-bold">Tempat Lahir Ayah</label>
                            <input type="text" class="form-control" id="tempat_lahir_ayah_santri" name="tempat_lahir_ayah_santri">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="tanggal_lahir_ayah_santri" class="font-weight-bold">Tanggal Lahir Ayah</label>
                            <input type="date" class="form-control" id="tanggal_lahir_ayah_santri" name="tanggal_lahir_ayah_santri">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="pendidikan_ayah_santri" class="font-weight-bold">Pendidikan Ayah</label>
                            <select class="form-control" id="pendidikan_ayah_santri" name="pendidikan_ayah_santri">
                                <option value="">-- Pilih --</option>
                                <option value="SD">SD</option>
                                <option value="SMP">SMP</option>
                                <option value="SMA">SMA</option>
                                <option value="D3">D3</option>
                                <option value="S1">S1</option>
                                <option value="S2">S2</option>
                                <option value="S3">S3</option>
                                <option value="Tidak Sekolah">Tidak Sekolah</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="pekerjaan_ayah_santri" class="font-weight-bold">Pekerjaan Ayah</label>
                            <input type="text" class="form-control" id="pekerjaan_ayah_santri" name="pekerjaan_ayah_santri">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="penghasilan_ayah_santri" class="font-weight-bold">Penghasilan Ayah</label>
                            <select class="form-control" id="penghasilan_ayah_santri" name="penghasilan_ayah_santri">
                                <option value="">-- Pilih --</option>
                                <option value="< 1 Juta">< 1 Juta</option>
                                <option value="1 - 3 Juta">1 - 3 Juta</option>
                                <option value="3 - 5 Juta">3 - 5 Juta</option>
                                <option value="> 5 Juta">> 5 Juta</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="telp_ayah_santri" class="font-weight-bold">No. Telp Ayah</label>
                            <input type="number" class="form-control" id="telp_ayah_santri" name="telp_ayah_santri">
                        </div>

                        <!-- Ibu -->
                        <div class="col-12 mt-3"><h6 class="font-weight-bold text-secondary">Data Ibu</h6></div>
                        <div class="col-md-6 mb-3">
                            <label for="nama_ibu_santri" class="font-weight-bold">Nama Ibu <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="nama_ibu_santri" name="nama_ibu_santri" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="nik_ibu_santri" class="font-weight-bold">NIK Ibu</label>
                            <input type="number" class="form-control" id="nik_ibu_santri" name="nik_ibu_santri">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="tempat_lahir_ibu_santri" class="font-weight-bold">Tempat Lahir Ibu</label>
                            <input type="text" class="form-control" id="tempat_lahir_ibu_santri" name="tempat_lahir_ibu_santri">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="tanggal_lahir_ibu_santri" class="font-weight-bold">Tanggal Lahir Ibu</label>
                            <input type="date" class="form-control" id="tanggal_lahir_ibu_santri" name="tanggal_lahir_ibu_santri">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="pendidikan_ibu_santri" class="font-weight-bold">Pendidikan Ibu</label>
                            <select class="form-control" id="pendidikan_ibu_santri" name="pendidikan_ibu_santri">
                                <option value="">-- Pilih --</option>
                                <option value="SD">SD</option>
                                <option value="SMP">SMP</option>
                                <option value="SMA">SMA</option>
                                <option value="D3">D3</option>
                                <option value="S1">S1</option>
                                <option value="S2">S2</option>
                                <option value="S3">S3</option>
                                <option value="Tidak Sekolah">Tidak Sekolah</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="pekerjaan_ibu_santri" class="font-weight-bold">Pekerjaan Ibu</label>
                            <input type="text" class="form-control" id="pekerjaan_ibu_santri" name="pekerjaan_ibu_santri">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="penghasilan_ibu_santri" class="font-weight-bold">Penghasilan Ibu</label>
                            <select class="form-control" id="penghasilan_ibu_santri" name="penghasilan_ibu_santri">
                                <option value="">-- Pilih --</option>
                                <option value="< 1 Juta">< 1 Juta</option>
                                <option value="1 - 3 Juta">1 - 3 Juta</option>
                                <option value="3 - 5 Juta">3 - 5 Juta</option>
                                <option value="> 5 Juta">> 5 Juta</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="telp_ibu_santri" class="font-weight-bold">No. Telp Ibu</label>
                            <input type="number" class="form-control" id="telp_ibu_santri" name="telp_ibu_santri">
                        </div>

                        <!-- Wali -->
                        <div class="col-12 mt-3"><h6 class="font-weight-bold text-secondary">Data Wali (Opsional)</h6></div>
                        <div class="col-md-6 mb-3">
                            <label for="wali_santri" class="font-weight-bold">Nama Wali</label>
                            <input type="text" class="form-control" id="wali_santri" name="wali_santri">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="wa_wali" class="font-weight-bold">No. Telp/WA Wali</label>
                            <input type="number" class="form-control" id="wa_wali" name="wa_wali">
                        </div>

                        <div class="col-12 mt-3">
                            <label for="wa_santri" class="font-weight-bold">No. WhatsApp Aktif (Utama) <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="wa_santri" name="wa_santri" required placeholder="Contoh: 081234567890">
                            <small class="text-muted">Nomor yang dapat dihubungi untuk informasi kelulusan.</small>
                        </div>
                    </div>

                    <!-- Alamat -->
                    <h5 class="text-primary mb-4 border-bottom pb-2 mt-4"><i class="ti-home mr-2"></i>Alamat Lengkap</h5>
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="alamat_santri" class="font-weight-bold">Alamat Jalan/Dusun <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="alamat_santri" name="alamat_santri" rows="2" required placeholder="Nama Jalan, RT/RW, Dusun"></textarea>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="rt_santri" class="font-weight-bold">RT</label>
                            <input type="number" class="form-control" id="rt_santri" name="rt_santri">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="rw_santri" class="font-weight-bold">RW</label>
                            <input type="number" class="form-control" id="rw_santri" name="rw_santri">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="desa_santri" class="font-weight-bold">Desa/Kelurahan</label>
                            <input type="text" class="form-control" id="desa_santri" name="desa_santri">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="kecamatan_santri" class="font-weight-bold">Kecamatan</label>
                            <input type="text" class="form-control" id="kecamatan_santri" name="kecamatan_santri">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="kabupaten_santri" class="font-weight-bold">Kabupaten/Kota</label>
                            <input type="text" class="form-control" id="kabupaten_santri" name="kabupaten_santri" placeholder="Contoh: Sleman">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="provinsi_santri" class="font-weight-bold">Provinsi</label>
                            <input type="text" class="form-control" id="provinsi_santri" name="provinsi_santri" placeholder="Contoh: DI Yogyakarta">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="kode_pos_santri" class="font-weight-bold">Kode Pos</label>
                            <input type="number" class="form-control" id="kode_pos_santri" name="kode_pos_santri">
                        </div>
                    </div>

                    <div class="text-center mt-5">
                        <button type="submit" class="btn btn-primary btn-lg px-5 py-3 font-weight-bold shadow">DAFTAR SEKARANG</button>
                    </div>

                </form>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>
