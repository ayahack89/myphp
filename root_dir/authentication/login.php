<?php
include "../db/db_connection.php";
session_start();
if (!isset($_SESSION['username']) && isset($_COOKIE['session_token'])) {
  // Fetch the session token from the cookie
  $session_token = $_COOKIE['session_token'];

  // Query the database for a matching session token
  $sql = "SELECT * FROM `user` WHERE session_token = '{$session_token}'";
  $result = mysqli_query($conn, $sql);

  if ($result && mysqli_num_rows($result) > 0) {
      // If the token is valid, log the user in automatically
      $user_data = mysqli_fetch_assoc($result);
      $_SESSION['username'] = $user_data['username'];
      $_SESSION['email'] = $user_data['email'];
      $_SESSION['id'] = $user_data['id'];

      ?>
      <script>window.location.href = "http://127.0.0.1/php/public_html/main.php";</script>
      <?php
      exit();
  }
}

ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Explore what's new and join us securely, explore new threads, participate to the community and be an active user." />
  <?php include "../include/bootstrapcss-and-icons.php"; ?>
  
  <link rel="icon" type="image/x-icon" href="img/background/agguoralogo.jpg">
  <title>Login | Agguora</title>
 
</head>
<?php include "../include/fonts.php"; ?>
<style>
  .from-box {
    width: 30vw;
    margin: auto;
  }
</style>

<body>
  <?php include "../include/header.php"; ?>
 <?php 
 if (isset($_POST["submit"])) {
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $username = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['username']));
      $password = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['password']));

      $sql = "SELECT * FROM `user` WHERE username = '{$username}'";
      $result = mysqli_query($conn, $sql);
      if ($result && mysqli_num_rows($result) > 0) {
          $user_data = mysqli_fetch_assoc($result);
          $dbpass = $user_data['password'];

          // Verifying the password
          if (password_verify($password, $dbpass)) {
              // Set session variables
              $_SESSION['username'] = $user_data['username'];
              $_SESSION['email'] = $user_data['email'];
              $_SESSION['id'] = $user_data['id'];

              // Generate a unique session token
              $session_token = bin2hex(random_bytes(32));

              // Store the session token in the database for persistence
              $user_id = $user_data['id'];
              $update_sql = "UPDATE `user` SET session_token = '$session_token' WHERE id = '$user_id'";
              mysqli_query($conn, $update_sql);

              // Set a cookie with the session token that lasts 30 days
              setcookie("session_token", $session_token, time() + (86400 * 30), "/", "", true, true);

              // Checking if the username matches the email
              if (!empty($user_data['email'])) {
                  ?>
                  <script>window.location.href = "../home/main.php";</script>
                  <?php
                  exit();
              } else {
                  ?>
                  <script>window.location.href = "user_email_insert.php";</script>
                  <?php 
              }
          } else {
              echo '<div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">Incorrect Password!</div>';
          }
      } else {
          echo '<div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">User not found. Please register first!</div>';
      }
  }
}
 
 ?>

<div class="container py-5">
<div class="row justify-content-center">
<div class="col-md-6">
  <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>"
    class="py-5 px-5 my-3 bg-light border rounded-0" method="post">
    <h1 style="text-align:center;" class="py-2">LogIn <i class="ri-login-circle-line" style="font-size:1.8rem;"></i>
    </h1>
    <?php
    $sql = "SELECT * FROM `user`";
    $result = mysqli_query($conn, $sql);
    if($result && mysqli_num_rows($result) > 0){
      $row=mysqli_fetch_assoc($result);
    ?>
    <input type="hidden" name="userid" value="<?php echo $row['id']; ?>" >
    <?php } ?>
    <div class="input-group mb-3">
      <span class="input-group-text rounded-0" id="basic-addon1">@</span>
      <input type="text" class="form-control rounded-0" placeholder="Username" name="username" aria-label="Username"
        aria-describedby="basic-addon1" required>
    </div>
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label"><i class="ri-lock-2-fill"></i> Password</label>
      <input type="password" class="form-control rounded-0" id="exampleFormControlInput1" placeholder="password" name="password"
        required>
    </div>
    <button type="submit" class="btn btn-dark w-100 rounded-0" name="submit">LogIn</button>
    <br>

    <p style="font-size:15px; text-align:center;" class="mt-5">New to ...? At first you need to <a
        href="../policies/tac-agreed.php">Register</a><br> Forgot your password? <a href="resetpassword.php">Reset it here</a>.</p>



  </form>
<!-- <div class="alert alert-warning" role="alert">
    <h5><strong>We're excited to share that Agguora is currently undergoing a major transformation! Agguora v2 will release soon and it's set to be a game-changer. Thank you for your patience – the best is yet to come!</strong></h5>
  
</div> -->
</div>
</div>
</div>

  <?php include "../include/bootstrapjs.php"; ?>
</body>

</html>