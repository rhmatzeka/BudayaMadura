<?php

// Setup database tanpa artisan
require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';

try {
    // Load environment
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();
    
    echo "Setting up database...\n";
    
    // Test database connection
    $pdo = new PDO(
        "mysql:host=" . $_ENV['DB_HOST'] . ";port=" . $_ENV['DB_PORT'],
        $_ENV['DB_USERNAME'],
        $_ENV['DB_PASSWORD']
    );
    
    echo "✓ Database connection successful\n";
    
    // Create database if not exists
    $dbName = $_ENV['DB_DATABASE'];
    $pdo->exec("CREATE DATABASE IF NOT EXISTS `$dbName`");
    echo "✓ Database '$dbName' ready\n";
    
    // Connect to the specific database
    $pdo = new PDO(
        "mysql:host=" . $_ENV['DB_HOST'] . ";port=" . $_ENV['DB_PORT'] . ";dbname=" . $dbName,
        $_ENV['DB_USERNAME'],
        $_ENV['DB_PASSWORD']
    );
    
    // Read and execute SQL file
    if (file_exists('database.sql')) {
        $sql = file_get_contents('database.sql');
        $statements = explode(';', $sql);
        
        foreach ($statements as $statement) {
            $statement = trim($statement);
            if (!empty($statement)) {
                $pdo->exec($statement);
            }
        }
        echo "✓ Database structure created from database.sql\n";
    } else {
        echo "! database.sql not found, skipping structure setup\n";
    }
    
    echo "\n✓ Database setup complete!\n";
    echo "You can now run: run-server.bat\n";
    
} catch (Exception $e) {
    echo "✗ Error: " . $e->getMessage() . "\n";
}