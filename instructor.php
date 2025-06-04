<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'instructor') {
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Instructor Dashboard - CodeLearn</title>
</head>
<body>
  <h1>Welcome Instructor, <?php echo htmlspecialchars($_SESSION['user']['name']); ?>!</h1>
  <p>This is the instructor dashboard.</p>
  <a href="../logout.php">Logout</a>
</body>
</html>
