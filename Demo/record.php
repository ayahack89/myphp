<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Fetching record</title>
</head>

<body>
     <table>
          <th>Id</th>
          <th>Username</th>
          <th>Age</th>
          <tr>
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

               $sql = "SELECT * FROM `exam`";
               $run = mysqli_query($connection, $sql);
               if ($run) {
                    if (mysqli_num_rows($run)) {
                         while ($row = mysqli_fetch_assoc($run)) {


                              ?>


                              <td>
                                   <?php echo $row['id']; ?>
                              </td>
                              <td>
                                   <?php echo $row['username']; ?>
                              </td>
                              <td>
                                   <?php echo $row['age']; ?>
                              </td>
                         </tr>
                         <?php
                         }

                    } else {
                         echo "No data found!";
                    }
               } else {
                    echo "Sorry! an error occure : (";

               }

               ?>

     </table>

</body>

</html>