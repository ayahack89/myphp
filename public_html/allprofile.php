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
     <meta name="description" content="View other contributors, see who is the new member in this community, and see all members.">
     <?php include "bootstrapcss-and-icons.php"; ?>
     
<!--DNS Prefetching & Prefetching-->
<!-- Google CDN -->
<link rel="dns-prefetch" href="//ajax.googleapis.com">
<link href="//ajax.googleapis.com" rel="preconnect" crossorigin>

<!-- Google API -->
<link rel="dns-prefetch" href="//apis.google.com">
<link href="apis.google.com" rel="preconnect" crossorigin>

<!-- Google Fonts -->
<link rel="dns-prefetch" href="//fonts.googleapis.com">
<link rel="dns-prefetch" href="//fonts.gstatic.com">

<!-- Google Analytics -->
<link rel="dns-prefetch" href="//www.google-analytics.com">
<link href="//www.google-analytics.com" rel="preconnect" crossorigin>

<!-- Google Tag Manager -->
<link rel="dns-prefetch" href="//www.googletagmanager.com">
<link href="//www.googletagmanager.com" rel="preconnect" crossorigin>

<!-- Google Publisher Tag -->
<link rel="dns-prefetch" href="//www.googletagservices.com">

<!-- Google AdSense -->
<link rel="dns-prefetch" href="//adservice.google.com">
<link rel="dns-prefetch" href="//pagead2.googlesyndication.com">
<link rel="dns-prefetch" href="//tpc.googlesyndication.com">


<!-- Microsoft CDN -->
<link rel="dns-prefetch" href="//ajax.microsoft.com">
<link rel="dns-prefetch" href="//ajax.aspnetcdn.com">

<!-- Amazon S3 -->
<link rel="dns-prefetch" href="//s3.amazonaws.com">

<!-- Cloudflare CDN -->
<link rel="dns-prefetch" href="//cdnjs.cloudflare.com">

<!-- jQuery CDN -->
<link rel="dns-prefetch" href="//code.jquery.com">

<!-- Bootstrap CDN -->
<link rel="dns-prefetch" href="//stackpath.bootstrapcdn.com">

<!-- Font Awesome CDN -->
<link rel="dns-prefetch" href="//use.fontawesome.com">

<!-- Facebook -->
<link rel="dns-prefetch" href="//connect.facebook.net">

<!-- Twitter -->
<link rel="dns-prefetch" href="//platform.twitter.com">

<!-- Linkedin -->
<link rel="dns-prefetch" href="//platform.linkedin.com">

<!-- Vimeo -->
<link rel="dns-prefetch" href="//player.vimeo.com">

<!-- GitHub -->
<link rel="dns-prefetch" href="//github.githubassets.com">

<!-- Disqus -->
<link rel="dns-prefetch" href="//referrer.disqus.com">
<link rel="dns-prefetch" href="//c.disquscdn.com">

<!-- Gravatar -->
<link rel="dns-prefetch" href="//0.gravatar.com">
<link rel="dns-prefetch" href="//2.gravatar.com">
<link rel="dns-prefetch" href="//1.gravatar.com">

<!-- DoubleClick -->
<link rel="dns-prefetch" href="//ad.doubleclick.net">
<link rel="dns-prefetch" href="//googleads.g.doubleclick.net">
<link rel="dns-prefetch" href="//stats.g.doubleclick.net">
<link rel="dns-prefetch" href="//cm.g.doubleclick.net">

<link rel="icon" type="image/x-icon" href="img/background/agguoralogo.jpg">

 <?php 
if (isset($_GET['user'])) {
    $userId = mysqli_real_escape_string($conn, $_GET['user']);
    $sql = "SELECT * FROM `user` WHERE id = '$userId'";
    $result = mysqli_query($conn, $sql);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
?>
        <title><?php echo htmlspecialchars($row['username']); ?> | Agguora</title>
<?php 
    } else {
    
        echo '<title>User Not Found | Agguora</title>';
    }
} else {
    echo '<title>Invalid Request | Agguora</title>';
}
?>


