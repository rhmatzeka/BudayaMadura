# E-ENSIKLOPEDIA ETNOSAING MADURA

Website pembelajaran interaktif tentang warisan budaya Madura

## Fitur Utama

✨ **Koleksi Produk Budaya**
- Makanan tradisional (Petis, Tambal Garam, Renginang)
- Kerajinan tangan (Batik Madura)
- Informasi lengkap setiap produk

📸 **Galeri Foto Produk**
- Multiple photos per produk
- Image carousel interaktif
- Zoom dan preview modal

🎥 **Video Tutorial**
- Integrasi YouTube links
- Embed video player
- Informasi durasi video

📖 **Glosarium Istilah**
- Kamus istilah budaya Madura
- Penjelasan lengkap arti kata
- Kategori per istilah

🔍 **Fitur Pencarian**
- Search produk real-time
- Filter berdasarkan kategori
- Search glosarium

📱 **Responsive Design**
- Mobile-friendly interface
- Kompatibel semua browser
- Design modern dan intuitif

## Teknologi yang Digunakan

- **Backend**: Laravel 10.x (PHP 8.1+)
- **Database**: MySQL
- **Frontend**: Bootstrap 5, HTML5, CSS3
- **CSS Framework**: Bootstrap 5
- **Icons**: Font Awesome 6

## Struktur Project

```
e-ensiklopedia-laravel/
├── app/
│   ├── Models/          (Model data)
│   └── Http/Controllers/  (Business logic)
├── database/
│   ├── migrations/      (Database schema)
│   └── seeders/         (Sample data)
├── resources/
│   └── views/           (HTML templates)
├── routes/              (URL routing)
├── public/              (Static files)
└── .env                 (Configuration)
```

## Database Schema

### Tabel Utama
- **produk** - Produk budaya Madura
- **gambar** - Foto produk
- **video** - Video tutorial YouTube
- **glossarium** - Istilah budaya
- **nilai_budaya** - Filosofi budaya
- **produk_nilai_budaya** - Relasi produk & nilai

## Instalasi Cepat

```bash
# 1. Setup database
mysql -u root -p
CREATE DATABASE e_ensiklopedia;

# 2. Install dependencies
composer install

# 3. Setup environment
cp .env.example .env
php artisan key:generate

# 4. Jalankan migrations
php artisan migrate

# 5. Seed data sample
php artisan db:seed

# 6. Start server
php artisan serve
```

Akses di: `http://localhost:8000`

## Routes Tersedia

| URL | Fungsi |
|-----|--------|
| `/` | Halaman beranda |
| `/produk` | Daftar semua produk |
| `/produk/{slug}` | Detail produk |
| `/produk/galeri` | Galeri foto |
| `/produk/search?q=...` | Cari produk |
| `/produk/kategori/{kategori}` | Filter kategori |
| `/glossarium` | Daftar istilah |
| `/glossarium/search?q=...` | Cari istilah |

## Cara Menambah Data

### 1. Produk Baru
```php
App\Models\Produk::create([
    'nama_produk' => 'Nama Produk',
    'slug' => 'nama-produk',
    'deskripsi' => 'Deskripsi...',
    'kategori' => 'Makanan',
]);
```

### 2. Gambar Produk
```php
App\Models\Gambar::create([
    'produk_id' => 1,
    'path_gambar' => 'nama-file.jpg',
    'judul_gambar' => 'Judul Foto',
]);
```

### 3. Video YouTube
```php
App\Models\Video::create([
    'produk_id' => 1,
    'link_youtube' => 'https://youtube.com/watch?v=...',
    'judul_video' => 'Judul Video',
]);
```

### 4. Istilah Glosarium
```php
App\Models\Glossarium::create([
    'istilah' => 'Petis',
    'arti_istilah' => 'Pasta fermentasi ikan teri',
    'kategori' => 'Makanan',
]);
```

## Screenshot Halaman

### 🏠 Halaman Beranda
- Hero section dengan branding
- Statistik jumlah produk
- Search bar produk
- Produk terbaru
- Quick links

### 🛍️ Halaman Produk
- Grid produk dengan pagination
- Filter kategori
- Card produk dengan gambar
- Badge kategori & lokasi

### 📄 Halaman Detail Produk
- Carousel galeri foto
- Informasi lengkap
- Video tutorial embed
- Nilai budaya terkait
- Produk terkait (sidebar)

### 📸 Halaman Galeri
- Thumbnail grid
- Modal preview gambar
- Link ke produk detail

### 📚 Halaman Glosarium
- Daftar istilah dengan search
- Filter kategori
- Definisi & penjelasan
- Statistik kategori

## Video YouTube Integration

Sistem otomatis mengkonversi link YouTube:
- **Input**: `https://www.youtube.com/watch?v=dQw4w9WgXcQ`
- **Embed**: `https://www.youtube.com/embed/dQw4w9WgXcQ`

## Fitur Keamanan

✅ SQL Injection Protection (Eloquent ORM)
✅ XSS Protection (Blade escaping)
✅ CSRF Protection (Laravel middleware)
✅ Soft deletes untuk data produk

## Performance

⚡ Database indexing
⚡ Pagination untuk daftar panjang
⚡ Lazy loading relationships
⚡ Asset optimization (Bootstrap CDN)

## Mobile Responsive

📱 Bootstrap 5 grid system
📱 Touch-friendly interface
📱 Optimized images
📱 Mobile menu collapse

## Dokumentasi Lengkap

Lihat file: `PANDUAN_INSTALASI.md`

## Support & Lisensi

Dibuat untuk proyek pembelajaran: **E-Ensiklopedia Etnosaing Madura**

**Versi**: 1.0
**Tahun**: 2024

---

Made with ❤️ for Budaya Madura
