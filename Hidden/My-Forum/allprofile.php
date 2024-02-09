<?php
include "db_connection.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <title>Welcome to fSociety - "your hidden society" - Login</title>
     <style>
          <?php include "css/profile.css" ?>
     </style>
</head>

<body style="background-color:#cbd5e1; border:none;">
     <div style="width: 80vw; margin:auto; background-color:white; border:1px solid #64748b;">
          <div class="nav">
               <div class="header">
                    <div class="logo">
                         <img src="img/f-society-original.png" width="100px" height="100px" alt="fsocietylogo" />
                    </div>
                    <div class="logoText">
                         <span><b class="bigtext">fsociety</b><br></span>
                         <span class="smalltext"><i>"Your Hidden Society"</i></span>
                    </div>
               </div>
          </div>

          <div class="mainContainer">
               <div class="profile">
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
                                             <img src="img/images/<?php echo $row['profile_pic']; ?>" alt="yourimage" height="150px"
                                                  width="180px">
                                        </div>

                                        <div class="useraccount">
                                             <div class="pro_txt">


                                                  <span>
                                                       User:
                                                       <?php echo $row['username']; ?>
                                                  </span>
                                                  <span>
                                                       Points:
                                                       <?php echo $row['points']; ?>
                                                  </span>
                                                  <span>
                                                       Posts:
                                                       <?php echo $row['posts']; ?>
                                                  </span>
                                                  <span>
                                                       Topics:
                                                       <?php echo $row['topics']; ?>
                                                  </span>

                                                  <span>
                                                       Joined at:
                                                       <?php echo $row['datetime']; ?>
                                                  </span>
                                                  <span>
                                                       About:
                                                       <?php echo $row['about']; ?>
                                                  </span>
                                                  <span>
                                                       Gender:
                                                       <?php echo $row['gender']; ?>
                                                  </span>
                                                  <span>
                                                       Country:
                                                       <?php echo $row['country']; ?>
                                                  </span>
                                                  <span>
                                                       Personal Contact:
                                                       <?php echo $row['personalcontact']; ?>
                                                  </span>
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



          </div>
          <div class="footer">000fSociety</div>
     </div>
</body>

</html>