<?php
include 'db/connect.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = [
                'id' => $user['id'],
                'name' => $user['name'],
                'email' => $user['email'],
                'role' => $user['role'] ?? 'student'
            ];

            if ($_SESSION['user']['role'] == 'admin') {
                header("Location: dashboard/admin.php");
            } elseif ($_SESSION['user']['role'] == 'instructor') {
                header("Location: dashboard/instructor.php");
            } else {
                header("Location: dashboard/student.php");
            }
            exit;
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "Invalid email.";
    }
} else {
    // If someone accesses this page without POST, redirect to login form
    header("Location: login.php");
    exit;
}

$conn->close();
?>

