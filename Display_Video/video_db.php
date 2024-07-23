<?php
$servername = "127.0.0.1";
$serverusername = "root";
$serverpassword = "";
$databasename = "videos";

$connection = mysqli_connect($servername, $serverusername, $serverpassword, $databasename);
if (!$connection) {
     die("Error! Sorry databse is not connected : (" . mysqli_error($connection));
}

?>