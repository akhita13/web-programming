<?php
include 'db.php';

$username = trim($_POST['username']);
$email = trim($_POST['email']);
$password = trim($_POST['password']);

if (strlen($username) < 3 || strlen($password) < 6) {
    echo "Username must be at least 3 characters and password at least 6 characters.";
    exit();
}

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";

if ($conn->query($sql) === TRUE) {
    echo "Registration successful!";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
