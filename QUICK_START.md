# 🚀 QUICK START - MULAI DALAM 10 MENIT

## ⚙️ Prerequisites (Pastikan Sudah Install)

- ✅ PHP 8.1+
- ✅ MySQL/MariaDB
- ✅ Composer
- ✅ Text Editor (VS Code, Sublime, dll)

## 📥 Langkah 1: Setup Database (2 menit)

### Buka MySQL/PHPMyAdmin
```sql
-- Copy & paste semua perintah ini:
CREATE DATABASE IF NOT EXISTS `e_ensiklopedia` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `e_ensiklopedia`;

-- [Jalankan script dari file: database.sql]
```

**Atau pakai file SQL langsung:**
```bash
mysql -u root -p e_ensiklopedia < database.sql
```

## 📦 Langkah 2: Install Laravel Project (3 menit)

```bash
# Masuk folder project
cd d:\Projek\BUDAYA MADURA\e-ensiklopedia-laravel

# Install composer dependencies
composer install

# Copy environment file
cp .env.example .env

# Generate app key
php artisan key:generate
```

## ⚙️ Langkah 3: Konfigurasi .env (1 menit)

Buka file `.env` dan ubah bagian DATABASE:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=e_ensiklopedia
DB_USERNAME=root
DB_PASSWORD=
```

## 🗄️ Langkah 4: Jalankan Migrations (2 menit)

```bash
# Jalankan migrations (buat table)
php artisan migrate

# Seed data (isi contoh data)
php artisan db:seed
```

**Jika ada error:**
```bash
# Rollback dan coba lagi
php artisan migrate:rollback
php artisan migrate
php artisan db:seed
```

## 📁 Langkah 5: Setup Folder Gambar (1 menit)

```bash
# Buat folder di public/images/produk
mkdir public\images
mkdir public\images\produk

# Copy gambar ke sana:
# public/images/produk/
#   ├── petis-1.jpg
#   ├── petis-2.jpg
#   ├── tambal-garam-1.jpg
#   ├── renginang-1.jpg
#   └── batik-1.jpg
```

## 🎯 Langkah 6: Jalankan Server (1 menit)

```bash
php artisan serve
```

**Output:**
```
Laravel development server started: http://127.0.0.1:8000
```

## 🌐 Langkah 7: Buka Website

Buka browser dan akses:
- **Beranda**: http://localhost:8000/
- **Produk**: http://localhost:8000/produk
- **Galeri**: http://localhost:8000/produk/galeri
- **Glosarium**: http://localhost:8000/glossarium

✅ **SELESAI! Website sudah berjalan!**

---

## 🎁 Fitur yang Langsung Tersedia

| URL | Fitur |
|-----|-------|
| `/` | Halaman beranda dengan statistik |
| `/produk` | Daftar semua produk |
| `/produk/{slug}` | Detail produk lengkap |
| `/produk/galeri` | Galeri foto produk |
| `/produk/search?q=...` | Search produk |
| `/glossarium` | Daftar istilah budaya |

## 💡 Data Contoh yang Sudah Ada

### Produk (4 item)
- ✅ Petis Madura (dengan 2 gambar + 1 video)
- ✅ Tambal Garam
- ✅ Renginang Kelor
- ✅ Batik Madura

### Glosarium (8 istilah)
- ✅ Petis, Renginang, Tambal, Batik, dll

### Nilai Budaya
- ✅ Kebijaksanaan Lokal
- ✅ Kebersamaan

## 🔧 Troubleshooting Cepat

### Error: "Class not found"
```bash
composer dump-autoload
```

### Error: "Database connection failed"
- Cek username/password di .env
- Pastikan MySQL sedang berjalan
- Pastikan database sudah dibuat

### Images tidak muncul
- Cek folder `public/images/produk/` sudah ada
- Pastikan nama file di database sesuai file asli
- Refresh browser (clear cache)

### Server tidak bisa diakses
```bash
# Kill process yang menggunakan port 8000
# Atau gunakan port lain:
php artisan serve --port=8001
```

## 📝 Tambah Data Baru (Cepat)

### Via Tinker (Interactive Shell)

```bash
# Masuk tinker mode
php artisan tinker

# Tambah produk baru
>>> App\Models\Produk::create([
...   'nama_produk' => 'Soto Madura',
...   'slug' => 'soto-madura',
...   'deskripsi' => 'Sup tradisional Madura',
...   'kategori' => 'Makanan'
... ]);

# Tambah gambar
>>> App\Models\Gambar::create([
...   'produk_id' => 5,
...   'path_gambar' => 'soto-1.jpg',
...   'judul_gambar' => 'Soto Madura'
... ]);

# Tambah video
>>> App\Models\Video::create([
...   'produk_id' => 5,
...   'judul_video' => 'Cara Membuat Soto',
...   'link_youtube' => 'https://youtube.com/watch?v=...'
... ]);

# Keluar tinker
>>> exit
```

### Via Database GUI (PhpMyAdmin)

Langsung insert SQL ke tabel `produk`, `gambar`, `video`, `glossarium`

## 🎨 Kustomisasi Cepat

### Ubah Warna Brand
Edit file: `resources/views/layouts/app.blade.php`

```css
--primary: #8B4513;      /* Warna coklat madura */
--secondary: #D4A574;    /* Warna tan */
```

### Ubah Nama Website
Edit di `.env`:
```
APP_NAME="E-Ensiklopedia Etnosaing Madura"
```

### Ubah Judul Halaman
Edit di `resources/views/layouts/app.blade.php`:
```html
<title>E-Ensiklopedia Etnosaing Madura</title>
```

## 📚 Dokumentasi Lengkap

- **Setup Detail**: Baca `PANDUAN_INSTALASI.md`
- **Daftar File**: Baca `DAFTAR_FILE_LENGKAP.md`
- **Project Info**: Baca `README.md`

## ✅ Checklist Launching

```
[ ] Database dibuat dan diisi data
[ ] .env sudah dikonfigurasi
[ ] Migrations sudah dijalankan
[ ] Seeders sudah dijalankan
[ ] Folder public/images/produk/ sudah dibuat
[ ] Gambar sudah di-copy ke public/images/produk/
[ ] Server berjalan (php artisan serve)
[ ] Website bisa diakses di browser
[ ] Semua halaman loading dengan baik
```

## 🚀 Deploy ke Hosting (Nanti)

Untuk upload ke hosting:
1. Upload semua file ke hosting
2. Setup database di hosting
3. Update konfigurasi di `.env`
4. Jalankan migrations di hosting
5. Seed data jika perlu

**Tutorial lengkap ada di `PANDUAN_INSTALASI.md` bagian Deployment**

---

**🎉 Selamat! Website Anda sudah siap!**

Untuk bantuan lebih lanjut, baca dokumentasi lengkap di folder ini.

Happy coding! 💻
