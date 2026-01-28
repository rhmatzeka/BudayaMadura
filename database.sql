-- ============================================
-- E-ENSIKLOPEDIA ETNOSAING MADURA
-- Database SQL Dump
-- ============================================

-- Buat Database
CREATE DATABASE IF NOT EXISTS `e_ensiklopedia` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `e_ensiklopedia`;

-- ============================================
-- Tabel: produk
-- ============================================
CREATE TABLE `produk` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nama_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL UNIQUE,
  `deskripsi` longtext COLLATE utf8mb4_unicode_ci,
  `manfaat_budaya` longtext COLLATE utf8mb4_unicode_ci,
  `proses_produksi` longtext COLLATE utf8mb4_unicode_ci,
  `lokasi_pembuatan` varchar(255) COLLATE utf8mb4_unicode_ci,
  `nama_pembuat` varchar(255) COLLATE utf8mb4_unicode_ci,
  `harga` int(11),
  `kategori` varchar(100) COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL,
  KEY `idx_kategori` (`kategori`),
  KEY `idx_slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================
-- Tabel: gambar
-- ============================================
CREATE TABLE `gambar` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `produk_id` bigint(20) unsigned NOT NULL,
  `judul_gambar` varchar(255) COLLATE utf8mb4_unicode_ci,
  `path_gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_gambar` longtext COLLATE utf8mb4_unicode_ci,
  `urutan` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT `fk_gambar_produk` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE,
  KEY `idx_produk_id` (`produk_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================
-- Tabel: video
-- ============================================
CREATE TABLE `video` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `produk_id` bigint(20) unsigned NOT NULL,
  `judul_video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_video` longtext COLLATE utf8mb4_unicode_ci,
  `link_youtube` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail_url` varchar(255) COLLATE utf8mb4_unicode_ci,
  `durasi_menit` int(11),
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT `fk_video_produk` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE,
  KEY `idx_produk_id` (`produk_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================
