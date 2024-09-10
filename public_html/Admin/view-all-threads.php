<?php 
session_start();
if(!isset($_SESSION['name'])){
echo 'Opps! atfirst you need to <a href="index.php">login</a> & proof that you are an admin.';
}else{ ?>
<?php
include "../db_connection.php";
ini_set('display_errors', 0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <?php include "../bootstrapcss-and-icons.php"; ?>
     <title>View All Threads | Admin Panel | Agguora</title>
</head>
<?php include "../fonts.php"; ?>

<body>
     <!-- All threads section -Start  -->
     <?php

     $sql = "SELECT * FROM `threads` ORDER BY thread_time DESC";
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
                              <h6 class="card-subtitle mb-2 text-body-dark">
                                  <?php 
                                  $thread_user_id = $thread['thread_user_id'];
                                  $sql = "SELECT * FROM `user` WHERE id='{$thread_user_id}'";
                                  $query = mysqli_query($conn, $sql);
                                  if($query && mysqli_num_rows($query)){
                                      $user=mysqli_fetch_assoc($query);
                                  ?>
                                  Poster by <strong><?php echo $user['username']; ?></strong>
                                  <?php } ?>
                                   <br>
                                   <b style="font-weight:lighter; font-size:12px;">
                                        <?php echo $thread['thread_time']; ?>
                                   </b>
                              </h6>
                              <p class="card-text">
                                   <?php
                                   if (empty($thread['uploaded_image'])) {

                                   } else {
                                        ?>
                                        <img src="../img/upload/<?php echo $thread['uploaded_image']; ?>"
                                             class="figure-img img-fluid rounded" alt="..." width="300px" height="300px">
                                        <?php
                                   }
                                   ?><br>
                                   <?php echo $thread['thread_desc']; ?>
                              </p><br>
                              <img src="img/upload/<?php echo $thread['uploaded_image']; ?>" class="img-thumbnail" alt=""
                                   width="200vw"><br>
                              <a href="delete-threads.php?delete=<?php echo $thread['thread_id']; ?>" class="card-link text-light"
                                   style="text-decoration:none; font-size:1rem;"><button type="button" class="btn btn-danger rounded-0">Banned <i class="ri-delete-bin-5-line"></i></a></button>
                         </div>
                    </div>
                    <!-- Thread box -End  -->
                    <?php
               }

          } else {
              
               echo' <div class="alert alert-warning rounded-0" role="alert" style="font-size:15px;">No Threads Found : (</div>';

          }
     }
     ?>
     <!-- All threads section -End  -->

     <?php include "../bootstrapjs.php"; ?>
</body>
</html>
<?php } ?>