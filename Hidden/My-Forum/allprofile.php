<?php
include "db_connection.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <?php include "bootstrapcss-and-icons.php"; ?>
     <title>Welcome to fSociety - "your hidden society" - Login</title>
</head>
<?php include "fonts.php"; ?>
<style>
     ul li {
          list-style-type: none;
     }
</style>

<body>
     <?php include "header.php"; ?>

     <div class="container my-3 bg-light py-5 px-5 border rounded">
          <div class="d-flex">
               <div class="pro_image">
                    <div class="d-flex">
                         <?php
                         if (isset($_GET['user'])) {
                              $userId = $_GET['user'];
                              $sql = "SELECT * FROM `user` WHERE id = '$userId'";
                              $result = mysqli_query($conn, $sql);
                              if ($result) {
                                   if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                             ?>
                                             <div class="pro_image">
                                                  <img src="img/images/<?php echo $row['profile_pic']; ?>" alt="yourimage" height="170px"
                                                       width="180px" class="rounded border">
                                             </div>

                                             <div class="container">
                                                  <ul>
                                                       <li>
                                                            <strong>User:</strong>
                                                            <?php echo $row['username']; ?>
                                                       </li>
                                                       <li>
                                                            <strong> Email:</strong>
                                                            <?php echo $row['email']; ?>
                                                       </li>
                                                       <li>
                                                            <strong>Joined at:</strong>
                                                            <?php echo $row['datetime']; ?>
                                                       </li>
                                                       <li>
                                                            <strong>About:</strong>
                                                            <?php echo $row['about']; ?>
                                                       </li>
                                                       <li>
                                                            <strong>Gender:</strong>
                                                            <?php echo $row['gender']; ?>
                                                       </li>
                                                       <li>
                                                            <strong> Country:</strong>
                                                            <?php echo $row['country']; ?>
                                                       </li>
                                                       <li>
                                                            <strong>Personal Contact:</strong>
                                                            <?php echo $row['personalcontact']; ?>
                                                       </li>
                                                  </ul>


                                             </div>
                                        </div>

                                        <?php

                                        }
                                   }

                              }

                         } else {
                              header("Location: index.php");
                         }

                         ?>
               </div>
          </div>
     </div>
     <?php include "footer.php"; ?>
     <?php include "bootstrapjs.php"; ?>
     </div>
     </div>










</body>

</html>