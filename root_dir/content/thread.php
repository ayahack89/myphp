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
    <?php
    $thread_id = mysqli_real_escape_string($conn, $_GET['thread']);
    $sql_query = "SELECT * FROM `threads` WHERE thread_id = '{$thread_id}'";
    $result = mysqli_query($conn, $sql_query);
    if ($result && mysqli_num_rows($result) > 0) {
        $th = mysqli_fetch_assoc($result);
        ?>
        <meta name="description"
            content="<?php echo $th['thread_name']; ?>.. Discover a vibrant hub of discussion with our diverse range of threads! Stay informed with the latest updates, connect with fellow enthusiasts, and elevate your game to new heights...">

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

        <title><?php echo $th['thread_name']; ?> | Explore Amazing Threads | Agguora Threads | Agguora</title>
    <?php } ?>
    <?php include "bootstrapcss-and-icons.php"; ?>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-YXXL0NCGLE"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'G-YXXL0NCGLE');
    </script>

    <?php include "fonts.php"; ?>
</head>
<style>
    .download-btn {
        display: inline-flex;
        align-items: center;
        padding: 0.5rem 1rem;
        color: #fff;
        background-color: #18181b;
        border: none;
        border-radius: 4px;
        font-size: 1rem;
        text-decoration: none;
        transition: background-color 0.3s ease, transform 0.2s;
    }

    .download-btn:hover {
        background-color: #18181b;
        transform: scale(1.01);
    }

    .download-btn i {
        font-size: 1.2rem;
        margin-right: 0.5rem;
    }
</style>

