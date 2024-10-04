<?php 

//Database connection.  
$server = '127.0.0.1';
$user = 'root';
$password = '';
$database = 'reset_password';

$con = mysqli_connect($server, $user, $password, $database); 

if(!$con){
	echo "Connection Error: Server not connected";
	mysqli_error($con);
}
