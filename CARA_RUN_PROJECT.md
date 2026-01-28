# 🚀 PANDUAN MENJALANKAN E-ENSIKLOPEDIA ETNOSAING MADURA

Panduan lengkap step-by-step untuk menjalankan website di komputer Anda.

---

## ⚙️ LANGKAH 0: Persiapan (Cek Prerequisites)

Sebelum memulai, pastikan Anda sudah install:

### 1. PHP 8.1 atau lebih tinggi
**Windows:**
```powershell
# Buka PowerShell dan ketik:
php --version

# Jika belum install, download dari: https://www.php.net/downloads
# Atau gunakan xampp/laragon yang sudah include PHP
```

**Cek versi PHP:**
- PHP 8.1+ (Laravel 10.x membutuhkan minimal PHP 8.1)
- Ekstension: mysql, gd, curl, json, xml

### 2. MySQL atau MariaDB
**Windows:**
```powershell
mysql --version

# Jika belum install:
# - Download XAMPP dari: https://www.apachefriends.org
# - Atau download MySQL Community Server: https://dev.mysql.com/downloads/mysql/
# - Atau download MariaDB: https://mariadb.org/download
```

### 3. Composer (PHP Package Manager)
**Windows:**
```powershell
composer --version

# Jika belum install, download dari: https://getcomposer.org/download/
```

### 4. Git (Optional tapi recommended)
```powershell
git --version

# Download dari: https://git-scm.com/
```

---

## ✅ LANGKAH 1: Setup Database MySQL (5 menit)

### Opsi A: Menggunakan XAMPP Control Panel

1. **Buka XAMPP Control Panel**
2. **Klik "Start" pada Apache** (jika akan hosting lokal)
3. **Klik "Start" pada MySQL**
   - Tunggu sampai status berubah menjadi hijau ✅

### Opsi B: Menggunakan MySQL Command Line

**Windows PowerShell:**
```powershell
# Buka PowerShell sebagai Administrator

# 1. Connect ke MySQL
mysql -u root -p

# 2. Jika diminta password, tekan ENTER (default kosong jika XAMPP)

# 3. Create database (copy paste semua di bawah):
```

**SQL Commands:**
```sql
CREATE DATABASE IF NOT EXISTS `e_ensiklopedia` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

CREATE USER 'e_ensiklopedia'@'localhost' IDENTIFIED BY 'password123';

GRANT ALL PRIVILEGES ON `e_ensiklopedia`.* TO 'e_ensiklopedia'@'localhost';

FLUSH PRIVILEGES;

EXIT;
```

**Verifikasi:**
```powershell
# Test connection
mysql -u e_ensiklopedia -p

# Masukkan password: password123
# Jika berhasil, ketik: exit
```

---

## 📥 LANGKAH 2: Organize File-File Project (3 menit)

Sebelumnya file-file disimpan di root folder. Kita perlu organize ke struktur Laravel yang benar.

### Pilihan A: Clone dari GitHub (RECOMMENDED)

**Windows PowerShell:**
```powershell
# Buka PowerShell

# 1. Navigate ke folder Projek
cd d:\Projek\BUDAYA\ MADURA

# 2. Clone repository
git clone https://github.com/rhmatzeka/BudayaMadura.git

# 3. Masuk folder
cd BudayaMadura

# 4. Rename file-file sesuai struktur
# (Langkah ini akan dijelaskan di bawah)
```

### Pilihan B: Organize Manual Dari Existing Files

Jika Anda sudah punya file-file di folder `e-ensiklopedia-laravel`:

