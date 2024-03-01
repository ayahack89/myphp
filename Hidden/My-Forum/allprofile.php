<?php
include "db_connection.php";
session_start();
ini_set('display_errors', 0);
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
          $userId = mysqli_real_escape_string($conn, $_GET['user']);
          $sql = "SELECT * FROM `user` WHERE id = '$userId'";
          $result = mysqli_query($conn, $sql);
          if ($result) {
               if (mysqli_num_rows($result) > 0) {
                    while ($member = mysqli_fetch_assoc($result)) {
                         ?>

                         <div class="container d-flex p-2 py-5 bg-dark w-75 border my-2 rounded">
                              <div class="container p-2 w-100 border rounded" style="background-color:white;">
                                   <div class="d-flex flex-column justify-content-center align-items-center">
                                        <img src="img/images/<?php echo $member['profile_pic']; ?>" class="rounded-circle border" height="180"
                                             width="180" />
                              <span class="name mt-3 text-danger" style="font-size:1.8rem;">
                                   <?php echo $member['username']; ?>
                              </span>
                                        <div class="d-flex flex-row justify-content-center align-items-center gap-2"> 
                                             <span class="idd1">@
                                                  <?php echo $member['username']; ?>
                                             </span>

                                        </div>
                                        <span>
                                             <i class="ri-flag-fill"></i>
                                             <?php echo $member['country']; ?>
                                        </span>
                                        <span style="font-size:8px;">Joined
                                             <?php echo $member['datetime']; ?>
                                        </span>

                                        <div class="text mt-3"> 
                                             <span>
                                                  <?php echo $member['about']; ?>
                                             </span>
                                        </div>

                                        <!-- Activity count -Start  -->
                                        <div class="container border py-3 px-3 my-2" style="width:15vw;">
                                        <b class="text-center"><?php echo $member['username']; ?>'s activity</b>
                                        <?php 
                                        $sql_user = "SELECT * FROM `user` WHERE id = '{$userId}'";
                                        $run_query = mysqli_query($conn, $sql_user);
                                        if($run_query && mysqli_num_rows($run_query) > 0){
                                             $userr=mysqli_fetch_assoc($run_query);
                                             $userrname=$userr['username']; 
                                        $sql_count = "SELECT COUNT(*) AS total_rows FROM `catagory` WHERE created_by = '{$userrname}'";
                                        $result = mysqli_query($conn, $sql_count);
                                        if ($result && mysqli_num_rows($result) > 0) {
                                             $row = mysqli_fetch_assoc($result);
                                             $disks=$row['total_rows'];
                                             ?>
                                             Disks(<?php echo $row['total_rows']; ?>) <br>
                                             <?php }}?>
                                             <?php 
                                       $sql_user = "SELECT * FROM `user` WHERE id = '{$userId}'";
                                       $run_query = mysqli_query($conn, $sql_user);
                                       if($run_query && mysqli_num_rows($run_query) > 0){
                                            $userr=mysqli_fetch_assoc($run_query);
                                            $userrname=$userr['username']; 
                                        $sql_count = "SELECT COUNT(*) AS total_rows FROM `threads` WHERE thread_created_by = '{$userrname}'";
                                        $result = mysqli_query($conn, $sql_count);
                                        if ($result && mysqli_num_rows($result) > 0) {
                                             $row = mysqli_fetch_assoc($result);
                                             $threads=$row['total_rows'];
                                             ?>
                                             Threads (<?php echo $row['total_rows']; ?>)<br>
                                             <?php }}?>
                                             <?php 
                                        $sql_user = "SELECT * FROM `user` WHERE id = '{$userId}'";
                                        $run_query = mysqli_query($conn, $sql_user);
                                        if($run_query && mysqli_num_rows($run_query) > 0){
                                        $userr=mysqli_fetch_assoc($run_query);
                                        $userrname=$userr['username']; 
                                       $sql = "SELECT * FROM `user` WHERE username = '{$userrname}'";
                                       $run_query = mysqli_query($conn, $sql);
                                       if($run_query && mysqli_num_rows($run_query)){
                                        $user=mysqli_fetch_assoc($run_query);
                                        $user_id = $user['id'];
                                        $sql_count = "SELECT COUNT(*) AS total_rows FROM `comments` WHERE comment_by = '{$user_id}'";
                                        $result = mysqli_query($conn, $sql_count);
                                        if ($result && mysqli_num_rows($result) > 0) {
                                             $row = mysqli_fetch_assoc($result);
                                             $comments=$row['total_rows'];
                                             ?>
                                             Comments(<?php echo $row['total_rows']; ?>)<br>
                                             <div>
                                                  <b class="text-danger" style="font-size:1.2rem;">Karma: </b><b style="font-size:1.2rem;"><?php 
                                                  $karma = $disks + $threads + $comments;
                                                  echo $karma;
                                                   ?></b>
                                             </div>
                                             <?php }}}?>
                                   </div>
                                   <!-- Activity count -End  -->

                                  <!-- Social media section -Start  -->
                                        <div class="gap-3 mt-3 icons d-flex flex-row justify-content-center align-items-center">
                                             <span><a href="<?php echo $member['twitter']; ?>"><i class="fa fa-twitter"
                                                            style="font-size:2rem; color:black;"></i></a></span>
                                             <span><a style="text-decoration: none;" href="<?php echo $member['facebook']; ?>"><i
                                                            class="ri-facebook-box-fill"
                                                            style="font-size:2.2rem; color:black;"></i></a></span>
                                             <span><a href="<?php echo $member['instagram']; ?>"><i class="fa fa-instagram"
                                                            style="font-size:2rem; color:black;"></i></a></span>
                                             <span><a href="<?php echo $member['github']; ?>"><i class="fa fa-github"
                                                            style="font-size:2rem; color:black;"></i></a></span>
                                        </div>

                                   </div>
                                   <!-- Social media section -End  -->
                              </div>
                         </div>
                         <?php

                    }
               }

          }

     } else {
          ?>
          <script>window.location.href="index.php";</script>
          <?php
     }

     ?>

     <?php include "footer.php"; ?>
     <?php include "bootstrapjs.php"; ?>
     </div>
     </div>



</body>

</html>