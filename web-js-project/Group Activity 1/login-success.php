<?php

$valid_credentials = [
    'admin' => 'adminpassword',
    'malenia' => 'miquella',
    'ranni' => 'melina'
];

$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';


if (array_key_exists($username, $valid_credentials) && $valid_credentials[$username] === $password) {
    echo "<script>alert('Login successful!'); window.location.href = 'login.php';</script>";
} else {
    echo "<script>alert('Invalid username or password!'); window.location.href = 'login.php';</script>";
}

echo "<script>setTimeout(function(){ window.location.href = 'index.php'; }, 2000);</script>";
?>