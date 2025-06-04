<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Admin Dashboard - CodeLearn</title>
</head>
<body>
  <h1>Welcome Admin, <?php echo htmlspecialchars($_SESSION['user']['name']); ?>!</h1>
  <p>This is the admin dashboard.</p>
  <a href="../logout.php">Logout</a>
</body>
</html>
