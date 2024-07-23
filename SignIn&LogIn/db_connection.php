<?php
//Server Connction
$serverIP = "127.0.0.1";
$userName = "root";
$password = "";
$database = "userlogin";

$conn = mysqli_connect($serverIP, $userName, $password, $database);
if(!$conn){
     die("Server not connected!".mysqli_error($conn));
}



?>