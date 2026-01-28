@echo off
REM ============================================
REM Setup Laravel Project with Laragon v6
REM ============================================

echo.
echo ========================================
echo Laravel Setup dengan Laragon v6
echo ========================================
echo.

REM Set path ke Laragon PHP
set PHP_PATH=C:\laragon\bin\php\php-8.1.10-Win32-vs16-x64\php.exe
set COMPOSER_PATH=C:\laragon\bin\composer\composer.bat

REM Cek apakah PHP ada
if not exist "%PHP_PATH%" (
    echo ERROR: PHP tidak ditemukan di %PHP_PATH%
    echo Pastikan Laragon terinstall di C:\laragon
    pause
    exit /b 1
)

echo [1/5] Cek PHP Version...
"%PHP_PATH%" -v
if errorlevel 1 (
    echo ERROR: PHP tidak bisa dijalankan
    pause
    exit /b 1
)
echo OK - PHP Found!
echo.

REM Buat temporary PATH dengan Laragon PHP
echo [2/5] Setup Environment Variables...
setlocal enabledelayedexpansion
set "PATH=C:\laragon\bin\php\php-8.1.10-Win32-vs16-x64;%PATH%"

echo [3/5] Cek Composer...
"%COMPOSER_PATH%" --version
if errorlevel 1 (
    echo ERROR: Composer tidak bisa dijalankan
    pause
    exit /b 1
)
echo OK - Composer Found!
echo.

echo [4/5] Install Dependencies dengan Composer...
"%COMPOSER_PATH%" install
if errorlevel 1 (
    echo ERROR: Composer install gagal
    pause
    exit /b 1
)
echo OK - Dependencies installed!
echo.

echo [5/5] Done!
echo.
echo ========================================
echo Langkah Selanjutnya:
echo ========================================
echo.
echo 1. Buat database MySQL:
echo    - Buka Laragon
echo    - Klik tombol "Database"
echo    - Buat database baru: e_ensiklopedia
echo.
echo 2. Konfigurasi .env file:
echo    - Copy dari .env.example ke .env
echo    - Sesuaikan database credentials
echo.
echo 3. Generate app key:
echo    run-laragon.bat key
echo.
echo 4. Jalankan migration:
echo    run-laragon.bat migrate
echo.
echo 5. Seed database:
echo    run-laragon.bat seed
echo.
echo 6. Jalankan Laravel server:
echo    run-laragon.bat serve
echo.
echo ========================================
echo.
pause
