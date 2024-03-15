<?php 
session_start();
ini_set('display_errors', 0);
unset($_SESSION["name"]);
?>
<script>window.location.href="index.php";</script>
<?php 
exit();
?>