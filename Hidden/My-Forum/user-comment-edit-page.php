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
     <!-- User comment edit action -Start  -->
     <?php
     if (isset($_GET['edit'])) {
          $edit_id = mysqli_real_escape_string($conn, $_GET['edit']);

          // Fetch comment details
          $sql = "SELECT * FROM `comments` WHERE comment_id = '{$edit_id}'";
          $run = mysqli_query($conn, $sql);

          if ($run && mysqli_num_rows($run) > 0) {
               $row = mysqli_fetch_assoc($run);

               // Handle form submission
               if (isset($_POST['submit'])) {
                    $comment_content = mysqli_real_escape_string($conn, $_POST['comment']);

                    // Update only if name or comment is not empty
                    if (!empty($comment_content)) {
                         $sql_query = "UPDATE `comments` 
                              SET `comment_content` = '{$comment_content}' 
                              WHERE `comment_id` = '{$edit_id}'";

                         $result = mysqli_query($conn, $sql_query);

                         if ($result) {
                              header("Location: your-comments.php");
                              exit;
                         } else {
                              echo "Oops! Something went wrong while updating.";
                         }
                    } else {
                         echo "Please edit your comment or leave.";
                    }
               }
               ?>
               <form class="container my-5 w-75 bg-light py-5 px-5 border"
                    action="<?php echo htmlentities($_SERVER['PHP_SELF'] . '?edit=' . $edit_id); ?>" method="post">
                    <div class="mb-3">
                    </div>
                    <div class="input-group">
                         <span class="input-group-text">Comment</span>
                         <textarea class="form-control" aria-label="With textarea"
                              name="comment"><?php echo $row['comment_content']; ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-dark my-3" name="submit">Update Category</button>
               </form>
               <?php
          } else {
               echo "No comment found with the given ID.";
          }
     } else {
          echo "Edit ID is missing.";
     }
     ?>
     <!-- User comment edit action -End  -->

     <?php include "bootstrapjs.php"; ?>
</body>

</html>