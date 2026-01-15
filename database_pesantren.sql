-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 30 Nov 2025 pada 04.04
-- Versi server: 10.11.14-MariaDB-cll-lve
-- Versi PHP: 8.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u1689907_ib`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE `artikel` (
  `artikel_id` int(11) NOT NULL,
  `artikel_tanggal` datetime NOT NULL,
  `artikel_judul` varchar(255) NOT NULL,
  `artikel_slug` varchar(255) NOT NULL,
  `artikel_konten` longtext NOT NULL,
  `artikel_sampul` varchar(255) NOT NULL,
  `artikel_author` int(11) NOT NULL,
  `artikel_kategori` int(11) NOT NULL,
  `artikel_status` enum('publish','draft') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE `galeri` (
  `galeri_id` int(11) NOT NULL,
  `galeri_judul` varchar(255) NOT NULL,
  `galeri_kategori` enum('gedung','kegiatan') NOT NULL,
  `galeri_foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `halaman`
--

CREATE TABLE `halaman` (
  `halaman_id` int(11) NOT NULL,
  `halaman_judul` varchar(255) NOT NULL,
  `halaman_slug` varchar(255) NOT NULL,
  `halaman_konten` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` varchar(225) NOT NULL,
  `kategori_slug` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaturan`
--

CREATE TABLE `pengaturan` (
  `id_pengaturan` int(11) NOT NULL,
  `tahun_akademik` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `link_youtube` varchar(255) NOT NULL,
  `link_facebook` varchar(255) NOT NULL,
  `link_twitter` varchar(255) NOT NULL,
  `link_instagram` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `pengguna_id` int(11) NOT NULL,
  `pengguna_nama` varchar(50) NOT NULL,
  `pengguna_email` varchar(255) NOT NULL,
  `pengguna_username` varchar(50) NOT NULL,
  `pengguna_password` varchar(255) NOT NULL,
  `pengguna_level` enum('admin','penulis','pengurus') NOT NULL,
  `pengguna_status` int(11) NOT NULL,
  `pengguna_foto` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(11) NOT NULL,
  `id_ustadz` int(11) NOT NULL,
  `isi_pengumuman` text NOT NULL,
  `tanggal_pengumuman` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `quote`
--

CREATE TABLE `quote` (
  `id_quote` int(11) NOT NULL,
  `nama_quote` varchar(255) NOT NULL,
  `jabatan_quote` varchar(255) NOT NULL,
  `isi_quote` longtext NOT NULL,
  `foto_quote` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `santri`
--

CREATE TABLE `santri` (
  `id_santri` int(11) NOT NULL,
  `nama_santri` varchar(255) DEFAULT NULL,
  `nis_santri` varchar(20) DEFAULT NULL,
  `nisn_santri` varchar(20) DEFAULT NULL,
  `kip_santri` varchar(20) DEFAULT NULL,
  `pkh_santri` varchar(20) DEFAULT NULL,
  `kks_santri` varchar(20) DEFAULT NULL,
  `nik_santri` varchar(20) DEFAULT NULL,
  `tempat_lahir_santri` varchar(100) DEFAULT NULL,
  `tanggal_lahir_santri` varchar(200) DEFAULT NULL,
  `jk_santri` varchar(20) DEFAULT NULL,
  `agama_santri` varchar(50) DEFAULT NULL,
  `hobi_santri` varchar(255) DEFAULT NULL,
  `cita_cita_santri` varchar(255) DEFAULT NULL,
  `kewarganegaraan_santri` varchar(50) DEFAULT NULL,
  `status_rumah_santri` varchar(50) DEFAULT NULL,
  `status_mukim_santri` varchar(50) DEFAULT NULL,
  `email_santri` varchar(255) DEFAULT NULL,
  `wa_santri` varchar(20) DEFAULT NULL,
  `kk_santri` varchar(20) DEFAULT NULL,
  `tanggal_masuk` varchar(200) DEFAULT NULL,
  `tahun_masuk_santri` varchar(10) DEFAULT NULL,
  `jml_saudara_santri` int(11) DEFAULT NULL,
  `anakke_santri` int(11) DEFAULT NULL,
  `kategori_santri` text DEFAULT NULL,
  `foto_santri` varchar(255) DEFAULT NULL,
  `password_santri` varchar(255) DEFAULT NULL,
  `nik_ayah_santri` varchar(20) DEFAULT NULL,
  `nama_ayah_santri` varchar(255) DEFAULT NULL,
  `tempat_lahir_ayah_santri` varchar(100) DEFAULT NULL,
  `tanggal_lahir_ayah_santri` varchar(200) DEFAULT NULL,
  `pekerjaan_ayah_santri` varchar(100) DEFAULT NULL,
  `pendidikan_ayah_santri` varchar(100) DEFAULT NULL,
  `telp_ayah_santri` varchar(20) DEFAULT NULL,
  `penghasilan_ayah_santri` varchar(200) DEFAULT NULL,
  `nik_ibu_santri` varchar(20) DEFAULT NULL,
  `nama_ibu_santri` varchar(255) DEFAULT NULL,
  `tempat_lahir_ibu_santri` varchar(100) DEFAULT NULL,
  `tanggal_lahir_ibu_santri` varchar(200) DEFAULT NULL,
  `pekerjaan_ibu_santri` varchar(100) DEFAULT NULL,
  `pendidikan_ibu_santri` varchar(100) DEFAULT NULL,
  `telp_ibu_santri` varchar(20) DEFAULT NULL,
  `penghasilan_ibu_santri` varchar(200) DEFAULT NULL,
  `wali_santri` varchar(255) DEFAULT NULL,
  `wa_wali` varchar(20) DEFAULT NULL,
  `alamat_santri` text DEFAULT NULL,
  `rt_santri` varchar(10) DEFAULT NULL,
  `rw_santri` varchar(10) DEFAULT NULL,
  `desa_santri` varchar(100) DEFAULT NULL,
  `kecamatan_santri` varchar(100) DEFAULT NULL,
  `kabupaten_santri` varchar(100) DEFAULT NULL,
  `provinsi_santri` varchar(100) DEFAULT NULL,
  `kode_pos_santri` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Trigger `santri`
--
DELIMITER $$
CREATE TRIGGER `before_insert_santri` BEFORE INSERT ON `santri` FOR EACH ROW BEGIN
    DECLARE last_nis INT;
    DECLARE new_nis VARCHAR(10);

    -- Ambil NIS terakhir dari database
    SELECT RIGHT(nis_santri, 4) INTO last_nis
    FROM santri
    WHERE YEAR(tanggal_masuk) = YEAR(NEW.tanggal_masuk)
    ORDER BY nis_santri DESC
    LIMIT 1;

    -- Jika tidak ada data, mulai dari 0001
    IF last_nis IS NULL THEN
        SET last_nis = 0;
    END IF;

    -- Tambahkan 1 ke NIS terakhir
    SET new_nis = CONCAT(YEAR(NEW.tanggal_masuk), LPAD(last_nis + 1, 4, '0'));

    -- Tetapkan NIS baru
    SET NEW.nis_santri = new_nis;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `level` enum('1','2','3') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`artikel_id`);

--
-- Indeks untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`galeri_id`);

--
-- Indeks untuk tabel `halaman`
--
ALTER TABLE `halaman`
  ADD PRIMARY KEY (`halaman_id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indeks untuk tabel `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`id_pengaturan`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`pengguna_id`);

--
-- Indeks untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indeks untuk tabel `quote`
--
ALTER TABLE `quote`
  ADD PRIMARY KEY (`id_quote`);

--
-- Indeks untuk tabel `santri`
--
ALTER TABLE `santri`
  ADD PRIMARY KEY (`id_santri`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `artikel`
--
ALTER TABLE `artikel`
  MODIFY `artikel_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `galeri`
--
ALTER TABLE `galeri`
  MODIFY `galeri_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `halaman`
--
ALTER TABLE `halaman`
  MODIFY `halaman_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengaturan`
--
ALTER TABLE `pengaturan`
  MODIFY `id_pengaturan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `pengguna_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `quote`
--
ALTER TABLE `quote`
  MODIFY `id_quote` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `santri`
--
ALTER TABLE `santri`
  MODIFY `id_santri` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
