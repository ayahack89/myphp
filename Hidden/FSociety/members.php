<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
</head>

<body>
     <?php include "db_connection.php"; ?>
     <?php
     $query = "SELECT * FROM `user`";
     $result = mysqli_query($conn, $query);
     if ($result) {
          if (mysqli_num_rows($result) > 0) {
               while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <div>
                         <a href="allprofile.php?user=<?php echo $row['id']; ?>">
                              <?php echo $row['username']; ?>
                         </a>
                    </div>

                    <?php
               }
          }
     }
     ?>
</body>

</html>