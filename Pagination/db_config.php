<?php 
$serverip = "127.0.0.1";
$username = "root";
$password = "";
$db_name = "basic_cr";

//connection
$conn = mysqli_connect($serverip, $username, $password, $db_name);
if(!$conn){
     die("Server not connected!".mysqli_error($conn));
}
?>