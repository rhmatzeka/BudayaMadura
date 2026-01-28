@echo off
REM ============================================
REM Setup Database - E-Ensiklopedia Madura
REM ============================================

setlocal enabledelayedexpansion
set PHP_PATH=C:\laragon\bin\php\php-8.1.10-Win32-vs16-x64\php.exe

echo.
echo ========================================
echo Siapkan Database MySQL
echo ========================================
echo.

echo Buka HeidiSQL atau MySQL Workbench
echo Buat database dengan SQL berikut:
echo.
echo -----
echo CREATE DATABASE e_ensiklopedia CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
echo CREATE USER 'e_ensiklopedia'@'localhost' IDENTIFIED BY 'password123';
echo GRANT ALL PRIVILEGES ON e_ensiklopedia.* TO 'e_ensiklopedia'@'localhost';
echo FLUSH PRIVILEGES;
echo -----
echo.

echo Setelah database dibuat, tekan Enter...
pause

echo.
echo Importing database schema dari database.sql...
REM Cek apakah mysql command ada
where mysql >nul 2>nul
if errorlevel 1 (
    echo MySQL command tidak ditemukan
    echo Mohon import database.sql secara manual via HeidiSQL atau MySQL Workbench
    pause
    exit /b 1
)

echo Masukkan password MySQL root (tekan Enter jika kosong):
set /p MYSQL_PASS=

REM Import database
if "%MYSQL_PASS%"=="" (
    mysql -u root e_ensiklopedia < database.sql
) else (
    mysql -u root -p%MYSQL_PASS% e_ensiklopedia < database.sql
)

if errorlevel 1 (
    echo ERROR - Import database gagal
    pause
    exit /b 1
)

echo.
echo OK - Database siap!
echo.
pause
