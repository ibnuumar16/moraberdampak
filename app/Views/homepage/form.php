
                <?php
                if (session()->getFlashdata('selesai')) {
                    echo '<div class="alert alert-info" role="alert">';
                    echo session()->getFlashdata('selesai');
                    echo "</div>";
                }

                if (session()->getFlashdata('setengah')) {
                    echo '<div class="alert alert-warning" role="alert">';
                    echo session()->getFlashdata('setengah');
                    echo "</div>";
                }

                ?>
                <?php
                echo form_open_multipart('home/tambahsantri');
                ?>

                <div class="card-body">
                <div class="card mb-3 shadow">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label"><b>KATEGORI</b></label>
                            <select class="form-control" name="kategori" required>
                                <option value=" ">- Pilih Kategori -</option>
                                <option value="1">Mahasiswa - Tahfidz</option>
                                <option value="2">Mahasiswa - Sekolah</option>
                                <option value="3">Mahasiswa - Kitab</option>
                                <option value="4">Mahasiswa - Sekolah</option>
                                <option value="5">Takhasus Pesantren</option>
                            </select>
                        </div>
                        
                    </div>
                </div>
                    <div class="mb-3">
                        <label class="form-label"><b>NIK (Nomor Induk Kependudukan)</b></label>
                        <input type="text" class="form-control" name="nik" required>
                        <!-- <div  class="form-text">Jika Ada !!</div> -->
                        <?php ('nik'); ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><b>Nama</b></label>
                        <input type="text" class="form-control" name="nama" required>
                        <div class="form-text">Sesuaikan dengan KTP/AKTE</div>
                        <?php ('nama'); ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><b>Password Akun (Baru)</b></label>
                        <input type="text" class="form-control" name="password" required>
                        <div class="form-text">Buat Password Baru, usahakan yang mudah diingat</div>
                        <?php ('password'); ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><b>NISN</b></label>
                        <input type="text" class="form-control" name="nisn" required>
                        <!-- <div  class="form-text">Sesuaikan dengan KTP/AKTE</div> -->
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><b>No. KIP (Kartu Indonesia pintar)</b></label>
                        <input type="text" class="form-control" name="kip">
                        <div class="form-text">Jika Ada !!</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><b>No. PKH (Program Keluarga harapan)</b></label>
                        <input type="text" class="form-control" name="pkh">
                        <div class="form-text">Jika Ada !!</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><b>No. KKS (Kartu Keluarga Sejahtera)</b></label>
                        <input type="text" class="form-control" name="kks">
                        <div class="form-text">Jika Ada !!</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><b>Tempat Lahir</b></label>
                        <input type="text" class="form-control" name="tempat_lahir" required>
                        <!-- <div  class="form-text">Jika Ada !!</div> -->
                        <?php ('tempat_lahir'); ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><b>Tanggal Lahir</b></label>
                        <input type="date" class="form-control" name="tanggal_lahir" required>
                        <!-- <div  class="form-text">Jika Ada !!</div> -->
                        <?php ('tanggal_lahir'); ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><b>jenis Kelamin</b></label>
                        <select class="form-control" name="jenis_kelamin" required>
                            <option value=" ">-pilih jenis kelamin-</option>
                            <option value="laki-laki">Laki-laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                        <?php ('jenis_kelamin'); ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><b>Jumlah Saudara</b></label>
                        <input type="number" class="form-control" name="saudara" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><b>Anak Ke-</b></label>
                        <input type="number" class="form-control" name="anakke" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><b>Agama</b></label>
                        <select class="form-control" name="agama" required>
                            <option value=" ">-pilih agama-</option>
                            <option value="islam">islam</option>
                        </select>
                        <?php ('agama'); ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><b>Hobi</b></label>
                        <input type="text" class="form-control" name="hobi" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><b>Email</b></label>
                        <input type="email" class="form-control" name="email_santri" required>
                        <div class="mb-3">
                            <label class="form-label"><b>No Hp./WA</b></label>
                            <input type="text" class="form-control" name="no_hp/wa" placeholder="0877xxxxxx (tanpa spasi)" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><b>Cita-cita</b></label>
                            <input type="text" class="form-control" name="cita_cita" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><b>Kewarganegaraan</b></label>
                            <select class="form-control" name="kewarganegaraan" required>
                                <option value=" ">-pilih kewarganegaraan -</option>
                                <option value="WNI">WNI</option>
                                <option value="WNA">WNA</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><b>Status Rumah</b></label>
                            <select class="form-control" name="status_rumah" required>
                                <option value=" ">-pilih status rumah -</option>
                                <option value="bersama Orang Tua">bersama Orang Tua</option>
                                <option value="kost">kost</option>
                                <option value="lainya">lainya</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><b>Status Mukim</b></label>
                            <select class="form-control" name="status_mukim" required>
                                <option value=" ">-pilih status mukim -</option>
                                <option value="mukim">Mukim</option>
                                <option value="ngalong">Ngalong</option>
                                <option value="lainya">lainya</option>
                            </select>
                        </div>
                        <div class="row ">
                                <label class="form-label"><b>Foto</b></label>
                                <div class="custom-file">
                                    <input id="preview_gambar" class="form-group" type="file" name="foto" required>
                                </div>
                            
                        </div>

                    </div>
                </div>

                <div class="card mb-3 shadow">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label"><b>Alamat</b></label>
                            <input type="text" class="form-control" name="alamat" required>
                            <div class="form-text">No. rumah / Gang / Dukuh / Lainya</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><b>Rt/Rw</b></label>
                            <input type="text" class="form-control" name="rt" placeholder="Rt." required>
                            <input type="text" class="form-control" name="rw" placeholder="Rw." required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><b>Desa</b></label>
                            <input type="text" class="form-control" name="desa" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><b>Kecamatan</b></label>
                            <input type="text" class="form-control" name="kecamatan" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><b>Kabupaten</b></label>
                            <input type="text" class="form-control" name="kabupaten" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><b>provinsi</b></label>
                            <input type="text" class="form-control" name="provinsi" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><b>Kode Pos</b></label>
                            <input type="text" class="form-control" name="kode_pos" required>
                        </div>
                    </div>
                </div>
                <div class="card mb-3 shadow">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label"><b>No KK (Kartu Keluarga)</b></label>
                            <input type="text" class="form-control" name="kk" required>
                        </div>
                        <label class="form-label"><b>Status Ayah</b></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input type="checkbox" name="dataayah" id="tombolayah">
                                </div>
                            </div>
                            <input type="text" class="form-control" aria-label="Text input with checkbox" disabled value="Hidup">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input type="checkbox" name="dataayah" id="tombolayah2">
                                </div>
                            </div>
                            <input type="text" class="form-control" aria-label="Text input with checkbox" disabled value="Tidak Ada">
                        </div>
                    </div>

                </div>
                <div class="card mb-3 shadow" id="dataayah">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label"><b>NIK Ayah</b></label>
                            <input type="text" class="form-control" name="nik_ayah">
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><b>Nama Ayah</b></label>
                            <input type="text" class="form-control" name="nama_ayah">
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><b>Tempat Lahir Ayah</b></label>
                            <input type="text" class="form-control" name="tempat_lahir_ayah">
                            <!-- <div  class="form-text">Jika Ada !!</div> -->
                            <?php ('tempat_lahir_ayah'); ?>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><b>Tanggal Lahir Ayah</b></label>
                            <input type="date" class="form-control" name="tanggal_lahir_ayah">
                            <!-- <div  class="form-text">Jika Ada !!</div> -->
                            <?php ('tanggal_lahir_ayah'); ?>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><b>Pekerjaan Ayah</b></label>
                            <select class="form-control" name="pekerjaan_ayah">
                                <option value=" ">-pilih pekerjaan ayah -</option>
                                <option value="Tidak Bekerja">Tidak Bekerja</option>
                                <option value="Buruh (Tani/Pabrik/Bangunan)">Buruh (Tani/Pabrik/Bangunan)</option>
                                <option value="Dokter/Bidan/Perawat">Dokter/Bidan/Perawat</option>
                                <option value="Guru/Dosen">Guru/Dosen</option>
                                <option value="Nelayan">Nelayan</option>
                                <option value="Pedagang">Pedagang</option>
                                <option value="Pegawai Swasta">Pegawai Swasta</option>
                                <option value="Pengacara/Hakim/Jaksa/Notaris">Pengacara/Hakim/Jaksa/Notaris</option>
                                <option value="Pensiunan">Pensiunan</option>
                                <option value="Petani/Peternak">Petani/Peternak</option>
                                <option value="Pilot/Pramugara">Pilot/Pramugara</option>
                                <option value="PNS">PNS</option>
                                <option value="Politikus">Politikus</option>
                                <option value="Seniman/Pelukis/Artis/Sejenisnya">Seniman/Pelukis/Artis/Sejenisnya</option>
                                <option value="Supir/Masinis/Kondektur">Supir/Masinis/Kondektur</option>
                                <option value="TNI/Polisi">TNI/Polisi</option>
                                <option value="Wiraswasta">Wiraswasta</option>
                                <option value="Tidak Mengisi">Tidak Mengisi</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><b>Pendidikan Ayah</b></label>
                            <select class="form-control" name="pendidikan_ayah">
                                <option value=" ">- Pilih Pendidikan Ayah -</option>
                                <option value="Tidak Memiliki Pendidikan Formal">Tidak Memiliki Pendidikan Formal </option>
                                <option value="SD/MI/Sederajat">SD/MI/Sederajat</option>
                                <option value="SMP/MTs/Sederajat">SMP/MTs/Sederajat</option>
                                <option value="SMA/Aliyah/Sederajat">SMA/Aliyah/Sederajat</option>
                                <option value="D3">D3</option>
                                <option value="S1">S1</option>
                                <option value="S2">S2</option>
                                <option value="S3">S3</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><b>No. HP. Ayah</b></label>
                            <input type="text" class="form-control" name="hp_ayah">
                            <div class="form-text">Kalau Ada Nomor Whatsapp</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><b>Penghasilan Ayah</b></label>
                            <select class="form-control" name="penghasilan_ayah">
                                <option value=" ">- Pilih Penghasilan Ayah -</option>
                                <option value="Tidak Berpenghasilan">Tidak Berpenghasilan </option>
                                <option value="<= Rp. 500.000">
                                    <= Rp. 500.000</option>
                                <option value="Rp. 500.001 - Rp. 1.000.000">Rp. 500.001 - Rp. 1.000.000</option>
                                <option value="Rp. 1.000.001 - Rp. 2.000.000">Rp. 1.000.001 - Rp. 2.000.000</option>
                                <option value="Rp. 2.000.001 - Rp. 3.000.000">Rp. 2.000.001 - Rp. 4.000.000</option>
                                <option value="Rp. 4.000.001 - Rp. 5.000.000">Rp. 4.000.001 - Rp. 5.000.000</option>
                                <option value="> Rp. 5.000.000">> Rp. 5.000.000</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card mb-3 shadow">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label"><b>Nama Gadis Ibu Kandung</b></label>
                            <input type="text" class="form-control" name="nama_ibu" required>
                        </div>
                        <label class="form-label"><b>Status Ibu</b></label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input type="checkbox" name="dataibu" aria-label="Checkbox for following text input" id="tombolibu">
                                </div>
                            </div>
                            <input type="text" class="form-control" aria-label="Text input with checkbox" disabled value="Hidup">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input type="checkbox" name="dataibu" aria-label="Checkbox for following text input" id="tombolibu2">
                                </div>
                            </div>
                            <input type="text" class="form-control" aria-label="Text input with checkbox" disabled value="Tidak Ada">
                        </div>
                    </div>

                </div>
                <div class="card mb-3 shadow" id="dataibu">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label"><b>NIK ibu</b></label>
                            <input type="text" class="form-control" name="nik_ibu">
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><b>Tempat Lahir ibu</b></label>
                            <input type="text" class="form-control" name="tempat_lahir_ibu">
                            <!-- <div  class="form-text">Jika Ada !!</div> -->
                            <?php ('tempat_lahir_ibu'); ?>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><b>Tanggal Lahir ibu</b></label>
                            <input type="date" class="form-control" name="tanggal_lahir_ibu">
                            <!-- <div  class="form-text">Jika Ada !!</div> -->
                            <?php ('tanggal_lahir_ibu'); ?>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><b>Pekerjaan ibu</b></label>
                            <select class="form-control" name="pekerjaan_ibu">
                                <option value=" ">-pilih pekerjaan ibu -</option>
                                <option value="Tidak Bekerja">Tidak Bekerja</option>
                                <option value="Buruh (Tani/Pabrik/Bangunan)">Buruh (Tani/Pabrik/Bangunan)</option>
                                <option value="Dokter/Bidan/Perawat">Dokter/Bidan/Perawat</option>
                                <option value="Guru/Dosen">Guru/Dosen</option>
                                <option value="Nelayan">Nelayan</option>
                                <option value="Pedagang">Pedagang</option>
                                <option value="Pegawai Swasta">Pegawai Swasta</option>
                                <option value="Pengacara/Hakim/Jaksa/Notaris">Pengacara/Hakim/Jaksa/Notaris</option>
                                <option value="Pensiunan">Pensiunan</option>
                                <option value="Petani/Peternak">Petani/Peternak</option>
                                <option value="Pilot/Pramugara">Pilot/Pramugara</option>
                                <option value="PNS">PNS</option>
                                <option value="Politikus">Politikus</option>
                                <option value="Seniman/Pelukis/Artis/Sejenisnya">Seniman/Pelukis/Artis/Sejenisnya</option>
                                <option value="Supir/Masinis/Kondektur">Supir/Masinis/Kondektur</option>
                                <option value="TNI/Polisi">TNI/Polisi</option>
                                <option value="Wiraswasta">Wiraswasta</option>
                                <option value="Tidak Mengisi">Tidak Mengisi</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><b>Pendidikan ibu</b></label>
                            <select class="form-control" name="pendidikan_ibu">
                                <option value=" ">- Pilih Pendidikan ibu -</option>
                                <option value="Tidak Memiliki Pendidikan Formal">Tidak Memiliki Pendidikan Formal </option>
                                <option value="SD/MI/Sederajat">SD/MI/Sederajat</option>
                                <option value="SMP/MTs/Sederajat">SMP/MTs/Sederajat</option>
                                <option value="SMA/Aliyah/Sederajat">SMA/Aliyah/Sederajat</option>
                                <option value="D3">D3</option>
                                <option value="S1">S1</option>
                                <option value="S2">S2</option>
                                <option value="S3">S3</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><b>No. HP. ibu</b></label>
                            <input type="text" class="form-control" name="hp_ibu">
                            <div class="form-text">Kalau Ada Nomor Whatsapp</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><b>Penghasilan ibu</b></label>
                            <select class="form-control" name="penghasilan_ibu">
                                <option value=" ">- Pilih Penghasilan ibu -</option>
                                <option value="Tidak Berpenghasilan">Tidak Berpenghasilan </option>
                                <option value="<= Rp. 500.000">
                                    <= Rp. 500.000</option>
                                <option value="Rp. 500.001 - Rp. 1.000.000">Rp. 500.001 - Rp. 1.000.000</option>
                                <option value="Rp. 1.000.001 - Rp. 2.000.000">Rp. 1.000.001 - Rp. 2.000.000</option>
                                <option value="Rp. 2.000.001 - Rp. 3.000.000">Rp. 2.000.001 - Rp. 4.000.000</option>
                                <option value="Rp. 4.000.001 - Rp. 5.000.000">Rp. 4.000.001 - Rp. 5.000.000</option>
                                <option value="> Rp. 5.000.000">> Rp. 5.000.000</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card mb-3 shadow">
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label"><b>Siapa yang menjadi wali santri?</b></label>
                            <select class="form-control" name="wali" required>
                                <option value=" ">- Pilih Wali -</option>

                                <option value="Ayah">Ayah</option>
                                <option value="ibu">Ibu</option>
                                <option value="Kakak/Saudara">Kakak/Saudara</option>
                                <option value="Kakek/Nenek">Kakek/Nenek</option>
                                <option value="Lainya">Lainya</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><b>No. Whatsapp Wali</b></label>
                            <input type="text" class="form-control" name="hp_wali" required>
                        </div>
                        <div class="mb-3">
                            <input type="text" name="keterangan" value="aktif" hidden>
                        </div>
                        <div class="mb-3">
                            <input type="submit" class="btn btn-primary " value="KIRIM">
                        </div>
                    </div>
                </div>

                <?php echo form_close(); ?>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    </section>
    
    
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 3000);
    </script>


    <script>
        function bacaGambar(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#gambar_load').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $('#preview_gambar').change(function() {
            bacaGambar(this);
        });
    </script>
    <script>
        // Mendapatkan semua checkbox dalam grup
        var checkboxes2 = document.querySelectorAll('input[name=dataayah]');

        // Menambahkan event listener untuk setiap checkbox
        checkboxes2.forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                // Jika checkbox dipilih, hilangkan centang dari yang lain
                if (this.checked) {
                    checkboxes2.forEach(function(otherCheckbox) {
                        if (otherCheckbox !== checkbox) {
                            otherCheckbox.checked = false;
                        }
                    });
                }
            });
        });

        var ayah = document.getElementById('dataayah');
        var centang = document.getElementById('tombolayah');
        var tidakcentang = document.getElementById('tombolayah2');

        centang.addEventListener('change', function() {
            // Jika tombol checkbox dicentang, tampilkan gambar
            if (centang.checked) {
                ayah.style.display = 'block'; // Tampilkan gambar dengan mengubah properti CSS display menjadi 'block'
            }
        });

        tidakcentang.addEventListener('change', function() {
            // Jika tombol checkbox dicentang, tampilkan gambar
            if (tidakcentang.checked) {
                ayah.style.display = 'none'; // Tampilkan gambar dengan mengubah properti CSS display menjadi 'block'
            }
        });

        var checkboxes = document.querySelectorAll('input[name=dataibu]');

        // Menambahkan event listener untuk setiap checkbox
        checkboxes.forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                // Jika checkbox dipilih, hilangkan centang dari yang lain
                if (this.checked) {
                    checkboxes.forEach(function(otherCheckbox) {
                        if (otherCheckbox !== checkbox) {
                            otherCheckbox.checked = false;
                        }
                    });
                }
            });
        });

        var ibu = document.getElementById('dataibu');
        var centang2 = document.getElementById('tombolibu');
        var tidakcentang2 = document.getElementById('tombolibu2');

        centang2.addEventListener('change', function() {
            // Jika tombol checkbox dicentang, tampilkan gambar
            if (centang2.checked) {
                ibu.style.display = 'block'; // Tampilkan gambar dengan mengubah properti CSS display menjadi 'block'
            }
        });

        tidakcentang2.addEventListener('change', function() {
            // Jika tombol checkbox dicentang, tampilkan gambar
            if (tidakcentang2.checked) {
                ibu.style.display = 'none'; // Tampilkan gambar dengan mengubah properti CSS display menjadi 'block'
            }
        });
    </script>
</main>