<?php
$host = 'localhost';
$db = 'gamesrus';
$user = 'root';
$pass = '';

// Create connection using MySQLi with error handling
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Set charset to UTF-8
$conn->set_charset("utf8mb4");
?>
