<?php
$con=mysqli_connect("localhost","root","","blog");
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
  }
?>