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
     .profile-pic {
        height: 150px;
        width: 150px;
        border-radius: 50%;
        object-fit: cover; 
        border: 3px solid #ccc;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s ease-in-out;
    }

    .profile-pic:hover {
        box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2); 
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

<div class="container d-flex flex-column py-4 my-3">
                        <!-- Profile Card -->
                        <center>
                            <div class=" shadow-sm rounded-lg border-0 bg-white">
                                <div class="card bg-white p-4">
                                    <div class="d-flex flex-column justify-content-center align-items-center text-center">

                                        <!-- Profile Image -->
                                        <?php if (empty($member['profile_pic'])) { ?>
                                            <img src="img/images/default.jpg" class="rounded-circle border mb-3"
                                                alt="Default Profile Picture" height="150" width="150" />
                                        <?php } else { ?>
                                             <img src="img/images/<?php echo $member['profile_pic']; ?>" class="profile-pic mb-3" alt="<?php echo $pro['about']; ?>" />
                                        <?php } ?>

                                        <!-- Username and Bio -->
                                        <h2 class="text-dark mt-3 mb-1"><?php echo $member['username']; ?></h2>
                                        <p class="text-muted mb-2"><strong><?php echo $member['about']; ?></strong></p>

                                        <!-- User Details -->
                                        <div class="d-flex justify-content-center gap-3">
                                            
                                            
                                        </div>
                                        <span class="text-muted">Joined at <?php echo $member['datetime']; ?></span>
                                        

                                        <!-- Education -->
                                        <div class="my-3 text-start">
                                        <span class="text-muted"><strong> <i class="ri-flag-fill"></i>Citizen </strong> <?php echo $pro['country']; ?></span><br>
                                        <span class="text-muted"><strong> <i class="ri-cake-2-fill"></i>Born at</strong> <?php echo $pro['cake_day']; ?></span><br>
                                        <?php 
                                            if(!empty($member['clg_university'])){
                                                echo '<span class="text-muted"><strong><i class="fas fa-university"></i> Studied at
                                        </strong>'.$member['clg_university'].'</span><br>';
                                            }else{

                                            }
                                            ?>
                                            <?php
                                            if (!empty($member['clg_university'])){
                                                if(!empty($member['school'])){
                                                    echo '<span class="text-muted"><strong><i class="fas fa-school"></i> Went to
                                                </strong>'.$member['school'].'</span><br>';

                                                }else{

                                                }
                                            }else{
                                                 if(!empty($member['school'])){
                                                    echo '<span class="text-muted"><strong><i class="fas fa-school"></i> Studied at 
                                                </strong>'.$member['school'].'</span>';

                                                }else{
                                                    
                                                }
                                            }
                                            ?>
                         <span class="text-muted"><strong> <i class="fas fa-user-tag"></i> I am a </strong> <?php echo $member['status']; ?></span><br>
                         <span class="text-muted"><strong> <i class="fas fa-search"></i> I am looking for a </strong> <?php echo $member['looking_for']; ?></span><br>
                         <span class="text-muted"><strong> <i class="fas fa-heart"></i> I have a interest in </strong> <?php echo $member['interest_in']; ?></span><br>

                                        
                                            
                                            
                                        </div>

                                        <!-- Activity Count -->
                                        <div class="w-100 mt-4">
                                            <h4 class="text-dark">Your Activities</h4>
                                            <div class="d-flex justify-content-around">
                                                <?php
                                                $user_id = $member['id'];

                                                // Drives
                                                $sql_count = "SELECT COUNT(*) AS total_rows FROM `catagory` WHERE created_by = '{$user_id}'";
                                                $result = mysqli_query($conn, $sql_count);
                                                $row = mysqli_fetch_assoc($result);
                                                $disks = $row['total_rows'];
                                                ?>
                                                <div>
                                                    <h5 class="text-primary"><?php echo $disks; ?></h5>
                                                    <p class="text-muted">Drives</p>
                                                </div>
                                                <?php
                                                // Threads
                                                $sql_count = "SELECT COUNT(*) AS total_rows FROM `threads` WHERE thread_user_id = '{$user_id}'";
                                                $result = mysqli_query($conn, $sql_count);
                                                $row = mysqli_fetch_assoc($result);
                                                $threads = $row['total_rows'];
                                                ?>
                                                <div>
                                                    <h5 class="text-primary"><?php echo $threads; ?></h5>
                                                    <p class="text-muted">Threads</p>
                                                </div>
                                                <?php
                                                // Comments
                                                $sql_count = "SELECT COUNT(*) AS total_rows FROM `comments` WHERE comment_by = '{$user_id}'";
                                                $result = mysqli_query($conn, $sql_count);
                                                $row = mysqli_fetch_assoc($result);
                                                $comments = $row['total_rows'];
                                                ?>
                                                <div>
                                                    <h5 class="text-primary"><?php echo $comments; ?></h5>
                                                    <p class="text-muted">Comments</p>
                                                </div>
                                            </div>

                                            <!-- Karma -->
                                            <?php
                                            $karma = $disks + $threads + $comments;
                                            ?>
                                            <div class="mt-3">
                                                <p class="text-danger" style="font-size:1.2rem;">
                                                    <i class="ri-trophy-line"></i> Karma: <strong><?php echo $karma; ?></strong>
                                                </p>
                                            </div>
                                        </div>
                                        

                                    </div>
                                </div>

                            </div>
                        </center>
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