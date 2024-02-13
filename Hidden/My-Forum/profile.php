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

     <?php include "fonts.php"; ?>
     <style>
          ul li {
               list-style-type: none;
          }
     </style>

</head>

<body>

     <?php include "header.php"; ?>

     <div class="container my-3 bg-light py-5 px-5 border rounded">
          <div class="d-flex">
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
                                   <img class="rounded border" src="img/images/<?php echo $row['profile_pic']; ?>" alt="yourimage"
                                        height="170px" width="180px">

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
                                             <strong> Points:</strong>
                                             <?php echo $row['points']; ?>
                                        </li>
                                        <li>
                                             <strong> Posts:</strong>
                                             <?php echo $row['posts']; ?>
                                        </li>
                                        <li>
                                             <strong> Topics:</strong>
                                             <?php echo $row['topics']; ?>
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

                         <div class="container d-flex mx-2 my-2">
                              <button type="button" class="btn btn-dark mx-1 my-1"><a href="profile.php?action=edit"
                                        style="text-decoration:none; color:gainsboro;">Edit Profile</a></button>
                              <button type="button" class="btn btn-dark mx-1 my-1"><a href="profile.php?action=change_profile_image"
                                        style="text-decoration:none; color:gainsboro;">Change Profile Image</a></button>
                              <button type="button" class="btn btn-dark mx-1 my-1"><a href="profile.php?action=change_password"
                                        style="text-decoration:none; color:gainsboro;">Change Password</a></button>

                              <button type="button" class="btn btn-dark mx-1 my-1"><a href="profile.php?action=delete"
                                        style="text-decoration:none; color:gainsboro;">Delete
                                        Profile</a></button>
                         </div>



                         <?php
                         $action = isset($_GET['action']) ? $_GET['action'] : "";

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
     <div class="card text-center">
          <div class="card-header">
               <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                         <a class="nav-link active" aria-current="true" href="#">Active</a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                    </li>
               </ul>
          </div>
          <div class="card-body">
               <h5 class="card-title">Special title treatment</h5>
               <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
               <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
     </div>


     </div>
     <?php include "footer.php"; ?>
     <?php include "bootstrapjs.php"; ?>

</body>

</html>