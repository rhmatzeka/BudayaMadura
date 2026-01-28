<?php
// Generate Laravel APP_KEY
$key = 'base64:' . base64_encode(random_bytes(32));
echo "Generated key: " . $key . "\n";

// Read .env file
$envFile = '.env';
$envContent = file_get_contents($envFile);

// Replace or add APP_KEY
if (strpos($envContent, 'APP_KEY=') !== false) {
    $envContent = preg_replace('/APP_KEY=.*/', 'APP_KEY=' . $key, $envContent);
} else {
    $envContent .= "\nAPP_KEY=" . $key;
}

// Write back to .env
file_put_contents($envFile, $envContent);
echo "Key saved to .env file\n";
echo "Done!";
?>