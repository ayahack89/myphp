<?php
// Error Handling
ini_set('display_errors', 0);
error_reporting(0);

// Database Connection
require_once "../db/db_connection.php";

// Session Handling
session_start();

if (!isset($_SESSION['username']) && !empty($_COOKIE['session_token'])) {

  $session_token = mysqli_real_escape_string($conn, $_COOKIE['session_token']);
  $result = mysqli_query($conn, "SELECT username, email, id FROM `user` WHERE session_token = '$session_token' LIMIT 1");
  if ($result && mysqli_num_rows($result) > 0) {
    $user_data = mysqli_fetch_assoc($result);
    $_SESSION['username'] = $user_data['username'];
    $_SESSION['email'] = $user_data['email'];
    $_SESSION['id'] = $user_data['id'];
    echo "<script>window.location.href = '../home/main.php';</script>";
    exit();
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="" />
  <link rel="icon" type="image/x-icon" href="">
  <title>Login | Agguora</title>
  <?php include "../include/style.php"; ?>
  <?php include "../include/fonts.php"; ?>
</head>
<style>
  .from-box {
    width: 30vw;
    margin: auto;
  }
  .password-container {
        position: relative;
    }

    #togglePassword {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        font-size: 1rem;
        color: gray;
    }
</style>

<body>
  <?php include "../include/header.php"; ?>
  <?php
  if (isset($_POST["submit"])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      $emailId = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['email']));
      $password = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['password']));

      $sql = "SELECT * FROM `user` WHERE email = '{$emailId}'";
      $result = mysqli_query($conn, $sql);
      if ($result && mysqli_num_rows($result) > 0) {
        $user_data = mysqli_fetch_assoc($result);
        $dbpass = $user_data['password'];

        // Verifying the password
        if (password_verify($password, $dbpass)) {
          $_SESSION['username'] = $user_data['username'];
          $_SESSION['email'] = $user_data['email'];
          $_SESSION['id'] = $user_data['id'];

          // Generate a unique session token
          $session_token = bin2hex(random_bytes(32));
          $user_id = $user_data['id'];
          $update_sql = "UPDATE `user` SET session_token = '$session_token' WHERE id = '$user_id'";
          mysqli_query($conn, $update_sql);

          // Set a cookie with the session token
          setcookie("session_token", $session_token, time() + (86400 * 30), "/", "", true, true);

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
          echo '<div class="alert alert-danger rounded" role="alert" style="font-size:15px;">Incorrect Password!</div>';
        }
      } else {
        echo '<div class="alert alert-danger rounded" role="alert" style="font-size:15px;">User not found. Go to SignIn</div>';
      }
    }
  }

  ?>

  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" class="py-5 px-5 my-3 bg-light border rounded"
          method="post">
          <h1 style="text-align:center;" class="py-2">LogIn <i class="ri-login-circle-line"
              style="font-size:1.8rem;"></i>
          </h1>
          <?php
          $sql = "SELECT * FROM `user`";
          $result = mysqli_query($conn, $sql);
          if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            ?>
            <input type="hidden" name="userid" value="<?php echo $row['id']; ?>">
          <?php } ?>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label"><i class="fas fa-envelope"></i> Email</label>
            <input type="email" class="form-control rounded" id="exampleFormControlInput1" placeholder="Enter email ID"
              name="email" required>
          </div>

          <div class="mb-3">
            <label for="password" class="form-label">
              <i class="fas fa-lock"></i> Password
            </label>
            <div class="password-container">
              <input type="password" class="form-control" id="password" name="password" placeholder="Password">
              <i class="fas fa-eye-slash" id="togglePassword"></i>
            </div>
          </div>

          <script>
                const passwordInput = document.getElementById('password');
                const togglePassword = document.getElementById('togglePassword');
                togglePassword.addEventListener('click', () => {
                    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                    passwordInput.setAttribute('type', type);
                    togglePassword.classList.toggle('fa-eye');
                    togglePassword.classList.toggle('fa-eye-slash');
                });
            </script>

          <button type="submit" class="btn btn-dark w-100 rounded" name="submit">LogIn</button>
          <br>

          <p style="font-size:15px; text-align:center;" class="mt-5">New to ...? At first you need to <a
              href="../policies/tac-agreed.php">SignIn</a><br> Forgot your password? <a href="resetpassword.php">Reset
              it here</a>.</p>



        </form>
      </div>
    </div>
  </div>
  <?php include "../include/script.php"; ?>
</body>

</html>