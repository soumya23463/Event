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

$result = $conn->query("SELECT option_name, option_value FROM wp_options WHERE option_name IN ('siteurl', 'home')");

while($row = $result->fetch_assoc()) {
    echo $row['option_name'] . ': ' . $row['option_value'] . PHP_EOL;
}

$conn->close();
