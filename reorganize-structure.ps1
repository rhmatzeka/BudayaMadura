# ============================================
# Reorganize Laravel Project Structure
# For Laragon v6 with Flat File Naming
# ============================================

Write-Host "========================================" -ForegroundColor Cyan
Write-Host "Laravel Project Structure Reorganization" -ForegroundColor Cyan
Write-Host "========================================" -ForegroundColor Cyan
Write-Host ""

$ProjectRoot = (Get-Location).Path

# Create necessary Laravel directories
$Directories = @(
    "app/Http/Controllers",
    "app/Models",
    "app/Providers",
    "database/migrations",
    "database/seeders",
    "resources/views/layouts",
    "resources/views/home",
    "resources/views/produk",
    "resources/views/glossarium",
    "public/images/produk",
    "config",
    "bootstrap"
)

Write-Host "[1/4] Creating Laravel directory structure..." -ForegroundColor Yellow
foreach ($dir in $Directories) {
    $fullPath = Join-Path $ProjectRoot $dir
    if (-not (Test-Path $fullPath)) {
        New-Item -ItemType Directory -Path $fullPath -Force | Out-Null
        Write-Host "  OK: Created: $dir" -ForegroundColor Green
    }
}

Write-Host ""
Write-Host "[2/4] Moving app files..." -ForegroundColor Yellow
$appMoves = @{
    "app_Http_Controllers_HomeController.php" = "app/Http/Controllers/HomeController.php"
    "app_Http_Controllers_ProdukController.php" = "app/Http/Controllers/ProdukController.php"
    "app_Http_Controllers_GlosariumController.php" = "app/Http/Controllers/GlosariumController.php"
    "app_Models_Produk.php" = "app/Models/Produk.php"
    "app_Models_Gambar.php" = "app/Models/Gambar.php"
    "app_Models_Video.php" = "app/Models/Video.php"
    "app_Models_Glossarium.php" = "app/Models/Glossarium.php"
    "app_Models_NilaiBudaya.php" = "app/Models/NilaiBudaya.php"
    "app_Providers_AppServiceProvider.php" = "app/Providers/AppServiceProvider.php"
}

foreach ($source in $appMoves.Keys) {
    $sourcePath = Join-Path $ProjectRoot $source
    $targetPath = Join-Path $ProjectRoot $appMoves[$source]
    
    if (Test-Path $sourcePath) {
        Move-Item -Path $sourcePath -Destination $targetPath -Force
        Write-Host "  OK: Moved: $source" -ForegroundColor Green
    }
}

Write-Host ""
Write-Host "[3/4] Moving database files..." -ForegroundColor Yellow
$dbMoves = @{
    "database_migrations_create_produk_table.php" = "database/migrations/2024_01_28_000001_create_produk_table.php"
    "database_migrations_create_gambar_table.php" = "database/migrations/2024_01_28_000002_create_gambar_table.php"
    "database_migrations_create_video_table.php" = "database/migrations/2024_01_28_000003_create_video_table.php"
    "database_migrations_create_glossarium_table.php" = "database/migrations/2024_01_28_000004_create_glossarium_table.php"
    "database_migrations_create_nilai_budaya_table.php" = "database/migrations/2024_01_28_000005_create_nilai_budaya_table.php"
    "database_migrations_create_produk_nilai_budaya_table.php" = "database/migrations/2024_01_28_000006_create_produk_nilai_budaya_table.php"
    "database_seeders_DatabaseSeeder.php" = "database/seeders/DatabaseSeeder.php"
    "database_seeders_ProdukSeeder.php" = "database/seeders/ProdukSeeder.php"
    "database_seeders_GlosariumSeeder.php" = "database/seeders/GlosariumSeeder.php"
}

foreach ($source in $dbMoves.Keys) {
    $sourcePath = Join-Path $ProjectRoot $source
    $targetPath = Join-Path $ProjectRoot $dbMoves[$source]
    
    if (Test-Path $sourcePath) {
        Move-Item -Path $sourcePath -Destination $targetPath -Force
        Write-Host "  OK: Moved: $source" -ForegroundColor Green
    }
}

Write-Host ""
Write-Host "[4/4] Moving view files..." -ForegroundColor Yellow
$viewMoves = @{
    "resources_views_layouts_app.blade.php" = "resources/views/layouts/app.blade.php"
    "resources_views_home_index.blade.php" = "resources/views/home/index.blade.php"
    "resources_views_produk_index.blade.php" = "resources/views/produk/index.blade.php"
    "resources_views_produk_show.blade.php" = "resources/views/produk/show.blade.php"
    "resources_views_produk_galeri.blade.php" = "resources/views/produk/galeri.blade.php"
    "resources_views_glossarium_index.blade.php" = "resources/views/glossarium/index.blade.php"
}

foreach ($source in $viewMoves.Keys) {
    $sourcePath = Join-Path $ProjectRoot $source
    $targetPath = Join-Path $ProjectRoot $viewMoves[$source]
    
    if (Test-Path $sourcePath) {
        Move-Item -Path $sourcePath -Destination $targetPath -Force
        Write-Host "  OK: Moved: $source" -ForegroundColor Green
    }
}

Write-Host ""
Write-Host "Moving routes file..." -ForegroundColor Yellow
$routesSource = Join-Path $ProjectRoot "routes_web.php"
$routesTarget = Join-Path $ProjectRoot "routes/web.php"
if (Test-Path $routesSource) {
    if (-not (Test-Path "routes")) { New-Item -ItemType Directory -Path "routes" | Out-Null }
    Move-Item -Path $routesSource -Destination $routesTarget -Force
    Write-Host "  OK: Moved: routes_web.php to routes/web.php" -ForegroundColor Green
}

Write-Host ""
Write-Host "========================================" -ForegroundColor Cyan
Write-Host "OK - Reorganization Complete!" -ForegroundColor Green
Write-Host "========================================" -ForegroundColor Cyan
Write-Host ""
Write-Host "Next steps:" -ForegroundColor Yellow
Write-Host "1. Run: copy .env.example .env"
Write-Host "2. Run: .\run-laragon.bat key"
Write-Host "3. Configure database in .env"
Write-Host "4. Run: .\run-laragon.bat migrate"
Write-Host "5. Run: .\run-laragon.bat db:seed"
Write-Host "6. Run: .\run-laragon.bat serve"
Write-Host ""
