<?php
require_once 'vendor/autoload.php';

try {
    $app = new Illuminate\Foundation\Application(dirname(__DIR__));
    echo "Laravel Application loaded successfully!";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>