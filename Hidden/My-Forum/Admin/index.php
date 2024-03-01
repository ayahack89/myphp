<?php 
require "../db_connection.php";
session_start(); 
ini_set('display_errors', 0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <?php include "../bootstrapcss-and-icons.php"; ?>
     <title> Admin - Login</title>
</head>
<?php include "../fonts.php"; ?>

<body class="bg-dark">
     <?php include "admin-header-logout.php"; ?>
<!-- Main-body -Start  -->
     <div class="container bg-light my-5  col-md-4  py-5 px-5">
          <?php
          //Login script
          if (isset($_POST["submit"])) {
               if (isset($_SERVER["REQUEST_METHOD"]) == "POST") {
                    $admin = mysqli_real_escape_string($conn, $_POST["name"]);
                    $password = mysqli_real_escape_string($conn, $_POST["password"]);
                    if (!empty($_POST["name"]) && !empty($_POST["password"])) {
                         $sql = "SELECT * FROM `admin` WHERE name = '$admin' AND password = '$password'";
                         $result = mysqli_query($conn, $sql);
                         $userAccount = mysqli_num_rows($result);
                         if ($userAccount) {
                              $user_pass = mysqli_fetch_assoc($result);
                              $dbpass = $user_pass["password"];
                              $_SESSION["name"] = $user_pass["name"];
                              ?>
                              <script>window.location.href = "admin.php";</script>


                              <?php
                              mysqli_close($conn);
                              exit();
                         } else {
                              echo' <div class="alert alert-danger" role="alert" style="font-size:15px;">Admin not found : (</div>';
                              

                         }
                    } else {
                        
                        echo' <div class="alert alert-danger" role="alert" style="font-size:15px;">Please enter username and password very carefully</div>';

                    }

               }
          }

          ?>

<!-- Admin login -start  -->
          <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
               <div class="form-group">
                    <label for="exampleInputEmail1">Admin user name</label>
                    <input type="text" class="form-control rounded-0" name="name" id="exampleInputEmail1"
                         aria-describedby="emailHelp">

               </div>
               <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                    <small class="form-text text-muted">Never share your admin password with anyone
                         else.</small>
               </div>
               <button type="submit" name="submit" class="btn btn-dark rounded-0 w-100 my-3">Log In</button>
          </form>
          <!-- Admin signin -End  -->
     </div>
     <!-- Main-body -End -->
     <?php include "../bootstrapjs.php"; ?>


</body>
</html>