```powershell
cd "d:\Projek\BUDAYA MADURA\e-ensiklopedia-laravel"

# 1. Create folder structure
mkdir app\Models
mkdir app\Http\Controllers
mkdir app\Providers
mkdir database\migrations
mkdir database\seeders
mkdir resources\views\layouts
mkdir resources\views\home
mkdir resources\views\produk
mkdir resources\views\glossarium
mkdir routes
mkdir public\images\produk

# 2. Move file-file ke folder yang sesuai
# Move Models:
move app_Models_Produk.php app\Models\Produk.php
move app_Models_Gambar.php app\Models\Gambar.php
move app_Models_Video.php app\Models\Video.php
move app_Models_Glossarium.php app\Models\Glossarium.php
move app_Models_NilaiBudaya.php app\Models\NilaiBudaya.php

# Move Controllers:
move app_Http_Controllers_HomeController.php app\Http\Controllers\HomeController.php
move app_Http_Controllers_ProdukController.php app\Http\Controllers\ProdukController.php
move app_Http_Controllers_GlosariumController.php app\Http\Controllers\GlosariumController.php

# Move Providers:
move app_Providers_AppServiceProvider.php app\Providers\AppServiceProvider.php

# Move Migrations:
move database_migrations_create_produk_table.php database\migrations\2024_01_28_000001_create_produk_table.php
move database_migrations_create_gambar_table.php database\migrations\2024_01_28_000002_create_gambar_table.php
move database_migrations_create_video_table.php database\migrations\2024_01_28_000003_create_video_table.php
move database_migrations_create_glossarium_table.php database\migrations\2024_01_28_000004_create_glossarium_table.php
move database_migrations_create_nilai_budaya_table.php database\migrations\2024_01_28_000005_create_nilai_budaya_table.php
move database_migrations_create_produk_nilai_budaya_table.php database\migrations\2024_01_28_000006_create_produk_nilai_budaya_table.php

# Move Seeders:
move database_seeders_DatabaseSeeder.php database\seeders\DatabaseSeeder.php
move database_seeders_ProdukSeeder.php database\seeders\ProdukSeeder.php
move database_seeders_GlosariumSeeder.php database\seeders\GlosariumSeeder.php

# Move Views:
move resources_views_layouts_app.blade.php resources\views\layouts\app.blade.php
move resources_views_home_index.blade.php resources\views\home\index.blade.php
move resources_views_produk_index.blade.php resources\views\produk\index.blade.php
move resources_views_produk_show.blade.php resources\views\produk\show.blade.php
move resources_views_produk_galeri.blade.php resources\views\produk\galeri.blade.php
move resources_views_glossarium_index.blade.php resources\views\glossarium\index.blade.php

# Move Routes:
move routes_web.php routes\web.php
```

---

## 🛠️ LANGKAH 3: Install Dependencies (5 menit)

**Windows PowerShell:**
```powershell
# 1. Navigate ke project folder
cd "d:\Projek\BUDAYA MADURA\BudayaMadura"
# atau jika menggunakan existing folder:
# cd "d:\Projek\BUDAYA MADURA\e-ensiklopedia-laravel"

# 2. Install composer dependencies
composer install

# ⏳ Tunggu hingga selesai (biasanya 1-5 menit)
```

**Jika ada error:**
```powershell
# Coba perintah ini dulu
composer self-update

# Kemudian coba lagi
composer install
```

---

## ⚙️ LANGKAH 4: Setup Environment File (2 menit)

**Windows PowerShell:**
```powershell
# 1. Copy file template
copy .env.example .env

# 2. Edit file .env dengan text editor (VS Code, Notepad++, dll)
code .env
# atau
notepad .env
```

**File .env - Ubah bagian DATABASE:**

Cari bagian ini di file .env:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=e_ensiklopedia
DB_USERNAME=e_ensiklopedia
DB_PASSWORD=password123
```

**PENTING:** Jika Anda menggunakan:
- **XAMPP** → DB_PASSWORD tidak perlu diubah (kosong)
- **MySQL standalone** → Sesuaikan dengan password Anda

**Contoh untuk XAMPP:**
```env
DB_DATABASE=e_ensiklopedia
DB_USERNAME=root
DB_PASSWORD=
```

---

## 🔑 LANGKAH 5: Generate Application Key (1 menit)

**Windows PowerShell:**
```powershell
php artisan key:generate

# Output yang Anda lihat seharusnya:
# Application key set successfully.
```

---

## 🗄️ LANGKAH 6: Jalankan Database Migrations (2 menit)

**Windows PowerShell:**
```powershell
# 1. Jalankan migrations (buat tabel)
php artisan migrate

# Output:
# Migration table created successfully.
# Migrated:  2024_01_28_000001_create_produk_table
# Migrated:  2024_01_28_000002_create_gambar_table
# dst...
```

**Jika ada error:**
```powershell
# Error: "connection refused"
# Solusi: Pastikan MySQL sudah running

# Error: "Unknown database"
# Solusi: Jalankan CREATE DATABASE terlebih dahulu

# Error: "Access denied"
# Solusi: Check username & password di .env
```

---

## 🌱 LANGKAH 7: Seed Data Sample (1 menit)

**Windows PowerShell:**
```powershell
# Isi database dengan data contoh
php artisan db:seed

