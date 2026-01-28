# SETUP FINAL - E-Ensiklopedia Etnosaing Madura dengan Laragon v6

## Status: SIAP JALANKAN

Project sudah hampir siap. Ada beberapa file konfigurasi yang perlu di-setup manual. Ikuti langkah berikut:

## LANGKAH 1: Buat Database

1. **Buka Laragon** → Klik tombol "**Database**" (atau double-click MySQL tray)
2. **HeidiSQL** akan terbuka. Jika belum, buka manual:
   - Lokasi: `C:\laragon\bin\heidi SQL\heidisql.exe`
3. **Klik "New"** untuk koneksi baru
4. **Masukkan SQL** di tab **Query**:

```sql
CREATE DATABASE e_ensiklopedia CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE e_ensiklopedia;

-- Tabel produk
CREATE TABLE produk (
  id bigint(20) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nama_produk varchar(255) NOT NULL,
  slug varchar(255) UNIQUE NOT NULL,
  deskripsi longtext,
  manfaat_budaya longtext,
  proses_produksi longtext,
  lokasi_pembuatan varchar(255),
  nama_pembuat varchar(255),
  harga int(11),
  kategori varchar(100),
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  deleted_at timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabel gambar
CREATE TABLE gambar (
  id bigint(20) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
  produk_id bigint(20) unsigned NOT NULL,
  judul_gambar varchar(255),
  path_gambar varchar(255) NOT NULL,
  deskripsi_gambar longtext,
  urutan int(11) DEFAULT 0,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  FOREIGN KEY (produk_id) REFERENCES produk(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabel video
CREATE TABLE video (
  id bigint(20) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
  produk_id bigint(20) unsigned NOT NULL,
  judul_video varchar(255),
  deskripsi_video longtext,
  link_youtube varchar(255) NOT NULL,
  thumbnail_url varchar(255),
  durasi_menit int(11),
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  FOREIGN KEY (produk_id) REFERENCES produk(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabel glossarium
CREATE TABLE glossarium (
  id bigint(20) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
  istilah varchar(255) UNIQUE NOT NULL,
  arti_istilah longtext NOT NULL,
  penjelasan_lengkap longtext,
  kategori varchar(100),
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabel nilai_budaya
CREATE TABLE nilai_budaya (
  id bigint(20) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nama_nilai varchar(255),
  deskripsi_nilai longtext,
  kategori varchar(100),
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Tabel produk_nilai_budaya (relasi many-to-many)
CREATE TABLE produk_nilai_budaya (
  produk_id bigint(20) unsigned NOT NULL,
  nilai_budaya_id bigint(20) unsigned NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  PRIMARY KEY (produk_id, nilai_budaya_id),
  FOREIGN KEY (produk_id) REFERENCES produk(id) ON DELETE CASCADE,
  FOREIGN KEY (nilai_budaya_id) REFERENCES nilai_budaya(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
```

5. **Klik "Execute"** (atau tekan F9)
6. Database selesai dibuat!

## LANGKAH 2: Setup .env File

1. **Buka file `.env`** dengan text editor (NotePad++, VS Code, dll)
2. **Ubah bagian database**:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=e_ensiklopedia
DB_USERNAME=root
DB_PASSWORD=
```

3. **Simpan file**

## LANGKAH 3: Generate APP_KEY

1. **Buka PowerShell** di folder project
2. **Jalankan**:

```powershell
$env:PATH = "C:\laragon\bin\php\php-8.1.10-Win32-vs16-x64;$env:PATH"
& "C:\laragon\bin\php\php-8.1.10-Win32-vs16-x64\php.exe" -r "echo 'base64:' . base64_encode(random_bytes(32));"
```

3. **Copy output** (misal: `base64:abc123def456...`)
4. **Edit `.env`** dan tambahkan:

```
APP_KEY=base64:abc123def456...
```

5. **Simpan file**

## LANGKAH 4: Jalankan Server

1. **Buka PowerShell** di folder project
2. **Jalankan**:

```powershell
$env:PATH = "C:\laragon\bin\php\php-8.1.10-Win32-vs16-x64;$env:PATH"
& "C:\laragon\bin\php\php-8.1.10-Win32-vs16-x64\php.exe" artisan serve
```

3. Server akan berjalan di: `http://localhost:8000`
4. **Buka browser** dan akses!

## LANGKAH 5: Test Halaman

Akses:
- Homepage: http://localhost:8000/
- Produk: http://localhost:8000/produk
- Galeri: http://localhost:8000/produk/galeri
- Glosarium: http://localhost:8000/glossarium

## File Struktur Lengkap

```
e-ensiklopedia-laravel/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── HomeController.php
│   │   │   ├── ProdukController.php
│   │   │   └── GlosariumController.php
│   │   └── Kernel.php
│   ├── Models/
│   │   ├── Produk.php
│   │   ├── Gambar.php
│   │   ├── Video.php
│   │   ├── Glossarium.php
│   │   └── NilaiBudaya.php
│   ├── Console/
│   │   └── Kernel.php
│   ├── Exceptions/
│   │   └── Handler.php
│   └── Providers/
│       └── AppServiceProvider.php
├── bootstrap/
│   └── app.php
├── config/
│   ├── app.php
│   ├── database.php
│   └── logging.php
├── database/
│   ├── migrations/
│   │   ├── 2024_01_28_000001_create_produk_table.php
│   │   ├── 2024_01_28_000002_create_gambar_table.php
│   │   ├── 2024_01_28_000003_create_video_table.php
│   │   ├── 2024_01_28_000004_create_glossarium_table.php
│   │   ├── 2024_01_28_000005_create_nilai_budaya_table.php
│   │   └── 2024_01_28_000006_create_produk_nilai_budaya_table.php
│   └── seeders/
│       ├── DatabaseSeeder.php
│       ├── ProdukSeeder.php
│       └── GlosariumSeeder.php
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php
│       ├── home/
│       │   └── index.blade.php
│       ├── produk/
│       │   ├── index.blade.php
│       │   ├── show.blade.php
│       │   └── galeri.blade.php
│       └── glossarium/
│           └── index.blade.php
├── routes/
│   └── web.php
├── public/
│   ├── css/
│   ├── js/
│   └── images/
│       └── produk/
├── storage/
├── vendor/
├── artisan
├── .env
├── .env.example
├── composer.json
├── composer.lock
└── README.md
```

## Troubleshooting

### Error: "Class does not exist"
**Solusi**: Jalankan:
```powershell
cd "d:\Projek\BUDAYA MADURA\e-ensiklopedia-laravel"
$env:PATH = "C:\laragon\bin\php\php-8.1.10-Win32-vs16-x64;$env:PATH"
& "C:\laragon\bin\composer\composer.bat" dump-autoload
```

### Error: "Connection refused" pada database
**Solusi**: 
1. Buka Laragon
2. Klik "Start All" untuk mulai MySQL
3. Cek status Apache/Nginx di tray

### Error: "View not found"
**Solusi**: Pastikan folder `resources/views/` dan subfolder sudah ada dengan struktur yang benar

---

**Dibuat: 28 Januari 2026**
**Versi: Final Setup**
