<?php
include "db_connection.php";
session_start();
ini_set('display_errors', 0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <?php include "bootstrapcss-and-icons.php"; ?>
     
     <link rel="icon" type="image/x-icon" href="img/background/agguoralogo.jpg">
     <title>Reset Your Password | Secure Password | Agguora</title>
     <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-YXXL0NCGLE"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-YXXL0NCGLE');
</script>
</head>
<body>
     <!-- Reset password php script -Start  -->
<?php 
if(isset($_POST['submit'])){
    $userID = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['uid']));
    $username = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['username']));
    $password = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['password']));
    $cpassword = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['cpassword']));

    if(!empty($userID) && !empty($username) && !empty($password) && !empty($cpassword)){
        $user_check = "SELECT * FROM `user` WHERE id = '$userID' AND username = '$username'";
        $check = mysqli_query($conn, $user_check);
        $user_exist_verification = mysqli_num_rows($check);

        if ($user_exist_verification > 0) {
            if ($password !== $cpassword) {
                echo '<div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">Password not matched!</div>';
            } else {
                $encrypted_password = password_hash($password, PASSWORD_DEFAULT);
                $sql_query = "UPDATE `user` SET `password` = '{$encrypted_password}' WHERE id = '{$userID}'";
                $result = mysqli_query($conn, $sql_query);

                if($result){
                   ?>
                   <script>window.location.href="https://www.agguora.site/login.php";</script>
                   <?php 
                    exit();
                } else {
                    echo '<div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">Oops! Something went wrong :(</div>';
                }
            }
        } else {
            echo '<div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">Sorry! User does not exist or the provided credentials are incorrect.</div>';
        }
    } else {
        echo '<div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">Please fill all the required fields.</div>';
    }
}
?>
<!-- Reset password php script -End -->

<!-- Reset form -Start  -->
    <form action="resetpassword.php" class="container my-5" method="post">
    <div class="input-group mb-3">
      <span class="input-group-text rounded-0" id="basic-addon1">#</span>
      <input type="text" class="form-control rounded-0" placeholder="Please enter your user ID" name="uid" aria-label="userid"
        aria-describedby="basic-addon1" required>
    </div>
    <div class="input-group mb-3">
      <span class="input-group-text rounded-0" id="basic-addon1">@</span>
      <input type="text" class="form-control rounded-0" placeholder="Please enter your username" name="username" aria-label="Username"
        aria-describedby="basic-addon1" required>
    </div>
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label"><i class="ri-lock-2-fill"></i> Create new password</label>
      <input type="password" class="form-control rounded-0" id="exampleFormControlInput1" placeholder="password" name="password"
        required>
    </div>
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label"><i class="ri-lock-2-fill"></i> Confirm new password</label>
      <input type="password" class="form-control rounded-0" id="exampleFormControlInput1" placeholder="password" name="cpassword"
        required>
    </div>
    <button type="submit" class="btn btn-dark w-100 rounded-0" name="submit">Reset password</button>
    </form>
<!-- Reset form -End -->
     <?php include "bootstrapjs.php"; ?>
</body>
</html>