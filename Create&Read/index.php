<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Basic Email & Password Manager</title>
</head>
<style>
     body {
          margin: 0;
          padding: 0;
          background-color: gray;
     }

     .container {
          width: 400px;
          height: 210px;
          margin: 0 auto;
          background-color: white;
          margin-top: 5%;
          padding-top: 10px
     }

     h3 {
          text-align: center;
          font-family: 'Courier New', Courier, monospace;
     }

     input[type="email"],
     input[type="password"] {
          padding: 5px;
          width: 80%;
          font-family: 'Courier New', Courier, monospace;
          font-weight: bolder;
          margin-left: 8%;
     }

     label {
          font-family: 'Courier New', Courier, monospace;
          font-size: 1.2rem;
          font-weight: bolder;
          padding-left: 8%;

     }

     input[type="submit"] {
          background-image: linear-gradient(white, gray);
          margin-left: 8%;
          margin-top: 8px;
          padding: 5px;
          font-family: 'Courier New', Courier, monospace;
          font-weight: bolder;
          border: 1px solid black;
          border-radius: 5px;
          transition: all 4ms ease-in;
     }

     input[type="submit"]:hover {
          cursor: pointer;
          transform: translateY(2%);
     }
</style>

<body>
     <?php
     include "db_connection.php";

     if (isset($_POST["email"]) && isset($_POST["password"])) {
          //User information
          $userEmail = $_POST["email"];
          $userPassword = $_POST["password"];

          //Run Sql
          $sqlQuery = "INSERT INTO `create&read` (`email`, `password`) VALUES ('$userEmail', '$userPassword')";


          // Run MySQL query
          $result = mysqli_query($conn, $sqlQuery);

          if (!$result) {
               echo "Error: " . mysqli_error($conn);
          }
          header("Location: table.php");

     } else {
          echo "<h3>Please enter your email and password</h3>";
     }
     //Server connection close
     mysqli_close($conn);


     ?>
     <div class="container">
          <form action="index.php" method="post">
               <h3><a href="table.php">BASIC EMAIL & PASSWORD MANAGER</a></h3>
               <label for="email">
                    Email: <br>
                    <input type="email" name="email" id="email" placeholder="Enter your valid email" required>
               </label><br>
               <label for="password">
                    Password: <br>
                    <input type="password" name="password" id="password" placeholder="Enter a strong password" required>
               </label><br>

               <input type="submit" value="Submit">

          </form>

     </div>


</body>

</html>