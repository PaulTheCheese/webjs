<?php
if (isset($_POST["submit"])){
    $usernameSignup = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Username Validation
    if (strlen($usernameSignup) < 3 || strlen($usernameSignup) > 30){
        echo "<script>
                 alert('Username must be 3 to 30 characters');
                 window.location.href = 'sign-up.html';
              </script>";
        exit;
    }

    // Password Validation
    if (strlen($password) < 8){
        echo "<script>
                 alert('Password must be at least 8 Characters');
                 window.location.href = 'sign-up.html';
              </script>";
        exit;
    }

    if (! preg_match("/[a-z]/i", $password)){
        echo "<script>
                 alert('Password must contain at least one letter');
                 window.location.href = 'sign-up.html';
              </script>";
        exit;
    }

    if (! preg_match("/[0-9]/", $password)){
        echo "<script>
                 alert('Password must contain at least one number');
                 window.location.href = 'sign-up.html';
              </script>";
        exit;
    }

    if ($password !== $confirm_password){
        echo "<script>
                 alert('Passwords must match');
                 window.location.href = 'sign-up.html';
              </script>";
        exit;
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
    $mysqli = require __DIR__ . "/database.php";
    
    // SQL Query for the Database
    $sql = "INSERT INTO user (name, email, password_hash) VALUES (?, ?, ?)";

    $stmt = $mysqli->stmt_init();
    
    if (!$stmt->prepare($sql)) {
        die("SQL error: " . $mysqli->error); // Corrected here
    }
    
    $stmt->bind_param("sss", $usernameSignup, $email, $hashedPassword);

    if ($stmt->execute()) {
        header("Location: signup-success.html");
        exit;
    } else { 
       if ($mysqli->errno === 1062){
        echo "<script>
                 alert('Email is already taken');
                 window.location.href = 'sign-up.html';
              </script>";
       }
       die($mysqli->error . " " . $mysqli->errno);
    }
}
?>
