# PERMINTAAN PERUBAHAN BESAR - CLIENT REQUEST

## 📋 SCOPE PEKERJAAN

### 1. Halaman IDENTITAS di Beranda ✅
**Konten:**
- Judul: E-Ensiklopedia Etnosains Madura
- Sub judul: Pembelajaran IPAS Berbasis Budaya Lokal untuk Siswa Sekolah Dasar
- Penulis: Leli Lestari
- Tahun: 2026
- Sasaran Kelas: Siswa Kelas V SD/MI
- Ikon Buku/Info
- Navigasi Kembali-Lanjut

**Status:** Sudah ada, perlu update minor

---

### 2. Menu TENTANG di Navbar ✅
**Sub-menu:**
1. Tujuan E-Ensiklopedia
2. Target Pengguna
3. Keunggulan E-Ensiklopedia
4. Petunjuk Penggunaan
5. Pengenalan Etnosains

**Status:** Controller sudah dibuat, perlu buat views

---

### 3. Halaman TENTANG (5 halaman)

#### 3.1 Tujuan E-Ensiklopedia
**Konten:**
- Tujuan lengkap (paragraph panjang)
- Ikon: Berpikir Kritis, Sikap Tanggung Jawab, IPAS
- Ilustrasi: Siswa mengamati budaya
- Navigasi

#### 3.2 Target Pengguna
**Konten:**
- Siswa (+ ikon)
- Guru (+ ikon)
- Peneliti (+ ikon)
- Masyarakat (+ ikon)
- Deskripsi masing-masing

#### 3.3 Keunggulan E-Ensiklopedia
**Konten:**
- 5 poin keunggulan
- Ikon berderet: Akses digital, navigasi mudah, multimedia, dapat diperbarui
- Navigasi

#### 3.4 Petunjuk Penggunaan
**Konten:**
- Cara penggunaan
- Ikon navigasi (Home, Produk, Kembali, Lanjut)
- Navigasi

#### 3.5 Pengenalan Etnosains
**Konten:**
- Penjelasan etnosains
- Integrasi IPA dan IPS
- Nilai yang ditumbuhkan
- Ikon IPAS+Budaya
- Navigasi

---

### 4. DAFTAR ISI - Daftar Produk
**Perubahan:**
- Judul: "Mari Mengenal Produk Lokal Madura"
- 4 produk (bisa diklik)
- Navigasi interaktif per produk

**Status:** Sudah ada, perlu update minor

---

### 5. DETAIL PRODUK (4 produk x 6 halaman = 24 HALAMAN!)

#### Produk 1: BATIK MADURA (6 halaman)
1. **Halaman 1: Pembuka Produk**
   - Gambar utama
   - Narasi pembuka
   - Pertanyaan pemantik
   - Ikon mengamati
   
2. **Halaman 2: Identitas dan Latar Budaya**
   - Gambar peta Madura
   - Narasi identitas
   - Asal batik: Bangkalan, Pamekasan, Sampang, Sumenep
   - Motif ciri khas per daerah (SANGAT DETAIL!)
   - Kegunaan batik

3. **Halaman 3: Bahan Baku dan Sumber Daya Alam**
   - Foto bahan dan alat
   - Penjelasan bahan baku
   - Malam/lilin batik
   - Pewarna alami

4. **Halaman 4: Proses Pembuatan**
   - 5 tahap dengan foto:
     * Pembuatan pola
     * Mencanting
     * Pewarnaan
     * Pengeringan
     * Pelorodan
   - Video proses

5. **Halaman 5: Konsep IPAS dalam Produk**
   - Perubahan wujud zat (lilin malam)
   - Bahan dari alam
   - Pemanfaatan energi matahari
   - Proses pewarnaan
   - Sifat benda

6. **Halaman 6: Dampak dan Tanggung Jawab**
   - Dampak positif
   - Dampak lingkungan
   - Sikap tanggung jawab

#### Produk 2: RENGGINANG LORJUK (6 halaman)
1. Pembuka Produk
2. Identitas dan Latar Budaya
3. Bahan Baku (Lorjuk, Ketan, Garam)
4. Proses Pembuatan (4 tahap)
5. Konsep IPAS (Ekologi Lorjuk, Gelatinisasi, Reaksi Maillard)
6. Dampak dan Tanggung Jawab

