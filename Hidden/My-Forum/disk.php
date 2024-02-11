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
     <title>Disk</title>
</head>
<?php include "fonts.php"; ?>

<body>
     <?php include "header.php"; ?>
     <?php
     $disk_id = mysqli_real_escape_string($conn, $_GET['Disk']);
     $sql_query = "SELECT * FROM `catagory` WHERE catagory_id = '{$disk_id}'";
     $result = mysqli_query($conn, $sql_query);
     if ($result) {
          if (mysqli_num_rows($result) > 0) {
               while ($disk = mysqli_fetch_assoc($result)) {
                    ?>

                    <div class="container px-2 py-2">
                         <div class="card text-center">
                              <div class="card-header">
                                   Disk
                                   <?php echo $disk['catagory_id']; ?>
                              </div>
                              <div class="card-body">
                                   <h2 class="card-title">
                                        Welcome to
                                        <?php echo $disk['catagory_name']; ?> disk
                                   </h2>
                                   <p class="card-text px-5">
                                        <?php echo $disk['catagory_desc']; ?>
                                   </p>
                                   <a href="catagory-page.php" class="btn btn-dark">Go to another disk</a>
                              </div>

                              <div class="card-footer text-body-secondary">
                                   <?php echo $disk['created']; ?>
                              </div>
                         </div>
                    </div>
                    <div class="container my-3">
                         <h3>Browes
                              <?php echo $disk['catagory_name']; ?> disk topics
                         </h3>
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
     <?php
     $disk_id = mysqli_real_escape_string($conn, $_GET['Disk']);
     $sql_query = "SELECT * FROM `threads` WHERE thread_catagory_id = '{$disk_id}'";
     $result = mysqli_query($conn, $sql_query);
     if ($result) {

          if (mysqli_num_rows($result) > 0) {
               $check_result = false;
               while ($thread = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="container d-flex bg-light border py-4 px-4">
                         <div class="px-3">
                              <img src="img/images/default.png" alt="" width="50px" height="50px">
                         </div>
                         <div class="text">
                              <h5>
                                   <a href="thread.php?thread=<?php echo $thread['thread_id']; ?>" class="text-dark">
                                        <?php echo $thread['thread_name']; ?>
                                   </a>
                              </h5>
                              <p style="font-size:12px;">
                                   <?php echo $thread['thread_desc']; ?>
                              </p>
                         </div>
                    </div>
                    <?php
                    $check_result = true;
               }

               if (!$check_result) {

               }
          } else {
               ?>
               <div class="container px-4">
                    <h2>No Result Found : (</h2>
                    <p style="font-size:12px;">Be the first person to add a topic....</p>
               </div>
               <?php
          }



     } else {
          echo "Somthing Went Wrong : (";
     }
     ?>
     <?php include "footer.php"; ?>
     <?php include "bootstrapjs.php"; ?>
</body>

</html>