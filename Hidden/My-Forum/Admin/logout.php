<?php 
session_start();
unset($_SESSION["name"]);
?>
<script>window.location.href="index.php";</script>
<?php 
exit();
?>