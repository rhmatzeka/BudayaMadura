# ============================================
# Auto Setup - E-Ensiklopedia Etnosaing Madura
# Untuk Laragon v6
# ============================================

Write-Host ""
Write-Host "========================================" -ForegroundColor Cyan
Write-Host "E-Ensiklopedia Etnosaing Madura" -ForegroundColor Cyan
Write-Host "Final Setup Script" -ForegroundColor Cyan
Write-Host "========================================" -ForegroundColor Cyan
Write-Host ""

# Variables
$PHPPath = "C:\laragon\bin\php\php-8.1.10-Win32-vs16-x64\php.exe"
$ProjectRoot = (Get-Location).Path

# Set PATH
$env:PATH = "C:\laragon\bin\php\php-8.1.10-Win32-vs16-x64;$env:PATH"

# Check PHP
Write-Host "[1/4] Checking PHP installation..." -ForegroundColor Yellow
if (-not (Test-Path $PHPPath)) {
    Write-Host "ERROR: PHP not found at $PHPPath" -ForegroundColor Red
    exit 1
}
Write-Host "OK - PHP found" -ForegroundColor Green
Write-Host ""

# Copy .env
Write-Host "[2/4] Setting up .env file..." -ForegroundColor Yellow
if (-not (Test-Path ".env")) {
    Copy-Item ".env.example" ".env" -Force
    Write-Host "OK - .env created from .env.example" -ForegroundColor Green
} else {
    Write-Host "OK - .env already exists" -ForegroundColor Green
}
Write-Host ""

# Generate APP_KEY
Write-Host "[3/4] Generating APP_KEY..." -ForegroundColor Yellow
$AppKey = & $PHPPath -r "echo 'base64:' . base64_encode(random_bytes(32));"
if ($LASTEXITCODE -eq 0) {
    # Update .env with APP_KEY
    $EnvContent = Get-Content ".env"
    $EnvContent = $EnvContent -replace "^APP_KEY=.*", "APP_KEY=$AppKey"
    Set-Content ".env" $EnvContent
    Write-Host "OK - APP_KEY generated: $AppKey" -ForegroundColor Green
} else {
    Write-Host "WARNING - Could not auto-generate APP_KEY. Please set manually." -ForegroundColor Yellow
}
Write-Host ""

# Create storage directories
Write-Host "[4/4] Creating required directories..." -ForegroundColor Yellow
$Dirs = @(
    "storage/logs",
    "storage/framework",
    "storage/framework/cache",
    "storage/framework/sessions",
    "storage/framework/views",
    "public/images/produk"
)

foreach ($dir in $Dirs) {
    if (-not (Test-Path $dir)) {
        New-Item -ItemType Directory -Path $dir -Force | Out-Null
        Write-Host "OK - Created: $dir" -ForegroundColor Green
    }
}
Write-Host ""

# Summary
Write-Host "========================================" -ForegroundColor Cyan
Write-Host "Setup Complete!" -ForegroundColor Green
Write-Host "========================================" -ForegroundColor Cyan
Write-Host ""
Write-Host "NEXT STEPS:" -ForegroundColor Yellow
Write-Host ""
Write-Host "1. BUAT DATABASE (buka HeidiSQL/MySQL):"
Write-Host "   Jalankan SQL di file: database.sql"
Write-Host ""
Write-Host "2. EDIT .env FILE:"
Write-Host "   - Buka file .env"
Write-Host "   - Sesuaikan database credentials:"
Write-Host "     DB_DATABASE=e_ensiklopedia"
Write-Host "     DB_USERNAME=root"
Write-Host "     DB_PASSWORD= (kosong)"
Write-Host ""
Write-Host "3. JALANKAN SERVER:"
Write-Host "   PowerShell:"
Write-Host "   `$env:PATH = 'C:\laragon\bin\php\php-8.1.10-Win32-vs16-x64;`$env:PATH'"
Write-Host "   & 'C:\laragon\bin\php\php-8.1.10-Win32-vs16-x64\php.exe' artisan serve"
Write-Host ""
Write-Host "4. BUKA BROWSER:"
Write-Host "   http://localhost:8000"
Write-Host ""
Write-Host "File penting:"
Write-Host "- SETUP_FINAL.md (dokumentasi lengkap)"
Write-Host "- database.sql (schema database)"
Write-Host "- .env (konfigurasi aplikasi)"
Write-Host ""
Write-Host "Good luck! Selamat mengembangkan :)" -ForegroundColor Green
Write-Host ""
