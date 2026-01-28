# ============================================
# E-Ensiklopedia Etnosaing Madura - Setup Script
# PowerShell Version
# ============================================

Write-Host ""
Write-Host "============================================"
Write-Host "E-Ensiklopedia Etnosaing Madura Setup" -ForegroundColor Green
Write-Host "============================================"
Write-Host ""

# Check PHP
Write-Host "Checking PHP installation..."
$phpVersion = php --version 2>$null
if ($LASTEXITCODE -ne 0) {
    Write-Host "[ERROR] PHP is not installed or not in PATH" -ForegroundColor Red
    Write-Host "Please install PHP 8.1+ or XAMPP"
    Read-Host "Press Enter to exit"
    exit 1
}
Write-Host "[OK] PHP found" -ForegroundColor Green

# Check Composer
Write-Host "Checking Composer installation..."
$composerVersion = composer --version 2>$null
if ($LASTEXITCODE -ne 0) {
    Write-Host "[ERROR] Composer is not installed" -ForegroundColor Red
    Write-Host "Download from: https://getcomposer.org/download/"
    Read-Host "Press Enter to exit"
    exit 1
}
Write-Host "[OK] Composer found" -ForegroundColor Green
Write-Host ""

# Install dependencies
Write-Host "Installing Composer dependencies..."
composer install
if ($LASTEXITCODE -ne 0) {
    Write-Host "[ERROR] Composer install failed" -ForegroundColor Red
    Read-Host "Press Enter to exit"
    exit 1
}
Write-Host "[OK] Dependencies installed" -ForegroundColor Green
Write-Host ""

# Setup .env
if (-not (Test-Path ".env")) {
    Write-Host "Creating .env file..."
    Copy-Item ".env.example" ".env"
    Write-Host "[OK] .env file created" -ForegroundColor Green
    Write-Host ""
    Write-Host "IMPORTANT: Edit .env file and set database credentials:" -ForegroundColor Yellow
    Write-Host "- DB_DATABASE=e_ensiklopedia"
    Write-Host "- DB_USERNAME=root (or your MySQL user)"
    Write-Host "- DB_PASSWORD=your_password"
    Write-Host ""
}

# Generate key
Write-Host "Generating application key..."
php artisan key:generate
Write-Host "[OK] Application key generated" -ForegroundColor Green
Write-Host ""

# Database setup
Write-Host "============================================"
Write-Host "Database Setup" -ForegroundColor Cyan
Write-Host "============================================"
Write-Host ""
Write-Host "Before proceeding, make sure:"
Write-Host "1. MySQL is running (XAMPP Control Panel or service)"
Write-Host "2. Database is created: e_ensiklopedia"
Write-Host "3. .env file is configured with correct credentials"
Write-Host ""

$setupDB = Read-Host "Do you want to run migrations and seed data? (y/n)"
if ($setupDB -eq "y" -or $setupDB -eq "Y") {
    Write-Host ""
    Write-Host "Running migrations..."
    php artisan migrate
    if ($LASTEXITCODE -ne 0) {
        Write-Host "[ERROR] Migration failed" -ForegroundColor Red
        Write-Host "Make sure MySQL is running and database is created"
        Read-Host "Press Enter to exit"
        exit 1
    }
    Write-Host "[OK] Migrations completed" -ForegroundColor Green
    Write-Host ""
    
    Write-Host "Seeding sample data..."
    php artisan db:seed
    Write-Host "[OK] Sample data seeded" -ForegroundColor Green
    Write-Host ""
}

# Done
Write-Host "============================================"
Write-Host "Setup Complete!" -ForegroundColor Green
Write-Host "============================================"
Write-Host ""
Write-Host "Next steps:"
Write-Host "1. Create folder: mkdir public\images\produk"
Write-Host "2. Upload sample images to public\images\produk\"
Write-Host "3. Run: php artisan serve"
Write-Host "4. Open: http://localhost:8000"
Write-Host ""
Write-Host "For more help, read: CARA_RUN_PROJECT.md"
Write-Host ""

Read-Host "Press Enter to exit"
