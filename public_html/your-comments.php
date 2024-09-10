<?php 
session_start();
if(!isset($_SESSION['username'])){
echo 'Opps! atfirst you need to <a href="login.php">login</a> & proof that you are a true member.';
}else{ ?>
<?php
include "db_connection.php";
ini_set('display_errors', 0)
?>
<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <?php include "bootstrapcss-and-icons.php"; ?>
     
     <link rel="icon" type="image/x-icon" href="img/background/agguoralogo.jpg">
     <title>Comments Activity | Agguora</title>
     <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-YXXL0NCGLE"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-YXXL0NCGLE');
</script>
</head>
<?php include "fonts.php"; ?>

<body>
     <!-- Comment section -Start  -->
     <?php include "header.php"; ?>
     <?php
     $username = $_SESSION['username'];
     $sql_query = "SELECT * FROM `user` WHERE username = '{$username}' ";
     if (mysqli_query($conn, $sql_query)) {
          $run = mysqli_query($conn, $sql_query);
          if (mysqli_num_rows($run) > 0) {
               $row = mysqli_fetch_assoc($run);
               $user_id = $row['id'];
               $sql = "SELECT * FROM `comments` WHERE comment_by = '{$user_id}' ORDER BY comment_time DESC";
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
                                                  <?php echo '@' . $_SESSION['username']; ?>
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
                                                            @
                                                            <?php echo $comment['tag_someone'] ?>
                                                       </a></b>
                                             <?php } ?><br>
                                             <b style="font-weight:lighter; font-size:12px;">
                                                  <?php echo $comment['comment_time']; ?>
                                             </b>
                                        </h6>
                                        <p class="card-text">
                                             <?php echo $comment['comment_content']; ?>
                                        </p>
                                        <a href="user-comment-edit-page.php?edit=<?php echo $comment['comment_id']; ?>"
                                             class="card-link text-success" style="text-decoration:none;"><i class="ri-edit-box-line"></i></a>
                                        <a href="delete-your-comments.php?delete=<?php echo $comment['comment_id']; ?>"
                                             class="card-link text-danger" style="text-decoration:none;"><i class="ri-delete-bin-5-line"></i></a>
                                   </div>
                              </div>
                              <!-- Comment box -End  -->
                              <?php

                         }
                    } else {
                         echo' <div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">Invalid user!</div>';

                    }
               }
          }

     } else {
          echo' <div class="alert alert-warning rounded-0" role="alert" style="font-size:15px;">No comment found : (</div>';
     }

     ?>
     <!-- Comment section -End  -->

     <?php include "footer.php"; ?>
     <?php include "bootstrapjs.php"; ?>
</body>
</html>
<?php } ?>