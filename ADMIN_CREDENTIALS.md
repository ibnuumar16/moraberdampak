# Admin Login Credentials

## Dummy Users untuk Testing

Berikut adalah kredensial login dummy yang sudah dibuat untuk testing:

### 1. Super Admin
- **Username**: `admin`
- **Password**: `admin123`
- **Level**: 1 (Super Admin - Full Access)
- **Deskripsi**: Akses penuh ke semua fitur dashboard

### 2. Pengurus
- **Username**: `pengurus`
- **Password**: `pengurus123`
- **Level**: 2 (Pengurus - Limited Access)
- **Deskripsi**: Akses untuk manage santri dan data operasional

### 3. Ustadz/Staff
- **Username**: `ustadz`
- **Password**: `ustadz123`
- **Level**: 3 (Ustadz/Staff - Basic Access)
- **Deskripsi**: Akses untuk input data dan lihat informasi

---

## Login URL

**Dashboard Login**: http://localhost:8080/login

---

## Security Notes

⚠️ **IMPORTANT**: 
- Kredensial ini HANYA untuk development/testing
- **JANGAN gunakan di production!**
- Sebelum deploy live, hapus dummy users dan buat admin baru dengan password kuat

---

## How to Create New Admin User

Via database seeder:
```bash
php spark db:seed UserSeeder
```

Atau manual via phpMyAdmin/SQL:
```sql
INSERT INTO user (nama_user, username, password, foto, level) 
VALUES ('Nama Admin', 'username_baru', '$2y$10$...hashed_password...', 'default.png', '1');
```

**Generate password hash di PHP**:
```php
<?php
echo password_hash('password_anda', PASSWORD_DEFAULT);
?>
```

---

## Level Access (Reference)

| Level | Role | Description |
|-------|------|-------------|
| 1 | Super Admin | Full access semua fitur |
| 2 | Pengurus | Manage santri, artikel, galeri |
| 3 | Ustadz/Staff | Input data, view only |

---

**Last Updated**: 30 November 2025