<body class="bg-light">
    <?php include "header.php"; ?>
    <!-- Thread view section -Start -->
    <?php
    if (isset($_GET['thread'])) {
        $thread_id = htmlspecialchars(mysqli_real_escape_string($conn, $_GET['thread']));
        $sql_query = "SELECT * FROM `threads` WHERE thread_id = '{$thread_id}'";
        $result = mysqli_query($conn, $sql_query);
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                while ($thread = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="container">
                        <div class="card text-center rounded mt-2 row align-item-center">
                            <div class="card-header">
                                <h6 style="font-size:15px;">Posted by
                                    <?php
                                    // Ensure $thread['thread_created_by'] is set
                                    if (!isset($thread['thread_user_id'])) {
                                        echo "Unknown user";
                                    } else {
                                        $thread_created_by = $thread['thread_user_id'];
                                        $sql = "SELECT * FROM `user` WHERE id = '{$thread_created_by}'";
                                        $result = mysqli_query($conn, $sql);

                                        if (!$result) {
                                            // Display error message if the query fails
                                            echo "Error: " . mysqli_error($conn);
                                        } elseif (mysqli_num_rows($result) > 0) {
                                            $user = mysqli_fetch_assoc($result);
                                            ?>
                                            <b><a href="allprofile.php?user=<?php echo htmlspecialchars($user['id']); ?>"
                                                    style="text-decoration:none;"
                                                    class="text-dark"><strong><?php echo htmlspecialchars($user['username']); ?> <i
                                                            class="ri-account-pin-circle-line"></i></strong></a></b>
                                            <?php
                                        } else {
                                            echo "Unknown user";
                                        }
                                    }
                                    ?>
                                </h6>
                            </div>
                            <div class="card-body">
                                <h1 class="card-title" style="font-size:2rem;">
                                    <b>
                                        <?php echo $thread['thread_name']; ?>
                                    </b>
                                </h1>
                                <p class="card-text px-5" style="font-size:13px;">
                                    <?php echo $thread['thread_desc']; ?>

                                </p>
                                <div class="container">
                                    <?php if (!empty($thread['url'])) { ?>
                                        <a href="<?php echo $thread['url']; ?>" target="_blank"
                                            class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"><i
                                                class="ri-external-link-fill"></i>https://ag-linked/redirect-url..</a>
                                    <?php } else { ?>
                                    <?php } ?>
                                    <br><br>
                                    <?php
                                    if (empty($thread['uploaded_image'])) {

                                    } else {
                                        ?>
                                        <img src="img/upload/<?php echo $thread['uploaded_image']; ?>" id="uploaded-img"
                                            class="figure-img img-fluid rounded" alt="<?php echo $thread['thread_name']; ?>" width="1000px"
                                            height="1000px" id="uploaded-img">

                                        <?php

                                    }
                                    ?>
                                </div>
                                <!-- Zoom Modal -->
                                <div class="modal fade" id="zoomModal" tabindex="-1" aria-labelledby="zoomModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">

                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <img src="" id="zoomed-img" class="img-fluid" alt="Zoomed Profile Picture">
                                            </div>


                                            <a href="http://127.0.0.1/myphp/public_html/img/upload/<?php echo $thread['uploaded_image']; ?>"
                                                download class="download-btn">
                                                <button class="download-btn">
                                                    <i class="ri-download-2-fill"></i>
                                                    <span>Download</span>
                                                </button>
                                            </a>


                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer text-body"><b style="font-size:13px; font-weight:lighter;">
                                    <?php
                                    $sql_count = "SELECT COUNT(*) AS total_rows FROM comments WHERE thread_id = '{$thread_id}'";
                                    $result = mysqli_query($conn, $sql_count);
                                    if ($result && mysqli_num_rows($result) > 0) {
                                        $row = mysqli_fetch_assoc($result); ?>
                                        <?php
                                        // Convert the thread time to Asia/Kolkata time zone
                                        $datetime = new DateTime($thread['thread_time'], new DateTimeZone('UTC'));
                                        $datetime->setTimezone(new DateTimeZone('Asia/Kolkata'));
                                        $formattedTime = $datetime->format('d M Y, h:i A');

                                        echo $formattedTime;
                                        ?> &#183; <i class="ri-earth-line"
                                            style="font-size:12px; font-weight:light;"></i><br>
                                        <i class="ri-chat-3-line" style="font-size:12px; font-weight:light;"></i>
                                        <?php echo $row['total_rows']; ?> &#183; comments</b>
                                <?php } ?>
                                <!-- Voting System -Start  -->
                                <div class="py-2"></div>
                                <!-- Voting System -End  -->
                            </div>
                        </div>
                        <!-- Thread view section -End  -->

                        <!-- Post a comment section -start -->
                        <div class="container py-5">
                            <?php
                            $alert = false;
                            $method = $_SERVER['REQUEST_METHOD'];
                            if ($method == 'POST') {
                                $thread_id = htmlspecialchars(mysqli_real_escape_string($conn, $_GET['thread']));
                                if (isset($_POST['submit'])) {
                                    $comments = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['comment']));
                                    if (!empty($comments)) {
                                        $username = $_SESSION['username'];
                                        $sqlquery = "SELECT * FROM `user` WHERE username = '{$username}'";
                                        $user = mysqli_query($conn, $sqlquery);
                                        if (mysqli_num_rows($user) > 0) {
                                            $user_account = mysqli_fetch_assoc($user);
                                            $comment_by = $user_account['id'];
                                            $sql_query = "INSERT INTO `comments` (`comment_content`, `thread_id`, `comment_by`) VALUES ('{$comments}', '{$thread_id}', '{$comment_by}')";
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
                                        echo '<div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">Please add a comment!</div>';
                                    }
                                }
                            }
                            // Success alert section -Start
                            if ($alert) {
                                echo '<div class="w-100 text-success" type="button" id="alertMsg" disabled>
        <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
        <span role="status">Loading...</span>
      </div>';
                                echo '<script>
      setTimeout(function() {
          document.getElementById("alertMsg").style.display = "none";
          window.location="thread.php?thread=' . $thread_id . '";
      }, 2000);
  </script>';
                            }
                            // Success alert section -End 
                            ?>

                            <?php if (isset($_SESSION['username'])) { ?>
                                <div class="card shadow-sm mb-4">
                                    <div class="card-body">
                                        <form action="<?php echo htmlentities($_SERVER['REQUEST_URI']); ?>" method="post">
                                            <div class="form-floating mb-3">
                                                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                                                    style="height: 100px" name="comment"></textarea>
                                                <label for="floatingTextarea2"><i class="ri-message-2-line"></i> Comments</label>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <button type="submit" name="submit" class="btn btn-dark">Post Comment</button>
                                                <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal"
                                                    data-bs-target="#replyModal">
                                                    <i class="ri-reply-fill"></i> Reply to Someone
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <!-- Reply Modal -Start -->
                                <div class="modal fade" id="replyModal" tabindex="-1" aria-labelledby="replyModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="replyModalLabel"><?php echo $_SESSION['username']; ?> <b
                                                        style="font-size:12px">(you)</b></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="<?php echo htmlentities($_SERVER['PHP_SELF'] . '?thread=' . $thread_id); ?>"
                                                method="post">
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <div class="dropdown">
                                                            <button class="btn btn-secondary dropdown-toggle" type="button"
                                                                id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                                @Tag Someone
                                                            </button>
                                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton"
                                                                style="max-height: 500px; overflow-y: auto;">
                                                                <?php
                                                                $sql_query = "SELECT * FROM `user` ORDER BY `username` DESC;";
                                                                $query = mysqli_query($conn, $sql_query);
                                                                if ($query && mysqli_num_rows($query)) {
                                                                    while ($user = mysqli_fetch_assoc($query)) {
                                                                        $profilePic = !empty($user['profile_pic']) ? $user['profile_pic'] : 'default.jpg';
                                                                        ?>
                                                                        <li>
                                                                            <a class="dropdown-item d-flex align-items-center user-select"
                                                                                href="javascript:void(0);"
                                                                                data-user-id="<?php echo $user['id']; ?>">
                                                                                <img src="img/images/<?php echo $profilePic; ?>"
                                                                                    class="rounded-circle me-2"
                                                                                    alt="<?php echo htmlspecialchars($user['username']); ?>"
                                                                                    style="width: 32px; height: 32px; object-fit: cover;">
                                                                                <?php echo htmlspecialchars($user['username']); ?>
                                                                            </a>
                                                                        </li>
                                                                        <?php
                                                                    }
                                                                }
                                                                ?>
                                                            </ul>
                                                        </div>
                                                        <input type="hidden" name="tag" id="selectedUserId">


                                                    </div>
                                                    <div class="form-floating">
                                                        <textarea class="form-control" placeholder="Leave a reply here"
                                                            id="floatingTextarea" name="reply"></textarea>
                                                        <label for="floatingTextarea">Reply</label>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary" name="reply_submit">Reply</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Reply Modal -End -->

                                <?php
                                // Reply success alert section -Start
                                $check = false;
                                $method = $_SERVER['REQUEST_METHOD'];
                                if ($method == 'POST') {
                                    $thread_id = mysqli_real_escape_string($conn, $_GET['thread']);
                                    if (isset($_POST['reply_submit'])) {
                                        $reply_content = mysqli_real_escape_string($conn, $_POST['reply']);
                                        $tag_someone = mysqli_real_escape_string($conn, $_POST['tag']);
                                        if (!empty($reply_content)) {
                                            $username = $_SESSION['username'];
                                            $sql_query = "SELECT * FROM `user` WHERE username = '{$username}'";
                                            $user = mysqli_query($conn, $sql_query);
                                            if (mysqli_num_rows($user) > 0) {
                                                $user_account = mysqli_fetch_assoc($user);
                                                $reply_by = $user_account['id'];
                                                $sql_insert_reply = "INSERT INTO `comments` (`comment_content`, `thread_id`, `comment_by`, `tag_someone`) VALUES ('{$reply_content}', '{$thread_id}', '{$reply_by}', '{$tag_someone}')";
                                                $result = mysqli_query($conn, $sql_insert_reply);
                                                if ($result) {
                                                    $check = true;
                                                } else {
                                                    echo '<div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">Oops! Something went wrong :(</div>';
                                                }
                                            } else {
                                                echo '<div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">User not found :(</div>';
                                            }
                                        } else {
                                            echo '<div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">Please add a reply!</div>';
                                        }
                                    }
                                }
                                if ($check) {
                                    echo '<div class="w-100 text-success" type="button" id="alertMsg" disabled>
            <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
            <span role="status">Loading...</span>
          </div>';
                                    echo '<script>
    setTimeout(function() {
        document.getElementById("alertMsg").style.display = "none";
        window.location="thread.php?thread=' . $thread_id . '";
    }, 2000);
</script>';
                                }
                                // Reply success alert section -End 
                                ?>

                            <?php } else { ?>
                                <!-- If you are not logged in -start  -->
                                <div class="alert alert-danger d-flex align-items-center" role="alert">
                                    <i class="ri-alert-fill me-2"></i>
                                    <div>
                                        You are not logged in! Please <a href="login.php" class="alert-link">log in</a> to start the
                                        discussion.
                                    </div>
                                </div>
                                <!-- If you are not logged in -End  -->
                            <?php } ?>
                        </div>

                        <!-- Comments section -Start -->
                        <div class="container my-4">
                            <h3 class="mb-4">Comments</h3>
                        </div>
                        <div class="mb-5 py-3">
                            <?php
                            $thread_id = mysqli_real_escape_string($conn, $_GET['thread']);
                            $sql_query = "SELECT * FROM `comments` WHERE thread_id = '{$thread_id}' ORDER BY comment_time ASC";
                            $result = mysqli_query($conn, $sql_query);
                            if ($result) {
                                if (mysqli_num_rows($result) > 0) {
                                    $check_result = false;
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

                                            <div class="mb-2 border-none">
                                                <div class="d-flex align-items-start bg-light py-1 px-3">
                                                    <div class="me-3">
                                                        <a href="allprofile.php?user=<?php echo $user['id']; ?>">
                                                            <?php if (!empty($user['profile_pic'])) { ?>
                                                                <img src="img/images/<?php echo $user['profile_pic']; ?>"
                                                                    alt="<?php echo $user['about']; ?>" width="50px" height="50px" class="rounded-circle">
                                                            <?php } else { ?>
                                                                <img src="img/images/default.jpg" alt="Default profile" width="50px" height="50px"
                                                                    class="rounded-circle">
                                                            <?php } ?>
                                                        </a>
                                                    </div>
                                                    <div>
                                                        <h6 class="fw-bold mb-0">
                                                            <a href="allprofile.php?user=<?php echo $user['id']; ?>"
                                                                class="text-dark text-decoration-none">
                                                                <strong>
                                                                    <?php
                                                                    // Check if the current user is the creator (author) of the thread
                                                                    $author_query = "SELECT thread_user_id FROM `threads` WHERE thread_id = '{$thread_id}'";
                                                                    $author_result = mysqli_query($conn, $author_query);
                                                                    $author = mysqli_fetch_assoc($author_result);

                                                                    // If the current user is the thread's creator, add an "Author" badge
                                                                    if ($author && $author['thread_user_id'] == $user['id']) {
                                                                        echo $user['username'] . ' <span class="bg-light text-dark p-1 rounded" style="font-size: 15px;"><i class="ri-account-pin-circle-line"></i></span>';
                                                                    } else {
                                                                        echo $user['username'];
                                                                    }
                                                                    ?>
                                                                </strong>
                                                            </a>

                                                            <?php
                                                            $sql = "SELECT * FROM `user` WHERE id = '{$thread['tag_someone']}'";
                                                            $tag_run = mysqli_query($conn, $sql);
                                                            if ($tag_run && mysqli_num_rows($tag_run) > 0) {
                                                                $tag_user = mysqli_fetch_assoc($tag_run);
                                                                ?>
                                                                <span class="text-secondary fw-light" style="font-size: 14px;">replied to</span>
                                                                <a href="allprofile.php?user=<?php echo $tag_user['id']; ?>"
                                                                    class="text-dark text-decoration-none">
                                                                    <strong><?php echo $tag_user['username']; ?></strong>
                                                                </a>
                                                                <?php
                                                            }
                                                            ?>

                                                        </h6>
                                                        <small class="text-muted">
                                                            <?php
                                                            // Convert the thread time to Asia/Kolkata time zone
                                                            $datetime = new DateTime($thread['comment_time'], new DateTimeZone('UTC'));
                                                            $datetime->setTimezone(new DateTimeZone('Asia/Kolkata'));
                                                            $formattedTime = $datetime->format('d M Y, h:i A');
                                                            echo '<div class="text-muted" style="font-size: 0.8rem;">' . $formattedTime . '</div>';


                                                            ?>
                                                        </small>
                                                        <p class="mt-2"><?php echo $thread['comment_content']; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        } else { ?>
                                            <div class="mb-4 py-2 border-bottom">
                                                <div class="container border px-2 py-2">
                                                    <b class="text-secondary" style="font-weight: lighter;">User not found : (</b>
                                                </div>
                                            </div>
                                        <?php }
                                        $check_result = true;
                                    }
                                    if (!$check_result) {
                                        // No comments found
                                    }
                                } else { ?>
                                    <div class="mb-5 py-2">
                                        <div class="container px-4">
                                            <h2>No Comments Found : (</h2>
                                            <p style="font-size: 12px;">Be the first person to add a comment....</p>
                                        </div>
                                    </div>
                                <?php }
                            } else {
                                echo '<div class="alert alert-danger rounded-0" role="alert" style="font-size: 15px;">Oops! Something went wrong : (</div>';
                            }
                            ?>
                        </div>
                    </div>
                    </div>
                    <?php
                }
            } else {
                echo '<div class="alert alert-danger rounded-0" role="alert" style="font-size: 15px;">Invalid thread ID!</div>';
            }
        } else {
            echo '<div class="alert alert-danger rounded-0" role="alert" style="font-size: 15px;">Oops! Something went wrong : (</div>';
        }
    } else {
        echo '<div class="alert alert-danger rounded-0" role="alert" style="font-size: 15px;">Invalid user ID!</div>';
    }
    ?>

    <!-- Comments section -End -->


    <?php include "bottom-nav.php"; ?>
    <?php include "bootstrapjs.php"; ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        //Zoom Image
        $(document).ready(function () {
            $('#uploaded-img').on('click', function () {

                let imgSrc = $(this).attr('src');
                $('#zoomed-img').attr('src', imgSrc);
                $('#zoomModal').modal('show');
            });
        });

        document.querySelectorAll('.user-select').forEach(item => {
            item.addEventListener('click', function () {
                const userId = this.getAttribute('data-user-id');
                const userName = this.textContent.trim();

                // Set selected user ID to hidden input
                document.getElementById('selectedUserId').value = userId;

                // Update dropdown button text to show selected username
                document.getElementById('dropdownMenuButton').textContent = `@${userName}`;
            });
        });

    </script>

</body>

</html>