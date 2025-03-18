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
          <meta charset="UTF-8" />
          <meta name="viewport" content="width=device-width, initial-scale=1.0" />
          <link rel="icon" type="image/x-icon" href="">
          <title>Edit Your Profile Picture | Agguora</title>
          <?php include "../asset/style.php"; ?>
          <?php include "../asset/fonts.php"; ?>
     </head>

     <body>
          <!-- Profile picture edit -Start  -->
          <?php
          $get_id = htmlspecialchars(mysqli_real_escape_string($conn, $_GET['update']));

          if (isset($_POST['submit'])) {
               // echo "<pre>";
               // print_r($_FILES['image']);
               // echo "</pre>";
               $name = $_FILES['image']['name'];
               $path = $_FILES['image']['full_path'];
               $type = $_FILES['image']['type'];
               $temp_name = $_FILES['image']['tmp_name'];
               $error = $_FILES['image']['error'];
               $size = $_FILES['image']['size'];

               if (move_uploaded_file($temp_name, "../../../media/images/" . $name)) {

                    $sql = "UPDATE `user` SET profile_pic = '{$name}' WHERE id = '{$get_id}' ";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                         ?>
                         <script>window.location.href = "user_account/profile.php";</script>
                         <?php

                         // header("Location: profile.php");
                         exit();

                    } else {
                         echo ' <div class="alert alert-danger rounded" role="alert" style="font-size:15px;">Oops! Something went wrong : (</div>';

                    }


               } else {
                    echo ' <div class="alert alert-danger rounded" role="alert" style="font-size:15px;">Oops! 404 image not found : (</div>';

               }


          } else if (isset($_POST['delete'])) {
               $delete_query = "UPDATE `user` SET profile_pic = '' WHERE id = '{$get_id}'";
               $result = mysqli_query($conn, $delete_query);

               if ($result) {
                    ?>
                         <script>window.location.href = "../../../user_account/profile.php";</script>
                    <?php
               } else {
                    echo '<div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">Oops! Something went wrong : (</div>';
               }
          }



          ?>

          <form class="input-group my-5 container bg-light border py-5 px-5" action="" method="post"
               enctype="multipart/form-data">
               <div class="input-group mb-3">
                    <input type="file" class="form-control" name="image" id="inputGroupFile02">

                    <button type="submit" name="delete" class="btn btn-danger">Delete <i
                              class="ri-delete-bin-6-line"></i></button>
               </div>
               <button type="submit" name="submit" class="btn btn-dark rounded w-100">Update your profile picture</button>
          </form>



          <!-- Profile picture edit -END  -->




          <?php include "../asset/script.php"; ?>
     </body>

     </html>
<?php } ?>