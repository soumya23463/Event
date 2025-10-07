<?php
define('DB_NAME', 'magic_events');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if($conn->connect_error) {
    echo 'Connection failed: ' . $conn->connect_error;
    exit;
}

// Update siteurl
$conn->query("UPDATE wp_options SET option_value = 'http://localhost/Events' WHERE option_name = 'siteurl'");

// Update home
$conn->query("UPDATE wp_options SET option_value = 'http://localhost/Events' WHERE option_name = 'home'");

echo "URLs updated successfully!" . PHP_EOL;
echo "siteurl: http://localhost/Events" . PHP_EOL;
echo "home: http://localhost/Events" . PHP_EOL;

$conn->close();
