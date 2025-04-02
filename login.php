<?php
session_start();
include 'db.php';

$email = trim($_POST['email']);
$password = trim($_POST['password']);

$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        $_SESSION['user'] = $row['username'];
        echo "success"; // This triggers the redirect in JavaScript
    } else {
        echo "Invalid password!";
    }
} else {
    echo "User not found! Please register.";
}

$conn->close();
?>
