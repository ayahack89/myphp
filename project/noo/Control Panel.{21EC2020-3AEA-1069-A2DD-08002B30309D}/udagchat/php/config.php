<?php
  $hostname = "localhost";
  $username = "root";
  $password = "";
  $dbname = "dbdemo";

  $conn = mysqli_connect($hostname, $username, $password, $dbname);
  if(!$conn){
    echo "Database connection error".mysqli_connect_error();
  }
?>