# Output:
# Seeding: Database\Seeders\DatabaseSeeder
# Seeded:  Database\Seeders\DatabaseSeeder
```

**Database Sekarang Berisi:**
- 4 Produk (Petis, Tambal Garam, Renginang, Batik)
- 5 Gambar
- 1 Video
- 8 Istilah Glosarium
- 2 Nilai Budaya

---

## 📁 LANGKAH 8: Upload Gambar (Optional - Untuk Demo Lebih Baik)

**Create folder:**
```powershell
mkdir public\images\produk
```

**Download atau copy gambar:**
- Buat file dummy atau ambil gambar dari internet
- Simpan ke folder: `public/images/produk/`
- Nama file harus sesuai database (lihat database seeder):
  - `petis-1.jpg`
  - `petis-2.jpg`
  - `tambal-garam-1.jpg`
  - `renginang-1.jpg`
  - `batik-1.jpg`

---

## 🚀 LANGKAH 9: JALANKAN SERVER (1 menit)

**Windows PowerShell:**
```powershell
# Pastikan masih di folder project
cd "d:\Projek\BUDAYA MADURA\BudayaMadura"

# Jalankan Laravel development server
php artisan serve

# Output:
# INFO  Server running on [http://127.0.0.1:8000].
```

**Server Sekarang Berjalan! ✅**

---

## 🌐 LANGKAH 10: BUKA DI BROWSER

Buka browser dan akses:

| Halaman | URL |
|---------|-----|
| **Beranda** | http://localhost:8000/ |
| **Daftar Produk** | http://localhost:8000/produk |
| **Detail Produk** | http://localhost:8000/produk/petis-madura |
| **Galeri Foto** | http://localhost:8000/produk/galeri |
| **Glosarium** | http://localhost:8000/glossarium |

**Jika halaman loading**, berarti website berhasil berjalan! 🎉

---

## ⚠️ TROUBLESHOOTING

### ❌ Error: "php: command not found"
```powershell
# Solusi: PHP belum di-install atau belum di-PATH

# Cek instalasi:
php --version

# Jika tidak terdeteksi, install XAMPP atau PHP standalone
# Atau gunakan path lengkap:
C:\xampp\php\php artisan serve
```

### ❌ Error: "mysql: command not found"
```powershell
# Solusi: MySQL belum di-install atau belum di-PATH

# Gunakan XAMPP Control Panel untuk start MySQL
# atau install MySQL Community Server
```

### ❌ Error: "Connection refused" saat migrate
```powershell
# Solusi:
# 1. Pastikan MySQL running (XAMPP Control Panel)
# 2. Cek username/password di .env
# 3. Pastikan database sudah di-create

# Test koneksi:
mysql -u root -p
# Enter password (default kosong di XAMPP)
```

### ❌ Error: "Class not found"
```powershell
# Solusi:
composer dump-autoload
php artisan cache:clear
```

### ❌ Images tidak muncul
```powershell
# Solusi:
# 1. Create folder: public\images\produk\
# 2. Upload gambar ke folder tersebut
# 3. Refresh browser (Ctrl+F5)
```

### ❌ "Port 8000 already in use"
```powershell
# Solusi: Gunakan port lain
php artisan serve --port=8001
# Akses: http://localhost:8001
```

### ❌ Database sudah ada tapi ingin reset
```powershell
# Warning: Ini akan menghapus semua data!
php artisan migrate:fresh --seed

# atau hapus manual di MySQL
mysql -u root
DROP DATABASE e_ensiklopedia;
CREATE DATABASE e_ensiklopedia;
```

---

## 🎯 SUMMARY - QUICK COMMANDS

Jika sudah install sebelumnya, cukup jalankan:

```powershell
# 1. Navigate to project
cd "d:\Projek\BUDAYA MADURA\BudayaMadura"

# 2. Install dependencies (jika belum)
composer install

# 3. Setup environment (jika belum)
cp .env.example .env
php artisan key:generate

# 4. Setup database (jika pertama kali)
php artisan migrate
php artisan db:seed

# 5. Run server
php artisan serve

# 6. Open browser
# http://localhost:8000
```

---

## 📱 Akses Dari Device Lain (Optional)

Jika ingin akses dari laptop/HP lain di jaringan yang sama:

```powershell
# Jalankan dengan host yang bisa diakses
php artisan serve --host=0.0.0.0

# Cari IP address komputer Anda
ipconfig

# Contoh output:
# IPv4 Address. . . . . . . . : 192.168.1.100

# Akses dari device lain:
# http://192.168.1.100:8000
```

---

## ✨ Selamat! Website Anda Sudah Running! 🎉

Jika browser menampilkan halaman beranda, berarti semuanya sudah berjalan sempurna!

**Next steps:**
1. Explore website (klik-klik semua halaman)
2. Test search & filter
3. Cek responsiveness di mobile
4. Customize sesuai kebutuhan
5. Deploy ke hosting (lihat panduan deployment di dokumentasi)

---

## 📞 Butuh Bantuan?

- Baca: `PANDUAN_INSTALASI.md`
- Baca: `QUICK_START.md`
- Baca: `README.md`
- Cek: `INFO_LENGKAP.md`

---

**Happy coding! 🚀**
