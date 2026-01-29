# E-Ensiklopedia Etnosains Madura

Platform pembelajaran IPAS (Ilmu Pengetahuan Alam dan Sosial) berbasis budaya lokal Madura untuk siswa Sekolah Dasar.

## 📚 Tentang Project ini

E-Ensiklopedia Etnosains Madura adalah media pembelajaran digital yang menghubungkan sains dengan budaya lokal Madura. Melalui platform ini, siswa dapat mempelajari produk budaya Madura sambil memahami konsep-konsep sains yang terkandung di dalamnya.

## ✨ Fitur Utama

- **Halaman Modul Pembelajaran**: 8 halaman terstruktur (Sampul, Identitas, Tujuan, Target Pengguna, Keunggulan, Petunjuk, Pengenalan Etnosains, Daftar Produk)
- **Produk Budaya**: Batik Madura, Petis, Rengginang Lorjuk, Terasi
- **Glosarium**: Kamus istilah budaya dan sains Madura
- **Galeri**: Koleksi foto produk budaya
- **Navigasi Interaktif**: Tombol Kembali-Lanjut di setiap halaman
- **Responsive Design**: Dapat diakses melalui HP dan Laptop

## 🎯 Target Pengguna

- **Siswa**: Kelas V SD/MI
- **Guru**: Referensi pembelajaran IPAS
- **Peneliti**: Dokumentasi etnosains budaya Madura
- **Masyarakat**: Mengenal budaya Madura

## 🛠️ Teknologi

- **Framework**: Laravel 10.x
- **Database**: MySQL
- **Frontend**: Bootstrap 5, Font Awesome
- **Server**: Laragon (Development)

## 📋 Persyaratan Sistem

- PHP >= 8.1
- MySQL >= 5.7
- Composer
- Laragon v6 (Recommended)

## 🚀 Instalasi

### 1. Clone Repository

```bash
git clone https://github.com/rhmatzeka/BudayaMadura.git
cd BudayaMadura
```

### 2. Install Dependencies

```bash
composer install
```

### 3. Setup Environment

```bash
cp .env.example .env
```

Edit file `.env` dan sesuaikan konfigurasi database:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=e_ensiklopedia
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Generate Application Key

```bash
php artisan key:generate
```

### 5. Setup Database

Buat database `e_ensiklopedia` di MySQL, lalu import file SQL:

```bash
mysql -u root -p e_ensiklopedia < database_lengkap_modul.sql
```

Atau gunakan HeidiSQL:
1. Buka HeidiSQL
2. Pilih database `e_ensiklopedia`
3. File → Load SQL file → Pilih `database_lengkap_modul.sql`
4. Run (F9)

### 6. Jalankan Server

```bash
php artisan serve
```

Akses: `http://localhost:8000`

## 📖 Struktur Database

- `halaman_modul` - Halaman-halaman modul pembelajaran
- `produk` - Data produk budaya Madura
- `glossarium` - Kamus istilah budaya dan sains
- `gambar` - Gambar produk
- `video` - Video tutorial
- `nilai_budaya` - Nilai-nilai budaya
- `produk_nilai_budaya` - Relasi produk dengan nilai budaya

## 🎨 Struktur Halaman

1. **Sampul Depan** - Halaman pembuka dengan ilustrasi produk
2. **Identitas** - Informasi penyusun dan sasaran
3. **Tujuan E-Ensiklopedia** - Tujuan pembelajaran
4. **Target Pengguna** - Siswa, Guru, Peneliti, Masyarakat
5. **Keunggulan E-Ensiklopedia** - Fitur dan keunggulan
6. **Petunjuk Penggunaan** - Cara menggunakan platform
7. **Pengenalan Etnosains** - Penjelasan tentang etnosains
8. **Daftar Produk** - Pilihan produk untuk dipelajari

## 👥 Kontributor

- **Penyusun**: Leli Lestari
- **Developer**: [Your Name]
- **Tahun**: 2026

## 📝 Lisensi

Project ini dibuat untuk keperluan pendidikan dan penelitian.

## 📞 Kontak

Untuk pertanyaan atau saran, silakan hubungi:
- Email: [email]
- GitHub: [@rhmatzeka](https://github.com/rhmatzeka)

## 🙏 Acknowledgments

Terima kasih kepada:
- Masyarakat Madura yang telah melestarikan budaya
- Guru dan siswa yang menggunakan platform ini
- Semua pihak yang mendukung project ini

---

**E-Ensiklopedia Etnosains Madura** - Melestarikan Budaya Melalui Pembelajaran Sains 🏝️📚
