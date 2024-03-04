<?php
include "db_connection.php";
ini_set('display_errors', 0);
?>
<?php

if (isset($_GET['delete'])) {
     $delete = mysqli_real_escape_string($conn, $_GET['delete']);
     $delete_query = "DELETE FROM `user` WHERE id = '{$delete}'";
     if (mysqli_query($conn, $delete_query)) {
         
         ?>
         <script>window.location.href="login.php";</script>
         <?php 
          exit; 
     } else {
         
          echo "Error deleting user: " . mysqli_error($conn);
     }
} else {
     
     echo' <div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">Invalid request: Missing "delete" parameter</div>';

}
?>