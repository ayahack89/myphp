<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Succes!</title>
</head>
<style>
  body {
    margin: 0;
    padding: 0;
  }

  .container {
    margin: auto;
    padding: 10px;
    width: 1000px;
    border-radius: 10px;
    margin-top: 1%;
  }

  h1 {
    text-align: center;
    color: green;
    font-family: 'Courier New', Courier, monospace;
  }

  .container-II {
    margin: auto;
    padding: 10px;
    width: 400px;
    height: 300px;
    display: grid;
    background-color: white;
    margin-top: 5%;
    border: 2px outset gray;
  }

  h3 {
    font-size: 2rem;
    font-family: "Courier New", Courier, monospace;
    text-align: center;

  }

  label {
    font-size: 1.2rem;
    font-weight: bolder;
    font-family: "Courier New", Courier, monospace;
    margin-left: 30px;
  }

  input[type="text"],
  input[type="password"] {
    padding: 8px;
    width: 80%;
    margin-left: 30px;
    border: 2px inset black;
  }

  input[type="submit"] {
    background-color: black;
    color: white;
    width: 85%;
    padding: 5px;
    font-size: 1.2rem;
    margin-top: 15px;
    margin-left: 30px;
    border-radius: 5px;
    font-family: "Courier New", Courier, monospace;
    font-weight: bolder;
    transition: all 4ms ease-in;
  }

  input[type="submit"]:hover {
    transform: translateY(-2%);
    cursor: pointer;

  }

  #hide_userName,
  #hide_userPassword {
    font-size: 10px;
    font-family: "Courier New", Courier, monospace;
    font-weight: bolder;
    margin-left: 10%;
    color: red;
    display: none;
  }

  p {
    font-family: 'Courier New', Courier, monospace;
    font-weight: bolder;
    margin-left: 30px;
  }
</style>

<body>
  <?php
  include "db_connection.php";
  if (isset($_POST['submit'])) {

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      // User Input
      $uname = $_POST['Uname'];
      $upass = $_POST['password'];




      $sqlquery = "SELECT * FROM useraccounts WHERE Uname = '$uname' AND password = '$upass'";

      $result = mysqli_query($conn, $sqlquery);

      $user_account = mysqli_num_rows($result);

      if ($user_account) {
        $user_pass = mysqli_fetch_assoc($result);

        $dp_pass = $user_pass['Uname'];
        $_SESSION['Uname'] = $user_pass['Uname'];

        header("Location: UserAccount.php");

      } else {
        echo "User Not found!";
      }


    }
  }





  ?>

  <div class="container-II">
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" name="myForm"
      onsubmit="return formValidation()">
      <h3>LogIn</h3>
      <label for="uname">
        UserName: <br />
        <input type="text" name="Uname" id="Uname" placeholder="Enter a user name" /> </label><br /><span
        id="hide_userName">PLEASE ENTER YOUR USER NAME!</span>

      <label for="password">
        Password: <br />
        <input type="password" name="password" id="password" placeholder="Enter a strong password" />
      </label><br /><span id="hide_userPassword">PLEASE ENTER YOUR PASSWORD!</span>

      <input type="submit" name="submit" value="LogIn">
      <p>A new Member ? go to <a href="index.php">SignIn</a></p>
    </form>
  </div>

  <script>
    function formValidation() {

      var userName = document.forms['myForm']['Uname'].value;
      var userPassword = document.forms['myForm']['password'].value;

      //Start Validation
      //User name validation
      if (userName === "") {
        hide_userName.style.display = "block";
        return false;
      }

      //Password validation
      if (userPassword === "") {
        hide_userPassword.style.display = "block";
        return false;
      }

    }
  </script>
</body>

</html>