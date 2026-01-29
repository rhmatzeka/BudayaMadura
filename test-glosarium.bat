@echo off
echo ========================================
echo TEST GLOSARIUM NAVIGATION
echo ========================================
echo.

echo [1] Membuka website di browser...
start http://localhost/e-ensiklopedia
timeout /t 2 /nobreak >nul

echo.
echo [2] Membuka halaman Daftar Isi...
start http://localhost/e-ensiklopedia/modul
timeout /t 2 /nobreak >nul

echo.
echo [3] Membuka halaman Glosarium langsung...
start http://localhost/e-ensiklopedia/glossarium
timeout /t 2 /nobreak >nul

echo.
echo ========================================
echo INSTRUKSI TEST:
echo ========================================
echo.
echo 1. Cek navbar - harus ada 4 menu saja:
echo    - Beranda
echo    - Daftar Isi
echo    - Produk Budaya
echo    - Galeri
echo.
echo 2. Klik "Daftar Isi" - harus ada 9 halaman
echo    Halaman ke-9 adalah "Glosarium"
echo.
echo 3. Klik "Glosarium" di Daftar Isi
echo    - Harus redirect ke glosarium pertama
echo    - Ada tombol Next/Back
echo    - Ada daftar semua istilah di bawah
echo.
echo 4. Test navigasi:
echo    - Klik "Selanjutnya" untuk next item
echo    - Klik "Sebelumnya" untuk previous item
echo    - Klik "Daftar Isi" untuk kembali
echo.
echo 5. Scroll ke bawah - ada widget Glosarium
echo    sebelum footer di setiap halaman
echo.
echo ========================================
echo Baca TEST_GLOSARIUM.md untuk detail lengkap
echo ========================================
echo.
pause
