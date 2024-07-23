<?php 
/*Server Information*/
$serverIP = "127.0.0.1";
$userName = "root";
$password = "";
$dbname = "basic_cr";

/*Connection to the Data base */
$conn = mysqli_connect($serverIP, $userName, $password, $dbname);
if(!$conn){
     die("Server not connected to the database". mysqli_error($conn));
}

?>