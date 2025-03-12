<?php 
session_start();
if(!isset($_SESSION['username'])){
echo 'Oops! at first you need to <a href="login.php">login</a> & proof that you are a true member.';
}else{ ?>
<?php
include "../../../db/db_connection.php";
ini_set('display_error', 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <?php include "../../../include/bootstrapcss-and-icons.php"; ?>
     
     <link rel="icon" type="image/x-icon" href="img/background/agguoralogo.jpg">
     <title>Edit Your Threads | Threads | Agguora</title>
</head>
<?php include "../../../include/fonts.php"; ?>
<body>

     <!-- User thread edit action -Start  -->
     <?php
     if (isset($_GET['edit'])) {
          $edit_id = htmlspecialchars(mysqli_real_escape_string($conn, $_GET['edit']));

          // Fetch thread details
          $sql = "SELECT * FROM `threads` WHERE thread_id = '{$edit_id}'";
          $run = mysqli_query($conn, $sql);

          if ($run && mysqli_num_rows($run) > 0) {
               $row = mysqli_fetch_assoc($run);

               // Handle form submission
               if (isset($_POST['submit'])) {
                    $disk_name = mysqli_real_escape_string($conn, $_POST['name']);
                    $disk_desc = mysqli_real_escape_string($conn, $_POST['desc']);
                    $disk_url = mysqli_real_escape_string($conn, $_POST['url']);

                    // Image file handling
                    $image_name = $_FILES['image']['name'];
                    $tmp_name = $_FILES['image']['tmp_name'];
                    $image_error = $_FILES['image']['error'];
                    $image_size = $_FILES['image']['size'];
                    // Image file path destination
                    $image_path_destination = "../../../media/upload/";
                    // Generate unique filename
                    $image_new_name = uniqid('', true) . '_' . $image_name;

                    // Update only if name or description is not empty
                    if (!empty($disk_name) || !empty($disk_desc)) {
                         // Check if image is uploaded
                         if (!empty($image_name)) {
                              // Check file size and type
                              $allowed_types = array('jpg', 'jpeg', 'png', 'gif');
                              $image_extension = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));
                              if (in_array($image_extension, $allowed_types)) {
                                   if ($image_size <= 999998) {
                                        // Upload the file
                                        if (move_uploaded_file($tmp_name, $image_path_destination . $image_new_name)) {
                                             // Update database with image
                                             $sql_query = "UPDATE `threads` 
                                              SET `thread_name` = '{$disk_name}', `thread_desc` = '{$disk_desc}', `uploaded_image` = '{$image_new_name}' 
                                              WHERE `thread_id` = '{$edit_id}'";
                                        } else {
                                             echo' <div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">Opps! Error uploading image!</div>';
                                        }
                                   } else {
                                        echo' <div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">Image size too large. Maximum size allowed is 1MB.</div>';
                                   }
                              } else {
                                   echo' <div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.</div>';
                              }
                         } else {
                              // Update database without image
                              $sql_query = "UPDATE `threads` 
                                  SET `thread_name` = '{$disk_name}', `thread_desc` = '{$disk_desc}' ,
                                  `url` = '{$disk_url}'
                                  WHERE `thread_id` = '{$edit_id}'";
                         }

                         // Execute the update query
                         $result = mysqli_query($conn, $sql_query);

                         if ($result) {
                              // Redirect to a success page after update
                              ?>
                             <script>window.location.href="../../../user_account/profile.php";</script>
                              <?php 
                              exit;
                         } else {
                              echo' <div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">Opps! Somthing went wrong while updating : (</div>';
                         }
                    } else {
                         echo' <div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">Please provide a thread name or thread content.</div>';
                    }
               }
               ?>

               <!-- HTML form for editing thread details -->
               <form class="container mt-5 bg-light py-5 px-5 border"
                    action="<?php echo htmlentities($_SERVER['PHP_SELF'] . '?edit=' . $edit_id); ?>" method="post"
                    enctype="multipart/form-data">
                    <div class="mb-3">
                         <div class="input-group">
                              <span class="input-group-text rounded-0" id="basic-addon3">Thread name</span>
                              <input type="text" class="form-control  rounded-0" id="basic-url" aria-describedby="basic-addon3 basic-addon4"
                                   name="name" value="<?php echo $row['thread_name']; ?>">
                         </div>
                    </div>
                    <div class="input-group">
                         <span class="input-group-text rounded-0">Thread content</span>
                         <textarea class="form-control rounded-0" aria-label="With textarea"
                              name="desc"><?php echo $row['thread_desc']; ?></textarea>
                    </div>
                    <br>
                    <div class="mb-3">
                         <div class="input-group">
                              <span class="input-group-text rounded-0" id="basic-addon3">URL</span>
                              <input type="text" class="form-control rounded-0" id="basic-url" aria-describedby="basic-addon3 basic-addon4"
                                   name="url" value="<?php echo $row['url']; ?>">
                         </div>
                    </div>
                    <br>
                    <img src="img/upload/<?php echo $row['uploaded_image']; ?>" class="img-thumbnail" alt="" width="200vw">
                    

                    <div class="input-group mb-3">
                        
                         <input type="file" class="form-control rounded-0" name="image" id="inputGroupFile01">
                    </div>


                    <button type="submit" class="btn btn-dark my-3 rounded-0" name="submit">Update thread</button>
               </form>

               <?php
          } else {
               echo' <div class="alert alert-warning rounded-0" role="alert" style="font-size:15px;">No thread found with this given ID!</div>';
          }
     } else {
          echo' <div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">Edit ID is missing!</div>';
     }
     ?>



     <!-- User thread edit action -End  -->
     <?php include "../../../include/bootstrapjs.php"; ?>
</body>
</html>
<?php } ?>