<?php
echo "<h1>Test Basic</h1>";
echo "PHP Version: " . phpversion() . "<br>";

// Test database
try {
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=e_ensiklopedia', 'root', '');
    echo "Database: CONNECTED<br>";
    
    // Test query
    $stmt = $pdo->query("SELECT COUNT(*) as total FROM produk");
    $result = $stmt->fetch();
    echo "Total produk: " . $result['total'] . "<br>";
    
} catch (PDOException $e) {
    echo "Database: ERROR - " . $e->getMessage() . "<br>";
}

echo "<br><a href='public/'>Try Laravel App</a>";
?>