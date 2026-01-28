# 🎉 E-Ensiklopedia Etnosaing Madura - SETUP COMPLETE!

Project Anda **SUDAH SIAP DIJALANKAN** dengan dua metode!

---

## **METODE 1: Laragon Virtual Host (RECOMMENDED) ⭐**

Ini adalah metode yang **paling gampang dan paling stabil** untuk Laragon v6 Anda.

### Langkah-Langkah:

#### **1️⃣ Copy Project ke Laragon www** (Otomatis)
Jalankan script ini di PowerShell:

```powershell
cd "d:\Projek\BUDAYA MADURA\e-ensiklopedia-laravel"
& ".\copy-to-laragon.bat"
```

**Atau manual:**
```powershell
Copy-Item "d:\Projek\BUDAYA MADURA\e-ensiklopedia-laravel" "C:\laragon\www\e-ensiklopedia" -Recurse -Force
```

#### **2️⃣ Setup Virtual Host**

A. Buka Laragon → Klik **Menu** → **Tools** → **Apache Conf**

B. Di akhir file, tambahkan:

```apache
<VirtualHost *:80>
    ServerName e-ensiklopedia.test
    DocumentRoot "C:/laragon/www/e-ensiklopedia/public"
    <Directory "C:/laragon/www/e-ensiklopedia/public">
        Allow from all
        AllowOverride All
        Require all granted
        <IfModule mod_rewrite.c>
            RewriteEngine on
            RewriteCond %{REQUEST_FILENAME} !-f
            RewriteCond %{REQUEST_FILENAME} !-d
            RewriteRule ^(.*)$ /index.php/$1 [L]
        </IfModule>
    </Directory>
</VirtualHost>
```

C. **Simpan** (Ctrl+S)

D. **Restart Apache**: Klik **Stop**, tunggu 2 detik, klik **Start**

#### **3️⃣ Update Windows Hosts File**

A. Buka **Notepad as Administrator**

B. File → Open → `C:\Windows\System32\drivers\etc\hosts`

C. Tambahkan di akhir:

```
127.0.0.1   e-ensiklopedia.test
```

D. **Simpan**

#### **4️⃣ Buat Database**

A. Buka **Laragon** → Klik **Database** (atau buka HeidiSQL manual)

B. Copy-paste SQL di bawah ini ke query window dan Execute (F9):

```sql
CREATE DATABASE e_ensiklopedia CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE e_ensiklopedia;

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

CREATE TABLE glossarium (
  id bigint(20) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
  istilah varchar(255) UNIQUE NOT NULL,
  arti_istilah longtext NOT NULL,
  penjelasan_lengkap longtext,
  kategori varchar(100),
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE nilai_budaya (
  id bigint(20) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nama_nilai varchar(255),
  deskripsi_nilai longtext,
  kategori varchar(100),
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE produk_nilai_budaya (
  produk_id bigint(20) unsigned NOT NULL,
  nilai_budaya_id bigint(20) unsigned NOT NULL,
  created_at timestamp NULL DEFAULT NULL,
  updated_at timestamp NULL DEFAULT NULL,
  PRIMARY KEY (produk_id, nilai_budaya_id),
  FOREIGN KEY (produk_id) REFERENCES produk(id) ON DELETE CASCADE,
  FOREIGN KEY (nilai_budaya_id) REFERENCES nilai_budaya(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert sample data
INSERT INTO produk (nama_produk, slug, deskripsi, kategori, created_at, updated_at) VALUES 
('Petis Madura', 'petis-madura', 'Petis adalah makanan khas Madura yang terbuat dari rebon dan tepung beras', 'Makanan', NOW(), NOW()),
('Tambal Garam', 'tambal-garam', 'Tambal garam adalah penganan tradisional Madura yang gurih', 'Makanan', NOW(), NOW()),
('Renginang Kelor', 'renginang-kelor', 'Makanan ringan tradisional berbahan dasar daun kelor', 'Makanan', NOW(), NOW()),
('Batik Madura', 'batik-madura', 'Batik khas Madura dengan motif dan warna yang unik', 'Kerajinan', NOW(), NOW());

INSERT INTO gambar (produk_id, judul_gambar, path_gambar, urutan, created_at, updated_at) VALUES
(1, 'Petis Madura', 'petis-1.jpg', 1, NOW(), NOW()),
(1, 'Petis Kemasan', 'petis-2.jpg', 2, NOW(), NOW()),
(2, 'Tambal Garam', 'tambal-garam-1.jpg', 1, NOW(), NOW()),
(3, 'Renginang Kelor', 'renginang-1.jpg', 1, NOW(), NOW()),
(4, 'Batik Madura', 'batik-1.jpg', 1, NOW(), NOW());

INSERT INTO video (produk_id, judul_video, link_youtube, created_at, updated_at) VALUES
(1, 'Cara Membuat Petis Madura', 'https://www.youtube.com/watch?v=dQw4w9WgXcQ', NOW(), NOW());

INSERT INTO glossarium (istilah, arti_istilah, kategori, created_at, updated_at) VALUES
('Madura', 'Pulau dan suku bangsa di Jawa Timur', 'Geografi', NOW(), NOW()),
('Petis', 'Makanan khas yang terbuat dari rebon', 'Kuliner', NOW(), NOW()),
('Batik', 'Seni membuat motif pada kain', 'Seni', NOW(), NOW()),
('Karapan Sapi', 'Permainan tradisional balapan sapi', 'Budaya', NOW(), NOW()),
('Sampoerna', 'Kerajaan kuno di Madura', 'Sejarah', NOW(), NOW()),
('Topeng', 'Seni pertunjukan tradisional', 'Seni', NOW(), NOW()),
('Rembang', 'Daerah penghasil garam di Madura', 'Geografi', NOW(), NOW()),
('Rajah', 'Sebutan untuk pelaut dan pejuang Madura', 'Budaya', NOW(), NOW());

INSERT INTO nilai_budaya (nama_nilai, deskripsi_nilai, kategori, created_at, updated_at) VALUES
('Tanggung Jawab', 'Nilai tanggung jawab dalam budaya Madura', 'Karakter', NOW(), NOW()),
('Kerja Keras', 'Semangat kerja keras masyarakat Madura', 'Karakter', NOW(), NOW()),
('Gotong Royong', 'Nilai kebersamaan dalam masyarakat', 'Sosial', NOW(), NOW()),
('Kebijaksanaan', 'Kearifan lokal dalam menjalani hidup', 'Moral', NOW(), NOW());

INSERT INTO produk_nilai_budaya (produk_id, nilai_budaya_id) VALUES
(1, 1), (1, 2), (2, 2), (3, 2), (4, 3);
```

