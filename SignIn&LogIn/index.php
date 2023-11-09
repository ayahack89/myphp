<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SignIn</title>
  </head>
  <style>
    body {
      margin: 0;
      padding: 0;
      background-color: rgb(188, 188, 188);
    }
    .container {
      margin: auto;
      padding: 10px;
      width: 400px;
      height: 430px;
      display: grid;
      background-color: white;
      margin-top: 10%;
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
    input[type="email"],
    input[type="password"] {
      padding: 8px;
      width: 80%;
      margin-left: 30px;
      border: 2px inset black;
    }
    input[type="submit"]{
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
      transition: all 4ms ease-in ;
    }
    input[type="submit"]:hover{
      transform: translateY(-2%);
      cursor: pointer;

    }
    #hide_userName,
    #hide_userEmail,
    #hide_userEmail_II,
    #hide_userPassword,
    #hide_userPassword_II,
    #hide_userCPassword,
    #hide_userCPassword_II {
      font-size: 10px;
      font-family: "Courier New", Courier, monospace;
      font-weight: bolder;
      margin-left: 10%;
      color: red;
      display: none;
    }
  </style>
  <body>
    <?php 
    include "db_connection.php";

  if(isset($_POST['submit'])){
   
    $uname = $_POST['Uname'];
    $uemail = $_POST['email'];
    $upass = $_POST['password'];
    $cpass = $_POST['cpassword'];
    
    $sqlquery = "INSERT INTO sigin(`Uname`, `UserEmail`, `password`, `cpassword`) VALUES ('{$uname}', '{$uemail}', '{$upass}', '{$cpass}')";

    //Connection result
$result = mysqli_query($conn, $sqlquery);
if(!$result){
     die("Query not connected!");
}
else{

//Redirect succes page
header("Location: http://localhost/SignIn&LogIn/succesSignIn.php");
//Connection close
mysqli_close($conn);
  }
}

  
    ?>
   <div class="container">
      <form
        action="index.php"
        method="post"
        name="myForm"
        onsubmit="return formValidation()"
      >
        <h3>SignIn</h3>
        <label for="uname">
          UserName: <br />
          <input
            type="text"
            name="Uname"
            id="Uname"
            placeholder="Enter a user name"
          /> </label
        ><br />
        <span id="hide_userName">PLEASE ENTER A USER NAME!</span>
        <label for="email">
          Email: <br />
          <input
            type="email"
            name="email"
            id="email"
            placeholder="Enter your valid email"
          /> </label
        ><br />
        <span id="hide_userEmail">PLEASE ENTER YOUR EMAIL ID!</span>
        <span id="hide_userEmail_II">PLEASE ENTER A VALID EMAIL ID! </span>
        <label for="password">
          Password: <br />
          <input
            type="password"
            name="password"
            id="password"
            placeholder="Enter a strong password"
          /> </label
        ><br />
        <span id="hide_userPassword">PLEASE ENTER A STRONG PASSWORD!</span>
        <span id="hide_userPassword_II"
          >YOUR PASSWORD SHOULD ATLEAST 9 CHARECTERS!</span
        >
        <label for="cpassword">
          Confirm Password: <br />
          <input
            type="password"
            name="cpassword"
            id="cpassword"
            placeholder="Retype your password"
          /> </label
        ><br />
        <span id="hide_userCPassword">PLEASE CONFIRM YOUR PASSWORD!</span>
        <span id="hide_userCPassword_II">INCORRECT PASSWORD!</span>
        <input type="submit" name="submit" value="SignIn" />
      </form>
    </div>
    <script>
      //Form Validation
      function formValidation() {
        //Correct email;
        var correctEmail =
          /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        //User Input Id's
        var userName = document.forms["myForm"]["Uname"].value;
        var userEmail = document.forms["myForm"]["email"].value;
        var userPassword = document.forms["myForm"]["password"].value;
        var userCPassword = document.forms["myForm"]["cpassword"].value;

        //Hide Id's
        var hide_userName = document.getElementById("hide_userName");
        var hide_userEmail = document.getElementById("hide_userEmail");
        var hide_userEmail_II = document.getElementById("hide_userEmail_II");
        var hide_userPassword = document.getElementById("hide_userPassword");
        var hide_userPassword_II = document.getElementById(
          "hide_userPassword_II"
        );
        var hide_userCPassword = document.getElementById("hide_userCPassword");
        var hide_userCPassword_II = document.getElementById(
          "hide_userCPassword_II"
        );

        //Name validation;
        if (userName === "") {
          hide_userName.style.display = "block";
          return false;
        }
        //Email validation;
        if (userEmail === "") {
          hide_userEmail.style.display = "block";
          return false;
        }
        if (!correctEmail.test(userEmail)) {
          hide_userEmail_II.style.display = "block";
          return false;
        }
        //Password validation;
        if (userPassword === "") {
          hide_userPassword.style.display = "block";
          return false;
        }
        if (userPassword.length <= 8) {
          hide_userPassword_II.style.display = "block";
          return false;
        }
        //Confirm password validation;
        if (userCPassword === "") {
          hide_userCPassword.style.display = "block";
          return false;
        }
        if (userCPassword !== userPassword) {
          hide_userCPassword_II.style.display = "block";
          return false;
        }
      }
    </script>

  </body>
</html>
