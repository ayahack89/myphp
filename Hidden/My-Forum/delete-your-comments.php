<?php
include "db_connection.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <?php include "bootstrapcss-and-icons.php"; ?>
     <title>Document</title>
</head>

<body>
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
                    header("Location: your-comments.php");
                    exit;

               } else {
                    echo "Opps! Somthing went wrong : (";
               }

          } else {
               echo "No comment found with the given ID.";
          }
     } else {
          echo "Edit ID is missing.";
     }
     ?>
     <!-- Delete action -End  -->

     <?php include "bootstrapjs.php"; ?>
</body>

</html>