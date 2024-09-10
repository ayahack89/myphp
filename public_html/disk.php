<?php
include "db_connection.php";
session_start();
ini_set('display_errors', 0);

?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <?php include "bootstrapcss-and-icons.php"; ?>
     <?php
     $get_id = mysqli_real_escape_string($conn, $_GET['Disk']);
     $sql = "SELECT * FROM `catagory` WHERE catagory_id = '{$get_id}'";
     $result = mysqli_query($conn, $sql);
     if($result && mysqli_num_rows($result)){
         $dec=mysqli_fetch_assoc($result);
     ?>
     <meta name="description" content="<?php echo $dec['catagory_desc']; ?>">
     
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
     
<title><?php echo $dec['catagory_name']; ?> | Agguora Categories | Agguora</title>
     <?php } ?>
     
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
<style></style>

<body class="bg-light">
     <?php include "header.php"; ?>
     <!-- View Disk Hero -Start   -->
     <?php
     $disk_id = htmlspecialchars(mysqli_real_escape_string($conn, $_GET['Disk']));
     $sql_query = "SELECT * FROM `catagory` WHERE catagory_id = '{$disk_id}'";
     $result = mysqli_query($conn, $sql_query);
     if ($result) {
          if (mysqli_num_rows($result) > 0) {
               while ($disk = mysqli_fetch_assoc($result)) {
                    ?>

                    <div class="container px-2 py-2 col-md-6 ">
                         <div class="card text-center rounded border">
                              <div class="card-header">
                                   <?php if (!empty($disk['created_by'])) { ?>
    Created by
    <?php 
    $userid = $disk['created_by'];
    $sql_query = "SELECT * FROM `user` WHERE id = '{$userid}'";
    $retrieve = mysqli_query($conn, $sql_query);
    if ($retrieve && mysqli_num_rows($retrieve) > 0) {
        $row = mysqli_fetch_assoc($retrieve);
        ?>
        <b><a href="allprofile.php?user=<?php echo $row['id']; ?>" style="text-decoration:none;" class="text-dark"><?php echo $row['username']; ?></a></b>
    <?php
    } else {
        echo "<span style='color:gray;'>User not found : (<span>";
    }
} ?>

                        </div>
                              <div class="card border rounded-0">
    <div class="card-body">
        <h2 class="card-title text-danger mb-4"><?php echo htmlspecialchars($disk['catagory_name']); ?></h2>
        <p class="card-text"><?php echo htmlspecialchars($disk['catagory_desc']); ?></p>
        <a href="drives.php" class="btn btn-outline-dark mt-3"><i class="ri-arrow-go-back-line"></i> Go Back</a>
    </div>
</div>

    <div class="card-footer text-body-secondary">
                <!-- Thread Count -Start  -->
                              <?php 
                              $sql_count = "SELECT COUNT(*) AS total_rows FROM threads WHERE thread_catagory_id = '{$disk_id}'";
                              $result = mysqli_query($conn, $sql_count);
                              if ($result && mysqli_num_rows($result) > 0) {
                                   $row = mysqli_fetch_assoc($result);?>
                              <b style="font-size:15px; font-weight:lighter;">   <?php echo $disk['created']; ?> &#183; <i class="ri-earth-line" style="font-weight:light; font-size:15px;"></i><br>
                              <?php echo $row['total_rows']; ?> &#183; post</b><br>
                              <?php }?>
                              <!-- Thread Count -End  -->

                          <!-- **Like btn is unded development process**  -->
                              <!-- Like count -Start  -->
                              <!-- <div id="likeContainer<?php echo $disk['catagory_id']; ?>" class="d-flex align-items-center justify-content-center" style="width: 100px; height: 50px; border: 1px solid #ccc;">
                              <button id="likeButton<?php echo $disk['catagory_id']; ?>" onclick="setLikeDislike('like', '<?php echo $disk['catagory_id']; ?>')" class="btn btn-danger rounded-0 mx-2">Like</button>
                              <span id="likeCount<?php echo $disk['catagory_id']; ?>" style="font-size:1rem;"><?php echo $disk['count']; ?></span>
                              </div> -->
                              <!-- Like count -End  -->

                              </div>
                              
                         </div>
                    </div>
                    <!-- View Disk Hero -End  -->
                    
                    <!-- Thread form start -->
<div class="container py-3">
    <?php
    $alert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if ($method == 'POST') {
        $get_id = htmlspecialchars(mysqli_real_escape_string($conn, $_GET['Disk']));
        if (isset($_POST['submit'])) {
            // Input details
            $topic_name = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['topic']));
            $topic_desc = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['topic_desc']));
            $url = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['url']));
            // Image file handling
            $image_name = $_FILES['image']['name'];
            $tmp_name = $_FILES['image']['tmp_name'];
            $image_error = $_FILES['image']['error'];
            $image_size = $_FILES['image']['size'];
            // Image file path destination
            $image_path_destination = "img/upload/";
            // Generate unique filename
            $image_new_name = uniqid('', true) . '_' . $image_name;

           
                // Check if image is provided
                if (!empty($image_name)) {
                    // Check file size and type
                    $allowed_types = array('jpg', 'jpeg', 'png', 'gif');
                    $image_extension = strtolower(pathinfo($image_new_name, PATHINFO_EXTENSION));
                    if ($image_size > 0 && in_array($image_extension, $allowed_types)) {
                        if ($image_size <= 999998) {
                            // Upload the file
                            if (move_uploaded_file($tmp_name, $image_path_destination . $image_new_name)) {
                                // Insert data into database
                                $username = $_SESSION['username'];
                                $sqlquery = "SELECT * FROM `user` WHERE username = '{$username}'";
                                $user = mysqli_query($conn, $sqlquery);
                                if (mysqli_num_rows($user) > 0) {
                                    $user_account = mysqli_fetch_assoc($user);
                                    $thread_user_id = $user_account['id'];
                                    $sql_query = "INSERT INTO `threads` (`thread_name`, `thread_desc`, `thread_catagory_id`, `thread_user_id`,  `uploaded_image`, `url`) VALUES ('{$topic_name}', '{$topic_desc}', '{$get_id}', '{$thread_user_id}', '{$image_new_name}', '{$url}' )";
                                    $result = mysqli_query($conn, $sql_query);
                                    if ($result) {
                                        $alert = true;
                                    } else {
                                        echo '<div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">Oops! Something went wrong :(</div>';
                                    }
                                } else {
                                    echo '<div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">User not found :(</div>';
                                }
                            } else {
                                echo '<div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">Sorry, there was an error uploading your file :(</div>';
                            }
                        } else {
                            echo '<div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">File size exceeds limit!</div>';
                        }
                    } else {
                        echo '<div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">Only JPG, JPEG, PNG, and GIF files are allowed!</div>';
                    }
                } else {
                    // Insert data into database without image
                    $username = $_SESSION['username'];
                    $sqlquery = "SELECT * FROM `user` WHERE username = '{$username}'";
                    $user = mysqli_query($conn, $sqlquery);
                    if (mysqli_num_rows($user) > 0) {
                        $user_account = mysqli_fetch_assoc($user);
                        $thread_user_id = $user_account['id'];
                        $sql_query = "INSERT INTO `threads` (`thread_name`, `thread_desc`, `thread_catagory_id`, `thread_user_id`, `thread_created_by`, `url`) VALUES ('{$topic_name}', '{$topic_desc}', '{$get_id}', '{$thread_user_id}', '{$username}', '{$url}');";
                        $result = mysqli_query($conn, $sql_query);
                        if ($result) {
                            $alert = true;
                        } else {
                            echo '<div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">Oops! Something went wrong :(</div>';
                        }
                    } else {
                        echo '<div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">User not found :(</div>';
                    }
                }
        }
    }
    // Success message -start
    if ($alert) {
        echo '<div id="alertMsg" class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your thread has been added successfully. Wait for community response.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
        echo '<script>
        setTimeout(function() {
            document.getElementById("alertMsg").style.display = "none";
            window.location="disk.php?Disk=' . $get_id . '";
        }, 2000);
    </script>';
    }
    ?>

    <h3>Add New Post</h3>

