# Cara Setup Website E-Ensiklopedia Sesuai Modul

## Langkah 1: Buka HeidiSQL

1. Buka Laragon
2. Klik "Database" atau buka HeidiSQL
3. Pilih database `e_ensiklopedia`

## Langkah 2: Jalankan SQL Lengkap

1. Klik menu **"File"** → **"Load SQL file..."**
2. Pilih file **`database_lengkap_modul.sql`** dari folder project
3. Atau copy semua isi file `database_lengkap_modul.sql`
4. Paste di HeidiSQL Query tab
5. Klik tombol **"Run"** (F9) atau icon Play ▶️

**ATAU cara manual:**

Klik "Query" di HeidiSQL, lalu copy-paste SQL ini dan klik "Run":

```sql
-- Gunakan database
USE e_ensiklopedia;

-- Buat tabel halaman_modul
DROP TABLE IF EXISTS halaman_modul;

CREATE TABLE halaman_modul (
  id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  judul varchar(255) NOT NULL,
  slug varchar(255) NOT NULL,
  konten text NOT NULL,
  urutan int(11) DEFAULT 0,
  icon varchar(100) DEFAULT NULL,
  created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  UNIQUE KEY slug (slug)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert data halaman modul
INSERT INTO halaman_modul (judul, slug, konten, urutan, icon) VALUES
('Sampul Depan', 'sampul-depan', 'Halaman sampul dengan ilustrasi 4 produk Madura', 1, 'fa-home'),
('Identitas', 'identitas', 'Informasi identitas e-ensiklopedia', 2, 'fa-id-card'),
('Tujuan E-Ensiklopedia', 'tujuan', 'Tujuan pembelajaran e-ensiklopedia', 3, 'fa-bullseye'),
('Target Pengguna', 'target-pengguna', 'Sasaran pengguna e-ensiklopedia', 4, 'fa-users'),
('Keunggulan E-Ensiklopedia', 'keunggulan', 'Keunggulan dan fitur e-ensiklopedia', 5, 'fa-star'),
('Petunjuk Penggunaan', 'petunjuk-penggunaan', 'Cara menggunakan e-ensiklopedia', 6, 'fa-book-reader'),
('Pengenalan Etnosains', 'pengenalan-etnosains', 'Penjelasan tentang etnosains', 7, 'fa-flask'),
('Daftar Produk', 'daftar-produk', 'Mari Mengenal Produk Lokal Madura', 8, 'fa-list');
```

## Langkah 3: Cek Hasil

Di HeidiSQL, klik refresh dan pastikan tabel `halaman_modul` sudah ada dengan 8 data.

## Langkah 4: Test Website

Buka browser dan akses:
```
http://localhost/e-ensiklopedia/public/
```

## Struktur Website Sekarang:

### Navbar (Menu Utama):
1. **Beranda** → Sampul Depan (halaman pertama)
2. **Daftar Isi** → Menampilkan 8 halaman modul
3. **Produk Budaya** → Daftar produk (Batik, Petis, Rengginang, dll)
4. **Glosarium** → Kamus istilah budaya Madura
5. **Galeri** → Galeri foto produk

### Halaman-halaman Modul (Daftar Isi):
1. **Sampul Depan** - Halaman pembuka dengan ilustrasi 4 produk
2. **Identitas** - Info penyusun, tahun, sasaran
3. **Tujuan E-Ensiklopedia** - Tujuan pembelajaran
4. **Target Pengguna** - Siswa, Guru, Peneliti, Masyarakat
5. **Keunggulan E-Ensiklopedia** - Fitur dan keunggulan
6. **Petunjuk Penggunaan** - Cara menggunakan website
7. **Pengenalan Etnosains** - Penjelasan tentang etnosains
8. **Daftar Produk** - Pilih produk yang ingin dipelajari

### Navigasi:
- Setiap halaman memiliki tombol **Kembali** dan **Lanjut**
- Ada tombol **Daftar Isi** untuk kembali ke menu
- Breadcrumb di atas untuk navigasi

### Fitur Sesuai Modul:
✅ Sampul depan dengan ilustrasi produk
✅ Identitas lengkap (penyusun, tahun, sasaran)
✅ Tujuan pembelajaran dengan ikon
✅ Target pengguna (4 kategori)
✅ Keunggulan dengan ikon
✅ Petunjuk penggunaan dengan tips
✅ Pengenalan etnosains
✅ Daftar produk yang bisa diklik
✅ Navigasi Kembali-Lanjut
✅ Tema vintage/klasik Madura
✅ Warna coklat, krem, emas

## Cara Menggunakan:

1. **Mulai dari Beranda** (Sampul Depan)
2. **Klik "Mulai Eksplorasi"** atau gunakan tombol Lanjut
3. **Baca setiap halaman** secara berurutan
4. **Atau klik "Daftar Isi"** untuk langsung ke halaman tertentu
5. **Pilih produk** di halaman "Daftar Produk"
6. **Pelajari detail produk** dengan konsep IPAS

## Troubleshooting:

### Error "Table not found"
- Pastikan SQL sudah dijalankan dengan benar
- Cek di HeidiSQL apakah tabel `halaman_modul` sudah ada
- Refresh database di HeidiSQL

### Error 404
- Pastikan Laragon sudah running (Apache hijau)
- Cek URL: `http://localhost/e-ensiklopedia/public/`

### Halaman kosong
- Cek apakah data sudah masuk ke tabel `halaman_modul`
- Jalankan query: `SELECT * FROM halaman_modul;`

Selamat menggunakan E-Ensiklopedia Etnosains Madura! 🎉