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

     * {
          margin: 0;
          padding: 0
     }



     .card {
          width: 350px;
          background-color: #efefef;
          border: none;
          cursor: pointer;
          transition: all 0.5s;
     }

     .image img {
          transition: all 0.5s
     }

     .card:hover .image img {
          transform: scale(1.5)
     }

     .name {
          font-size: 22px;
          font-weight: bold
     }

     .idd {
          font-size: 14px;
          font-weight: 600
     }

     .idd1 {
          font-size: 12px
     }

     .number {
          font-size: 22px;
          font-weight: bold
     }

     .follow {
          font-size: 12px;
          font-weight: 500;
          color: #444444
     }

     .btn1 {
          height: 40px;
          width: 150px;
          border: none;
          background-color: #000;
          color: #aeaeae;
          font-size: 15px
     }

     .text span {
          font-size: 13px;
          color: #545454;
          font-weight: 500
     }

     .icons i {
          font-size: 19px
     }

     hr .new1 {
          border: 1px solid
     }

     .join {
          font-size: 14px;
          color: #a0a0a0;
          font-weight: bold
     }

     .date {
          background-color: #ccc
     }
</style>

<body>
     <?php include "header.php"; ?>




     <?php
     if (isset($_GET['user'])) {
          $userId = $_GET['user'];
          $sql = "SELECT * FROM `user` WHERE id = '$userId'";
          $result = mysqli_query($conn, $sql);
          if ($result) {
               if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                         ?>
                         <!-- <div class="pro_image">
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
 -->
                         <div class="container mt-4 mb-4 p-2 d-flex justify-content-center">
                              <div class="card p-4 border">
                                   <div class="d-flex flex-column justify-content-center align-items-center">
                                        <img src="img/images/<?php echo $row['profile_pic']; ?>" class="rounded-circle border" height="150"
                                             width="150" />
                                        <span class="name mt-3">
                                             <?php echo $row['username']; ?>
                                        </span>
                                        <div class="d-flex flex-row justify-content-center align-items-center gap-2"> <span class="idd1">@
                                                  <?php echo $row['username']; ?>
                                             </span>

                                        </div>
                                        <span>
                                             <i class="ri-flag-fill"></i>
                                             <?php echo $row['country']; ?>
                                        </span>
                                        <div class="d-flex flex-row justify-content-center align-items-center mt-3"> <span
                                                  class="number">1069 <span class="follow">Followers</span></span> </div>

                                        <div class="text mt-3"> <span>
                                                  <?php echo $row['about']; ?>
                                             </span>
                                        </div>
                                        <div class="gap-3 mt-3 icons d-flex flex-row justify-content-center align-items-center">
                                             <span><i class="fa fa-twitter"></i></span> <span><i class="fa fa-facebook-f"></i></span>
                                             <span><i class="fa fa-instagram"></i></span> <span><i class="fa fa-linkedin"></i></span>
                                        </div>
                                        <div class=" px-2 rounded mt-4 date "> <span class="join">Joined
                                                  <?php echo $row['datetime']; ?>
                                             </span> </div>
                                   </div>
                              </div>
                         </div>

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

     <?php include "footer.php"; ?>
     <?php include "bootstrapjs.php"; ?>
     </div>
     </div>



</body>

</html>