<?php
ini_set('display_errors', 0);
error_reporting(0);
session_start();
session_destroy();
unset($_SESSION['username']);
?>
<script>window.location.href="login.php";</script>
<?php 
exit();
?>