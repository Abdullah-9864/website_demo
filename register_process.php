<?php
include 'db/connect.php';

$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "Registered successfully! <a href='login.php'>Login now</a>";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>