<?php if (isset($_SESSION['username'])) { ?>
    <form action="<?php echo htmlentities($_SERVER['REQUEST_URI']); ?>" method="post" enctype="multipart/form-data" class="border rounded py-4 px-4">
        <div class="mb-3">
            <?php 
            $username = $_SESSION['username'];
            $sql = "SELECT * FROM `user` WHERE username = '{$username}'";
            $res = mysqli_query($conn, $sql);
            if($res && mysqli_num_rows($res) > 0){
                $user=mysqli_fetch_assoc($res); ?>
            <input type="hidden" value="<?php echo $user['id']; ?>">
            <?php } ?>
        </div>
        <div class="mb-3">
            <label for="topic" class="form-label">Heading</label>
            <input type="text" class="form-control" id="topic" name="topic">
        </div>
        <div class="mb-3">
            <label for="topic_desc" class="form-label">Description (optional)</label>
            <textarea class="form-control" id="topic_desc" rows="3" name="topic_desc"></textarea>
        </div>
        <div class="mb-3">
            <label for="url" class="form-label">URL (optional)</label>
            <div class="input-group">
                <span class="input-group-text"><i class="ri-links-line"></i></span>
                <input type="text" class="form-control" id="url" name="url">
            </div>
            <div class="form-text">Provide a valid URL if needed.</div>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Upload Image (optional)</label>
            <input class="form-control" type="file" name="image" id="image">
        </div>
        <div class="mb-3 text-center">
            <button type="submit" name="submit" class="btn btn-outline-danger">Upload <i class="ri-upload-cloud-line"></i></button>
        </div>
    </form>
        <!-- Thread form -End -->

        <!-- Alert message if you are not logged in ... -start -->
    <?php } else { ?>
        <div class="alert alert-danger d-flex align-items-center" role="alert">
            <div>
                <i class="ri-alert-fill"></i> You are not logged in! Please <a href="login.php" style="color:maroon;">log in</a> to start a discussion.
            </div>
        </div>
    <?php } ?>
    <!-- Alert message if you are not logged in ... -end -->

