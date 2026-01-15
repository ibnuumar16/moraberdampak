# Panduan Migration Database Pesantren

Panduan lengkap untuk menjalankan database migrations di CodeIgniter 4.

## Prasyarat

- PHP 7.4 atau lebih tinggi
- MySQL/MariaDB
- CodeIgniter 4 sudah terinstall
- Composer sudah terinstall

## Konfigurasi Database

Sebelum menjalankan migration, pastikan file `.env` sudah dikonfigurasi dengan benar:

```env
database.default.hostname = localhost
database.default.database = nama_database_anda
database.default.username = username_mysql_anda
database.default.password = password_mysql_anda
database.default.DBDriver = MySQLi
database.default.DBPrefix =
database.default.port = 3306
```

## Perintah Migration

### 1. Menjalankan Migration (Membuat Semua Tabel)

Untuk membuat semua tabel di database:

```bash
php spark migrate
```

Perintah ini akan:
- Membuat 10 tabel: artikel, galeri, halaman, kategori, pengaturan, pengguna, pengumuman, quote, santri, dan user
- Membuat trigger `before_insert_santri` untuk auto-generate NIS santri
- Mencatat versi migration di tabel `migrations`

### 2. Melihat Status Migration

Untuk melihat status migration mana yang sudah/belum dijalankan:

```bash
php spark migrate:status
```

### 3. Rollback Migration (Membatalkan)

Untuk membatalkan migration terakhir (menghapus tabel):

```bash
php spark migrate:rollback
```

Untuk rollback ke batch tertentu:

```bash
php spark migrate:rollback -b 0
```

### 4. Refresh Migration (Reset & Re-run)

Untuk menghapus semua tabel dan menjalankan ulang:

```bash
php spark migrate:refresh
```

⚠️ **PERHATIAN**: Perintah ini akan menghapus semua data di database!

## Deployment ke Server Baru

Ketika deploy aplikasi ke website/server baru:

1. **Upload Files**
   - Upload semua file project ke server
   - Pastikan folder `app/Database/Migrations` ter-upload

2. **Konfigurasi Database**
   - Buat database kosong di server (via cPanel/phpMyAdmin)
   - Edit file `.env` dengan kredensial database server

3. **Jalankan Migration**
   ```bash
   php spark migrate
   ```

4. **Verifikasi**
   - Login ke phpMyAdmin/MySQL
   - Pastikan semua 10 tabel sudah terbuat
   - Test insert data santri untuk memastikan trigger NIS berfungsi

## Struktur Tabel yang Dibuat

| No | Nama Tabel | Fungsi |
|----|------------|--------|
| 1 | artikel | Menyimpan artikel/berita pesantren |
| 2 | galeri | Menyimpan foto gedung dan kegiatan |
| 3 | halaman | Menyimpan halaman statis website |
| 4 | kategori | Menyimpan kategori artikel |
| 5 | pengaturan | Menyimpan pengaturan website (nama, logo, sosmed) |
| 6 | pengguna | Menyimpan data pengguna (admin/penulis/pengurus) |
| 7 | pengumuman | Menyimpan pengumuman dari ustadz |
| 8 | quote | Menyimpan testimonial/quote |
| 9 | santri | Menyimpan data lengkap santri + trigger auto NIS |
| 10 | user | Menyimpan user login sistem |

## Fitur Khusus: Auto-Generate NIS Santri

Tabel `santri` memiliki trigger yang otomatis membuat NIS (Nomor Induk Santri) dengan format:

```
[TAHUN][NOMOR_URUT]
Contoh: 20250001, 20250002, dst.
```

Trigger ini bekerja otomatis saat insert data santri baru, sehingga Anda tidak perlu mengisi kolom `nis_santri` secara manual.

## Troubleshooting

### Error: "Database connection failed"
- Periksa kredensial database di file `.env`
- Pastikan MySQL service berjalan
- Cek hostname, username, dan password

### Error: "Trigger already exists"
Jika sudah pernah menjalankan migration dan ingin menjalankan lagi:
```bash
php spark migrate:rollback
php spark migrate
```

### Error: "Access denied for user"
- Pastikan user MySQL memiliki privilege CREATE, DROP, INSERT, dan CREATE TRIGGER
- Untuk cPanel/hosting: cek database user permissions

## Tips & Catatan

✅ **Best Practices:**
- Selalu backup database sebelum menjalankan migration di production
- Test migration di local/development environment terlebih dahulu
- Jangan edit migration files yang sudah dijalankan, buat migration baru untuk perubahan

✅ **Untuk Development:**
- Gunakan `migrate:refresh` untuk reset database saat development
- Gunakan database seeder untuk isi data dummy/testing

✅ **Untuk Production:**
- Hanya jalankan `php spark migrate` (jangan refresh!)
- Backup database sebelum deployment
- Test di staging environment dulu

## File SQL Original

File `database_pesantren.sql` masih tersimpan sebagai backup. Anda bisa gunakan file ini jika:
- Ingin import manual via phpMyAdmin
- Sebagai referensi struktur database
- Backup cadangan

Namun untuk deployment yang lebih profesional dan mudah, **gunakan migration**.

---

**Dibuat**: 30 November 2025  
**Framework**: CodeIgniter 4  
**Database**: MySQL/MariaDB
