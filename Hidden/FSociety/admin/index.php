<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title> Admin - Login</title>
</head>
<style>
     :root {
  --bodyColor: #1e293b;
  --containerColor: #475569;
   }
     body{
          margin: 0;
          padding: 0;
          font-weight:bolder ;
          background-color:var(--bodyColor);
          color: yellow;
          font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto,
    Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
     }
     .container{
          width: 200px;
          margin: 0 auto;
          background-color: var(--containerColor);
          border-radius: 5px;
          padding: 20px;
          margin-top: 5%;
          box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

     }
     input[type="text"],
     input[type="password"]{
          padding: 5px;
     }

    
     input[type="submit"]{
          background-color: yellow;
          border: none;
          border-radius: 2px;
          padding: 5px;
          width: 25%;
          margin-top: 10px;
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
               if(isset($_SERVER["REQUEST_METHOD"]) == "POST"){
                    $admin = $_POST["name"];
                    $password = $_POST["password"];
                    if(!empty($_POST["name"]) && !empty($_POST["password"])){
                         $sql = "SELECT * FROM `admin` WHERE name = '$admin' AND password = '$password'";
                         $result = mysqli_query($conn, $sql);
                         $userAccount = mysqli_num_rows($result);
                         if($userAccount){
                              $user_pass = mysqli_fetch_assoc($result);
                              $dbpass = $user_pass["password"];
                              $_SESSION["name"] = $user_pass["name"];
                              header("Location: http://localhost/fsociety/admin/admin.php");
                              mysqli_close($conn);
                              exit(); 
                         }else{
                              echo "User not found!";
                              die("Somthing went wrong".mysqli_error($conn));
                              
                         }
                    }

               }
          }
          
          ?>
          <form action="<?php echo htmlentities($_SERVER["PHP_SELF"]); ?>" method="post">
               <h3>Admin LogIn</h3>
               <hr>
               <label for="adminName">
                    Admin name: <br>
                    <input type="text" name="name" >
                    <br> 
               </label>
              
               <label for="password">
                    Password: <br>
                    <input type="password" name="password" >
               </label>
               <br> 
               <input type="submit" value="LogIn" name="submit">

          </form>
          <br>
          <hr>
          <p>New admin? Go to <a href="adminregister.php">register</a></p>
     </div>
     
</body>
</html>