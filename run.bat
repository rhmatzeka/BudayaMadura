@echo off
REM ============================================
REM E-Ensiklopedia Etnosaing Madura - Start Server
REM ============================================

echo.
echo ============================================
echo E-Ensiklopedia Etnosaing Madura
echo Development Server
echo ============================================
echo.

REM Check if .env exists
if not exist .env (
    echo [ERROR] .env file not found
    echo Please run setup.bat first
    pause
    exit /b 1
)

REM Check if vendor folder exists
if not exist vendor (
    echo [ERROR] Dependencies not installed
    echo Please run: composer install
    pause
    exit /b 1
)

echo Starting development server...
echo.
echo Server will be available at:
echo - http://localhost:8000
echo - http://127.0.0.1:8000
echo.
echo Press Ctrl+C to stop the server
echo.

php artisan serve

pause
