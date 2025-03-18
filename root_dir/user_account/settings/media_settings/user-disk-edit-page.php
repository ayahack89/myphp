<?php
session_start();
if (!isset($_SESSION['username'])) {
     echo 'Oops! at first you need to <a href="login.php">login</a> & proof that you are a true member.';
} else { ?>
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
          <title>Edit Your Drives | Categories | Agguora</title>
          <?php include "../asset/style.php"; ?>
          <?php include "../asset/fonts.php"; ?>
     </head>

     <body>
          <!-- User disk edit action -Start  -->
          <?php
          if (isset($_GET['edit'])) {
               $edit_id = mysqli_real_escape_string($conn, $_GET['edit']);

               // Fetch category details
               $sql = "SELECT * FROM `catagory` WHERE catagory_id = '{$edit_id}'";
               $run = mysqli_query($conn, $sql);

               if ($run && mysqli_num_rows($run) > 0) {
                    $row = mysqli_fetch_assoc($run);

                    // Handle form submission
                    if (isset($_POST['submit'])) {
                         $disk_name = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['name']));
                         $disk_desc = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['desc']));

                         // Update only if name or description is not empty
                         if (!empty($disk_name) || !empty($disk_desc)) {
                              $sql_query = "UPDATE `catagory` 
                              SET `catagory_name` = '{$disk_name}', `catagory_desc` = '{$disk_desc}' 
                              WHERE `catagory_id` = '{$edit_id}'";

                              $result = mysqli_query($conn, $sql_query);

                              if ($result) {
                                   ?>
                                   <script>window.location.href = "../../../user_account/profile.php";</script>
                                   <?php
                                   exit;
                              } else {
                                   echo ' <div class="alert alert-danger rounded" role="alert" style="font-size:15px;">Oops! Something went wrong while updating : (</div>';
                              }
                         } else {
                              echo ' <div class="alert alert-danger rounded" role="alert" style="font-size:15px;">Please provide a name or description.</div>';
                         }
                    }
                    ?>
                    <form class="container bg-light border py-5 px-5 mt-5"
                         action="<?php echo htmlentities($_SERVER['PHP_SELF'] . '?edit=' . $edit_id); ?>" method="post">
                         <div class="mb-3">
                              <div class="input-group">
                                   <span class="input-group-text rounded-0" id="basic-addon3">Disk name</span>
                                   <input type="text" class="form-control rounded-0" id="basic-url"
                                        aria-describedby="basic-addon3 basic-addon4" name="name"
                                        value="<?php echo $row['catagory_name']; ?>">
                              </div>
                         </div>
                         <div class="input-group">
                              <span class="input-group-text rounded-0">Description</span>
                              <textarea class="form-control rounded-0" aria-label="With textarea"
                                   name="desc"><?php echo $row['catagory_desc']; ?></textarea>
                         </div>
                         <button type="submit" class="btn btn-dark my-3 rounded-0" name="submit">Update Category</button>
                    </form>
                    <?php
               } else {
                    echo ' <div class="alert alert-warning rounded" role="alert" style="font-size:15px;">No catagory found of this given ID!</div>';
               }
          } else {
               echo ' <div class="alert alert-danger rounded" role="alert" style="font-size:15px;">Edit Id is missing!</div>';
          }
          ?>
          <!-- User disk edit action -End  -->

          <?php include "../asset/script.php"; ?>
     </body>

     </html>
<?php } ?>