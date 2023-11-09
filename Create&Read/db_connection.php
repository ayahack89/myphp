<?php 
/*Server Information*/
$serverName = "localhost";
$userName = "root";
$password = "";
$dbname = "createandread";

/*Connection to the Data base */
$conn = mysqli_connect($serverName, $userName, $password, $dbname) or die("Server not connected to the database". mysqli_error($conn));

?>