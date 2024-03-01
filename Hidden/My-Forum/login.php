<?php
include "db_connection.php";
session_start();
// include "googleapiconfig.php";
ini_set('display_errors', 0);


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <?php include "bootstrapcss-and-icons.php"; ?>
  <title>Welcome to fSociety - "your hidden society" - Login</title>
</head>
<?php include "fonts.php"; ?>
<style>
  .from-box {
    width: 30vw;
    margin: auto;
  }
</style>

<body>
  <?php include "header.php"; ?>
  <?php

  if (isset($_POST["submit"])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      // User input
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $password = mysqli_real_escape_string($conn, $_POST['password']);

      // User Verification
      $user_check = "SELECT * FROM `user` WHERE email = '{$email}'";
      $user_exist_verification = mysqli_query($conn, $user_check);
      $check = mysqli_num_rows($user_exist_verification);

      if ($check > 0) {
        if (!empty($email) && !empty($password)) {
          $sql = "SELECT * FROM user WHERE email = '{$email}'";
          $result = mysqli_query($conn, $sql);

          if ($result) {
            $user_pass = mysqli_fetch_assoc($result);
            $dbpass = $user_pass['password'];

            // Verify the password using password_verify
            if (password_verify($password, $dbpass)) {
              // Login Successful
              $_SESSION['username'] = $user_pass['username'];
              // Page redirect
              // header("Location: index.php");
              echo '<script>window.location="index.php";</script>';
              mysqli_close($conn);
              exit();
            } else {
              echo' <div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">Incorrect Password!</div>';
            }
          } else {
            echo' <div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">Opps! Somthing went wrong : (</div>';
          }
        } else {
          echo' <div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">Please enter both your valid email and password.</div>';
        }
      } else {
        echo' <div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">User not found : ( . Please register first!</div>';

      }
    }
  }

  ?>

  <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>"
    class="container w-75 my-5 py-3 px-4 bg-light border rounded-0" method="post">
    <h4 style="text-align:center;" class="py-2">LogIn <i class="ri-login-circle-line" style="font-size:1.8rem;"></i>
    </h4>
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label"><i class="ri-mail-fill"></i> Email address</label>
      <input type="email" class="form-control rounded-0" id="exampleFormControlInput1" placeholder="...@example.com" name="email"
        required>
    </div>
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label"><i class="ri-lock-2-fill"></i> Password</label>
      <input type="password" class="form-control rounded-0" id="exampleFormControlInput1" placeholder="password" name="password"
        required>
    </div>
    <button type="submit" class="btn btn-dark w-100 rounded-0" name="submit">LogIn</button>
    <br>

    <p style="font-size:15px; text-align:center;" class="py-4">New to ...? At first you need to <a
        href="register.php">Register</a> </p>

  </form>

  <?php
  /*
    $login_button = '';

    if (isset($_GET["code"])) {

      $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);


      if (!isset($token['error'])) {

        $google_client->setAccessToken($token['access_token']);


        $_SESSION['access_token'] = $token['access_token'];


        $google_service = new Google_Service_Oauth2($google_client);


        $data = $google_service->userinfo->get();


        if (!empty($data['given_name'])) {
          $_SESSION['user_first_name'] = $data['given_name'];
        }

        if (!empty($data['family_name'])) {
          $_SESSION['user_last_name'] = $data['family_name'];
        }

        if (!empty($data['email'])) {
          $_SESSION['user_email_address'] = $data['email'];
        }
        /*
              if (!empty($data['gender'])) {
                $_SESSION['user_gender'] = $data['gender'];
              }
              
              if (!empty($data['age'])) {
                $_SESSION['user_age'] = $data['age'];
              }
              if (!empty($data['location'])) {
                $_SESSION['user_location'] = $data['location'];
              }
              if (!empty($data['contact'])) {
                $_SESSION['user_contact'] = $data['contact'];
              }*/

  /*  if (!empty($data['picture'])) {
      $_SESSION['user_image'] = $data['picture'];
    }

  }
}


if (!isset($_SESSION['access_token'])) {

  $login_button = '<a href="' . $google_client->createAuthUrl() . '">Login With Google</a>';
}
*/
  ?>

  <!-- <div class="container">
    <div class="panel panel-default"> -->
  <?php
  /*
        if ($login_button == '') {

          echo '<div class="panel-heading">Welcome User</div><div class="panel-body">';
          echo '<img src="' . $_SESSION["user_image"] . '" class="img-responsive img-circle img-thumbnail" />';
          echo '<h3><b>Name :</b> ' . $_SESSION['user_first_name'] . ' ' . $_SESSION['user_last_name'] . '</h3>';
          echo '<h3><b>Email :</b> ' . $_SESSION['user_email_address'] . '</h3>';

          // echo '<h3><b>Age:</b>' . $_SESSION['user_age'] . '</h3>';
          // echo '<h3><b>Country:</b>' . $_SESSION['user_location'] . '</h3>';
          // echo '<h3><b>Contact:</b>' . $_SESSION['user_contact'] . '</h3>';
          echo '<h3><a href="logout.php">Logout</h3></div>';
          //Insert user details by google api
          $user_first_name = $_SESSION['user_first_name'];
          $user_last_name = $_SESSION['user_last_name'];
          $user_email = $_SESSION['user_email_address'];
          $user_profile_pic = $_SESSION['user_image'];
          //Creating a customize username
          $user_username = $user_first_name . $user_last_name;

          if (!empty($user_username) && !empty($user_email)) {
            $sql_insert_query = "INSERT INTO `user` (`username`,`email`, `profile_pic`) VALUES ('{$user_username}','{$user_email}', '{$user_profile_pic}')";
            $insert_db = mysqli_query($conn, $sql_insert_query);
            if ($insert_db) {
              ?>
              <script>windows.location.href = "index.php";</script>
              <?php
              exit;
            } else {
              die("Error!" . mysqli_error($conn));
            }
          }


        } else {
          echo '<div align="center">' . $login_button . '</div>';
        }*/
  ?>
  <!-- </div>
  </div> -->

  <?php include "footer.php"; ?>
  <?php include "bootstrapjs.php"; ?>
</body>

</html>