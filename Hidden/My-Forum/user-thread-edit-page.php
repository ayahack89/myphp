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

     <!-- User thread edit action -Start  -->
     <?php
     if (isset($_GET['edit'])) {
          $edit_id = mysqli_real_escape_string($conn, $_GET['edit']);

          // Fetch thread details
          $sql = "SELECT * FROM `threads` WHERE thread_id = '{$edit_id}'";
          $run = mysqli_query($conn, $sql);

          if ($run && mysqli_num_rows($run) > 0) {
               $row = mysqli_fetch_assoc($run);

               // Handle form submission
               if (isset($_POST['submit'])) {
                    $disk_name = mysqli_real_escape_string($conn, $_POST['name']);
                    $disk_desc = mysqli_real_escape_string($conn, $_POST['desc']);

                    // Image file handling
                    $image_name = $_FILES['image']['name'];
                    $tmp_name = $_FILES['image']['tmp_name'];
                    $image_error = $_FILES['image']['error'];
                    $image_size = $_FILES['image']['size'];
                    // Image file path destination
                    $image_path_destination = "img/upload/";
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
                                             echo "Error uploading image.";
                                        }
                                   } else {
                                        echo "Image size too large. Maximum size allowed is 1MB.";
                                   }
                              } else {
                                   echo "Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.";
                              }
                         } else {
                              // Update database without image
                              $sql_query = "UPDATE `threads` 
                                  SET `thread_name` = '{$disk_name}', `thread_desc` = '{$disk_desc}' 
                                  WHERE `thread_id` = '{$edit_id}'";
                         }

                         // Execute the update query
                         $result = mysqli_query($conn, $sql_query);

                         if ($result) {
                              // Redirect to a success page after update
                              header("Location: your-threads.php");
                              exit;
                         } else {
                              echo "Oops! Something went wrong while updating.";
                         }
                    } else {
                         echo "Please provide a thread name or thread content.";
                    }
               }
               ?>

               <!-- HTML form for editing thread details -->
               <form class="container my-5 w-75" action="<?php echo htmlentities($_SERVER['PHP_SELF'] . '?edit=' . $edit_id); ?>"
                    method="post" enctype="multipart/form-data">

                    <div class="mb-3">
                         <div class="input-group">
                              <span class="input-group-text" id="basic-addon3">Thread name</span>
                              <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3 basic-addon4"
                                   name="name" value="<?php echo $row['thread_name']; ?>">
                         </div>
                    </div>
                    <div class="input-group">
                         <span class="input-group-text">Thread content</span>
                         <textarea class="form-control" aria-label="With textarea"
                              name="desc"><?php echo $row['thread_desc']; ?></textarea>
                    </div>
                    <br>
                    <img src="img/upload/<?php echo $row['uploaded_image']; ?>" class="img-thumbnail" alt="" width="200vw">
                    <br><br>

                    <div class="input-group mb-3">
                         <label class="input-group-text" for="inputGroupFile01">Upload</label>
                         <input type="file" class="form-control" name="image" id="inputGroupFile01">
                    </div>


                    <button type="submit" class="btn btn-dark my-3" name="submit">Update thread</button>
               </form>

               <?php
          } else {
               echo "No thread found with the given ID.";
          }
     } else {
          echo "Edit ID is missing.";
     }
     ?>



     <!-- User thread edit action -End  -->
     <?php include "bootstrapjs.php"; ?>
</body>

</html>