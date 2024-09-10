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
  <meta name="description" content="Explore what's new and join us securely, explore new threads, participate to the community and be an active user." />
  <?php include "bootstrapcss-and-icons.php"; ?>
  
  <link rel="icon" type="image/x-icon" href="img/background/agguoralogo.jpg">
  <title>Login | Agguora</title>
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
        $username = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['username']));
        $user_email = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['log_email']));
        $password = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['password']));

        // User Verification
        $sql = "SELECT * FROM `user` WHERE username = '{$username}'";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $user_pass = mysqli_fetch_assoc($result);
            $dbpass = $user_pass['password'];

            // Verify the password using password_verify
            if (password_verify($password, $dbpass)) {
                
                $_SESSION['username'] = $user_pass['username'];
                
               ?>
               <script>window.location.href="http://127.0.0.1/public_html/main.php";</script>
               <?php 
                exit();
            } else {
                echo '<div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">Incorrect Password!</div>';
            }
        } else {
            echo '<div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">User not found. Please register first!</div>';
            echo '<div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">If you are a new user, please register. If you are a returning user, please provide your valid email on this page.</div>';
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
    <div class="input-group mb-3">
      <input type="text" class="form-control rounded-0" placeholder="Enter your email ID" name="log_email" aria-label="email"
        aria-describedby="basic-addon1">
    </div>
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label"><i class="ri-lock-2-fill"></i> Password</label>
      <input type="password" class="form-control rounded-0" id="exampleFormControlInput1" placeholder="password" name="password"
        required>
    </div>
    <button type="submit" class="btn btn-dark w-100 rounded-0" name="submit">LogIn</button>
    <br>

    <p style="font-size:15px; text-align:center;" class="mt-5">New to ...? At first you need to <a
        href="tac-agreed.php">Register</a><br> Forgot your password? <a href="resetpassword.php">Reset it here</a>.</p>



  </form>
<!-- <div class="alert alert-warning" role="alert">
    <h5><strong>We're excited to share that Agguora is currently undergoing a major transformation! Agguora v2 will release soon and it's set to be a game-changer. Thank you for your patience – the best is yet to come!</strong></h5>
  
</div> -->
</div>
</div>
</div>

  <?php include "bootstrapjs.php"; ?>
</body>

</html>