<?php
session_start();

// Your database settings - adjust these if needed
$host = 'localhost';
$dbname = 'vibe_auth';  // Your database name
$username = 'root';      // Your MySQL username
$password = '';          // Your MySQL password (empty for XAMPP/WAMP)

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>