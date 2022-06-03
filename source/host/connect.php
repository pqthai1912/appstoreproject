<?php
$mysqli = new mysqli('localhost', 'thaiphan', '123456', 'database');
mysqli_set_charset($mysqli, 'UTF8');
// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
?>