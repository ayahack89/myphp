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
     <!-- Thread -Delete action -Start -->
     <?php
     if (isset($_GET['edit'])) {
          $edit_id = mysqli_real_escape_string($conn, $_GET['edit']);

          // Fetch category details
          $sql = "SELECT * FROM `threads` WHERE thread_id = '{$edit_id}'";
          $run = mysqli_query($conn, $sql);

          if ($run && mysqli_num_rows($run) > 0) {
               $row = mysqli_fetch_assoc($run);

               $sql_delete_query = "DELETE FROM `threads` WHERE thread_id = '{$edit_id}'";

               $result = mysqli_query($conn, $sql_delete_query);
               if ($result) {
                    header("Location: your-threads.php");
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
     <?php include "bootstrapjs.php"; ?>
</body>

</html>