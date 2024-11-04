<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="style-login.css">
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="login-success.php" method="post">
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