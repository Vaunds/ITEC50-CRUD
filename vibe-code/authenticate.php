<?php
require_once 'config.php';

if($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: login.php');
    exit();
}

$username = trim($_POST['username']);
$password = $_POST['password'];

// Check if input is email or username
$isEmail = filter_var($username, FILTER_VALIDATE_EMAIL);

if($isEmail) {
    $sql = "SELECT * FROM users WHERE email = :username";
} else {
    $sql = "SELECT * FROM users WHERE username = :username";
}

$stmt = $pdo->prepare($sql);
$stmt->execute(['username' => $username]);
$user = $stmt->fetch();

if($user && password_verify($password, $user['password_hash'])) {
    // Login successful
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['logged_in'] = true;
    header('Location: dashboard.php');
    exit();
} else {
    // Login failed
    $_SESSION['error'] = '❌ Invalid credentials. Please try again!';
    header('Location: login.php');
    exit();
}
?>