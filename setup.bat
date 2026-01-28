@echo off
REM ============================================
REM E-Ensiklopedia Etnosaing Madura - Setup Script
REM Untuk Windows PowerShell
REM ============================================

echo.
echo ============================================
echo E-Ensiklopedia Etnosaing Madura Setup
echo ============================================
echo.

REM Check if composer is installed
echo Checking PHP and Composer installation...
php -v >nul 2>&1
if errorlevel 1 (
    echo [ERROR] PHP is not installed or not in PATH
    echo Please install PHP 8.1+ or XAMPP
    echo Visit: https://www.php.net/downloads
    pause
    exit /b 1
)

composer --version >nul 2>&1
if errorlevel 1 (
    echo [ERROR] Composer is not installed
    echo Please install Composer from: https://getcomposer.org/download/
    pause
    exit /b 1
)

echo [OK] PHP and Composer found
echo.

REM Install dependencies
echo Installing Composer dependencies...
call composer install
if errorlevel 1 (
    echo [ERROR] Composer install failed
    pause
    exit /b 1
)
echo [OK] Dependencies installed
echo.

REM Setup .env file
if not exist .env (
    echo Creating .env file...
    copy .env.example .env
    echo [OK] .env file created
    echo.
    echo IMPORTANT: Edit .env file and set your database credentials
    echo - Open: .env
    echo - Update: DB_DATABASE, DB_USERNAME, DB_PASSWORD
    echo.
)

REM Generate application key
echo Generating application key...
call php artisan key:generate
echo [OK] Application key generated
echo.

REM Ask if user wants to setup database
setlocal enabledelayedexpansion
echo.
echo ============================================
echo Database Setup
echo ============================================
echo.
echo Before proceeding, make sure:
echo 1. MySQL is running (XAMPP Control Panel or service)
echo 2. Database is created: e_ensiklopedia
echo 3. .env file is configured with correct credentials
echo.

set /p setup_db="Do you want to run migrations and seed data now? (y/n): "
if /i "!setup_db!"=="y" (
    echo.
    echo Running migrations...
    call php artisan migrate
    if errorlevel 1 (
        echo [ERROR] Migration failed
        echo Make sure MySQL is running and database is created
        pause
        exit /b 1
    )
    echo [OK] Database migrations completed
    echo.
    
    echo Seeding sample data...
    call php artisan db:seed
    echo [OK] Sample data seeded
    echo.
)

REM Done
echo ============================================
echo Setup Complete!
echo ============================================
echo.
echo Next steps:
echo 1. Edit .env file with your database credentials (if not done)
echo 2. Create folder: public\images\produk\
echo 3. Run: php artisan serve
echo 4. Open: http://localhost:8000
echo.
echo For more help, read: CARA_RUN_PROJECT.md
echo.
pause
