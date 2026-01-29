-- ============================================
-- DATABASE E-ENSIKLOPEDIA ETNOSAINS MADURA
-- Compatible dengan Laragon v6 (MySQL 5.7/8.0)
-- ============================================

-- Gunakan database
USE e_ensiklopedia;

-- ============================================
-- 1. TABEL HALAMAN MODUL
-- ============================================
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
('Daftar Produk', 'daftar-produk', 'Mari Mengenal Produk Lokal Madura', 8, 'fa-list'),
('Glosarium', 'glosarium', 'Kamus istilah budaya dan sains Madura', 9, 'fa-book');

-- ============================================
-- 2. CEK TABEL PRODUK (Pastikan sudah ada)
-- ============================================
-- Jika belum ada, buat tabel produk
CREATE TABLE IF NOT EXISTS produk (
  id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  nama_produk varchar(255) NOT NULL,
  slug varchar(255) NOT NULL,
  deskripsi longtext,
  manfaat_budaya longtext,
  proses_produksi longtext,
  lokasi_pembuatan varchar(255) DEFAULT NULL,
  nama_pembuat varchar(255) DEFAULT NULL,
  harga int(11) DEFAULT NULL,
  kategori varchar(100) DEFAULT NULL,
  created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  deleted_at timestamp NULL DEFAULT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY slug (slug)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert sample produk jika belum ada
INSERT IGNORE INTO produk (nama_produk, slug, deskripsi, kategori) VALUES 
('Petis Madura', 'petis-madura', 'Petis adalah makanan khas Madura yang terbuat dari rebon dan tepung beras', 'Makanan'),
('Batik Madura', 'batik-madura', 'Batik khas Madura dengan motif dan warna yang unik', 'Kerajinan'),
('Rengginang Lorjuk', 'rengginang-lorjuk', 'Makanan ringan tradisional berbahan dasar lorjuk', 'Makanan'),
('Terasi Madura', 'terasi-madura', 'Bumbu khas Madura yang terbuat dari udang rebon', 'Makanan');

-- ============================================
-- 3. CEK TABEL GLOSSARIUM
-- ============================================
CREATE TABLE IF NOT EXISTS glossarium (
  id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  istilah varchar(255) NOT NULL,
  arti_istilah longtext NOT NULL,
  penjelasan_lengkap longtext,
  kategori varchar(100) DEFAULT NULL,
  created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  UNIQUE KEY istilah (istilah)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert sample glossarium jika belum ada
INSERT IGNORE INTO glossarium (istilah, arti_istilah, kategori) VALUES
('Madura', 'Pulau dan suku bangsa di Jawa Timur', 'Geografi'),
('Petis', 'Makanan khas yang terbuat dari rebon', 'Kuliner'),
('Batik', 'Seni membuat motif pada kain', 'Seni'),
('Karapan Sapi', 'Permainan tradisional balapan sapi', 'Budaya'),
('Lorjuk', 'Kerang bambu yang hidup di pasir pantai', 'Kuliner'),
('Etnosains', 'Ilmu yang mempelajari sains melalui budaya lokal', 'Pendidikan'),
('IPAS', 'Ilmu Pengetahuan Alam dan Sosial', 'Pendidikan'),
('Terasi', 'Bumbu tradisional dari udang rebon', 'Kuliner');

-- ============================================
-- 4. CEK TABEL GAMBAR
-- ============================================
CREATE TABLE IF NOT EXISTS gambar (
  id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  produk_id bigint(20) unsigned NOT NULL,
  judul_gambar varchar(255) DEFAULT NULL,
  path_gambar varchar(255) NOT NULL,
  deskripsi_gambar longtext,
  urutan int(11) DEFAULT 0,
  created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  KEY produk_id (produk_id),
  CONSTRAINT gambar_produk_id_foreign FOREIGN KEY (produk_id) REFERENCES produk (id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================
-- 5. CEK TABEL VIDEO
-- ============================================
CREATE TABLE IF NOT EXISTS video (
  id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  produk_id bigint(20) unsigned NOT NULL,
  judul_video varchar(255) DEFAULT NULL,
  deskripsi_video longtext,
  link_youtube varchar(255) NOT NULL,
  thumbnail_url varchar(255) DEFAULT NULL,
  durasi_menit int(11) DEFAULT NULL,
  created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  KEY produk_id (produk_id),
  CONSTRAINT video_produk_id_foreign FOREIGN KEY (produk_id) REFERENCES produk (id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================
-- 6. CEK TABEL NILAI BUDAYA
-- ============================================
CREATE TABLE IF NOT EXISTS nilai_budaya (
  id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  nama_nilai varchar(255) DEFAULT NULL,
  deskripsi_nilai longtext,
  kategori varchar(100) DEFAULT NULL,
  created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert sample nilai budaya
INSERT IGNORE INTO nilai_budaya (nama_nilai, deskripsi_nilai, kategori) VALUES
('Tanggung Jawab', 'Nilai tanggung jawab dalam budaya Madura', 'Karakter'),
('Kerja Keras', 'Semangat kerja keras masyarakat Madura', 'Karakter'),
('Gotong Royong', 'Nilai kebersamaan dalam masyarakat', 'Sosial'),
('Kebijaksanaan', 'Kearifan lokal dalam menjalani hidup', 'Moral');

-- ============================================
-- 7. CEK TABEL PRODUK_NILAI_BUDAYA
-- ============================================
CREATE TABLE IF NOT EXISTS produk_nilai_budaya (
  produk_id bigint(20) unsigned NOT NULL,
  nilai_budaya_id bigint(20) unsigned NOT NULL,
  created_at timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (produk_id, nilai_budaya_id),
  KEY nilai_budaya_id (nilai_budaya_id),
  CONSTRAINT produk_nilai_budaya_produk_id_foreign FOREIGN KEY (produk_id) REFERENCES produk (id) ON DELETE CASCADE,
  CONSTRAINT produk_nilai_budaya_nilai_budaya_id_foreign FOREIGN KEY (nilai_budaya_id) REFERENCES nilai_budaya (id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================
-- SELESAI!
-- ============================================
SELECT 'Database berhasil dibuat!' as status;
SELECT COUNT(*) as jumlah_halaman FROM halaman_modul;
SELECT COUNT(*) as jumlah_produk FROM produk;
SELECT COUNT(*) as jumlah_glossarium FROM glossarium;