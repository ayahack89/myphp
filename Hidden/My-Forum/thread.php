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
<?php include "fonts.php"; ?>

<body>
     <?php include "header.php"; ?>
     <?php
     $thread_id = mysqli_real_escape_string($conn, $_GET['thread']);
     $sql_query = "SELECT * FROM `threads` WHERE thread_id = '{$thread_id}'";
     $result = mysqli_query($conn, $sql_query);
     if ($result) {
          if (mysqli_num_rows($result) > 0) {
               while ($thread = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="container">
                         <div class="card text-center">
                              <div class="card-header">
                                   Thread No.
                                   <?php echo $thread['thread_id']; ?>
                                   <h6 style="font-size:11px;">Posted by Ayanabha</h6>
                              </div>
                              <div class="card-body">
                                   <h3 class="card-title">
                                        <?php echo $thread['thread_name']; ?>
                                   </h3>
                                   <p class="card-text px-5">
                                        <?php echo $thread['thread_desc']; ?>
                                   </p>

                                   <a href="disk.php?Disk=<?php echo $thread['thread_catagory_id']; ?>" class="btn btn-dark">Go
                                        back</a>
                              </div>
                              <div class="card-footer text-body">
                                   <?php echo $thread['thread_time']; ?>
                              </div>
                         </div>
                         <div class="container my-3">
                              <h3>Topic dicussion
                              </h3>
                         </div>


                    </div>
                    <?php

               }
          } else {
               echo "Invalid Disk ID";
          }


     } else {
          echo "Somthing Went Wrong : (";
     }
     ?>
     <?php include "footer.php"; ?>
     <?php include "bootstrapjs.php"; ?>
</body>

</html>