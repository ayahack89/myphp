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
     <title>View All Comments | Admin Panel | Agguora</title>
</head>
<?php include "../fonts.php"; ?>

<body>
     <!-- Comment section -Start  -->
     <?php
               $sql = "SELECT * FROM `comments`";
               $result = mysqli_query($conn, $sql);
               if ($result) {
                    if (mysqli_num_rows($result) > 0) {
                         while ($comment = mysqli_fetch_assoc($result)) {
                              ?>
                              <!-- Comment box -Start  -->
                              <div class="card rounded-0">
                                   <div class="card-body">
                                        <h6 class="card-subtitle mb-2 text-body-secondary">
                                             <b style="color:black;">
                                                <?php 
                                                $comment_by = $comment['comment_by']; 
                                                $sql_query = "SELECT * FROM `user` WHERE id = '{$comment_by}'";
                                                $run = mysqli_query($conn, $sql_query);
                                                if($run && mysqli_num_rows($run) > 0){
                                                  $row=mysqli_fetch_assoc($run);
                                                  echo $row['username'];
                                                }
                                                
                                                ?>
                                             </b>
                                             <?php
                                             if (empty($comment['tag_someone'])) {

                                             } else {
                                                  ?>
                                                  <?php
                                                  $sql = "SELECT * FROM `user` WHERE username = '{$comment['tag_someone']}'";
                                                  if (mysqli_query($conn, $sql) && mysqli_num_rows(mysqli_query($conn, $sql))) {
                                                       $tag_user = mysqli_fetch_assoc(mysqli_query($conn, $sql));
                                                       ?>
                                                       <i class="ri-arrow-right-double-line"></i>
                                                       <b><a href="allprofile.php?user=<?php echo $tag_user['id'] ?>"
                                                                 style="color:black; text-decoration:none;">
                                                                 <?php
                                                  }
                                                  ?>
                                                  replied to
                                                      <?php 
                                                      $tagsomeone = $comment['tag_someone'];
                                                      $sql = "SELECT * FROM `user` WHERE id = '{$tagsomeone}'";
                                                      $query = mysqli_query($conn, $sql);
                                                      if($query && mysqli_num_rows($query)){
                                                          $user=mysqli_fetch_assoc($query);
                                                      ?>
                                                 <strong><?php echo $user['username']; ?></strong>
                                                 <?php } ?>
                                                            
                                                       </a></b>
                                             <?php } ?><br>
                                             <b style="font-weight:lighter; font-size:12px;">
                                                  <?php echo $comment['comment_time']; ?>
                                             </b>
                                        </h6>
                                        <p class="card-text">
                                             <?php echo $comment['comment_content']; ?>
                                        </p>
                                      
                                        <a href="delete-comments.php?delete=<?php echo $comment['comment_id']; ?>"
                                             class="card-link text-danger" style="text-decoration:none; font-size: 1rem;"><button type="button" class="btn btn-danger rounded-0">Banned <i class="ri-delete-bin-5-line"></i></button></a>
                                   </div>
                              </div>
                              <!-- Comment box -End  -->
                              <?php

                         }
                    } else {
                         echo' <div class="alert alert-danger rounded-0" role="alert" style="font-size:12px;">Invalid user!</div>';

                    }
               }





      
     ?>
     <!-- Comment section -End  -->
     <?php include "../bootstrapjs.php"; ?>
</body>
</html>
<?php } ?>