<?php
include "db_connection.php";
session_start();
ini_set('display_error', 0);
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
     <!-- All threads section -Start  -->
     <?php
     $thread_created_by = $_SESSION['username'];
     $sql = "SELECT * FROM `threads` WHERE thread_created_by = '{$thread_created_by}'";
     $result = mysqli_query($conn, $sql);
     if ($result) {
          if (mysqli_num_rows($result) > 0) {
               while ($thread = mysqli_fetch_assoc($result)) {
                    ?>
                    <!-- Thread box -Start  -->
                    <div class="card rounded-0">
                         <div class="card-body">
                              <h5 class="card-title">
                                   <?php echo $thread['thread_name']; ?>
                              </h5>
                              <h6 class="card-subtitle mb-2 text-body-secondary">
                                   <b style="color:black;">
                                        <?php echo '@' . $thread['thread_created_by']; ?>
                                   </b><br>
                                   <b style="font-weight:lighter; font-size:12px;">
                                        <?php echo $thread['thread_time']; ?>
                                   </b>
                              </h6>
                              <p class="card-text">
                                   <?php echo $thread['thread_desc']; ?>
                              </p><br>
                              <img src="img/upload/<?php echo $thread['uploaded_image']; ?>" class="img-thumbnail" alt=""
                                   width="200vw"><br>
                              <a href="user-thread-edit-page.php?edit=<?php echo $thread['thread_id']; ?>"
                                   class="card-link text-success" style="text-decoration:none;"><i class="ri-edit-box-line"></i></a>
                              <a href="delete-your-threads.php?delete=<?php echo $thread['thread_id']; ?>"
                                   class="card-link text-danger" style="text-decoration:none;"><i class="ri-delete-bin-5-line"></i></a>
                         </div>
                    </div>
                    <!-- Thread box -End  -->
                    <?php
               }

          } else {
               echo' <div class="alert alert-warning rounded-0" role="alert" style="font-size:15px;">No threads found!</div>';
          }
     }
     ?>
     <!-- All threads section -End  -->

     <?php include "footer.php"; ?>
     <?php include "bootstrapjs.php"; ?>
</body>

</html>