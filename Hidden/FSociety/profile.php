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
          <?php include "header.php"; ?>

          <div class="mainContainer">
               <div class="profile">
                    <div class="pro_image">
                         <?php
                         $username = $_SESSION['username'];

                         ?>
                         <?php
                         $sql_query = "SELECT * FROM `user` WHERE username = '$username'";
                         $result = mysqli_query($conn, $sql_query);

                         if ($result) {
                              if (mysqli_num_rows($result) > 0) {
                                   while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
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

                                        </div>
                                   </div>





                              </div>
                              <div class="pro_guide">
                                   <p style="margin:50px; font-size:15px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo
                                        id adipisci
                                        tempore,
                                        praesentium veritatis, est eveniet perspiciatis quidem animi suscipit aut nostrum?
                                        Repellat eligendi excepturi reprehenderit dolor! Expedita, magnam non.</p>
                                   <p style="margin:50px"><button><a href="profile.php?action=edit"
                                                  style="text-decoration:none; color:gainsboro;">Edit Profile</a></button>
                                        <button><a href="profile.php?action=change_profile_image"
                                                  style="text-decoration:none; color:gainsboro;">Change Profile Image</a></button>
                                        <button><a href="profile.php?action=change_password"
                                                  style="text-decoration:none; color:gainsboro;">Change Password</a></button>

                                        <button><a href="profile.php?action=delete"
                                                  style="text-decoration:none; color:gainsboro;">Delete Profile</a></button>
                                   </p>



                                   <?php
                                   $action = $_GET['action'];
                                   $username = $_SESSION['username'];
                                   if ($action == "edit") {

                                        ?>
                                        <p>If you want to edit your profile pic and other informtions just click this <a
                                                  href="editprofile.php?update=<?php echo $row['id']; ?>">edit</a> button.
                                        </p>
                                        <?php
                                   } elseif ($action == "change_password") {
                                        ?>
                                        <p>If you want to change your password just click on this <a
                                                  href="editprofile.php?change=<?php echo $row['id']; ?>">Change Password</a> button.
                                        </p>


                                        <?php
                                   } elseif ($action == "change_profile_image") {
                                        ?>
                                        <p>If you want to delete your account just click on thon is <a
                                                  href="editprofile-image.php?update=<?php echo $row['id']; ?>">Change Profile Image</a>
                                             button.
                                        </p>
                                        <?php


                                   } elseif ($action == "delete") {
                                        ?>
                                        <p>If you want to delete your account just click on thon is <a
                                                  href="editprofile.php?update=<?php echo $row['id']; ?>">delete</a> button.
                                        </p>

                                        <?php

                                   }
                                   }

                              } else {
                                   header("Location: index.php");
                              }
                              ?>


                         <?php


                         }
                         ?>
               </div>


          </div>
          <div class="footer">000fSociety</div>
     </div>
</body>

</html>