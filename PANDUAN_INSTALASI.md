# PANDUAN LENGKAP INSTALASI E-ENSIKLOPEDIA ETNOSAING MADURA

## 📋 Prasyarat Sistem

Sebelum memulai instalasi, pastikan komputer Anda memiliki:
- PHP 8.1 atau lebih tinggi
- Composer (PHP Dependency Manager)
- MySQL 5.7 atau lebih tinggi (atau MariaDB)
- Git (opsional)
- Node.js 14+ (untuk development tools)

## ✅ Langkah-Langkah Instalasi

### 1. Setup Database

**Langkah 1.1: Buat Database MySQL**
```bash
# Buka MySQL Command Line atau MySQL Workbench
mysql -u root -p

# Buat database
CREATE DATABASE e_ensiklopedia;
CREATE USER 'e_ensiklopedia'@'localhost' IDENTIFIED BY 'password123';
GRANT ALL PRIVILEGES ON e_ensiklopedia.* TO 'e_ensiklopedia'@'localhost';
FLUSH PRIVILEGES;
EXIT;
```

**Langkah 1.2: Verifikasi Database**
```bash
mysql -u e_ensiklopedia -p e_ensiklopedia
# Masukkan password: password123
SHOW TABLES;
EXIT;
```

### 2. Setup Project Laravel

**Langkah 2.1: Copy File ke Folder Project**
```bash
# Navigasi ke folder project
cd d:\Projek\BUDAYA MADURA\e-ensiklopedia-laravel

# Copy seluruh file yang telah dibuat
# Struktur final adalah:
# e-ensiklopedia-laravel/
# ├── app/Models/*.php
# ├── app/Http/Controllers/*.php
# ├── database/migrations/*.php
# ├── database/seeders/*.php
# ├── resources/views/**/*.blade.php
# ├── routes/web.php
# ├── .env.example
# └── composer.json
```

**Langkah 2.2: Install Composer Dependencies**
```bash
composer install
```

**Langkah 2.3: Generate Application Key**
```bash
cp .env.example .env
php artisan key:generate
```

**Langkah 2.4: Konfigurasi .env**
Edit file `.env` dan sesuaikan konfigurasi database:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=e_ensiklopedia
DB_USERNAME=e_ensiklopedia
DB_PASSWORD=password123
```

### 3. Setup Database Migrations

**Langkah 3.1: Jalankan Migrations**
```bash
php artisan migrate
```

Perintah ini akan membuat semua table di database:
- `produk` - Tabel produk budaya
- `gambar` - Tabel gambar produk
- `video` - Tabel video produk
- `glossarium` - Tabel istilah budaya
- `nilai_budaya` - Tabel nilai budaya
- `produk_nilai_budaya` - Tabel relasi produk dan nilai budaya

**Langkah 3.2: Seed Database dengan Data Dummy**
```bash
php artisan db:seed
```

Perintah ini akan mengisi database dengan data contoh:
- 4 produk (Petis Madura, Tambal Garam, Renginang Kelor, Batik Madura)
- Gambar dan video untuk setiap produk
- 8 istilah glosarium

### 4. Setup Folder Public

**Langkah 4.1: Buat Folder Gambar**
```bash
# Jika menggunakan Windows PowerShell
mkdir public\images\produk
mkdir public\videos

# Jika menggunakan Command Prompt
mkdir public\images\produk
mkdir public\videos
```

**Langkah 4.2: Copy Gambar Produk**
Copy seluruh file gambar produk Anda ke folder:
- `public/images/produk/`

Penamaan file harus sesuai dengan yang ada di database seeder:
- `petis-1.jpg`, `petis-2.jpg`
- `tambal-garam-1.jpg`
- `renginang-1.jpg`
- `batik-1.jpg`

### 5. Jalankan Development Server

```bash
php artisan serve
```

Server akan berjalan di: `http://localhost:8000`

## 🌐 Akses Website

Buka browser dan akses:
- **Beranda**: http://localhost:8000/
- **Daftar Produk**: http://localhost:8000/produk
- **Galeri Foto**: http://localhost:8000/produk/galeri
- **Glosarium**: http://localhost:8000/glossarium

## 📁 Struktur Folder Lengkap

