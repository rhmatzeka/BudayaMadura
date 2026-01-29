@echo off
echo ========================================
echo TEST SEMUA FITUR - E-ENSIKLOPEDIA
echo ========================================
echo.

echo [STEP 1] Membersihkan cache...
cd /d C:\laragon\www\e-ensiklopedia
call composer dump-autoload
call php artisan config:clear
call php artisan cache:clear
call php artisan view:clear
echo Cache berhasil dibersihkan!
echo.

timeout /t 2 /nobreak >nul

echo [STEP 2] Membuka website untuk test...
echo.

echo Opening: Sampul Depan (Carousel)
start http://localhost/e-ensiklopedia
timeout /t 2 /nobreak >nul

echo Opening: Daftar Isi
start http://localhost/e-ensiklopedia/modul
timeout /t 2 /nobreak >nul

echo Opening: Identitas
start http://localhost/e-ensiklopedia/modul/identitas
timeout /t 2 /nobreak >nul

echo Opening: Keunggulan
start http://localhost/e-ensiklopedia/modul/keunggulan
timeout /t 2 /nobreak >nul

echo Opening: Glosarium
start http://localhost/e-ensiklopedia/glossarium
timeout /t 2 /nobreak >nul

echo.
echo ========================================
echo SEMUA HALAMAN SUDAH DIBUKA!
echo ========================================
echo.
echo CHECKLIST TEST:
echo.
echo [1] SAMPUL DEPAN (Tab 1):
echo     - Carousel bisa digeser (tombol atau swipe)
echo     - Auto slide setiap 4 detik
echo     - Dots indicator berfungsi
echo     - Hover pause berfungsi
echo.
echo [2] DAFTAR ISI (Tab 2):
echo     - Ada 9 halaman modul
echo     - Glosarium ada di urutan 9
echo     - Navbar hanya 4 menu (tanpa Glosarium)
echo.
echo [3] IDENTITAS (Tab 3):
echo     - Header brown dengan ikon buku
echo     - 5 card informasi (Judul, Penulis, Tahun, Sasaran)
echo     - 3 ikon buku/info
echo     - Quote box deskripsi
echo     - Hover animation berfungsi
echo.
echo [4] KEUNGGULAN (Tab 4):
echo     - Header gold dengan ikon bintang
echo     - 7 card keunggulan warna-warni
echo     - Hover animation 3D (naik + scale)
echo     - Summary box dengan trophy
echo.
echo [5] GLOSARIUM (Tab 5):
echo     - Redirect ke glosarium pertama
echo     - Navigasi Next/Back berfungsi
echo     - Daftar semua istilah ditampilkan
echo     - Tombol "Daftar Isi" berfungsi
echo.
echo [6] WIDGET GLOSARIUM:
echo     - Scroll ke bawah di halaman manapun
echo     - Ada section Glosarium sebelum footer
echo     - Menampilkan 6 istilah
echo     - Tombol "Lihat Semua" berfungsi
echo.
echo [7] RESPONSIVE:
echo     - Resize browser untuk test
echo     - Test di mobile view (F12 - Toggle device)
echo     - Swipe gesture di mobile
echo.
echo ========================================
echo DOKUMENTASI:
echo ========================================
echo.
echo Baca file berikut untuk detail:
echo - TEST_SEMUA_PERUBAHAN.md (Checklist lengkap)
echo - CAROUSEL_PRODUK_BUDAYA.md (Carousel guide)
echo - TEST_IDENTITAS_KEUNGGULAN.md (Identitas & Keunggulan)
echo - TEST_GLOSARIUM.md (Glosarium navigation)
echo.
echo ========================================
echo SELAMAT TESTING! ^_^
echo ========================================
echo.
pause
