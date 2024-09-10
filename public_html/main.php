<?php
include "db_connection.php";
session_start();
ini_set('display_errors', 0);
date_default_timezone_set('Asia/Kolkata');
$row = ['thread_time' => '2024-06-12 08:00:00'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="google-site-verification" content="2MFbMdbyunwBJ4iibPaO_wI5PoMj08UC1i-W3iTEO1U" />
     <meta name="description" content="Find some privacy? You are in the right place. Join us now share your thoughts and be an active user in this community & collect sweets karmas...">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

<title>Best Online Community | Agguora</title>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-YXXL0NCGLE"></script>
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-YXXL0NCGLE');
</script>

</head>
<?php include "fonts.php"; ?>
<style>
     :root {
          --success-result: #86efac;
     }
     .div-hover:hover{
         background-color:whitesmoke;
         border-radius:10px;
         cursor: pointer;
     }
  
        .scroll-c {
            height: 85vh;
            overflow-y: auto;
        }
        .scroll-c::-webkit-scrollbar {
  display: none;
}
        .thread-card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .thread-card img {
            max-width: 100%;
            height: auto;
        }
        
     @media only screen and (max-width: 1000px) {
    .media-flex {
        display: flex;
        flex-wrap: wrap; 
        
    }
}

   
</style>

<body class="bg-light">
<?php include "header.php"; ?>

<div class="mb-5 py-2">
<div class="col-md-6 d-flex row media-flex" style="margin:auto;">
<div class=" d-flex row" style="margin:auto;" id="content">
         
<!-- Media card -Start -->

<div class="section1">
    <div class="scroll-c mt-2">
        <div class="mb-5 mt-1">
        <?php 
$sql = "SELECT * FROM `threads` ORDER BY thread_time DESC";
$result = mysqli_query($conn, $sql);
if($result && mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $thread_created_by = $row['thread_user_id'];
        $sqq = "SELECT * FROM `user` WHERE id = '{$thread_created_by}'";
        $run_ql = mysqli_query($conn, $sqq);
        if($run_ql && mysqli_num_rows($run_ql) > 0) {
            $user = mysqli_fetch_assoc($run_ql);
            echo '<div class="rounded mb-2 ">';
            echo '<div class="d-flex align-items-center mb-2">';
            echo '<a href="allprofile.php?user='.$user['id'].'" class="text-dark" style="text-decoration:none;">';
            if(!empty($user['profile_pic'])){
                echo '<img src="img/images/'. $user['profile_pic'].'" alt="'. $user['about'].'" width="50px" height="50px" class="rounded-circle">';
            } else { 
                echo '<img src="img/images/default.jpg" alt="Default gray profile icon on white background." width="50px" height="50px" class="rounded-circle">';
            }
            echo '</a>';
            echo '<div class="ms-2">';
            echo '<a href="allprofile.php?user='. $user['id'].'" class="text-dark" style="text-decoration:none;">';
            echo '<span class="fw-bold" style="font-size: 1.1rem;">'. $user['username'].'</span>';
            echo '</a>';

            // Convert the thread time to Asia/Kolkata time zone
            $datetime = new DateTime($row['thread_time'], new DateTimeZone('UTC'));
            $datetime->setTimezone(new DateTimeZone('Asia/Kolkata'));
            $formattedTime = $datetime->format('Y-m-d H:i:s');
            echo '<div class="text-muted" style="font-size: 0.8rem;">' . $formattedTime . ' &#8226; <i class="ri-earth-line"></i></div>';

            echo '</div>';
            echo '</div>';

            echo '<a href="thread.php?thread='.$row['thread_id'].'" class="text-dark" style="text-decoration:none;">';
            echo '<h5>'.$row['thread_name'].'</h5>';
            echo '</a>';

            $thread_desc = $row['thread_desc'];
            $max_length = 80;
            if (strlen($thread_desc) > $max_length) {
                $thread_desc = substr($thread_desc, 0, $max_length) . '<a href="thread.php?thread='.$row['thread_id'].'" class="text-dark" style="text-decoration:none;">. . .<strong>read more</strong></a>'; 
            }
            echo '<p style="font-size:14px">'.$thread_desc.'</p>';

            if (!empty($row['uploaded_image'])) {
                
                echo '<span style="font-size:10px;" class="text-secondary"><i class="ri-timer-2-line text-secondary" style="font-size:10px;"></i> Recent posts</span><a href="thread.php?thread='.$row['thread_id'].'"style="text-decoration:none;"><img src="img/upload/'.$row['uploaded_image'].'" class="img-fluid rounded mb-2" alt="'.$row['thread_name'].'" width="5000px" height="5000px"></a>';
            }

            echo '<div class="d-flex justify-content-between align-items-center">';
            echo '<div>';
            // Add other media reaction buttons (like, share, etc.) here
            echo '</div>';
            echo '<div>';
            $thread_id = $row['thread_id'];
            $sql = "SELECT COUNT(*) as total_row FROM `comments` WHERE thread_id = '{$thread_id}'";
            $comment_result = mysqli_query($conn, $sql);
            if($comment_result && mysqli_num_rows($comment_result)) {
                $comments_count = mysqli_fetch_assoc($comment_result);
                echo '<span><a href="thread.php?thread='.$row['thread_id'].'" class="text-dark" style="text-decoration:none;"><i class="ri-chat-3-line"></i> '.$comments_count['total_row'].' &#183; Comments </a></span>';
            }
            echo '</div>';
            echo '</div>';

            echo '</div>';
        }
    }
}
?>
</div>
    </div>
</div>
<!-- Media card -End -->

</div>
</div>

<?php include "bottom-nav.php"; ?>
</div>
     <?php include "bootstrapjs.php"; ?>
</body>

</html>