-- Tabel: glossarium
-- ============================================
CREATE TABLE `glossarium` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `istilah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL UNIQUE,
  `arti_istilah` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `penjelasan_lengkap` longtext COLLATE utf8mb4_unicode_ci,
  `kategori` varchar(100) COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `idx_kategori` (`kategori`),
  KEY `idx_istilah` (`istilah`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================
-- Tabel: nilai_budaya
-- ============================================
CREATE TABLE `nilai_budaya` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nama_nilai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_nilai` longtext COLLATE utf8mb4_unicode_ci,
  `kategori` varchar(100) COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `idx_kategori` (`kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================
-- Tabel: produk_nilai_budaya (Relasi Many-to-Many)
-- ============================================
CREATE TABLE `produk_nilai_budaya` (
  `produk_id` bigint(20) unsigned NOT NULL,
  `nilai_budaya_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`produk_id`, `nilai_budaya_id`),
  CONSTRAINT `fk_pnb_produk` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_pnb_nilai_budaya` FOREIGN KEY (`nilai_budaya_id`) REFERENCES `nilai_budaya` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================
-- Sample Data: produk
-- ============================================
INSERT INTO `produk` (`nama_produk`, `slug`, `deskripsi`, `manfaat_budaya`, `proses_produksi`, `lokasi_pembuatan`, `nama_pembuat`, `harga`, `kategori`) VALUES
('Petis Madura', 'petis-madura', 'Petis adalah pasta atau saus kental yang terbuat dari ikan teri dan garam yang difermentasi selama beberapa bulan. Produk ini adalah salah satu makanan tradisional yang paling terkenal dari Madura dengan cita rasa yang unik dan gurih.', 'Petis Madura melambangkan kearifan lokal dalam mengolah hasil laut menjadi produk bernilai tinggi. Proses pembuatannya yang tradisional telah diwariskan turun-temurun selama berabad-abad.', 'Ikan teri segar dikumpulkan, dicuci, dan dicampur dengan garam dalam perbandingan tertentu. Kemudian difermentasi dalam wadah selama 3-6 bulan sambil sesekali diaduk. Hasil fermentasi kemudian diperas dan diambil sarinya saja.', 'Kabupaten Sumenep, Madura', 'Pengrajin Tradisional Madura', 35000, 'Makanan'),
('Tambal Garam', 'tambal-garam', 'Tambal Garam adalah penganan tradisional Madura yang terbuat dari tepung terigu, telur, dan gula. Makanan ini memiliki tekstur yang renyah dan manis, sering dijadikan sebagai oleh-oleh khas Madura.', 'Tambal Garam adalah warisan budaya kuliner yang mencerminkan kreativitas dan keahlian masyarakat Madura dalam mengolah bahan sederhana menjadi makanan yang lezat dan bernilai ekonomis tinggi.', 'Campurkan tepung terigu, telur, dan gula, kemudian aduk hingga merata. Bentuk kecil-kecil seperti kue kering. Goreng dalam minyak panas hingga berwarna kuning keemasan. Tiriskan dan angin-anginkan.', 'Pulau Madura, Jawa Timur', NULL, 25000, 'Makanan'),
('Renginang Kelor', 'renginang-kelor', 'Renginang adalah makanan kering yang terbuat dari beras yang digoreng dan dicampur dengan kelapa parut, gula, dan garam. Variasi Renginang Kelor menggunakan daun kelor yang memberikan warna hijau dan aroma khas.', 'Renginang Kelor menggabungkan kearifan lokal dalam memanfaatkan tanaman kelor yang kaya nutrisi dengan teknik penggorengan tradisional Madura.', 'Beras yang sudah dimasak setengah jadi digoreng dengan minyak, kemudian dicampur dengan kelapa parut, gula, dan daun kelor yang sudah disangrai. Diaduk merata hingga tercampur sempurna.', 'Kabupaten Bangkalan, Madura', NULL, 30000, 'Makanan'),
('Batik Madura', 'batik-madura', 'Batik Madura adalah karya seni tekstil tradisional dengan pola-pola khas yang menggunakan teknik pembatikan malam (lilin) pada kain. Batik Madura terkenal dengan motif yang tegas dan warna-warna yang cerah.', 'Batik Madura merupakan ekspresi seni tradisional yang mencerminkan keindahan alam dan filosofi hidup masyarakat Madura. Setiap motif memiliki makna dan cerita tersendiri.', 'Kain dipanaskan, kemudian lilin diaplikasikan menggunakan canting atau cap untuk membuat pola. Kain dicelup ke dalam pewarna alam atau kimia. Proses ini diulang untuk setiap warna yang diinginkan.', 'Kabupaten Sumenep, Madura', 'Pengrajin Batik Tradisional', 150000, 'Tekstil');

-- ============================================
-- Sample Data: nilai_budaya
-- ============================================
INSERT INTO `nilai_budaya` (`nama_nilai`, `deskripsi_nilai`, `kategori`) VALUES
('Kebijaksanaan Lokal', 'Pengetahuan tradisional yang telah teruji dalam kehidupan sehari-hari masyarakat Madura.', 'Filosofi'),
('Kebersamaan', 'Semangat gotong royong dan saling membantu antar sesama masyarakat.', 'Sosial');

-- ============================================
-- Sample Data: gambar
-- ============================================
INSERT INTO `gambar` (`produk_id`, `judul_gambar`, `path_gambar`, `deskripsi_gambar`, `urutan`) VALUES
(1, 'Petis Madura Tradisional', 'petis-1.jpg', 'Petis dalam kemasan botol kaca tradisional', 1),
(1, 'Proses Pembuatan Petis', 'petis-2.jpg', 'Proses fermentasi ikan teri dengan garam', 2),
(2, 'Tambal Garam Renyah', 'tambal-garam-1.jpg', 'Tambal Garam siap makan yang renyah', 1),
(3, 'Renginang Kelor Hijau', 'renginang-1.jpg', 'Renginang dengan warna hijau dari daun kelor', 1),
(4, 'Motif Batik Sumenep', 'batik-1.jpg', 'Batik dengan motif tradisional Sumenep', 1);

-- ============================================
-- Sample Data: video
-- ============================================
INSERT INTO `video` (`produk_id`, `judul_video`, `deskripsi_video`, `link_youtube`, `durasi_menit`) VALUES
(1, 'Cara Membuat Petis Madura', 'Tutorial lengkap cara membuat petis Madura yang autentik', 'https://www.youtube.com/watch?v=dQw4w9WgXcQ', 15);

-- ============================================
-- Sample Data: glossarium
-- ============================================
INSERT INTO `glossarium` (`istilah`, `arti_istilah`, `penjelasan_lengkap`, `kategori`) VALUES
('Petis', 'Pasta atau saus kental dari fermentasi ikan teri', 'Petis adalah produk fermentasi ikan teri yang dicampur dengan garam. Memiliki cita rasa yang gurih dan umami, sering digunakan sebagai bumbu masakan atau dimakan langsung dengan nasi.', 'Makanan'),
('Renginang', 'Makanan kering dari beras yang digoreng', 'Renginang adalah makanan ringan tradisional yang terbuat dari beras setengah matang yang digoreng, kemudian dicampur dengan kelapa parut, gula, dan bumbu lainnya.', 'Makanan'),
('Tambal', 'Menjahit atau menambal', 'Dalam bahasa Madura, tambal berarti menjahit atau menambal. Dalam konteks kuliner, Tambal Garam merujuk pada makanan yang dibuat dari adonan sederhana yang dijahit menjadi bentuk kecil-kecil.', 'Bahasa Madura'),
('Batik', 'Seni membuat pola pada kain menggunakan lilin', 'Batik adalah teknik menulis atau menggambar pada kain dengan menggunakan lilin yang kemudian dicelup ke dalam pewarna. Batik Madura terkenal dengan motif yang tegas dan warna yang cerah.', 'Seni'),
('Gotong Royong', 'Bekerja sama secara sukarela untuk mencapai tujuan bersama', 'Gotong royong adalah semangat saling membantu dan bekerja sama antar masyarakat tanpa mengharapkan imbalan. Ini adalah nilai sosial penting dalam budaya Indonesia termasuk Madura.', 'Budaya'),
('Karapan Sapi', 'Perlombaan sapi yang ditarik oleh dua orang', 'Karapan Sapi adalah tradisi unik dari Madura berupa perlombaan kecepatan sapi yang ditarik oleh dua orang joki. Acara ini biasanya diadakan setelah musim panen padi sebagai bentuk syukuran.', 'Tradisi'),
('Kearifan Lokal', 'Nilai-nilai dan pengetahuan tradisional yang dipegang teguh masyarakat lokal', 'Kearifan lokal adalah hasil dari pengalaman dan pembelajaran turun-temurun yang telah terbukti cocok dengan kehidupan masyarakat setempat dan lingkungannya.', 'Budaya'),
('Canting', 'Alat untuk menggambar lilin pada kain batik', 'Canting adalah alat tradisional berupa batang tembaga yang dilengkapi dengan wadah tempat lilin. Digunakan untuk menggambar pola halus dan detail pada kain batik.', 'Seni');

-- ============================================
-- Relasi: produk_nilai_budaya
-- ============================================
INSERT INTO `produk_nilai_budaya` (`produk_id`, `nilai_budaya_id`) VALUES
(1, 1),
(1, 2),
(2, 2),
(3, 1),
(4, 1),
(4, 2);

-- ============================================
-- Indexes untuk performa
-- ============================================
CREATE INDEX `idx_produk_kategori` ON `produk` (`kategori`);
CREATE INDEX `idx_produk_slug` ON `produk` (`slug`);
CREATE INDEX `idx_gambar_produk` ON `gambar` (`produk_id`);
CREATE INDEX `idx_video_produk` ON `video` (`produk_id`);
CREATE INDEX `idx_glossarium_kategori` ON `glossarium` (`kategori`);
CREATE INDEX `idx_glossarium_istilah` ON `glossarium` (`istilah`);
CREATE INDEX `idx_nilai_budaya_kategori` ON `nilai_budaya` (`kategori`);

-- ============================================
-- End of Database Dump
-- ============================================
