<?php
echo "Regenerating autoloader...\n";

// Remove old autoload files
$files = [
    'vendor/composer/autoload_classmap.php',
    'vendor/composer/autoload_files.php',
    'vendor/composer/autoload_namespaces.php',
    'vendor/composer/autoload_psr4.php',
    'vendor/composer/autoload_static.php'
];

foreach ($files as $file) {
    if (file_exists($file)) {
        unlink($file);
        echo "Removed: $file\n";
    }
}

echo "Done! Now run: composer dump-autoload\n";
?>