<?php 
//Server details
$servername = "localhost";
$username = "root";
$password = " ";
$database = "agguoradb";

$conn = mysqli_connect($servername, $username, $password, $database);
if(!$conn){
     die("Server not connected!".mysqli_error($conn));
}
?>