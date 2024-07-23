<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>PHP - PDO Advance</title>
</head>

<body>
     <?php
     try {
          //PDO Advance database connection
          $server = "127.0.0.1";
          $dbname = "pdoadvance";
          $user = "root";
          $password = "";

          //PDO db connection
     
          $connection = new PDO("mysql::host=$server; dbname=$dbname", $user . $password);
          if ($connection) {

               echo '<script>alert("Database connected succesfully : )");</script>';
               //Insert into database by using PHP PDO
               /*$insert_query = "INSERT INTO `students` (`name`, `age`, `class`, `gender`) VALUES ('Shivam', '20', '5', 'Male');";
               $connection->query($insert_query);*/
               //Fetch data from database by uising PHP PDO
               $id = 1;
               $sql = "SELECT * FROM `students`WHERE id='$id'";
               $stmt = $connection->prepare($sql);
               $stmt->execute();
               $result = $stmt->fetch(PDO::FETCH_ASSOC);
               echo '<pre>';
               print_r($result);
               echo '</pre>';
               echo "My name is" . " " . $result['name'] . ". I am" . " " . $result['age'] . "years old.";


          }
     } catch (PDOException $e) {
          echo "ERROR!" . $e->getMessage();
     }


     ?>

</body>

</html>