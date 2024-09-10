<?php 
session_start();
if(!isset($_SESSION['username'])){
echo 'Opps! atfirst you need to <a href="login.php">login</a> & proof that you are a true member.';
}else{ ?>
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
     
     <link rel="icon" type="image/x-icon" href="img/background/agguoralogo.jpg">
     <title>Edit Your Profile Picture | Agguora</title>
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

          if (move_uploaded_file($temp_name, "img/images/" . $name)) {

               $sql = "UPDATE `user` SET profile_pic = '{$name}' WHERE id = '{$get_id}' ";
               $result = mysqli_query($conn, $sql);
               if ($result) {
                    ?>
                    <script>windows.location.href = "https://www.agguora.site/profile.php";</script>
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
          <button type="submit" name="submit" class="btn btn-dark rounded-0 w-100">Update your profile picture</button>
     </form>

     <!-- Profile picture edit -END  -->




     <?php include "bootstrapjs.php"; ?>
</body>
</html>
<?php }?>