<?php
require_once 'config.php';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm = $_POST['confirm_password'];
    
    // Validation
    if(strlen($password) < 6) {
        $_SESSION['error'] = 'Password must be at least 6 characters';
        header('Location: register.php');
        exit();
    }
    
    if($password !== $confirm) {
        $_SESSION['error'] = 'Passwords do not match';
        header('Location: register.php');
        exit();
    }
    
    // Check if user exists
    $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
    $stmt->execute([$username, $email]);
    
    if($stmt->rowCount() > 0) {
        $_SESSION['error'] = 'Username or email already taken';
        header('Location: register.php');
        exit();
    }
    
    // Create user
    $hashed = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (username, email, password_hash) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    
    if($stmt->execute([$username, $email, $hashed])) {
        $_SESSION['success'] = 'Account created! Please login.';
        header('Location: login.php');
    } else {
        $_SESSION['error'] = 'Something went wrong';
        header('Location: register.php');
    }
    exit();
}
?>