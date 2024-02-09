<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
</head>

<body>
     <?php
     // Include the database connection file
     include "db_connection.php";

     // Check if the 'catagory' parameter is set in the URL
     ?>
     <?php

     $data = $_GET["catagory"];
     $sqlquery = "SELECT * FROM `addtopics` WHERE topic_title = '$data'";
     $run = mysqli_query($conn, $sqlquery);
     if ($run) {
          if (mysqli_num_rows($run) > 0) {
               while ($row = mysqli_fetch_assoc($run)) {
                    ?>
                    <?php echo $row['catagories']; ?>
               <?php }
          }
     } ?>
</body>

</html>