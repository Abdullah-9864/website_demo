<?php
// Basic register form UI
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register - CodeLearn</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <h2>Register</h2>
  <form action="register_process.php" method="POST">
    <label>Name:</label><br>
    <input type="text" name="name" required><br>
    <label>Email:</label><br>
    <input type="email" name="email" required><br>
    <label>Password:</label><br>
    <input type="password" name="password" required><br><br>
    <input type="submit" value="Register">
  </form>
</body>
</html>
