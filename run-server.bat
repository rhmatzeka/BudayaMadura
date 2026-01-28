@echo off
REM ============================================
REM E-Ensiklopedia Etnosaing Madura - Run Server
REM ============================================

echo.
echo ========================================
echo Starting E-Ensiklopedia Server
echo ========================================
echo.

set PHP_PATH=C:\laragon\bin\php\php-8.1.10-Win32-vs16-x64\php.exe

echo Server akan berjalan di: http://localhost:8000
echo Tekan Ctrl+C untuk menghentikan server
echo.

"%PHP_PATH%" -S localhost:8000 -t public

pause