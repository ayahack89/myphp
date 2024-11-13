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
    <meta name="description"
        content="Find some privacy? You are in the right place. Join us now share your thoughts and be an active user in this community & collect sweets karmas...">
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
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'G-YXXL0NCGLE');
    </script>

</head>
<?php include "fonts.php"; ?>
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
                            if ($result && mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $thread_created_by = $row['thread_user_id'];
                                    $sqq = "SELECT * FROM `user` WHERE id = '{$thread_created_by}'";
                                    $run_ql = mysqli_query($conn, $sqq);
                                    if ($run_ql && mysqli_num_rows($run_ql) > 0) {
                                        $user = mysqli_fetch_assoc($run_ql);
                                        echo '<div class="rounded mb-4">';
                                        echo '<div class="d-flex align-items-center mb-2">';
                                        echo '<a href="allprofile.php?user=' . $user['id'] . '" class="text-dark" style="text-decoration:none;">';
                                        if (!empty($user['profile_pic'])) {
                                            echo '<img src="img/images/' . $user['profile_pic'] . '" alt="' . $user['about'] . '" width="50px" height="50px" class="rounded-circle">';
                                        } else {
                                            echo '<img src="img/images/default.jpg" alt="Default gray profile icon on white background." width="50px" height="50px" class="rounded-circle">';
                                        }
                                        echo '</a>';
                                        echo '<div class="ms-2">';
                                        echo '<a href="allprofile.php?user=' . $user['id'] . '" class="text-dark" style="text-decoration:none;">';
                                        echo '<span class="fw-bold" style="font-size: 1.1rem;">' . $user['username'] . '</span>';
                                        echo '</a>';

                                        // Convert the thread time to Asia/Kolkata time zone
                                        $datetime = new DateTime($row['thread_time'], new DateTimeZone('UTC'));
                                        $datetime->setTimezone(new DateTimeZone('Asia/Kolkata'));
                                        $formattedTime = $datetime->format('d M Y, h:i A');

                                        echo '<div class="text-muted" style="font-size: 0.8rem;">' . $formattedTime . ' &#8226; <i class="ri-earth-line"></i></div>';

                                        echo '</div>';
                                        echo '</div>';

                                        echo '<a href="thread.php?thread=' . $row['thread_id'] . '" class="text-dark" style="text-decoration:none;">';
                                        echo '<h5>' . $row['thread_name'] . '</h5>';
                                        echo '</a>';

                                        $thread_desc = $row['thread_desc'];
                                        $max_length = 80;
                                        if (strlen($thread_desc) > $max_length) {
                                            $thread_desc = substr($thread_desc, 0, $max_length) . '<a href="thread.php?thread=' . $row['thread_id'] . '" class="text-dark" style="text-decoration:none;">. . .<strong>read more</strong></a>';
                                        }
                                        echo '<p style="font-size:14px">' . $thread_desc . '</p>';

                                        if (!empty($row['uploaded_image'])) {

                                            echo '<a href="thread.php?thread=' . $row['thread_id'] . '"style="text-decoration:none;"><img src="img/upload/' . $row['uploaded_image'] . '" class="img-fluid rounded mb-2 border" alt="' . $row['thread_name'] . '" width="5000px" height="5000px"></a>';
                                        }

                                        echo '<div class="d-flex justify-content-around flex-row-reverse  mb-3">';


                                        // Like button
                                        $thread_id = $row['thread_id'];
                                        $like_query = "SELECT COUNT(*) as total_likes FROM `user_react` WHERE thread_id = '{$thread_id}'";
                                        $like_result = mysqli_query($conn, $like_query);

                                        if ($like_result) {
                                            $likes_count = mysqli_fetch_assoc($like_result)['total_likes'];
                                            if (isset($_SESSION['username'])) {
                                                echo '<form method="POST" action="user_react.php" class="d-inline">';
                                                echo '<input type="hidden" name="thread_id" value="' . $row['thread_id'] . '">';
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
                                        }

                                        // Comment button
                                        $comment_query = "SELECT COUNT(*) as total_row FROM `comments` WHERE thread_id = '{$thread_id}'";
                                        $comment_result = mysqli_query($conn, $comment_query);
                                        if ($comment_result) {
                                            $comments_count = mysqli_fetch_assoc($comment_result)['total_row'];

                                            echo '<a href="thread.php?thread=' . $row['thread_id'] . '" class="comment-button">';
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
                                        <a href="#" id="shareBtn" class="text-dark" style="text-decoration:none;"
                                            data-bs-toggle="modal" data-bs-target="#shareModal">
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

                                        <?php


                                        echo '</div>'; // End card div
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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