
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="login.php" method="post">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button>Submit</button>
    </form>
    <?php

    $conn = new mysqli("localhost", "root", "", "login_info");

    if($conn->connect_error){
        die("Connection failed" . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashed_password = hash('sha256', $password);
    
    $sql = "SELECT * FROM info WHERE username = '$username' AND pass = '$hashed_password'";
    $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            echo "Welcome " . $user['name'] . "! You are registered";
        } else {
            echo "Wrong username or password!";
        }
    }
    ?>
</body>
</html>