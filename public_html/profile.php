<?php 
session_start();
if(!isset($_SESSION['username'])){
echo 'Opps! atfirst you need to <a href="login.php">login</a> & proof that you are a true member.';
}else{ ?>
<?php
include "db_connection.php";
ini_set('display_errors', 0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <meta name="description" content="Login in and create your user account | Profile | Agguora">
     <?php include "bootstrapcss-and-icons.php"; ?>
     
<!--DNS Prefetching & Prefetching  -->
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
     $username = $_SESSION['username'];
     $sq = "SELECT * FROM `user` WHERE username = '{$username}'";
     $result = mysqli_query($conn, $sq);
     if($result && mysqli_num_rows($result) > 0){
         $rows = mysqli_fetch_assoc($result);
     ?>
     <title><?php echo $rows['username']; ?> | Agguora</title>
     <?php } ?>

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
     <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-YXXL0NCGLE"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-YXXL0NCGLE');
</script>

</head>
<body class="bg-light">
    <?php include "header.php"; ?>

    <?php
    $username = $_SESSION['username'];
    $sql_query = "SELECT * FROM `user` WHERE username = '$username'";
    $result = mysqli_query($conn, $sql_query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            while ($pro = mysqli_fetch_assoc($result)) {
                ?>
                <div class="container d-flex flex-column py-5 bg-dark my-3 rounded shadow-lg">
                    <div class="container p-4 w-100 border rounded shadow bg-white">
                        <div class="d-flex flex-column justify-content-center align-items-center text-center">
                            <!-- Profile Image -->
                            <?php if(empty($pro['profile_pic'])){ ?>
                                <img src="img/images/default.jpg" class="rounded-circle border mb-3" alt="Default Profile Picture" height="150" width="150" />
                            <?php } else { ?>
                                <img src="img/images/<?php echo $pro['profile_pic']; ?>" class="rounded-circle border mb-3" alt="<?php echo $pro['about']; ?>" height="150" width="150" />
                            <?php } ?>
                            
                            <!-- Online Status -->
                            <?php if (isset($_SESSION['username'])) { ?>
                                <span class="text-success"><i class="ri-earth-line"></i> Online</span>
                            <?php } else { ?>
                                <span class="text-secondary">Sleeping</span>
                            <?php } ?>

                            <!-- User Details -->
                            <h1 class="text-danger mt-2" style="font-size:1.8rem;"><?php echo $pro['username']; ?></h1>
                            <div class="d-flex justify-content-center gap-3">
                                <span class="badge bg-primary">#<?php echo $pro['id']; ?></span>
                                <span><i class="ri-flag-fill"></i> <?php echo $pro['country']; ?></span>
                            </div>
                            <span class="text-muted">Joined at <?php echo $pro['datetime']; ?></span>
                            <span><i class="ri-cake-2-fill"></i> <?php echo $pro['cake_day']; ?></span>
                            <p class="text-muted"><strong></strong><?php echo $pro['about']; ?></p>

                            <!-- About, School, and University -->
                            <div class="mt-3">
                                
                                <p class="text-muted"><strong>School: </strong><?php echo $pro['school']; ?></p>
                                <p class="text-muted"><strong>University: </strong><?php echo $pro['clg_university']; ?></p>
                            </div>

                            <!-- Status and Interests -->
                            <div class="mt-3">
                                <p class="text-muted"><strong>Status: </strong><?php echo $pro['status']; ?></p>
                                <p class="text-muted"><strong>Looking for: </strong><?php echo $pro['looking_for']; ?></p>
                                <p class="text-muted"><strong>Interests: </strong><?php echo $pro['interest_in']; ?></p>
                            </div>

                            <!-- Activity Count -->
                            <div class="container py-2 mt-3 text-center">
                                <h4 class="text-dark">Your Activities</h4>
                                <?php
                                // Activity count logic
                                $username = $_SESSION['username'];
                                $user_db = "SELECT * FROM `user` WHERE username= '{$username}'";
                                $run = mysqli_query($conn, $user_db);
                                if ($run && mysqli_num_rows($run) > 0) {
                                    $u = mysqli_fetch_assoc($run);
                                    $user_id = $u['id'];

                                    // Count drives
                                    $sql_count = "SELECT COUNT(*) AS total_rows FROM `catagory` WHERE created_by = '{$user_id}'";
                                    $result = mysqli_query($conn, $sql_count);
                                    if ($result && mysqli_num_rows($result) > 0) {
                                        $row = mysqli_fetch_assoc($result);
                                        $disks = $row['total_rows'];
                                        echo "<p>Drives ({$disks})</p>";
                                    }

                                    // Count threads
                                    $sql_count = "SELECT COUNT(*) AS total_rows FROM `threads` WHERE thread_user_id = '{$user_id}'";
                                    $result = mysqli_query($conn, $sql_count);
                                    if ($result && mysqli_num_rows($result) > 0) {
                                        $row = mysqli_fetch_assoc($result);
                                        $threads = $row['total_rows'];
                                        echo "<p>Threads ({$threads})</p>";
                                    }

                                    // Count comments
                                    $sql_count = "SELECT COUNT(*) AS total_rows FROM `comments` WHERE comment_by = '{$user_id}'";
                                    $result = mysqli_query($conn, $sql_count);
                                    if ($result && mysqli_num_rows($result) > 0) {
                                        $row = mysqli_fetch_assoc($result);
                                        $comments = $row['total_rows'];
                                        echo "<p>Comments ({$comments})</p>";

                                        // Calculate and display karma
                                        $karma = $disks + $threads + $comments;
                                        echo "<p class='text-danger' style='font-size:1.2rem;'><i class='ri-trophy-line'></i> Karma: <strong>{$karma}</strong></p>";
                                    }
                                }
                                ?>
                            </div>

                            <!-- Account Settings Dropdown -->
                            <div class="d-flex mt-3">
                                <button class="btn btn-dark btn-sm dropdown-toggle rounded" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="ri-user-settings-fill"></i> Account Settings
                                </button>
                                <ul class="dropdown-menu text-light px-3 py-3 bg-dark rounded">
                                    <li><a href="editprofile.php?update=<?php echo $pro['id']; ?>" class="dropdown-item">Edit Profile</a></li>
                                    <li><a href="editprofile-image.php?update=<?php echo $pro['id']; ?>" class="dropdown-item">Change Profile Image</a></li>
                                    <li><a href="resetpassword.php" class="dropdown-item">Change Password</a></li>
                                    <li><a href="profile.php?action=delete" class="dropdown-item">Delete Profile</a></li>
                                    <hr>
                                    <li><a href="your-disks.php" class="dropdown-item">Your Drives</a></li>
                                    <li><a href="your-threads.php" class="dropdown-item">Your Threads</a></li>
                                    <li><a href="your-comments.php" class="dropdown-item">Your Comments</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
            }
        } else {
            ?>
            <script>window.location.href="index.php";</script>
            <?php
        }
    }
    ?>

     <?php include "footer.php"; ?>
     <?php include "bootstrapjs.php"; ?>

</body>
</html>
<?php } ?>