#### **5️⃣ Update .env File** (PENTING!)

Edit file `.env` di folder project:

**Dari:**
```
APP_URL=http://localhost:8000
```

**Menjadi:**
```
APP_URL=http://e-ensiklopedia.test
```

Pastikan database settings:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=e_ensiklopedia
DB_USERNAME=root
DB_PASSWORD=
```

#### **6️⃣ Buka Website**

Buka browser dan akses:

```
http://e-ensiklopedia.test
```

🎉 **SELESAI!** Website Anda sudah berjalan!

---

## **Akses Halaman:**

- **Beranda**: http://e-ensiklopedia.test/
- **Daftar Produk**: http://e-ensiklopedia.test/produk
- **Galeri Foto**: http://e-ensiklopedia.test/produk/galeri
- **Glosarium**: http://e-ensiklopedia.test/glossarium
- **Search Produk**: http://e-ensiklopedia.test/produk/search?q=petis
- **Search Glosarium**: http://e-ensiklopedia.test/glossarium/search?q=madura

---

## **Troubleshooting**

### ❌ Error: "Connection refused"
**Solusi**: 
1. Buka Laragon
2. Klik **Start All**
3. Tunggu semua service berwarna hijau

### ❌ Error: "ERR_NAME_NOT_RESOLVED" atau tidak bisa akses e-ensiklopedia.test
**Solusi**:
1. Cek apakah Anda sudah edit `C:\Windows\System32\drivers\etc\hosts`
2. Restart browser
3. Flush DNS: `ipconfig /flushdns` (PowerShell as Admin)

### ❌ Error: "No such file or directory"
**Solusi**:
1. Pastikan folder sudah dicopy ke `C:\laragon\www\e-ensiklopedia`
2. Cek folder `public\` ada atau tidak
3. Restart Apache

### ❌ Gambar tidak muncul
**Solusi**:
1. Upload gambar ke folder: `C:\laragon\www\e-ensiklopedia\public\images\produk\`
2. Nama file harus sesuai dengan database:
   - petis-1.jpg
   - petis-2.jpg
   - tambal-garam-1.jpg
   - renginang-1.jpg
   - batik-1.jpg

---

## **File Penting**

- 📄 `SETUP_LARAGON_VIRTUALHOST.md` - Dokumentasi lengkap method Virtual Host
- 📄 `.env` - File konfigurasi aplikasi (PENTING! edit sesuai lingkungan Anda)
- 📁 `app/` - Source code aplikasi
- 📁 `public/` - Folder public (akses website)
- 📁 `resources/views/` - Template Blade
- 📁 `database/` - Migrations dan seeders

---

## **Database Struktur**

```
e_ensiklopedia
├── produk (tabel produk budaya)
├── gambar (tabel gambar produk)
├── video (tabel video YouTube)
├── glossarium (tabel kamus istilah)
├── nilai_budaya (tabel nilai budaya)
└── produk_nilai_budaya (relasi many-to-many)
```

---

## **Fitur Yang Tersedia**

✅ Homepage dengan statistik  
✅ Daftar Produk dengan pagination  
✅ Detail Produk lengkap  
✅ Galeri Foto interaktif  
✅ Video YouTube integration  
✅ Glosarium/Kamus Istilah  
✅ Search Produk dan Glosarium  
✅ Filter berdasarkan kategori  
✅ Responsive design (mobile-friendly)  
✅ Database relasional terstruktur  

---

## **Selanjutnya**

1. ✅ **Jalankan website** via Virtual Host
2. 📝 **Tambah data produk** melalui database
3. 📸 **Upload gambar produk** ke folder `public/images/produk/`
4. 🎥 **Tambah link YouTube** untuk setiap produk
5. 🚀 **Deploy ke server** (jika ingin production)

---

**Dibuat: 28 Januari 2026**  
**Versi: 1.0 - E-Ensiklopedia Etnosaing Madura**  
**Optimized untuk: Laragon v6 Windows**

Selamat! Proyek Anda sudah complete dan siap digunakan! 🎉
