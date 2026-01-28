# Setup E-Ensiklopedia di Laragon v6 - Virtual Host Method

Karena artisan serve masih ada error, kita akan setup langsung via Laragon Virtual Host yang sudah built-in.

## Langkah 1: Copy Folder Project ke Laragon

1. **Buka Explorer** dan navigasi ke:
   ```
   C:\laragon\www
   ```

2. **Copy folder** `e-ensiklopedia-laravel` ke dalam `www`:
   ```
   C:\laragon\www\e-ensiklopedia
   ```

3. Atau gunakan PowerShell:
   ```powershell
   Copy-Item "d:\Projek\BUDAYA MADURA\e-ensiklopedia-laravel" "C:\laragon\www\e-ensiklopedia" -Recurse -Force
   ```

## Langkah 2: Setup Virtual Host di Laragon

1. **Buka Laragon**
2. **Klik Menu** → **Tools** → **Apache Conf**
   - Atau buka: `C:\laragon\etc\apache2\sites-enabled\laragon.conf`

3. **Tambahkan Virtual Host** di akhir file:

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

4. **Simpan file** (Ctrl+S)
5. **Restart Apache** di Laragon (klik tombol Stop, lalu Start)

## Langkah 3: Setup Hosts File

1. **Buka Notepad as Administrator**
2. **Buka file**: `C:\Windows\System32\drivers\etc\hosts`
3. **Tambahkan di akhir**:

```
127.0.0.1   e-ensiklopedia.test
```

4. **Simpan**

## Langkah 4: Buat Database

1. **Buka Laragon** → **Database** (atau HeidiSQL manual)
2. **Jalankan SQL** untuk membuat database:

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
```

## Langkah 5: Update .env File

1. **Edit file**: `.env` di folder project
2. **Pastikan konfigurasi database**:

```
APP_NAME="E-Ensiklopedia Etnosaing Madura"
APP_URL=http://e-ensiklopedia.test

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=e_ensiklopedia
DB_USERNAME=root
DB_PASSWORD=
```

## Langkah 6: Buka Website

1. **Jalankan Laragon** (Start All)
2. **Buka Browser** dan akses:

```
http://e-ensiklopedia.test
```

## Troubleshooting

### Error 404 atau blank page
- **Solusi**: Restart Apache di Laragon
- Cek folder `public/` ada atau tidak

### Error "Connection refused" pada database
- **Solusi**: Start MySQL di Laragon
- Cek di HeidiSQL apakah database `e_ensiklopedia` sudah dibuat

### Error permission denied
- **Solusi**: Buka file `C:\laragon\etc\apache2\sites-enabled\laragon.conf` dengan Administrator privileges

---

**Dibuat: 28 Januari 2026**
**Metode: Laragon Virtual Host**
