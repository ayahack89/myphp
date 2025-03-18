<?php
//Database connection
require_once "../db/db_connection.php";
session_start();

//Error handling
error_reporting(0);
ini_set('display_errors', 0);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    $get_id = mysqli_real_escape_string($conn, $_GET['Disk']);
    $sql = "SELECT * FROM `catagory` WHERE catagory_id = '{$get_id}'";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result)) {
        $dec = mysqli_fetch_assoc($result);
        ?>
        <meta name="description" content="<?php echo $dec['catagory_desc']; ?>">
        <link rel="icon" type="image/x-icon" href="">
        <title><?php echo $dec['catagory_name']; ?> | Agguora Categories | Agguora</title>
    <?php } ?>
    <?php include "../include/style.php"; ?>
    <?php include "../include/fonts.php"; ?>
</head>

<style>
    :root {
        --success-result: #86efac;
    }

    .div-hover:hover {
        background-color: whitesmoke;
        border-radius: 10px;
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

    .modal-body {
        text-align: center;
    }

    .like-button {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 8px 16px;
        background-color: #f0f2f5;
        border: 1px solid #ddd;
        border-radius: 50px;
        font-size: 16px;
        font-weight: 600;
        text-decoration: none;
        cursor: pointer;
    }


    .comment-button {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 8px 16px;
        border-radius: 6px;
        font-size: 16px;
        font-weight: 600;
        color: #333;
        text-decoration: none;
        cursor: pointer;
    }


    .share-button {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 8px 16px;
        border: none;
        border-radius: 6px;
        font-size: 14px;
        background-color: white;
        font-weight: 600;
        cursor: pointer;
    }

    .vote-button {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 8px 16px;
        border: none;
        border-radius: 6px;
        font-size: 14px;
        background-color: white;
        font-weight: 600;
        cursor: pointer;

    }




    .share-title {
        font-size: 1.2em;
        font-weight: 600;
        margin-bottom: 1rem;
        color: #333;
    }

    .share-icons {
        list-style-type: none;
        padding: 0;
        margin: 0;
        display: flex;
        justify-content: center;
        gap: 15px;
    }

    .share-icons li {
        display: inline-block;
    }

    .icon {
        text-decoration: none;
        color: #fff;
        font-size: 24px;
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        transition: transform 0.3s;
    }

    .icon:hover {
        transform: scale(1.1);
    }

    .facebook {
        background-color: #3b5998;
    }

    .twitter {
        background-color: #1da1f2;
    }

    .linkedin {
        background-color: #0077b5;
    }

    .reddit {
        background-color: #ff4500;
    }

    .whatsapp {
        background-color: #25d366;
    }

    .tumblr {
        background-color: #35465c;
    }

    .pinterest {
        background-color: #bd081c;
    }


    @media only screen and (max-width: 1000px) {
        .media-flex {
            display: flex;
            flex-wrap: wrap;

        }
    }
</style>

<body class="bg-light">
    <?php include "../include/header.php"; ?>
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
                                    <a href="../users/allprofile.php?user=<?php echo $row['id']; ?>" style="text-decoration:none;"
                                        class="text-dark"><strong><?php echo $row['username']; ?> <i
                                                class="ri-account-pin-box-line"></i></strong></a>
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
                                <a href="../main/drives.php" class="btn btn-outline-dark mt-3"><i class="ri-arrow-go-back-line"></i> Go
                                    Back</a>
                            </div>
                        </div>

                        <div class="card-footer text-body-secondary">
                            <!-- Thread Count -Start  -->
                            <?php
                            $sql_count = "SELECT COUNT(*) AS total_rows FROM threads WHERE thread_catagory_id = '{$disk_id}'";
                            $result = mysqli_query($conn, $sql_count);
                            if ($result && mysqli_num_rows($result) > 0) {
                                $row = mysqli_fetch_assoc($result); ?>
                                <b style="font-size:15px; font-weight:lighter;"> <?php echo $disk['created']; ?> &#183; <i
                                        class="ri-earth-line" style="font-weight:light; font-size:15px;"></i><br>
                                    <?php echo $row['total_rows']; ?> &#183; post</b><br>
                            <?php } ?>
                            <!-- Thread Count -End  -->

                            <!-- **Like btn is under development process**  -->
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

                <!-- Thread Form Start -->
                <div class="container py-4">
                    <?php
                    $alert = false;
                    $method = $_SERVER['REQUEST_METHOD'];

                    if ($method == 'POST' && isset($_POST['submit'])) {
                        // Database sanitization
                        $get_id = htmlspecialchars(mysqli_real_escape_string($conn, $_GET['Disk']));
                        $topic_name = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['topic']));
                        $topic_desc = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['topic_desc']));
                        $url = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['url']));
                        // $post_genre = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['post_genre']));
                        $image_name = $_FILES['image']['name'];
                        $tmp_name = $_FILES['image']['tmp_name'];
                        $image_error = $_FILES['image']['error'];
                        $image_size = $_FILES['image']['size'];
                        $image_path_destination = "../media/upload/";
                        $image_new_name = uniqid('', true) . '_' . $image_name;

                        if (!empty($topic_name)) {
                            $upload_image = true;

                            // Image Validation
                            if (!empty($image_name)) {
                                $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
                                $image_extension = strtolower(pathinfo($image_new_name, PATHINFO_EXTENSION));
                                if (!in_array($image_extension, $allowed_types) || $image_size > 1000000 || $image_error != 0) {
                                    $upload_image = false;
                                    echo '<div class="alert alert-danger">Invalid image file! Only JPG, JPEG, PNG, and GIF under 1MB are allowed.</div>';
                                } else {
                                    move_uploaded_file($tmp_name, $image_path_destination . $image_new_name);
                                }
                            }

                            // Insert into database
                            if ($upload_image) {
                                $username = $_SESSION['username'];
                                $user_query = "SELECT * FROM `user` WHERE username = '{$username}'";
                                $user = mysqli_query($conn, $user_query);

                                if (mysqli_num_rows($user) > 0) {
                                    $user_account = mysqli_fetch_assoc($user);
                                    $thread_user_id = $user_account['id'];
                                    $sql_query = "INSERT INTO `threads` 
                        (`thread_name`, `thread_desc`, `thread_catagory_id`, `thread_user_id`, `uploaded_image`, `url`) 
                        VALUES ('{$topic_name}', '{$topic_desc}', '{$get_id}', '{$thread_user_id}', 
                        '{$image_new_name}', '{$url}')";
                                    $result = mysqli_query($conn, $sql_query);

                                    if ($result) {
                                        $alert = true;
                                    } else {
                                        echo '<div class="alert alert-danger">Oops! Something went wrong :(</div>';
                                    }
                                } else {
                                    echo '<div class="alert alert-danger">User not found. Please log in again.</div>';
                                }
                            }
                        } else {
                            echo '<div class="alert alert-danger">Heading and Genre are mandatory to post.</div>';
                        }
                    }

                    // Success Message
                    if ($alert) {
                        echo '<div id="alertMsg" class="alert alert-success alert-dismissible fade show">
        <strong>Success!</strong> Your thread has been added successfully.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
                        echo '<script>
        setTimeout(() => {
            window.location = "disk.php?Disk=' . $get_id . '";
        }, 2000);
        </script>';
                    }
                    ?>

                    <h3 class="text-center">Add New Post</h3>

                    <?php if (isset($_SESSION['username'])): ?>
                        <form action="<?php echo htmlentities($_SERVER['REQUEST_URI']); ?>" method="post" enctype="multipart/form-data"
                            class="border rounded p-4 shadow-sm bg-light">
                            <!-- Heading -->
                            <div class="mb-3">
                                <label for="topic" class="form-label">What's on your mind ? <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="topic" name="topic" placeholder="Write your thoughts in short" required>
                            </div>

                            <!-- Genre -->
                            <!-- <div class="mb-3">
                                <label for="genre" class="form-label">Select Genre (g/) <span class="text-danger">*</span></label>
                                <select id="genre" name="post_genre" class="form-select" required>
                                    <option value="" selected disabled>(g/ meme, art, qna..)</option>
                                    <?php
                                    // $sql = "SELECT * FROM `catagory` WHERE catagory_id = '{$disk_id}'";
                                    // $result = mysqli_query($conn, $sql);
                                    // while ($row = mysqli_fetch_assoc($result)) {
                                    //     if(!empty($row['genre'])){
                                    //     echo '<option value="' . htmlspecialchars($row['genre']) . '">g/ ' . htmlspecialchars($row['genre']) . '</option>';
                                    //     }
                                    // }
                                    ?>
                                </select>
                            </div> -->

                            <!-- Description -->
                            <div class="mb-3">
                                <label for="topic_desc" class="form-label">Description (optional)</label>
                                <textarea class="form-control" id="topic_desc" rows="3" name="topic_desc"
                                    placeholder="Elaborate your thoughts ..."></textarea>
                            </div>

                            <!-- URL -->
                            <div class="mb-3">
                                <label for="url" class="form-label">URL (optional)</label>
                                <input type="url" class="form-control" id="url" name="url" placeholder="Enter a valid URL">
                            </div>

                            <!-- Image -->
                            <div class="mb-3">
                                <label for="image" class="form-label">Upload Image (optional)</label>
                                <input class="form-control" type="file" name="image" id="image" accept="image/*">
                                <small class="form-text text-muted">Allowed: JPG, JPEG, PNG, GIF. Max size: 1MB</small>
                            </div>

                            <!-- Submit Button -->
                            <div class="text-center">
                                <button type="submit" name="submit" class="btn btn-danger">Upload <i
                                        class="ri-upload-cloud-line"></i></button>
                            </div>
                        </form>
                    <?php else: ?>
                        <!-- Alert if not logged in -->
                        <div class="alert alert-warning text-center">
                            <i class="ri-alert-fill"></i> You are not logged in! Please <a href="../authentication/login.php" class="text-danger">log
                                in</a> to start a discussion.
                        </div>
                    <?php endif; ?>
                </div>
                <!-- Thread Form End -->





                <!-- Thread list -Start -->

                <div class="mb-5 py-2">
                    <div class="container my-3">
                        <h3><b>Browse recent posts</b></h3>
                    </div>

                    <?php
            }
        } else {
            echo '<div class="alert alert-danger rounded" role="alert" style="font-size:15px;">Invalid Disk ID!</div>';
        }
    } else {
        echo '<div class="alert alert-danger rounded" role="alert" style="font-size:15px;">Oops! Something went wrong :(</div>';
    }
    ?>

        <!-- Thread list -Start -->
        <?php
        $disk_id = intval($_GET['Disk'] ?? 0);
        $sql_query = "SELECT t.*, u.username, u.profile_pic FROM threads t LEFT JOIN user u ON t.thread_user_id = u.id WHERE t.thread_catagory_id = '{$disk_id}' ORDER BY t.thread_time DESC";
        $result = mysqli_query($conn, $sql_query);

        if ($result && mysqli_num_rows($result) > 0) {
            while ($thread = mysqli_fetch_assoc($result)) {
                $thread_id = $thread['thread_id'];
                ?>

                <div class="container my-4">
                    <div class="card shadow-sm border-0 col-md-6 rounded" style="margin:auto;">
                        <div class="card-body">
                            <!-- User Profile Section -->
                            <div class="d-flex align-items-center mb-3">
                                <a href="../users/allprofile.php?user=<?php echo $thread['thread_user_id']; ?>" class="me-3">
                                    <img src="../media/images/<?php echo !empty($thread['profile_pic']) ? $thread['profile_pic'] : 'default.jpg'; ?>"
                                        alt="<?php echo $thread['username']; ?>" class="rounded-circle"
                                        style="width: 50px; height: 50px;">
                                </a>
                                <div>
                                    <a href="../users/allprofile.php?user=<?php echo $thread['thread_user_id']; ?>"
                                        class="text-dark text-decoration-none fw-bold">
                                        <?php
                                        // Check if the current thread user is the creator of the drive
                                        $author_query = "SELECT created_by FROM catagory WHERE catagory_id = '{$disk_id}'";
                                        $author_result = mysqli_query($conn, $author_query);
                                        $author = mysqli_fetch_assoc($author_result);

                                        if ($author && $author['created_by'] == $thread['thread_user_id']) {
                                            echo $thread['username'] . ' <span class="bg-light text-dark p-1 rounded" style="font-size: 15px;"><i> <i class="ri-account-pin-box-line"></i></i></span>';
                                        } else {
                                            echo $thread['username'];
                                        }
                                        ?>
                                    </a>
                                    <?php
                                    // Convert the thread time to Asia/Kolkata time zone
                                    $datetime = new DateTime($thread['thread_time'], new DateTimeZone('UTC'));
                                    $datetime->setTimezone(new DateTimeZone('Asia/Kolkata'));
                                    $formattedTime = $datetime->format('d M Y, h:i A');
                                    echo '<div class="text-muted" style="font-size: 0.8rem;">' . $formattedTime . ' &#8226; <i class="ri-earth-line"></i></div>';

                                    ?>
                                </div>
                            </div>
<span style="
    font-size: 10px; 
    color: #6c757d; 
    margin-bottom:10px;
    background-color: #f8f9fa; 
    border: 1px solid #dee2e6; 
    border-radius: 20px; 
    padding: 1px 8px; 
    font-weight: 500;
    display: inline-block;">
                                g/ <?php echo htmlspecialchars($thread['post_genre'], ENT_QUOTES, 'UTF-8'); ?>
                        </span>

                            <!-- Thread Content Section -->
                            <a href="thread.php?thread=<?php echo $thread_id; ?>" class="text-dark text-decoration-none">
                                <h6 class="card-title mb-1"><?php echo $thread['thread_name']; ?></h6>
                            </a>
                            <p class="card-text mb-2">
                                <?php if (!empty($thread['thread_desc'])) {
                                    echo strlen($thread['thread_desc']) > 100 ? substr($thread['thread_desc'], 0, 100) . '... <a href="thread.php?thread=' . $thread_id . '" class="text-dark text-decoration-none"><strong>read more</strong></a>' : $thread['thread_desc'];
                                }
                                ?>
                            </p>

                            <?php if (!empty($thread['uploaded_image'])) { ?>
                                <a href="thread.php?thread=<?php echo htmlspecialchars($thread_id, ENT_QUOTES, 'UTF-8'); ?>">
                                    <img src="../media/upload/<?php echo htmlspecialchars($thread['uploaded_image'], ENT_QUOTES, 'UTF-8'); ?>"
                                        class="rounded" alt="" style="width: 100%;">
                                </a>
                            <?php } ?>


                            <!-- Reaction Buttons (Like, Comment, Share) -->
                            <div class="d-flex justify-content-around flex-row-reverse">
                                <?php
                                // Fetch total likes
                                $like_query = "SELECT COUNT(*) as total_likes FROM `user_react` WHERE thread_id = '{$thread_id}'";
                                $like_result = mysqli_query($conn, $like_query);
                                $likes_count = $like_result ? mysqli_fetch_assoc($like_result)['total_likes'] : 0;

                                if (isset($_SESSION['username'])) {
                                    echo '<form method="POST" action="user_react.php" class="d-inline">';
                                    echo '<input type="hidden" name="thread_id" value="' . $thread['thread_id'] . '">';
                                    echo '<button type="submit" class="vote-button" id="like_button">';
                                    echo '<i class="ri-heart-2-line" style="font-size:1.2rem"></i>';
                                    echo '<span class="like-count" style="font-size:1rem">' . $likes_count . '</span>';
                                    echo '</button>';
                                    echo '</form>';
                                } else {
                                    echo '<a href="login.php" style="text-decoration:none;">';
                                    echo '<button type="button" class="vote-button">';
                                    echo '<i class="ri-heart-2-line" style="font-size:1.2rem"></i>';
                                    echo '<span class="like-count" style="font-size:1rem">' . $likes_count . '</span>';
                                    echo '</button></a>';
                                }

                                // Comment button
                                $comment_query = "SELECT COUNT(*) as total_row FROM `comments` WHERE thread_id = '{$thread_id}'";
                                $comment_result = mysqli_query($conn, $comment_query);
                                if ($comment_result) {
                                    $comments_count = mysqli_fetch_assoc($comment_result)['total_row'];

                                    echo '<a href="thread.php?thread=' . $thread['thread_id'] . '" class="comment-button">';
                                    echo '<span class="icon-text">
<svg aria-hidden="true" class="icon-comment" fill="currentColor" height="20" width="20" viewBox="0 0 20 20">
<path d="M10 2C5.589 2 2 5.21 2 9.5c0 1.751.737 3.395 2.021 4.732C3.617 16.26 2.26 17.508 2 17.73c-.011.009-.018.021-.027.031A.5.5 0 0 0 2.5 18h9c4.411 0 8-3.21 8-7.5S14.411 2 10 2ZM3 9.5C3 6.462 6.364 4 10 4s7 2.462 7 5.5S13.636 15 10 15H3.5c.561-.463 1.44-1.308 2.149-2.021.028-.03.055-.06.081-.092A6.98 6.98 0 0 0 3 9.5Z"></path>
</svg>
<span> ' . $comments_count . ' Comments</span>
</span>
';
                                    echo '</a>';

                                }


                                // Share Button
                                ?>
                                <a href="#" id="shareBtn" class="text-dark" style="text-decoration:none;" data-bs-toggle="modal"
                                    data-bs-target="#shareModal">
                                    <button class="share-button" type="button" aria-haspopup="true" aria-expanded="false">
                                        <span class="icon-text">
                                            <svg aria-hidden="true" class="icon-share" fill="currentColor" height="20"
                                                width="20" viewBox="0 0 20 20">
                                                <path
                                                    d="M2.239 18.723A1.235 1.235 0 0 1 1 17.488C1 11.5 4.821 6.91 10 6.505V3.616a1.646 1.646 0 0 1 2.812-1.16l6.9 6.952a.841.841 0 0 1 0 1.186l-6.9 6.852A1.645 1.645 0 0 1 10 16.284v-2.76c-2.573.243-3.961 1.738-5.547 3.445-.437.47-.881.949-1.356 1.407-.23.223-.538.348-.858.347ZM10.75 7.976c-4.509 0-7.954 3.762-8.228 8.855.285-.292.559-.59.832-.883C5.16 14 7.028 11.99 10.75 11.99h.75v4.294a.132.132 0 0 0 .09.134.136.136 0 0 0 .158-.032L18.186 10l-6.438-6.486a.135.135 0 0 0-.158-.032.134.134 0 0 0-.09.134v4.36h-.75Z">
                                                </path>
                                            </svg>
                                            <span>Share</span>
                                        </span>
                                    </button>

                                </a>


                                <!-- Share Modal Structure -->
                                <div class="modal fade" id="shareModal" tabindex="-1" aria-labelledby="shareModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="shareModalLabel">Share This Post</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="share-title">Select a platform to share:</p>
                                                <ul class="share-icons">
                                                    <?php
                                                    $post_url = "http://127.0.0.1/myphp/public_html/threads.php?thread=" . urlencode($row['thread_id']);
                                                    $thread_title = urlencode($row['thread_name']);
                                                    $thread_desc = urlencode($row['thread_desc']);
                                                    $uploaded_image = !empty($row['uploaded_image']) ? urlencode($row['uploaded_image']) : '';
                                                    ?>
                                                    <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $post_url; ?>"
                                                            target="_blank" class="icon facebook"><i
                                                                class="ri-facebook-fill"></i></a></li>
                                                    <li><a href="https://x.com/intent/tweet?text=<?php echo $thread_title; ?>&url=<?php echo $post_url; ?>"
                                                            target="_blank" class="icon twitter"><i
                                                                class="ri-twitter-x-line"></i></a></li>
                                                    <li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $post_url; ?>&title=<?php echo $thread_title; ?>"
                                                            target="_blank" class="icon linkedin"><i
                                                                class="ri-linkedin-fill"></i></a></li>
                                                    <li><a href="https://www.reddit.com/submit?url=<?php echo $post_url; ?>&title=<?php echo $thread_title; ?>"
                                                            target="_blank" class="icon reddit"><i
                                                                class="ri-reddit-line"></i></a></li>
                                                    <li><a href="https://wa.me/?text=<?php echo $thread_title . '%20' . $post_url; ?>"
                                                            target="_blank" class="icon whatsapp"><i
                                                                class="ri-whatsapp-line"></i></a></li>


                                                </ul>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Thread-content-end -->
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
        ?>
        <!-- Thread list -End -->



        <?php include "../include/bottom-nav.php"; ?>
        <?php include "../include/script.php"; ?>

        <script src="../jquery/jquery.js"></script>
        <script>
            $(document).ready(function () {
                // Bind click event to the like button
                $('body').on('click', '#like_button', function (e) {
                    e.preventDefault();
                    var thread_id = $(this).siblings('input[name="thread_id"]').val();
                    var likeButton = $(this);

                    $.ajax({
                        url: 'user_react.php',
                        type: 'POST',
                        data: { thread_id: thread_id },
                        dataType: 'json',
                        success: function (response) {
                            if (response) {
                                likeButton.find('.like-count').text(response.like_count);
                                if (response.liked) {
                                    likeButton.css({
                                        "color": "red",

                                    });

                                } else {
                                    likeButton.css({
                                        "color": "grey",

                                    });
                                }
                            }
                        },
                        error: function () {
                            alert('An error occurred while processing your request.');
                        }
                    });
                });
            });

            document.getElementById('like_button').addEventListener('click', function () {
                this.classList.toggle('liked');
            });


            // Share pop up
            $(document).ready(function () {
                $('#shareBtn').on('click', function (e) {
                    e.preventDefault();
                    $('#shareModal').modal('show');
                });
            });

        </script>

</body>

</html>