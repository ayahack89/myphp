<?php 
session_start();
unset($_SESSION["name"]);
header("Location: http://localhost/fsociety/admin/index.php");
exit();
?>