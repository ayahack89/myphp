<?php
include "../../../db/db_connection.php";
session_start();
ini_set('display_errors', 0);
?>
<!-- Comments -Delete action -Start  -->
<?php
if (isset($_GET['delete'])) {
     $delete_id = mysqli_real_escape_string($conn, $_GET['delete']);

     // Fetch comments details
     $sql = "SELECT * FROM `comments` WHERE comment_id = '{$delete_id}'";
     $run = mysqli_query($conn, $sql);

     if ($run && mysqli_num_rows($run) > 0) {
          $row = mysqli_fetch_assoc($run);

          $sql_delete_query = "DELETE FROM `comments` WHERE comment_id = '{$delete_id}'";

          $result = mysqli_query($conn, $sql_delete_query);
          if ($result) {
               ?>
               <script>window.location.href = "../../../user_account/profile.php";</script>
               <?php
               exit;

          } else {
               echo "Oops! Something went wrong : (";
          }

     } else {
          echo "No comment found with the given ID.";
     }
} else {
     echo "Edit ID is missing.";
}
?>
<!-- Delete action -End  -->