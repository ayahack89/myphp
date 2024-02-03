<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>PHP - PDO</title>
</head>
<style>
     table,
     td {
          border: 2px solid black;
          padding: 10px;
          width: 1000px;
          margin: auto;
          margin-top: 5%;

     }

     pre {
          font-family: 'Courier New', Courier, monospace;
          font-weight: bolder;
     }
</style>

<body>

     <table>
          <tr>
               <?php
               /*Connect the database using php pdo (more secure then php procedural algorithm, 
               PHP PDO is very helpfull to use when it's come to switch another database, PDO 
               support 12 different database  and PDO is related to the php OOPs.)*/
               //PDO
               $conn = new PDO("mysql:host=127.0.0.1; dbname=pdo", "root", "");
               // $sql = "INSERT INTO `pdotest`(random) VALUES('abcdehkghkl')";
               $sql = "SELECT * FROM `pdotest`";
               $stmt = $conn->prepare($sql);
               $stmt->execute();

               //Data retrive
               try {
                    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                    <td>
                         <?php echo "<pre>"; ?>
                         <?php print_r($row); ?>
                         <?php echo "</pre>"; ?>
                    </td>

               </tr>
               <?php
               } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
               }


               ?>

     </table>

     <span><a href="pdoadvance.php">next page</a></span>





</body>

</html>