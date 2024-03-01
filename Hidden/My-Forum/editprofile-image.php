<?php
include "db_connection.php";
ini_set('display_errors', 0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <?php include "bootstrapcss-and-icons.php"; ?>
     <title>Welcome to fSociety - "your hidden society" - register</title>
</head>
<?php include "fonts.php"; ?>

<body>
     <!-- Profile picture edit -Start  -->
     <?php
     $get_id = mysqli_real_escape_string($conn, $_GET['update']);

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
                    ?>
                    <script>windows.location.href = "profile.php"</script>
                    <?php

                    // header("Location: profile.php");
                    exit();

               } else {
                    echo' <div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">Opps! Somthing went wrong : (</div>';

               }


          }


     }


     ?>

     <form class="input-group my-5 container bg-light border py-5 px-5" action="" method="post"
          enctype="multipart/form-data">
          <div class="input-group mb-3">
               <input type="file" class="form-control" name="image" id="inputGroupFile02">
               <label class="input-group-text" for="inputGroupFile02">Upload</label>
          </div>
          <button type="submit" name="submit" class="btn btn-dark rounded">Update your profile picture</button>
     </form>

     <!-- Profile picture edit -END  -->




     <?php include "bootstrapjs.php"; ?>
</body>

</html>