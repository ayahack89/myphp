<?php
//Server Connction
$serverName = "localhost";
$userName = "root";
$password = "";
$database = "sigin_login";

$conn = mysqli_connect($serverName, $userName, $password, $database) or die("Server not connected!".mysqli_error($conn))



?>