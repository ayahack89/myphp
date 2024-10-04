<?php 
require 'config.php'; 
if (!isset($_GET['code'])) {
	exit("can't find the page"); 
}

$code = $_GET['code']; 
$getCodeQuery = mysqli_query($con, "SELECT * FROM resetPasswords WHERE code = '$code'"); 
if (mysqli_num_rows($getCodeQuery) == 0) {
	exit("can't find the page because not same code"); 
}

// handling the form 
if (isset($_POST['password'])) {
	$pw = $_POST['password']; 
	$pw = md5($pw); // not the best option but for demo simplicity
	$row = mysqli_fetch_array($getCodeQuery); 
	$email = $row['email']; 
	$query = mysqli_query($con, "UPDATE users SET password = '$pw' WHERE email = '$email'");

	if ($query) {
	 	$query = mysqli_query($con, "DELETE FROM resetPasswords WHERE code ='$code'"); 
	 	exit('Password updated'); 	
 	 }else {
 	 	exit('Something went wrong :('); 	
 	 } 	 
}


?>


<form method="post">
	<input type="password" name="new_password" placeholder="Enter new password">
	<input type="submit" value="Process" name="submit">
</form>