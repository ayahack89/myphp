<?php
ini_set('display_errors', 0);
session_start();
session_destroy();
unset($_SESSION['username']);
header("Location: index.php");
exit();

?>