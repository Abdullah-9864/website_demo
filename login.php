<?php
session_start();
include 'db/connect.php';  // Adjust path if needed

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (!empty($email) && !empty($password)) {
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                // Password correct, set session and redirect based on role
                $_SESSION['user'] = $user;

                if ($user['role'] === 'admin') {
                    header("Location: dashboard/admin.php");
                    exit;
                } elseif ($user['role'] === 'instructor') {
                    header("Location: dashboard/instructor.php");
                    exit;
                } else {
                    header("Location: dashboard/student.php");
                    exit;
                }
            } else {
                $message = "Invalid password.";
            }
        } else {
            $message = "Invalid email.";
        }
    } else {
        $message = "Please enter both email and password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Login - CodeLearn</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <h2>Login</h2>
  <?php if ($message): ?>
    <p style="color:red;"><?php echo htmlspecialchars($message); ?></p>
  <?php endif; ?>
  <form method="POST" action="login.php">
    <label>Email:</label><br />
    <input type="email" name="email" required /><br />
    <label>Password:</label><br />
    <input type="password" name="password" required /><br /><br />
    <input type="submit" value="Login" />
  </form>
</body>
</html>
