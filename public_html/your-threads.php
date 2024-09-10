<?php 
session_start();
if(!isset($_SESSION['username'])){
echo 'Opps! atfirst you need to <a href="login.php">login</a> & proof that you are a true member.';
}else{ ?>
<?php
include "db_connection.php";
ini_set('display_error', 0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <?php include "bootstrapcss-and-icons.php"; ?>
     
     <link rel="icon" type="image/x-icon" href="img/background/agguoralogo.jpg">
     <title>Threads Activity | Agguora</title>
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

<body>
     <?php include "header.php"; ?>
 <!-- All threads section - Start -->
<?php
// Ensure database connection
if ($conn) {
    $username = $_SESSION['username'];
    
    // Fetch user data based on username
    $sql = "SELECT * FROM `user` WHERE username = '{$username}'";
    $result = mysqli_query($conn, $sql);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $thread_created_by = $user['id'];
        
        // Fetch threads created by the user
        $sq = "SELECT * FROM `threads` WHERE thread_user_id = '{$thread_created_by}' ORDER BY thread_time DESC";
        $result = mysqli_query($conn, $sq);
        
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                while ($thread = mysqli_fetch_assoc($result)) {
?>
                    <!-- Thread box - Start -->
                    <div class="card rounded-0">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($thread['thread_name']); ?></h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary">
                                <b style="color:black;"><?php echo '@' . htmlspecialchars($user['username']); ?></b><br>
                                <b style="font-weight:lighter; font-size:12px;"><?php echo htmlspecialchars($thread['thread_time']); ?></b>
                            </h6>
                            <p class="card-text"><?php echo htmlspecialchars($thread['thread_desc']); ?></p>
                            <?php if (!empty($thread['url'])) { ?>
                                <a href="<?php echo htmlspecialchars($thread['url']); ?>" class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">
                                    <i class="ri-external-link-fill"></i><?php echo htmlspecialchars($thread['url']); ?>
                                </a>
                            <?php } ?>
                            <br><br>
                            <img src="img/upload/<?php echo htmlspecialchars($thread['uploaded_image']); ?>" class="img-thumbnail" alt="" width="200vw"><br>
                            <a href="user-thread-edit-page.php?edit=<?php echo htmlspecialchars($thread['thread_id']); ?>" class="card-link text-success" style="text-decoration:none;">
                                <i class="ri-edit-box-line"></i>
                            </a>
                            <a href="delete-your-threads.php?delete=<?php echo htmlspecialchars($thread['thread_id']); ?>" class="card-link text-danger" style="text-decoration:none;">
                                <i class="ri-delete-bin-5-line"></i>
                            </a>
                        </div>
                    </div>
                    <!-- Thread box - End -->
<?php
                }
            } else {
                echo '<div class="alert alert-warning rounded-0" role="alert" style="font-size:15px;">No threads found!</div>';
            }
        } else {
            // Display error message if the thread query fails
            echo '<div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">Error fetching threads: ' . mysqli_error($conn) . '</div>';
        }
    } else {
        // Display error message if the user query fails
        echo '<div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">Error fetching user data: ' . mysqli_error($conn) . '</div>';
    }
} else {
    // Display error message if the database connection fails
    echo '<div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">Database connection failed.</div>';
}
?>
<!-- All threads section - End -->


     <?php include "footer.php"; ?>
     <?php include "bootstrapjs.php"; ?>
</body>
</html>
<?php } ?>