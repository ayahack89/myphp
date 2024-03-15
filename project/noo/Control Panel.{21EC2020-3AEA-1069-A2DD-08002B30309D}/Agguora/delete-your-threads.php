<?php
include "db_connection.php";
session_start();
ini_set('display_errors', 0);
?>
<!-- Thread -Delete action -Start -->
<?php
if (isset($_GET['delete'])) {
     $delete_id = mysqli_real_escape_string($conn, $_GET['delete']);

     // Fetch category details
     $sql = "SELECT * FROM `threads` WHERE thread_id = '{$delete_id}'";
     $run = mysqli_query($conn, $sql);

     if ($run && mysqli_num_rows($run) > 0) {
          $row = mysqli_fetch_assoc($run);

          $sql_delete_query = "DELETE FROM `threads` WHERE thread_id = '{$delete_id}'";

          $result = mysqli_query($conn, $sql_delete_query);
          if ($result) {
               ?>
               <script>window.location.href = "your-threads.php";</script>
               <?php
               exit;

          } else {
               echo "Opps! Somthing went wrong : (";
          }

     } else {
          echo "No threads found with the given ID.";
     }
} else {
     echo "Edit ID is missing.";
}
?>

<!-- Thread -Delete action -End  -->