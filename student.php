<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'student') {
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Student Dashboard - CodeLearn</title>
</head>
<body>
  <h1>Welcome Student, <?php echo htmlspecialchars($_SESSION['user']['name']); ?>!</h1>
  <p>This is the student dashboard.</p>
  <a href="../logout.php">Logout</a>
</body>
</html>
