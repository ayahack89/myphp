<?php
include "db_connection.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);

?>
<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <title>Welcome to fSociety - "your hidden society" - register</title>
</head>

<body>
     <!-- Profile picture edit -Start  -->
     <?php
     $get_id = $_GET['update'];

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

          if (move_uploaded_file($temp_name, "img/images/" . $name)) {

               $sql = "UPDATE `user` SET profile_pic = '{$name}' WHERE id = '{$get_id}' ";
               $result = mysqli_query($conn, $sql);
               if ($result) {
                    header("Location: profile.php");
                    exit();

               } else {
                    echo "Opps! Somthing went wrong : (";
               }


          }


     }


     ?>

     <form action="" method="post" enctype="multipart/form-data">
          <input type="file" name="image" id="image"><br><br>
          <input type="submit" name="submit" value="Update Profile Image">
     </form>

     <!-- Profile picture edit -END  -->





</body>

</html>