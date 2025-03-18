<?php
//Database connection
require_once "../../../db/db_connection.php";

//Error handling 
error_reporting(0);
ini_set('display_errors', 0);
?>
<?php

if (isset($_GET['delete'])) {
     $delete = mysqli_real_escape_string($conn, $_GET['delete']);
     $delete_query = "DELETE FROM `user` WHERE id = '{$delete}'";
     if (mysqli_query($conn, $delete_query)) {
         
         ?>
         <script>window.location.href="../../../authentication/logout.php";</script>
         <?php 
          exit; 
     } else {
         
          echo "Error deleting user: " . mysqli_error($conn);
     }
} else {
     
     echo' <div class="alert alert-danger rounded" role="alert" style="font-size:15px;">Invalid request: Missing "delete" parameter</div>';

}
?>