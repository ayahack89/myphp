<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>admin - registration</title>
</head>
<style>
:root {
  --bodyColor: #1e293b;
  --containerColor: #475569;
   }
     body{
          margin: 0;
          padding: 0;
          font-weight: bolder;
          background-color: var(--bodyColor);
          color: yellow;
          font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto,
    Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
     }
     .container{
          width: 400px;
          margin: 0 auto;
          background-color: var(--containerColor);
          border-radius: 5px;
          padding: 20px;
          margin-top: 5%;
          box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

     }
     input[type="text"],
     input[type="email"],
     input[type="password"]{
          padding: 5px;
          width: 50%;
     }

     input[type="submit"]{
          
          border:none;
          border-radius: 2px;
          padding: 5px;
          margin-top: 10px;
          background-color: yellow;

          transition: all 4ms ease-in;
     }
     input[type="submit"]:hover{
          transform: translateY(2%);
          cursor: pointer;


     }
     a{
          color: red;
     }
</style>
<body>
     <div class="container">
          <?php 
          include "../db_connection.php";
          if(isset($_POST["submit"])){
               $adminName = $_POST["name"];
               $adminEmail = $_POST["email"];
               $adminPassword = $_POST["password"];
               $retypePassword = $_POST["repass"];
     if(!empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["repass"])){
          if(strlen($adminPassword)  >= 6 || strlen($adminPassword) >= 8 ){
               if($adminPassword == $retypePassword){
                    $sqlQuery = "INSERT INTO `admin` (`name`, `email`, `password`, `repassword`) VALUES ('$adminName', '$adminEmail', '$adminPassword', '$retypePassword');";
                    $runSqlQuery = mysqli_query($conn, $sqlQuery);
                    if($runSqlQuery){
                         header("Location: http://localhost/fsociety/admin/index.php");
                         mysqli_close($conn);
                    }else{
                         die("Somthing went wrong".mysqli_error($conn));
                    }
               }
          }else{
               echo "<p>Sorry password not matched : (</p>";
          }
               }
          }
          ?>
          <form action="adminregister.php" method="post">
               <h3>Admin Registration</h3>
               <hr>
               <br>
               <label for="adminName">
                    User name: <br>
                    <input type="text" name="name" >
               </label><br>
               <label for="password">
                    Email:  <br>
                    <input type="email" name="email" >
               </label>
                    <br> 
                    <label for="password">
                    Password:  <br>
                    <input type="password" name="password" >
               </label>
               <br>
               <label for="retypepassword">
                   Retype Password:  <br>
                    <input type="password" name="repass" >
               </label>
               <br>
               <input type="submit" value="Register" name="submit">

          </form>
          <br>
          <hr>
          <p>Please always use your backup email. <br> & Password length should be in 6 to 8 characters.</p>
          <p>Already a member go to <a href="index.php">logIn</a></p>
     </div>
     
</body>
</html>