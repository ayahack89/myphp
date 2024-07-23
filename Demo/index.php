<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Demo</title>
</head>

<body>
     <?php

     //Databse connection
     $servername = "localhost";
     $serverusername = "root";
     $password = "";
     $database = "demo";

     $connection = mysqli_connect($servername, $serverusername, $password, $database);

     if (!$connection) {
          echo "Error! database is not connected : (";
          die("Error!" . mysqli_error($connection));

     }




     if (isset($_POST['submit'])) {
          //User details;
          $username = $_POST['username'];
          $age = $_POST['age'];

          if (!empty($_POST['username']) && !empty($_POST['age'])) {
               $sql_query = "INSERT INTO `exam` (`username`, `age`) VALUES ('$username', '$age');";
               $result = mysqli_query($connection, $sql_query);
               if ($result) {
                    header("Location: record.php");
                    mysqli_close($connection);
               } else {
                    echo "Sorrry! somthing went wrong : (";
                    die("Error!" . mysqli_error($connection));
               }
          }
     }



     ?>
     <form action="" method="post">

          <label for="username">
               User name: <br>
               <input type="text" name="username" placeholder="Enter your username">

          </label><br>
          <label for="age">
               Age: <br>
               <input type="number" name="age" placeholder="Enter your age">
          </label><br><br>
          <input type="submit" value="Submit" name="submit">

     </form>

</body>

</html>