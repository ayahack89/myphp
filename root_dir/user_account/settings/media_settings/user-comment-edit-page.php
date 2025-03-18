<?php 
session_start();
if(!isset($_SESSION['username'])){
echo 'Opps! at first you need to <a href="login.php">login</a> & proof that you are a true member.';
}else{ ?>
<?php
//Database connection
require_once "../../../db/db_connection.php";

//Error handling 
error_reporting(0);
ini_set('display_errors', 0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="icon" type="image/x-icon" href="">
     <title>Edit Your Comments | Comments | Agguora</title>
     <?php include "../asset/style.php"; ?>
     <?php include "../asset/fonts.php"; ?>
</head>
<body>
     <!-- User comment edit action -Start  -->
     <?php
     if (isset($_GET['edit'])) {
          $edit_id = htmlspecialchars(mysqli_real_escape_string($conn, $_GET['edit']));

          // Fetch comment details
          $sql = "SELECT * FROM `comments` WHERE comment_id = '{$edit_id}'";
          $run = mysqli_query($conn, $sql);

          if ($run && mysqli_num_rows($run) > 0) {
               $row = mysqli_fetch_assoc($run);

               // Handle form submission
               if (isset($_POST['submit'])) {
                    $comment_content = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['comment']));

                    // Update only if name or comment is not empty
                    if (!empty($comment_content)) {
                         $sql_query = "UPDATE `comments` 
                              SET `comment_content` = '{$comment_content}' 
                              WHERE `comment_id` = '{$edit_id}'";

                         $result = mysqli_query($conn, $sql_query);

                         if ($result) {
                              ?>
                              <script>window.location.href="../../../user_account/profile.php";</script>
                              <?php
                              exit;
                         } else {
                              echo' <div class="alert alert-danger rounded" role="alert" style="font-size:15px;">Opps! Somthing went wrong while updating : (</div>';
                         }
                    } else {
                         echo' <div class="alert alert-danger rounded" role="alert" style="font-size:15px;">Please edit your comment or leave.</div>';
                    }
               }
               ?>
               <form class="container mt-5 bg-light py-5 px-5 border"
                    action="<?php echo htmlentities($_SERVER['PHP_SELF'] . '?edit=' . $edit_id); ?>" method="post">
                    <div class="mb-3">
                    </div>
                    <div class="input-group">
                         <span class="input-group-text rounded-0">Comment</span>
                         <textarea class="form-control rounded-0" aria-label="With textarea"
                              name="comment"><?php echo $row['comment_content']; ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-dark my-3 rounded" name="submit">Update Comments</button>
               </form> 
               <?php
          } else {
               echo "No comment found with the given ID.";
               echo' <div class="alert alert-warning rounded" role="alert" style="font-size:15px;">No comment found with the given ID.</div>';
          }
     } else {
          echo' <div class="alert alert-danger rounded" role="alert" style="font-size:15px;">Edit ID is missing!</div>';
     }
     ?>
     <!-- User comment edit action -End  -->

     <?php include "../asset/script.php"; ?>
</body>
</html>
<?php } ?>