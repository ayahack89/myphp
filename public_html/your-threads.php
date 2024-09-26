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
<div class="card rounded-0 shadow-sm border p-3 mb-3 mt-3" style="max-width: 600px; margin:auto;">
    <div class="d-flex align-items-center mb-3">
        <img src="img/images/<?php echo htmlspecialchars($user['profile_pic']); ?>" alt="Profile Image" class="rounded-circle me-3" width="40px" height="40px">
        <div>
            <h6 class="mb-0 text-dark"><?php echo htmlspecialchars($user['username']); ?></h6>
            <small class="text-muted">Posted on: <?php echo htmlspecialchars($thread['thread_time']); ?></small>
        </div>
    </div>
    <div class="card-body p-0">
        <h5 class="card-title mb-2"><?php echo htmlspecialchars($thread['thread_name']); ?></h5>
        <p class="card-text"><?php echo htmlspecialchars($thread['thread_desc']); ?></p>
        
        <?php if (!empty($thread['url'])) { ?>
            <a href="<?php echo htmlspecialchars($thread['url']); ?>" class="link-primary d-block mb-2">
                <i class="ri-external-link-fill"></i> <?php echo htmlspecialchars($thread['url']); ?>
            </a>
        <?php } ?>

        <?php if (!empty($thread['uploaded_image'])) { ?>
            <div class="text-center mb-3">
                <img src="img/upload/<?php echo htmlspecialchars($thread['uploaded_image']); ?>" class="img-fluid rounded shadow-sm" alt="Thread Image" style="max-width:100%;">
            </div>
        <?php } ?>

        <div class="d-flex justify-content-between align-items-center mt-3">
            
            <div>
                <a href="user-thread-edit-page.php?edit=<?php echo htmlspecialchars($thread['thread_id']); ?>" class="btn btn-outline-success btn-sm me-2">
                    <i class="ri-edit-box-line"></i> Edit
                </a>
                <a href="delete-your-threads.php?delete=<?php echo htmlspecialchars($thread['thread_id']); ?>" class="btn btn-outline-danger btn-sm">
                    <i class="ri-delete-bin-5-line"></i> Delete
                </a>
            </div>
        </div>
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