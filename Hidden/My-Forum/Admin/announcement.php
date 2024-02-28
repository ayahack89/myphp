<?php
include "../db_connection.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <?php include "../bootstrapcss-and-icons.php"; ?>
     <title>Document</title>
</head>
<?php include "../fonts.php"; ?>
<body class="bg-dark">
<?php include "admin-header.php"; ?>
<div class="container my-3 py-5 px-5 bg-light">
     <?php 
     if(isset($_POST['submit'])){
          $anno_name = mysqli_real_escape_string($conn, $_POST['anno_name']);
          $anno_desc = mysqli_real_escape_string($conn, $_POST['anno_desc']);
          $admin = $_SESSION['name'];
          
          if(!empty($anno_name) && !empty($anno_desc)){
               $sql_insert = "INSERT INTO `announcement` ( `anno_name`, `anno_desc`, `admin_name`) VALUES ( '{$anno_name}', '{$anno_desc}', '{$admin}');";
               $result = mysqli_query($conn, $sql_insert);
               if($result){
                    ?>
                    <script>window.location.href="view-announcement.php";</script>
                    <?php
                    exit;

               }else{
                    echo "<h5 class='text-danger'>Somthing Went Wrong : (</h5>";
               }
          }else{
               echo "<h5 class='text-danger'>Please fill the inputs.</h5>";
          }
     }
     ?>
<form action="" method="post">
     <h3 class="text-center mb-3"><i class="ri-mic-fill"></i> Announcement</h3>
  <div class="form-group">
    <input type="text" class="form-control rounded-0" name="anno_name" id="exampleInputEmail1" aria-describedby="emailHelp">
    <br>
  </div>
  <div class="form-floating">
  <textarea class="form-control rounded-0" name="anno_desc"  style="height: 100px"></textarea>
</div><br>
  <button type="submit" class="btn btn-danger rounded-0 w-100" name="submit">Announced</button>
</form>
<a href="view-announcement.php">
<button type="button" class="btn btn-dark rounded-0 w-100 border mt-2 py-2" >View announcements</button></a>


    
     <?php include "../bootstrapjs.php"; ?>
</body>
</html>