<?php
$adminPassword = '0000';
$instructorPassword = '9999';

$adminHash = password_hash($adminPassword, PASSWORD_DEFAULT);
$instructorHash = password_hash($instructorPassword, PASSWORD_DEFAULT);

echo nl2br("Admin hashed password:\n$adminHash\n\n");
echo nl2br("Instructor hashed password:\n$instructorHash\n");
?>
