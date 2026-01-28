# Setup Database untuk Halaman Modul

## Langkah 1: Buka Terminal Laragon

Buka Laragon → Klik "Terminal"

## Langkah 2: Jalankan Migration

```bash
cd e-ensiklopedia
php artisan migrate
```

## Langkah 3: Jalankan SQL Manual

Buka HeidiSQL → Pilih database `e_ensiklopedia` → Klik "Query" → Copy paste SQL ini:

```sql
-- Buat tabel halaman_modul
CREATE TABLE IF NOT EXISTS halaman_modul (
  id bigint(20) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
  judul varchar(255) NOT NULL,
  slug varchar(255) UNIQUE NOT NULL,
  konten text NOT NULL,
  urutan int(11) DEFAULT 0,
  icon varchar(100),
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert data halaman modul
INSERT INTO halaman_modul (judul, slug, konten, urutan, icon, created_at, updated_at) VALUES
('Sampul Depan', 'sampul-depan', 'Halaman sampul dengan ilustrasi 4 produk Madura', 1, 'fa-home', NOW(), NOW()),
('Identitas', 'identitas', 'Informasi identitas e-ensiklopedia', 2, 'fa-id-card', NOW(), NOW()),
('Tujuan E-Ensiklopedia', 'tujuan', 'Tujuan pembelajaran e-ensiklopedia', 3, 'fa-bullseye', NOW(), NOW()),
('Target Pengguna', 'target-pengguna', 'Sasaran pengguna e-ensiklopedia', 4, 'fa-users', NOW(), NOW()),
('Keunggulan E-Ensiklopedia', 'keunggulan', 'Keunggulan dan fitur e-ensiklopedia', 5, 'fa-star', NOW(), NOW()),
('Petunjuk Penggunaan', 'petunjuk-penggunaan', 'Cara menggunakan e-ensiklopedia', 6, 'fa-book-reader', NOW(), NOW()),
('Pengenalan Etnosains', 'pengenalan-etnosains', 'Penjelasan tentang etnosains', 7, 'fa-flask', NOW(), NOW()),
('Daftar Produk', 'daftar-produk', 'Mari Mengenal Produk Lokal Madura', 8, 'fa-list', NOW(), NOW());
```

## Langkah 4: Test Website

Akses: `http://localhost/e-ensiklopedia/public/`

Sekarang website sudah memiliki:
- Navbar dengan "Daftar Isi"
- Halaman Sampul Depan
- Halaman Identitas
- Halaman Tujuan
- Dan halaman-halaman lainnya sesuai modul

## Navigasi Website:

1. **Beranda** → Sampul Depan
2. **Daftar Isi** → Menampilkan semua halaman modul
3. **Produk Budaya** → Daftar produk (Batik, Petis, dll)
4. **Glosarium** → Kamus istilah budaya
5. **Galeri** → Galeri foto produk

Setiap halaman memiliki navigasi Kembali-Lanjut di bawah!