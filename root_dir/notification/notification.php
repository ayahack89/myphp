<?php
session_start();
include "../db/db_connection.php";

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    echo '<a href="login.php">Go to login</a>';
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="google-site-verification" content="2MFbMdbyunwBJ4iibPaO_wI5PoMj08UC1i-W3iTEO1U" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "../include/bootstrapcss-and-icons.php"; ?>
    <link rel="icon" type="image/x-icon" href="img/background/agguoralogo.jpg">
    <title>Notifications</title>
    <?php include "../include/fonts.php"; ?>
    <style>
        /* Additional styles if needed */
        .notification-container {
            max-width: 600px;
            margin: 20px auto;
        }

        .notification p {
            margin-bottom: 0.2rem;
        }
    </style>
</head>
<body class="bg-light">
<?php
$uid = $_SESSION['id'];

$query = "
    SELECT comments.comment_content, user.username, threads.thread_name, comments.thread_id
    FROM comments
    JOIN user ON comments.comment_by = user.id
    JOIN threads ON comments.thread_id = threads.thread_id
    WHERE comments.tag_someone = '{$uid}'
";

$result = mysqli_query($conn, $query);
?>

<div class="container notification-container">
    <h2 class="container my-4">Notifications</h2>
    <div class="list-group">
        <?php
        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) { ?>
                <a href="../main/thread.php?thread=<?php echo $row['thread_id']; ?>"
                   class="list-group-item list-group-item-action d-flex justify-content-between align-items-start text-decoration-none">
                    <div class="ms-2 me-auto">
                        <p class="mb-1"><?php echo htmlspecialchars($row['comment_content']); ?></p>
                        <small class="text-muted">Comment by <strong class="text-danger"><?php echo htmlspecialchars($row['username']); ?></strong> on post <strong><?php echo htmlspecialchars($row['thread_name']); ?></strong></small>
                    </div>
                    <span class="badge bg-danger rounded-pill">View</span>
                </a>
            <?php }
        } else {
            echo '<div class="list-group-item text-center">No notifications found.</div>';
        }
        ?>
    </div>
</div>


    <?php include "../include/bootstrapjs.php"; ?>
</body>

</html>