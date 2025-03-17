<?php
session_start();
//Unauthorize access prevent
if(!isset($_SESSION['username'])){
     echo 'Oops! at first you need to <a href="login.php">login</a> & proof that you are a true user.';
     }else{ 
 
//Database connection 
require_once "../db/db_connection.php";

//Error handling
error_reporting(0);
ini_set('display_error', 0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="icon" type="image/x-icon" href="img/background/agguoralogo.jpg">
     <?php include "../include/bootstrapcss-and-icons.php"; ?>
     <title>Email Update | Agguora</title>
</head>
<body>

    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" class="container mt-5 p-4 w-75">
      
      <h4 class="mb-4 text-center">Update your email</h4>
      
      <div class="mb-3">
        <label for="userEmail" class="form-label">Email Address</label>
        <div class="input-group">
          <span class="input-group-text" id="basic-addon1">@</span>
          <input type="email" id="userEmail" name="userEmail" class="form-control" placeholder="Enter your email" required>
        </div>
      </div>
      
      <div class="d-grid">
        <button type="submit" name="submit" class="btn btn-dark">Update</button>
      </div>

    </form>

    <div class="container p-4">
    <strong>Notice:</strong> Please update your email. Providing a valid email address is now mandatory to ensure better communication and enhanced security for your account. Failure to update your email may result in limited access to certain features. Thank you for your cooperation!
    </div>
 



     <?php 
     if(isset($_POST['submit'])){
          if($_SERVER['REQUEST_METHOD'] === 'POST'){
               $user_email = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['userEmail']));
               $username = $_SESSION['username'];
               if(!empty($username) && !empty($user_email)){
               $sql = "UPDATE `user` SET email = '{$user_email}' WHERE username = '{$username}'";
               $result = mysqli_query($conn, $sql);
               if(!$result){
                    echo '<div class="alert alert-danger rounded" role="alert" style="font-size:15px;">Oops! something went wrong : (</div>';

               }else{
                    ?>
                    <script>window.location.href="../home/main.php";</script>
                    
                    <?php 
                    exit();
               }
          }else{
               echo '<div class="alert alert-danger rounded" role="alert" style="font-size:15px;">Session issue</div>';

          }
     }
}
     
     ?>

     <?php include "../include/bootstrapjs.php"; ?>
</body>
</html>
<?php } ?>