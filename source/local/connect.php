<?php
$mysqli = new mysqli('sql301.epizy.com', 'epiz_28621327', 'VRcE9gn7WL8vyTQ', 'epiz_28621327_database');
mysqli_set_charset($mysqli, 'UTF8');
// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
?>