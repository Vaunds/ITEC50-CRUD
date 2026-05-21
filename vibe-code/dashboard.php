<?php
require_once 'config.php';

// Check if user is logged in
if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🎧 My Vibe Dashboard 🎧</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }
        .dashboard {
            max-width: 900px;
            margin: 50px auto;
            background: white;
            border-radius: 24px;
            padding: 48px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            animation: fadeIn 0.6s ease-out;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        h1 {
            text-align: center;
            font-size: 36px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 20px;
        }
        .welcome-card {
            background: linear-gradient(135deg, #f5f3ff 0%, #ede9fe 100%);
            padding: 40px;
            border-radius: 20px;
            text-align: center;
            margin: 30px 0;
        }
        .username {
            font-size: 28px;
            font-weight: bold;
            color: #764ba2;
            margin: 15px 0;
        }
        .email {
            color: #666;
            margin-bottom: 20px;
        }
        .vibe-stats {
            display: flex;
            justify-content: space-around;
            margin: 30px 0;
            padding: 20px;
            background: white;
            border-radius: 16px;
        }
        .stat {
            text-align: center;
        }
        .stat-number {
            font-size: 32px;
            font-weight: bold;
            color: #667eea;
        }
        .stat-label {
            color: #666;
            font-size: 14px;
            margin-top: 5px;
        }
        .logout-btn {
            display: inline-block;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 12px 32px;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            transition: transform 0.2s;
            margin-top: 20px;
        }
        .logout-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102,126,234,0.3);
        }
        .quote {
            font-style: italic;
            color: #764ba2;
            margin-top: 30px;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <h1>🎵 Vibe Dashboard 🎵</h1>
        
        <div class="welcome-card">
            <div>✨ Welcome to your vibe zone ✨</div>
            <div class="username">@<?= htmlspecialchars($_SESSION['username']) ?></div>
            <div class="email"><?= htmlspecialchars($_SESSION['email']) ?></div>
        </div>
        
        <div class="vibe-stats">
            <div class="stat">
                <div class="stat-number">🎧</div>
                <div class="stat-label">Good Vibes</div>
            </div>
            <div class="stat">
                <div class="stat-number">✨</div>
                <div class="stat-label">Positive Energy</div>
            </div>
            <div class="stat">
                <div class="stat-number">🚀</div>
                <div class="stat-label">Momentum</div>
            </div>
        </div>
        
        <div style="text-align: center;">
            <div class="quote">"Code with passion, vibe with purpose"</div>
            <a href="logout.php" class="logout-btn">🚪 Logout</a>
        </div>
    </div>
</body>
</html>