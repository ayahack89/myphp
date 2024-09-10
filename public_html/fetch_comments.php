<!-- Latest jQuery library CDN -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha384-oP9JhO9Id8yqmbuRIxA7zRFTT7tkIC+tR7PPI2yQn4AoOsKu5uw0Wf5wlT4ZKx5R" crossorigin="anonymous"></script>

<?php
include 'db_connection.php'; // Make sure to include your database connection file

$thread_id = mysqli_real_escape_string($conn, $_GET['thread_id']);
$sql_query = "SELECT * FROM `comments` WHERE thread_id = '{$thread_id}' ORDER BY comment_time ASC";
$result = mysqli_query($conn, $sql_query);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        while ($thread = mysqli_fetch_assoc($result)) {
            $comment_id = $thread['comment_id'];
            $comment_content = $thread['comment_content'];
            $comment_by = $thread['comment_by'];
            $comment_time = $thread['comment_time'];
            $sql = "SELECT * FROM `user` WHERE id = '{$comment_by}'";
            $run = mysqli_query($conn, $sql);
            if ($run && mysqli_num_rows($run) > 0) {
                $user = mysqli_fetch_assoc($run);
                ?>
                <div class="mb-5 py-2">
                    <div class="container d-flex align-items-start bg-light py-2 px-4">
                        <div class="px-3">
                            <a href="allprofile.php?user=<?php echo $user['id']; ?>">
                                <?php if (!empty($user['profile_pic'])) { ?>
                                    <img src="img/images/<?php echo $user['profile_pic']; ?>" alt="<?php echo $user['about']; ?>" width="50px" height="50px" class="rounded-circle">
                                <?php } else { ?>
                                    <img src="img/images/default.jpg" alt="Default gray profile icon on white background." width="50px" height="50px" class="rounded-circle">
                                <?php } ?>
                            </a>
                        </div>
                        <div class="text">
                            <h6 style="font-weight:bolder;">
                                <a href="allprofile.php?user=<?php echo $user['id']; ?>" style="color:black; text-decoration:none;">
                                    <?php echo $user['username']; ?>
                                </a>
                                <?php if (!empty($thread['tag_someone'])) {
                                    $sql = "SELECT * FROM `user` WHERE username = '{$thread['tag_someone']}'";
                                    if (mysqli_query($conn, $sql) && mysqli_num_rows(mysqli_query($conn, $sql))) {
                                        $tag_user = mysqli_fetch_assoc(mysqli_query($conn, $sql)); ?>
                                        <span class="text-secondary" style="font-weight:lighter; font-size:15px;">replied to</span>
                                        <a href="allprofile.php?user=<?php echo $tag_user['id'] ?>" style="color:black; text-decoration:none;">
                                            <?php echo $thread['tag_someone'] ?>
                                        </a>
                                    <?php } ?>
                                <?php } ?>
                                <br>
                                <small class="text-muted">
                                    <?php
                                    $commentTime = new DateTime($thread['comment_time'], new DateTimeZone('UTC'));
                                    $commentTime->setTimezone(new DateTimeZone('Asia/Kolkata'));
                                    echo $commentTime->format('Y-m-d H:i:s');
                                    ?>
                                </small>
                            </h6>
                            <p><?php echo $thread['comment_content']; ?></p>
                        </div>
                    </div>
                </div>
                <?php
            } else { ?>
                <div class="mb-5 py-2">
                    <div class="container border px-2 py-2">
                        <b class="text-secondary" style="font-weight:lighter;">User not found :(</b>
                    </div>
                </div>
            <?php }
        }
    } else { ?>
        <div class="mb-5 py-2">
            <div class="container px-4">
                <h2>No Comments Found :(</h2>
                <p style="font-size:12px;">Be the first person to add a comment...</p>
            </div>
        </div>
    <?php }
} else {
    echo '<div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">Oops! Something went wrong :(</div>';
}
?>
