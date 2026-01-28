@echo off
REM ============================================
REM Setup Database untuk E-Ensiklopedia
REM ============================================

echo.
echo ========================================
echo Database Setup E-Ensiklopedia
echo ========================================
echo.

set PHP_PATH=C:\laragon\bin\php\php-8.1.10-Win32-vs16-x64\php.exe

echo Pastikan MySQL sudah berjalan di Laragon...
echo.

"%PHP_PATH%" setup-database.php

echo.
pause