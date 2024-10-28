<?php 
session_start();
include "db_connection.php";
if (!isset($_SESSION['username'])) {
    echo '<a href="login.php">Go to login</a>';
    exit;
}

$uid = $_SESSION['id'];
$sql = "SELECT * FROM `comments` WHERE tag_someone = '{$uid}'";
$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
    <style>
        /* Notification container */
        .notification-container {
            width: 90%;
            max-width: 500px;
            margin: 20px auto;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 10px;
            background-color: #f9f9f9;
        }

        /* Single notification */
        .notification {
            border-bottom: 1px solid #ddd;
            padding: 15px 10px;
        }

        .notification:last-child {
            border-bottom: none;
        }

        /* Notification text */
        .notification p {
            margin: 0;
            font-size: 16px;
            color: #333;
        }

        .notification strong {
            font-weight: bold;
            color: #0073e6;
        }

        .notification span {
            font-size: 14px;
            color: #777;
        }
    </style>
</head>
<body>

<div class="notification-container">
    <?php 
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="notification">
                <p><?php echo htmlspecialchars($row['comment_content']); ?></p>
                <span>Comment by <strong><?php echo htmlspecialchars($row['comment_by']); ?></strong> on post ID <strong><?php echo htmlspecialchars($row['thread_id']); ?></strong></span>
            </div>
        <?php }
    } else {
        echo "<p>No notifications found.</p>";
    }
    ?>
</div>

</body>
</html>
