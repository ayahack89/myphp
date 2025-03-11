<?php 
$server = "127.0.0.1";
$username = "root";
$password = "";
$database = "ajax";

$conn = new mysqli($server, $username, $password, $database);

if($conn->connect_error){
     die("Connection failed". $conn->connect_error);
}

?>