```
e-ensiklopedia-laravel/
│
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── HomeController.php
│   │       ├── ProdukController.php
│   │       └── GlosariumController.php
│   ├── Models/
│   │   ├── Produk.php
│   │   ├── Gambar.php
│   │   ├── Video.php
│   │   ├── Glossarium.php
│   │   └── NilaiBudaya.php
│   └── Providers/
│
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
│
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
│
├── routes/
│   └── web.php
│
├── public/
│   ├── images/
│   │   └── produk/
│   └── videos/
│
├── .env.example
├── .env (di-generate saat instalasi)
├── composer.json
└── composer.lock
```

## 🗄️ Struktur Database

### Tabel: produk
```sql
CREATE TABLE produk (
  id BIGINT PRIMARY KEY AUTO_INCREMENT,
  nama_produk VARCHAR(255) NOT NULL,
  slug VARCHAR(255) UNIQUE NOT NULL,
  deskripsi TEXT,
  manfaat_budaya TEXT,
  proses_produksi TEXT,
  lokasi_pembuatan VARCHAR(255),
  nama_pembuat VARCHAR(255),
  harga INT,
  kategori VARCHAR(100),
  created_at TIMESTAMP,
  updated_at TIMESTAMP,
  deleted_at TIMESTAMP
);
```

### Tabel: gambar
```sql
CREATE TABLE gambar (
  id BIGINT PRIMARY KEY AUTO_INCREMENT,
  produk_id BIGINT FOREIGN KEY,
  judul_gambar VARCHAR(255),
  path_gambar VARCHAR(255) NOT NULL,
  deskripsi_gambar TEXT,
  urutan INT DEFAULT 0,
  created_at TIMESTAMP,
  updated_at TIMESTAMP
);
```

### Tabel: video
```sql
CREATE TABLE video (
  id BIGINT PRIMARY KEY AUTO_INCREMENT,
  produk_id BIGINT FOREIGN KEY,
  judul_video VARCHAR(255),
  deskripsi_video TEXT,
  link_youtube VARCHAR(255) NOT NULL,
  thumbnail_url VARCHAR(255),
  durasi_menit INT,
  created_at TIMESTAMP,
  updated_at TIMESTAMP
);
```

### Tabel: glossarium
```sql
CREATE TABLE glossarium (
  id BIGINT PRIMARY KEY AUTO_INCREMENT,
  istilah VARCHAR(255) UNIQUE NOT NULL,
  arti_istilah TEXT NOT NULL,
  penjelasan_lengkap TEXT,
  kategori VARCHAR(100),
  created_at TIMESTAMP,
  updated_at TIMESTAMP
);
```

### Tabel: nilai_budaya
```sql
CREATE TABLE nilai_budaya (
  id BIGINT PRIMARY KEY AUTO_INCREMENT,
  nama_nilai VARCHAR(255),
  deskripsi_nilai TEXT,
  kategori VARCHAR(100),
  created_at TIMESTAMP,
  updated_at TIMESTAMP
);
```

### Tabel: produk_nilai_budaya (Relasi Many-to-Many)
```sql
CREATE TABLE produk_nilai_budaya (
  produk_id BIGINT FOREIGN KEY,
  nilai_budaya_id BIGINT FOREIGN KEY,
  created_at TIMESTAMP,
  updated_at TIMESTAMP,
  PRIMARY KEY (produk_id, nilai_budaya_id)
);
```

## 📝 Cara Menambah Data

### 1. Tambah Produk Baru

**Via Database (PhpMyAdmin)**:
```sql
INSERT INTO produk (
  nama_produk, 
  slug, 
  deskripsi, 
  kategori,
  created_at,
  updated_at
) VALUES (
  'Soto Madura',
  'soto-madura',
  'Sup tradisional khas Madura dengan cita rasa yang khas',
  'Makanan',
  NOW(),
  NOW()
);
```

**Via CLI Laravel**:
```bash
php artisan tinker
>>> $produk = new App\Models\Produk();
>>> $produk->nama_produk = 'Soto Madura';
>>> $produk->slug = 'soto-madura';
>>> $produk->deskripsi = 'Sup tradisional khas Madura';
>>> $produk->kategori = 'Makanan';
>>> $produk->save();
```

### 2. Tambah Gambar Produk