#### Produk 3: PETIS (6 halaman)
1. Pembuka Produk
2. Identitas dan Latar Budaya
3. Bahan Baku (Ikan/Udang, Garam, Gula)
4. Proses Pembuatan
5. Konsep IPAS (Pemanasan, Penguapan, Perubahan sifat)
6. Dampak dan Tanggung Jawab

#### Produk 4: TERASI (6 halaman)
1. Pembuka Produk
2. Identitas dan Latar Budaya
3. Bahan Baku (Udang rebon, Garam)
4. Proses Pembuatan (Penjemuran, Fermentasi)
5. Konsep IPAS (Penguapan, Fermentasi)
6. Dampak dan Tanggung Jawab

---

## 📊 ESTIMASI PEKERJAAN

### Files yang Perlu Dibuat:
- **Controllers:** 1 file (TentangController) ✅
- **Routes:** Update 1 file
- **Views Tentang:** 6 files (index + 5 sub-pages)
- **Views Produk Detail:** 24 files (4 produk x 6 halaman)
- **Database Migration:** 1 file (untuk halaman produk)
- **Database Seeder:** 1 file (untuk konten produk)

**Total:** ~33 files baru + updates

### Estimasi Waktu:
- Setup struktur: 30 menit
- Halaman Tentang (5 halaman): 1-2 jam
- Detail Produk (24 halaman): 4-6 jam
- Database & Testing: 1 jam

**Total:** 6-9 jam pekerjaan

---

## 💡 REKOMENDASI PENDEKATAN

### Opsi A: Manual (Semua Halaman Statis)
**Pros:**
- Kontrol penuh atas design
- Tidak perlu database kompleks

**Cons:**
- Sangat lama (24+ halaman)
- Sulit update konten
- Banyak file duplikat

### Opsi B: Database-Driven (Recommended)
**Pros:**
- Mudah update konten
- Scalable (bisa tambah produk)
- Admin panel untuk edit

**Cons:**
- Setup awal lebih kompleks
- Perlu migration & seeder

### Opsi C: Hybrid (Contoh + Template)
**Pros:**
- Cepat untuk demo
- Bisa dikembangkan bertahap

**Cons:**
- Perlu duplikasi manual

---

## 🎯 REKOMENDASI SAYA

**Saya sarankan Opsi B (Database-Driven)** karena:

1. **Scalable:** Client bisa tambah produk tanpa coding
2. **Maintainable:** Update konten via database
3. **Professional:** Struktur lebih rapi
4. **Future-proof:** Bisa tambah fitur admin panel

**Struktur Database:**
```sql
produk_halaman (
  id,
  produk_id,
  urutan (1-6),
  judul_halaman,
  konten_html,
  gambar_utama,
  video_url,
  created_at,
  updated_at
)
```

---

## ❓ PERTANYAAN UNTUK CLIENT

1. **Apakah Anda ingin semua 24 halaman produk dibuat sekarang?**
   - Ya, buat semua (6-9 jam)
   - Tidak, buat 1 contoh dulu (Batik Madura)
   - Gunakan sistem database

2. **Apakah Anda punya gambar/foto untuk setiap produk?**
   - Ya, sudah siap
   - Tidak, gunakan placeholder dulu
   - Akan upload nanti

3. **Apakah Anda ingin admin panel untuk edit konten?**
   - Ya, perlu admin panel
   - Tidak, edit langsung di code
   - Nanti saja

---

## 🚀 NEXT STEPS

**Yang sudah saya lakukan:**
1. ✅ Tambah menu "Tentang" di navbar
2. ✅ Buat TentangController

**Yang perlu dilakukan:**
1. ⏳ Buat routes untuk Tentang
2. ⏳ Buat 5 halaman Tentang
3. ⏳ Update halaman Identitas
4. ⏳ Buat struktur 24 halaman produk

**Silakan konfirmasi pendekatan yang Anda inginkan!**

---

**Created:** January 30, 2026  
**Status:** Waiting for client confirmation  
**Estimated Completion:** 6-9 hours (full implementation)
