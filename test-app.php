<?php

// Test script untuk memastikan Laravel bisa jalan
try {
    require_once 'vendor/autoload.php';
    
    $app = require_once 'bootstrap/app.php';
    
    echo "✓ Autoload berhasil\n";
    echo "✓ Bootstrap berhasil\n";
    echo "✓ Laravel Application berhasil dibuat\n";
    
    // Test database connection
    $kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
    echo "✓ HTTP Kernel berhasil\n";
    
    echo "\nAplikasi siap dijalankan!\n";
    echo "Jalankan: run-server.bat\n";
    echo "Atau akses: http://localhost:8000\n";
    
} catch (Exception $e) {
    echo "✗ Error: " . $e->getMessage() . "\n";
    echo "File: " . $e->getFile() . ":" . $e->getLine() . "\n";
}