<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-YXXL0NCGLE"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-YXXL0NCGLE');
</script>

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

                         <div class="container d-flex py-5 bg-dark border my-2 rounded">
                              <div class="container p-2 w-100 border rounded" style="background-color:white;">
                                   <div class="d-flex flex-column justify-content-center align-items-center">
                                        <?php if(empty($member['profile_pic'])){?>
                                        <img src="img/images/default.jpg" alt="Default user profile image: a blank silhouette on a light background, representing a generic user without a personalized photo." class="rounded-circle border" height="180"
                                        width="180" />
                                             <?php }else{ ?>
                                        <img src="img/images/<?php echo $member['profile_pic']; ?>" class="rounded-circle border" alt="<?php echo $member['about']; ?>" height="180"
                                             width="180" />
                                             <?php } ?>
                              <h1 class="name mt-3 text-danger" style="font-size:1.8rem;">
                                   <?php echo $member['username']; ?>
                              </h1>
                              
                              
                                        <div class="d-flex flex-row justify-content-center align-items-center gap-2"> 
                                        </div>
                                        <span class="text-center">
                                             <i class="ri-flag-fill"></i>
                                             <?php echo $member['country']; ?>
                                        </span>
                                        <span style="font-size:8px;">Joined at
                                             <?php echo $member['datetime']; ?>
                                        </span>
                                        <span style="font-size:13px;"><i class="ri-cake-2-fill"></i>
                                        <?php echo $member['cake_day']; ?>
                                        </span>
                                        <div class="text mt-3"> 
                                             <span>
                                                  <?php echo $member['about']; ?>
                                             </span>
                                        </div>
                                        
                                        <!-- Activity count -Start -->
<div class="container py-2 px-2 my-2">
    <center>
        <b class="text-center"><?php echo htmlspecialchars($member['username']); ?>'s activity</b> <br>
        <?php 
        // Ensure database connection
        if ($conn) {
            // Fetch user data based on userId
            $sql_user = "SELECT username FROM `user` WHERE id = '{$userId}'";
            $run_query = mysqli_query($conn, $sql_user);
            
            if ($run_query && mysqli_num_rows($run_query) > 0) {
                $userr = mysqli_fetch_assoc($run_query);
                $userrname = htmlspecialchars($userr['username']);
                
                // Count categories created by the user
                $sql_count = "SELECT COUNT(*) AS total_rows FROM `catagory` WHERE created_by = '{$userrname}'";
                $result = mysqli_query($conn, $sql_count);
                if ($result && mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $disks = $row['total_rows'];
                    echo "Drives({$disks}) <br>";
                }

                // Count threads created by the user
                $sql_count = "SELECT COUNT(*) AS total_rows FROM `threads` WHERE thread_created_by = '{$userId}'";
                $result = mysqli_query($conn, $sql_count);
                if ($result && mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $threads = $row['total_rows'];
                    echo "Threads({$threads}) <br>";
                }

                // Count comments made by the user
                $sql_count = "SELECT COUNT(*) AS total_rows FROM `comments` WHERE comment_by = '{$userId}'";
                $result = mysqli_query($conn, $sql_count);
                if ($result && mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $comments = $row['total_rows'];
                    echo "Comments({$comments}) <br>";
                }

                // Calculate and display karma
                $karma = ($disks ?? 0) + ($threads ?? 0) + ($comments ?? 0);
                echo '<div><b class="text-danger" style="font-size:1.2rem;"><i class="ri-trophy-line"></i> Karma: </b><b style="font-size:1.2rem;">' . $karma . '</b></div>';
            } else {
                echo '<div class="alert alert-warning rounded-0" role="alert" style="font-size:15px;">User not found!</div>';
            }
        } else {
            echo '<div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">Database connection failed.</div>';
        }
        ?>
    </center>
</div>
<!-- Activity count -End -->



                                   </div>
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