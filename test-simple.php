<?php
echo "PHP is working!<br>";
echo "PHP Version: " . phpversion() . "<br>";

// Test database connection
try {
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=e_ensiklopedia', 'root', '');
    echo "Database connection: OK<br>";
} catch (PDOException $e) {
    echo "Database connection failed: " . $e->getMessage() . "<br>";
}

// Test if vendor autoload exists
if (file_exists('vendor/autoload.php')) {
    echo "Vendor autoload: EXISTS<br>";
    require_once 'vendor/autoload.php';
    
    // Test Laravel without collision
    try {
        // Set basic config
        $_ENV['APP_BASE_PATH'] = dirname(__DIR__);
        
        $app = new Illuminate\Foundation\Application(dirname(__DIR__));
        echo "Laravel Application: OK<br>";
        
        // Test basic Laravel functionality
        $app->singleton(
            Illuminate\Contracts\Http\Kernel::class,
            App\Http\Kernel::class
        );
        
        echo "Laravel Kernel: OK<br>";
        
    } catch (Exception $e) {
        echo "Laravel Application failed: " . $e->getMessage() . "<br>";
        echo "Stack trace: " . $e->getTraceAsString() . "<br>";
    }
} else {
    echo "Vendor autoload: NOT FOUND<br>";
}
?>