<?php 
// Server details
$servername = "127.0.0.1";
$username = "root";
$password = "";
$database = "agguoradb";

$conn = mysqli_init();
mysqli_ssl_set($conn, NULL, NULL, NULL, NULL, NULL);

// Connect to the database
if (!mysqli_real_connect($conn, $servername, $username, $password, $database)) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8mb4");
error_reporting(0);


?>