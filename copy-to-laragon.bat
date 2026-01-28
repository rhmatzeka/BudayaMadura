@echo off
REM ============================================
REM Copy Project ke Laragon www
REM ============================================

echo.
echo ========================================
echo Copy Project ke Laragon www
echo ========================================
echo.

set SOURCE=d:\Projek\BUDAYA MADURA\e-ensiklopedia-laravel
set DEST=C:\laragon\www\e-ensiklopedia

echo [1/3] Checking source folder...
if not exist "%SOURCE%" (
    echo ERROR: Source folder not found
    echo Expected: %SOURCE%
    pause
    exit /b 1
)
echo OK - Source found

echo.
echo [2/3] Copying project to Laragon www...
if exist "%DEST%" (
    echo Removing old destination...
    rmdir /s /q "%DEST%"
)

xcopy "%SOURCE%" "%DEST%" /E /I /Y
if errorlevel 1 (
    echo ERROR: Copy failed
    pause
    exit /b 1
)
echo OK - Project copied

echo.
echo [3/3] Creating permissions...
icacls "%DEST%" /grant:r Everyone:(OI)(CI)F /T >nul 2>&1
icacls "%DEST%\storage" /grant:r Everyone:(OI)(CI)F /T >nul 2>&1
icacls "%DEST%\bootstrap\cache" /grant:r Everyone:(OI)(CI)F /T >nul 2>&1

echo.
echo ========================================
echo DONE!
echo ========================================
echo.
echo Next steps:
echo 1. Buka Laragon
echo 2. Klik "Start All"
echo 3. Buat database di HeidiSQL
echo 4. Buka browser: http://e-ensiklopedia.test
echo.
pause
