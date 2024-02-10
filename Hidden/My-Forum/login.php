<?php
include "db_connection.php";
session_start();
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
      $userName = mysqli_real_escape_string($conn, $_POST['uname']);
      $password = mysqli_real_escape_string($conn, $_POST['password']);

      // User Verification
      $user_check = "SELECT * FROM `user` WHERE username = '$userName'";
      $user_exist_verification = mysqli_query($conn, $user_check);
      $check = mysqli_num_rows($user_exist_verification);

      if ($check > 0) {
        if (!empty($userName) && !empty($password)) {
          $sql = "SELECT * FROM user WHERE username = '$userName'";
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
              echo "Password Incorrect";
            }
          } else {
            echo "Error: " . mysqli_error($conn);
          }
        } else {
          echo "Please enter both username and password";
        }
      } else {
        echo "User not found! Please register first.";
      }
    }
  }

  ?>
  <div class="container  py-4 px-4 bg-light from-box border rounded">
    <h4 style="text-align:center;">Log In</h4>
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
      <label for="username" class="form-label w-100">Username <br>
        <input class="form-control" type="text" name="uname" placeholder="@Username" aria-label="default input example">
      </label><br>

      <label for="password" class="form-label w-100">Password <br>
        <input type="password" name="password" placeholder="#password" id="inputPassword5" class="form-control"
          aria-describedby="passwordHelpBlock">
      </label><br>

      <button type="submit" class="btn btn-dark w-100" name="submit">LogIn</button>
    </form>

    <br>
    <p>New to fSociety? At first you need to <a href="register.php">Register</a> </p>
  </div>
  <!-- <div class="desc">

        <p> fSociety - a anonymus marketplace & a community like you can buy our services and discuss your product
          quality with others, talk with real hackers, go to our chatroom and chat with others.
          In the chatting section there are no restriction. It is very easy just go click on the 'Chatroom' & chose a
          random name or you can chose your own user name and that's it now lets chats with others.</p>

        <p> It's a socity, a community and your anonymus marketplace where you can buy some crazy stuff using cryptos
          like Bitcoin, Monaro etc.</p>

        <p> fSociety where you can find your own heven. In this community everyone has their own privacy, anonymity and
          power like a darkside of Superman.</p>
        <p> In this community everyone are Homelander - <i> "I can do what ever I want!"</i>. Yes! this is it. </p>

        <p> It's very easy. Just you need to login (Loging if you have already registered! But if you are a new member
          just click the 'Register' and go to the register form a create a new account then login) and create a anonymus
          account and that's it.
          Dont worry about the hole loging process, you just put a random user name like whaterver you want and a unique
          password, it's totaly your choice and after login your all data will be deleted in 24 hours. We provide a
          anonymus place of our users, total privacy no restriction.
          Hope you like it & and don't forget to give your feedback of our review section : )</p>

      </div> -->
  <?php include "footer.php"; ?>
  <?php include "bootstrapjs.php"; ?>
</body>

</html>