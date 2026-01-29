-- Update Database: Tambah Halaman Glosarium
-- Jalankan di HeidiSQL

USE e_ensiklopedia;

-- Hapus data lama
DELETE FROM halaman_modul;

-- Insert data baru (9 halaman termasuk Glosarium)
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

-- Cek hasil
SELECT * FROM halaman_modul ORDER BY urutan;