<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = sprintf("SELECT * FROM user
                    WHERE name = '%s'",
                   $mysqli->real_escape_string($_POST["username"]));
    
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
    
    if ($user) {
        
        if (password_verify($_POST["password"], $user["password_hash"])) {
            
            session_start();
            
            session_regenerate_id();
            
            header("Location: act.html");
            exit;
            
        }
    }
    
    $is_invalid = true;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="css/style-login.css">
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>

        <?php if ($is_invalid): ?>
            <em class="invalid"> Invalid Login </em>
        <?php endif; ?>

        <form  method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Username" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Password" required>

            
            
            <button type="submit">Login</button>
        </form>
        <p>Not registered? <a href="sign-up.html">Create an Account</a></p>
    </div>
</body>
</html>