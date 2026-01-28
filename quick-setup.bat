@echo off
REM ============================================
REM Quick Setup untuk E-Ensiklopedia Madura
REM Tanpa Install Dependencies
REM ============================================

setlocal enabledelayedexpansion
set PHP_PATH=C:\laragon\bin\php\php-8.1.10-Win32-vs16-x64\php.exe
set "PATH=%PHP_PATH:php.exe=%::;%PATH%"

echo.
echo ========================================
echo Setup E-Ensiklopedia Etnosaing Madura
echo ========================================
echo.

echo [1/3] Copy environment file...
if exist .env (
    echo .env sudah ada, skip
) else (
    copy .env.example .env
    echo OK - .env created
)

echo.
echo [2/3] Generate app key...
"%PHP_PATH%" artisan key:generate
if errorlevel 1 (
    echo FAILED - artisan key generation failed
    REM Jika gagal, kita set key manual
    "%PHP_PATH%" -r "echo 'base64:'.base64_encode(random_bytes(32));"
    pause
    exit /b 1
)
echo OK - App key generated

echo.
echo [3/3] Setup directories...
if not exist "storage\logs" mkdir storage\logs
if not exist "storage\framework" mkdir storage\framework
if not exist "storage\framework\cache" mkdir storage\framework\cache
if not exist "storage\framework\sessions" mkdir storage\framework\sessions
if not exist "storage\framework\views" mkdir storage\framework\views
if not exist "public\images\produk" mkdir public\images\produk
echo OK - Directories created

echo.
echo ========================================
echo Setup Selesai!
echo ========================================
echo.
echo Langkah selanjutnya:
echo 1. Edit file .env untuk konfigurasi database
echo 2. Jalankan: setup-database.bat
echo 3. Jalankan: run-server.bat
echo.
pause
