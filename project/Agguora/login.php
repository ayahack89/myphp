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
session_start(); // Start session

if (isset($_POST["submit"])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include "db_connection.php"; // Include database connection
        
        // User input
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        // User Verification
        $sql = "SELECT * FROM `user` WHERE username = '{$username}'";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $user_pass = mysqli_fetch_assoc($result);
            $dbpass = $user_pass['password'];

            // Verify the password using password_verify
            if (password_verify($password, $dbpass)) {
                // Login Successful
                $_SESSION['username'] = $user_pass['username'];
                // Redirect to index.php
               ?>
               <script>window.location.href="index.php";</script>
               <?php 
                exit();
            } else {
                echo '<div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">Incorrect Password!</div>';
            }
        } else {
            echo '<div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">User not found. Please register first!</div>';
        }
    }
}
?>


  <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>"
    class="container w-75 my-5 py-3 px-4 bg-light border rounded-0" method="post">
    <h4 style="text-align:center;" class="py-2">LogIn <i class="ri-login-circle-line" style="font-size:1.8rem;"></i>
    </h4>
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
        href="register.php">Register</a><br> Forgot your password? <a href="resetpassword.php">Reset it here</a>.</p>



  </form>

  <?php include "footer.php"; ?>
  <?php include "bootstrapjs.php"; ?>
</body>

</html>