</div>
<!-- Thread form end -->



                    
<!-- Thread list -Start -->

<div class="mb-5 py-2">
<div class="container my-3">
    <h3><b>Browse recent posts</b></h3>
</div>

<?php
    }
} else {
    echo '<div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">Invalid Disk ID!</div>';
}
} else {
    echo '<div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">Oops! Something went wrong :(</div>';
}
?>

<!-- Thread list -Start -->
<?php
$disk_id = intval($_GET['Disk'] ?? 0); 
$sql_query = "SELECT t.*, u.username, u.profile_pic FROM threads t LEFT JOIN user u ON t.thread_user_id = u.id WHERE t.thread_catagory_id = '{$disk_id}' ORDER BY t.thread_time DESC";
$result = mysqli_query($conn, $sql_query);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        while ($thread = mysqli_fetch_assoc($result)) {
            ?>
            
            <div class="container my-4">
                <div class="card shadow-sm border-0 col-md-6 rounded" style="margin:auto;">
                    <div class="card-body d-flex">
                        <div class="mr-3">
                            <a href="allprofile.php?user=<?php echo $thread['thread_user_id']; ?>">
                                <img src="img/images/<?php echo !empty($thread['profile_pic']) ? $thread['profile_pic'] : 'default.jpg'; ?>" alt="<?php echo $thread['username']; ?>" class="rounded-circle" style="width: 50px; height: 50px;">
                            </a>
                        </div>
                        <div class="flex-grow-1">
                            <h5 class="card-title mb-1">
                                <a href="allprofile.php?user=<?php echo $thread['thread_user_id']; ?>" class="text-dark text-decoration-none">
                                    <b class="mx-2"><?php echo $thread['username']; ?></b>
                                </a>
                            </h5>
                            <p class="card-text text-muted small mb-2 mx-2">
                                Posted at: <?php echo $thread['thread_time']; ?> &#8226; <i class="ri-earth-line" style="font-size:12px;"></i>
                            </p>
                            <a href="thread.php?thread=<?php echo $thread['thread_id']; ?>" class="text-dark text-decoration-none">
                                <h6 class="card-subtitle mb-2 mx-2"><?php echo $thread['thread_name']; ?></h6>
                            </a>
                            <p class="card-text mb-3 mx-2">
                                <?php echo strlen($thread['thread_desc']) > 100 ? substr($thread['thread_desc'], 0, 100) . '... <a class="text-dark" href="thread.php?thread=' . $thread['thread_id'] . '"style="text-decoration:none;"><strong>read more</strong></a>' : $thread['thread_desc']; ?>
                            </p>
                            <?php if (!empty($thread['url'])) { ?>
                                <a href="<?php echo $thread['url']; ?>" target="_blank" class="card-link"><i class="ri-external-link-fill"></i> Visit Link</a><br>
                            <?php } ?>
                            <?php if (!empty($thread['uploaded_image'])) { ?>
                                <a href="thread.php?thread=<?php echo $thread['thread_id']; ?>">
                                    <img src="img/upload/<?php echo $thread['uploaded_image']; ?>" class="img-fluid mb-2 rounded" alt="<?php echo $thread['thread_name']; ?>" width="5000px" height="5000px">
                                </a>
                                <?php 
                                $comment_count_query = "SELECT COUNT(*) as total_row FROM `comments` WHERE thread_id = '{$thread['thread_id']}'";
                                $comment_count_result = mysqli_query($conn, $comment_count_query);
                                if ($comment_count_result && mysqli_num_rows($comment_count_result) > 0) {
                                    $comment_count = mysqli_fetch_assoc($comment_count_result);
                                    echo '<br><span><a href="thread.php?thread='.$thread['thread_id'].'" class="text-dark" style="text-decoration:none;"><i class="ri-chat-3-line"></i> '.$comment_count['total_row'].'	&#8226; comments</a></span>';
                                }
                                ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    } else {
        ?>
        <div class="container mt-4">
            <div class="alert alert-info rounded-0" role="alert">
                <h4 class="alert-heading">No Results Found :(</h4>
                <p class="mb-0">Be the first person to add a topic.</p>
            </div>
        </div>
        <?php
    }
} else {
    ?>
    <div class="container mt-4">
        <div class="alert alert-danger rounded-0" role="alert">
            <h4 class="alert-heading">Oops! Something Went Wrong :(</h4>
            <p class="mb-0">Please try again later.</p>
        </div>
    </div>
<?php } ?>
</div>
<!-- Thread list -End -->



     <?php include "bottom-nav.php"; ?>
     <?php include "bootstrapjs.php"; ?>
    
</body>

</html>