```bash
php artisan tinker
>>> $produk = App\Models\Produk::where('slug', 'soto-madura')->first();
>>> $gambar = new App\Models\Gambar();
>>> $gambar->produk_id = $produk->id;
>>> $gambar->judul_gambar = 'Soto Madura';
>>> $gambar->path_gambar = 'soto-madura.jpg';
>>> $gambar->urutan = 1;
>>> $gambar->save();
```

### 3. Tambah Video Produk

```bash
php artisan tinker
>>> $produk = App\Models\Produk::where('slug', 'soto-madura')->first();
>>> $video = new App\Models\Video();
>>> $video->produk_id = $produk->id;
>>> $video->judul_video = 'Cara Membuat Soto Madura';
>>> $video->link_youtube = 'https://www.youtube.com/watch?v=YOUR_VIDEO_ID';
>>> $video->durasi_menit = 20;
>>> $video->save();
```

### 4. Tambah Istilah Glosarium

```bash
php artisan tinker
>>> App\Models\Glossarium::create([
...   'istilah' => 'Soto',
...   'arti_istilah' => 'Sup atau kuah masakan',
...   'kategori' => 'Makanan'
... ]);
```

## 🔧 Perintah Artisan Penting

```bash
# Jalankan development server
php artisan serve

# Buat migration baru
php artisan make:migration create_table_name

# Jalankan migration
php artisan migrate

# Rollback migration terbaru
php artisan migrate:rollback

# Seed database
php artisan db:seed

# Buat model baru
php artisan make:model ModelName

# Buat controller baru
php artisan make:controller ControllerName

# Buat seeder baru
php artisan make:seeder SeederName

# Clear cache
php artisan cache:clear

# Akses tinker (interactive shell)
php artisan tinker
```

## 🎥 Cara Menambah Link Video YouTube

1. Upload video ke YouTube
2. Copy URL video (misal: https://www.youtube.com/watch?v=dQw4w9WgXcQ)
3. Simpan URL tersebut di field `link_youtube` pada tabel video
4. Model Video secara otomatis akan mengekstrak Video ID dan membuat embed URL

## 🖼️ Cara Upload Gambar

1. Tambahkan gambar ke folder `public/images/produk/`
2. Catat nama file gambar (misal: petis-1.jpg)
3. Simpan nama file di field `path_gambar` pada tabel gambar
4. Website akan menampilkan gambar secara otomatis

## 🚀 Deployment ke Production

```bash
# 1. Install dependencies (production only)
composer install --optimize-autoloader --no-dev

# 2. Konfigurasi .env untuk production
# Ubah APP_DEBUG=false
# Sesuaikan DB credentials

# 3. Generate key
php artisan key:generate

# 4. Jalankan migration
php artisan migrate --force

# 5. Cache configuration
php artisan config:cache
php artisan route:cache
php artisan view:cache

# 6. Gunakan web server (Apache, Nginx)
```

## 📞 Troubleshooting

### Error: SQLSTATE[HY000]: General error: 1030
**Solusi**: Pastikan database sudah dibuat dan konfigurasi .env benar

### Error: Model not found
**Solusi**: Pastikan namespace di controller sesuai dengan file model

### Error: View not found
**Solusi**: Pastikan file blade.php ada di folder resources/views/

### Images tidak muncul
**Solusi**: 
1. Pastikan file gambar ada di public/images/produk/
2. Nama file di database harus sesuai dengan nama file asli
3. Jalankan: `php artisan storage:link` (jika menggunakan storage)

## 📚 Referensi Tambahan

- Laravel Documentation: https://laravel.com/docs/10.x
- Bootstrap 5: https://getbootstrap.com/docs/5.3/
- MySQL Documentation: https://dev.mysql.com/doc/

## ✨ Fitur Lengkap Website

✅ Halaman Beranda dengan statistik
✅ Daftar Produk dengan pagination
✅ Halaman Detail Produk dengan multiple gallery
✅ Video Integration (YouTube links)
✅ Glosarium Istilah Budaya
✅ Search Produk dan Glosarium
✅ Filter Kategori
✅ Responsive Design (Mobile-friendly)
✅ Database relational untuk data terstruktur
✅ Admin-ready (siap untuk menambah CMS panel)

---

**Dibuat untuk: E-Ensiklopedia Etnosaing Madura**
**Versi: 1.0**
**Tanggal: 28 Januari 2024**
