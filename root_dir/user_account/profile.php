<?php
session_start();
if (!isset($_SESSION['username'])) {
    echo 'Oops! at first you need to <a href="login.php">login</a> & proof that you are a true member.';
} else { ?>
    <?php
    //Database handling 
    require_once "../db/db_connection.php";

    //Error handling 
    error_reporting(0);
    ini_set('display_errors', 0);
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="">
        <link rel="icon" type="image/x-icon" href="">
        <?php
        $username = $_SESSION['username'];
        $sq = "SELECT * FROM `user` WHERE username = '{$username}'";
        $result = mysqli_query($conn, $sq);
        if ($result && mysqli_num_rows($result) > 0) {
            $rows = mysqli_fetch_assoc($result);
            ?>
            <title><?php echo $rows['username']; ?> | Agguora</title>
        <?php } ?>
        <?php include "../include/style.php"; ?>
        <?php include "../include/fonts.php"; ?>
        <script src="jquery/jquery.js"></script>
        <script src="jquery-ui/jquery-ui.min.css"></script>
        <script src="jquery-ui/jquery-ui.min.js"></script>
        
        
        
        <style>
            ul li {
                list-style-type: none;
            }

            * {
                margin: 0;
                padding: 0
            }



            .card {
                width: 350px;
                background-color: #efefef;
                border: none;
                cursor: pointer;
                transition: all 0.5s;
            }

            .image img {
                transition: all 0.5s
            }

            .card:hover .image img {
                transform: scale(1.5)
            }

            .name {
                font-size: 22px;
                font-weight: bold
            }

            .idd {
                font-size: 14px;
                font-weight: 600
            }

            .idd1 {
                font-size: 12px
            }

            .number {
                font-size: 22px;
                font-weight: bold
            }

            .follow {
                font-size: 12px;
                font-weight: 500;
                color: #444444
            }

            .btn1 {
                height: 40px;
                width: 150px;
                border: none;
                background-color: #000;
                color: #aeaeae;
                font-size: 15px
            }

            .text span {
                font-size: 13px;
                color: #545454;
                font-weight: 500
            }

            .icons i {
                font-size: 19px
            }

            hr .new1 {
                border: 1px solid
            }

            .join {
                font-size: 14px;
                color: #a0a0a0;
                font-weight: bold
            }

            .date {
                background-color: #ccc
            }

            .profile-pic {
                height: 150px;
                width: 150px;
                border-radius: 50%;
                object-fit: cover;
                border: 3px solid #ccc;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }

            
        </style>
     
    </head>

    <body class="bg-light">
        <?php include "../include/header.php"; ?>

        <?php
        $username = $_SESSION['username'];
        $sql_query = "SELECT * FROM `user` WHERE username = '$username'";
        $result = mysqli_query($conn, $sql_query);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                while ($pro = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="container d-flex flex-column py-4 my-3">
                        <!-- Profile Card -->
                        <center>
                            <div class=" shadow-sm rounded-lg bg-white">
                                <div class="card border-0 bg-white p-4">
                                    <div class="d-flex flex-column justify-content-center align-items-center text-center">

                                        <!-- Profile Image -->
                                        <?php if (empty($pro['profile_pic'])) { ?>
                                            <img src="../media/images/default.jpg" class="rounded-circle border mb-3 profile-pic"
                                                alt="Default Profile Picture" height="150" width="150" id="profile-img" />
                                        <?php } else { ?>
                                            <img src="../media/images/<?php echo $pro['profile_pic']; ?>" class="profile-pic mb-3"
                                                alt="<?php echo $pro['about']; ?>" id="profile-img" />
                                        <?php } ?>
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
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Online Status -->
                                        <?php if (isset($_SESSION['username'])) { ?>
                                            <span class="badge bg-success px-3 py-1"><i class="ri-earth-line"></i> Online</span>
                                        <?php } else { ?>
                                            <span class="badge bg-secondary px-3 py-1">Sleeping</span>
                                        <?php } ?>

                                        <!-- Username and Bio -->
                                        <h2 class="text-dark mt-3 mb-1"><?php echo $pro['username']; ?></h2>
                                        <p class="text-muted mb-2"><strong><?php echo $pro['about']; ?></strong></p>

                                        <!-- User Details -->
                                        <div class="d-flex justify-content-center gap-3">


                                        </div>
                                        <span class="text-muted">Joined at <?php echo $pro['datetime']; ?></span>


                                        <!-- Education -->
                                        <div class="my-3 text-start">
                                            <span class="text-muted"><strong> <i class="ri-flag-fill"></i>Citizen </strong>
                                                <?php echo $pro['country']; ?></span><br>
                                            <span class="text-muted"><strong> <i class="ri-cake-2-fill"></i>Born at</strong>
                                                <?php echo $pro['cake_day']; ?></span><br>
                                            <?php
                                            if (!empty($pro['clg_university'])) {
                                                echo '<span class="text-muted"><strong><i class="fas fa-university"></i> Studied at
                                        </strong>' . $pro['clg_university'] . '</span><br>';
                                            } else {

                                            }
                                            ?>
                                            <?php
                                            if (!empty($pro['clg_university'])) {
                                                if (!empty($pro['school'])) {
                                                    echo '<span class="text-muted"><strong><i class="fas fa-school"></i> Went to
                                                </strong>' . $pro['school'] . '</span><br>';

                                                } else {

                                                }
                                            } else {
                                                if (!empty($pro['school'])) {
                                                    echo '<span class="text-muted"><strong><i class="fas fa-school"></i> Studied at 
                                                </strong>' . $pro['school'] . '</span>';

                                                } else {

                                                }
                                            }
                                            ?>
                                            <span class="text-muted"><strong> <i class="fas fa-user-tag"></i> I am a </strong>
                                                <?php echo $pro['status']; ?></span><br>
                                            <span class="text-muted"><strong> <i class="fas fa-search"></i> I am looking for a </strong>
                                                <?php echo $pro['looking_for']; ?></span><br>
                                            <span class="text-muted"><strong> <i class="fas fa-heart"></i> I have a interest in
                                                </strong> <?php echo $pro['interest_in']; ?></span><br>




                                        </div>

                                        <!-- Activity Count -->
                                        <div class="w-100 mt-4">
                                            <h4 class="text-dark">Your Activities</h4>
                                            <div class="d-flex justify-content-around">
                                                <?php
                                                $user_id = $pro['id'];

                                                // Drives
                                                $sql_count = "SELECT COUNT(*) AS total_rows FROM `catagory` WHERE created_by = '{$user_id}'";
                                                $result = mysqli_query($conn, $sql_count);
                                                $row = mysqli_fetch_assoc($result);
                                                $disks = $row['total_rows'];
                                                ?>
                                                <div>
                                                    <h5 class="text-primary"><?php echo $disks; ?></h5>
                                                    <p class="text-muted">Drives</p>
                                                </div>
                                                <?php
                                                // Threads
                                                $sql_count = "SELECT COUNT(*) AS total_rows FROM `threads` WHERE thread_user_id = '{$user_id}'";
                                                $result = mysqli_query($conn, $sql_count);
                                                $row = mysqli_fetch_assoc($result);
                                                $threads = $row['total_rows'];
                                                ?>
                                                <div>
                                                    <h5 class="text-primary"><?php echo $threads; ?></h5>
                                                    <p class="text-muted">Threads</p>
                                                </div>
                                                <?php
                                                // Comments
                                                $sql_count = "SELECT COUNT(*) AS total_rows FROM `comments` WHERE comment_by = '{$user_id}'";
                                                $result = mysqli_query($conn, $sql_count);
                                                $row = mysqli_fetch_assoc($result);
                                                $comments = $row['total_rows'];
                                                ?>
                                                <div>
                                                    <h5 class="text-primary"><?php echo $comments; ?></h5>
                                                    <p class="text-muted">Comments</p>
                                                </div>
                                            </div>

                                            <!-- Karma -->
                                            <?php
                                            $karma = $disks + $threads + $comments;
                                            ?>
                                            <div class="mt-3">
                                                <p class="text-danger" style="font-size:1.2rem;">
                                                    <i class="ri-trophy-line"></i> Karma: <strong><?php echo $karma; ?></strong>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="d-flex mt-3">
                                            <div class="dropdown">
                                                <button class="btn btn-dark btn-sm dropdown-toggle rounded" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-user-settings-fill"></i> Account Settings
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end text-light px-3 py-3 bg-dark rounded shadow">
                                                    <li><a href="../user_account/settings/account_settings/editprofile.php?update=<?php echo $pro['id']; ?>"
                                                            class="dropdown-item text-danger py-2"><i class="ri-edit-box-fill"></i> Edit
                                                            Profile</a></li>
                                                    <li><a href="../user_account/settings/account_settings/editprofile-image.php?update=<?php echo $pro['id']; ?>"
                                                            class="dropdown-item text-danger py-2"><i class="ri-image-edit-fill"></i>
                                                            Change Profile Image</a></li>
                                                    <li><a href="../authentication/resetpassword.php" class="dropdown-item text-danger py-2"><i
                                                                class="ri-lock-password-fill"></i> Change Password</a></li>
                                                    <li>
                                                        <a href="profile.php?action=delete" class="dropdown-item text-danger py-2"
                                                            id="delete-profile">
                                                            <i class="ri-delete-bin-5-fill"></i> Delete Profile
                                                        </a>
                                                    </li>



                                                </ul>
                                            </div>
                                            <!-- Confirmation Modal -->
                                            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteModalLabel"><strong>Danger Zone <span><i
                                                                            class="ri-error-warning-fill text-danger"></i></span></strong>
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure you want to delete your profile? This action cannot be undo.
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cancel</button>
                                                            <a href="../user_account/settings/account_settings/deleteprofile.php" class="btn btn-danger"
                                                                id="confirm-delete">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </center>
                        <div id="tabs">
                            <ul>
                                <li><a href="#tab-1"><strong><i class="ri-image-circle-line"></i> Media</strong></a></li>
                                <li><a href="#tab-2"><strong><i class="ri-image-circle-line"></i> Drives</strong></a></li>
                                <li><a href="#tab-3"><strong><i class="ri-chat-1-line"></i> Comments</strong></a></li>
                            </ul>

                            <!-- media-section-start  -->
                            <div id="tab-1">
                                <?php
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
                                                    <div class=" rounded shadow-sm border p-3 mb-2" style=" margin:auto;">
                                                        <div class="d-flex align-items-center mb-3">
                                                            <img src="../media/images/<?php echo htmlspecialchars($user['profile_pic']); ?>" alt="Profile Image"
                                                                class="rounded-circle me-3" width="40px" height="40px">
                                                            <div>
                                                                <h6 class="mb-0 text-dark"><?php echo htmlspecialchars($user['username']); ?></h6>
                                                                <small class="text-muted">Posted on:
                                                                    <?php echo htmlspecialchars($thread['thread_time']); ?></small>
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

                                                            <?php if (!empty($thread['uploaded_image'])) { 
                                                                $thread_id = $thread['thread_id'];
                                                                ?>
                                                                
                                                                <a href="../main/thread.php?thread=<?php echo htmlspecialchars($thread_id, ENT_QUOTES, 'UTF-8'); ?>">
                                                                    <img src="../media/upload/<?php echo htmlspecialchars($thread['uploaded_image'], ENT_QUOTES, 'UTF-8'); ?>"
                                                                        class="rounded" alt="" style="width: 100%;">
                                                                </a>
                                                            <?php } ?>

                                                            <div class="d-flex justify-content-between align-items-center mt-3">

                                                                <div>
                                                                    <a href="../user_account/settings/media_settings/user-thread-edit-page.php?edit=<?php echo htmlspecialchars($thread['thread_id']); ?>"
                                                                        class="btn btn-outline-success btn-sm me-2">
                                                                        <i class="ri-edit-box-line"></i> Edit
                                                                    </a>
                                                                    <a href="../user_account/settings/media_settings/delete-your-threads.php?delete=<?php echo htmlspecialchars($thread['thread_id']); ?>"
                                                                        class="btn btn-outline-danger btn-sm">
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
                                                echo '<div class="alert alert-secondary rounded" role="alert" style="font-size:15px;">No media : (</div>';
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

                            </div>
                            <!-- media-section-end -->

                            <!-- drive-section-start -->
                            <div id="tab-2">
                                <?php
                                $username = $_SESSION['username'];
                                $u = "SELECT * FROM `user` WHERE username='{$username}'";
                                $qr = mysqli_query($conn, $u);

                                if ($qr && mysqli_num_rows($qr) > 0) {
                                    $ed = mysqli_fetch_assoc($qr);
                                    $user_id = $ed['id'];

                                    $w = "SELECT * FROM `user` WHERE id='{$user_id}'";
                                    $r = mysqli_query($conn, $w);

                                    if ($r && mysqli_num_rows($r) > 0) {
                                        $e = mysqli_fetch_assoc($r);
                                        $createdBy = $e['id'];

                                        $sql = "SELECT * FROM `catagory` WHERE created_by='{$createdBy}' ORDER BY created DESC";
                                        $result = mysqli_query($conn, $sql);

                                        if ($result) {
                                            if (mysqli_num_rows($result) > 0) {
                                                while ($disk = mysqli_fetch_assoc($result)) {
                                                    ?>
                                                    <!-- Disk box -Start -->
                                                    <div class=" rounded shadow-sm border mb-2">
                                                        <div class=" bg-dark text-white p-3 rounded-top">
                                                            <h5 class="mb-0">
                                                                <?php echo htmlspecialchars($disk['catagory_name']); ?>
                                                            </h5>
                                                        </div>
                                                        <div class="card-body p-3">
                                                            <h6 class="card-subtitle mb-2 text-muted">
                                                                <?php
                                                                $createdBy = $disk['created_by'];
                                                                $user_sql = "SELECT * FROM `user` WHERE id='{$createdBy}'";
                                                                $user_result = mysqli_query($conn, $user_sql);

                                                                if ($user_result && mysqli_num_rows($user_result) > 0) {
                                                                    $user = mysqli_fetch_assoc($user_result);
                                                                    ?>
                                                                    <b style="color:black;">
                                                                        <?php echo htmlspecialchars($user['username']); ?>
                                                                    </b>
                                                                    <?php
                                                                }
                                                                ?>
                                                                <br>
                                                                <small class="text-muted">
                                                                    Created: <?php echo htmlspecialchars($disk['created']); ?>
                                                                </small>
                                                            </h6>
                                                            <p class="card-text">
                                                                <?php echo htmlspecialchars($disk['catagory_desc']); ?>
                                                            </p>
                                                            <div class="d-flex justify-content-start">
                                                                <a href="../user_account/settings/media_settings/user-disk-edit-page.php?edit=<?php echo $disk['catagory_id']; ?>"
                                                                    class="btn btn-outline-success btn-sm me-2" style="text-decoration:none;">
                                                                    <i class="ri-edit-box-line"></i> Edit
                                                                </a>
                                                                <a href="../user_account/settings/media_settings/delete-your-disks.php?delete=<?php echo $disk['catagory_id']; ?>"
                                                                    class="btn btn-outline-danger btn-sm" style="text-decoration:none;">
                                                                    <i class="ri-delete-bin-5-line"></i> Delete
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Disk box -End -->

                                                    <?php
                                                }
                                            } else {
                                                echo '<div class="alert alert-secondary rounded" role="alert" style="font-size:15px;">No drive : (</div>';
                                            }
                                        } else {
                                            echo "Error: " . mysqli_error($conn);
                                        }
                                    }
                                } else {
                                    echo '<div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">Invalid user!</div>';
                                }
                                ?>
                            </div>
                            <!-- drive-section-end  -->

                            <!-- comment-section-start -->
                            <div id="tab-3">
                                <?php
                                $username = $_SESSION['username'];
                                $sql_query = "SELECT * FROM `user` WHERE username = '{$username}' ";
                                if (mysqli_query($conn, $sql_query)) {
                                    $run = mysqli_query($conn, $sql_query);
                                    if (mysqli_num_rows($run) > 0) {
                                        $row = mysqli_fetch_assoc($run);
                                        $user_id = $row['id'];
                                        $sql = "SELECT * FROM `comments` WHERE comment_by = '{$user_id}' ORDER BY comment_time DESC";
                                        $result = mysqli_query($conn, $sql);
                                        if ($result) {
                                            if (mysqli_num_rows($result) > 0) {
                                                while ($comment = mysqli_fetch_assoc($result)) {
                                                    ?>
                                                    <!-- Comment box -Start  -->
                                                    <div class="rounded p-2 m-2 border ">
                                                        <div class="card-body">
                                                            <h6 class="card-subtitle mb-2 text-body-secondary">
                                                                <b style="color:black;">
                                                                    <?php echo $_SESSION['username']; ?>
                                                                </b>
                                                                <?php
                                                                if (empty($comment['tag_someone'])) {

                                                                } else {
                                                                    ?>
                                                                    <?php
                                                                    $sql = "SELECT * FROM `user` WHERE username = '{$comment['tag_someone']}'";
                                                                    if (mysqli_query($conn, $sql) && mysqli_num_rows(mysqli_query($conn, $sql))) {
                                                                        $tag_user = mysqli_fetch_assoc(mysqli_query($conn, $sql));
                                                                        ?>
                                                                        <i class="ri-arrow-right-double-line"></i>
                                                                        <b><a href="allprofile.php?user=<?php echo $tag_user['id'] ?>"
                                                                                style="color:black; text-decoration:none;">
                                                                                <?php
                                                                    }
                                                                    ?>

                                                                            <?php

                                                                            $sql = "SELECT * FROM `user` WHERE id = '{$comment['tag_someone']}'";
                                                                            $tag_run = mysqli_query($conn, $sql);
                                                                            if ($tag_run && mysqli_num_rows($tag_run) > 0) {
                                                                                $tag_user = mysqli_fetch_assoc($tag_run);
                                                                                ?>
                                                                                <span class="text-secondary fw-light" style="font-size: 14px;">replied to</span>
                                                                                <a href="../users/allprofile.php?user=<?php echo $tag_user['id']; ?>"
                                                                                    class="text-dark text-decoration-none">
                                                                                    <strong><?php echo $tag_user['username']; ?></strong>
                                                                                </a>
                                                                                <?php
                                                                            } else {

                                                                            }
                                                                            ?>
                                                                        </a></b>
                                                                <?php } ?><br>
                                                                <b style="font-weight:lighter; font-size:12px;">
                                                                    <?php echo $comment['comment_time']; ?>
                                                                </b>
                                                            </h6>
                                                            <p class="card-text">
                                                                <?php echo $comment['comment_content']; ?>
                                                            </p>
                                                            <a href="../user_account/settings/media_settings/user-comment-edit-page.php?edit=<?php echo $comment['comment_id']; ?>"
                                                                class="card-link text-success" style="text-decoration:none;"><i
                                                                    class="ri-edit-box-line"></i></a>
                                                            <a href="../user_account/settings/media_settings/delete-your-comments.php?delete=<?php echo $comment['comment_id']; ?>"
                                                                class="card-link text-danger" style="text-decoration:none;"><i
                                                                    class="ri-delete-bin-5-line"></i></a>
                                                        </div>
                                                    </div>
                                                    <!-- Comment box -End  -->
                                                    <?php

                                                }
                                            } else {
                                                echo ' <div class="alert alert-secondary rounded" role="alert" style="font-size:15px;">No comment : (</div>';

                                            }
                                        }
                                    }

                                } else {
                                    echo ' <div class="alert alert-warning rounded-0" role="alert" style="font-size:15px;">Invalid user !</div>';
                                }

                                ?>
                            </div>
                            <!-- comment-section-end -->
                        </div>
                    </div>

                    <?php
                }
            } else {
                ?>
                <script>window.location.href = "../index.php";</script>
                <?php
            }
        }
        ?>

        <?php include "../include/footer.php"; ?>
        <?php include "../include/script.php"; ?>

        <script>
            //Dropdown
            $(document).ready(function () {
                $("#tabs").tabs();
                $("#tabs ul li a").css("background-color", "red");
            });

            //Profile delete confirmation
            $(document).ready(function () {
                $('#delete-profile').on('click', function (e) {
                    e.preventDefault();
                    $('#deleteModal').modal('show');
                });
                $('#confirm-delete').on('click', function () {
                    window.location.href = $(this).attr('href');
                });
            });

            //Zoom Image
            $(document).ready(function () {
                $('#profile-img').on('click', function () {
                    // Get the source of the profile image
                    let imgSrc = $(this).attr('src');

                    // Set the source of the modal image
                    $('#zoomed-img').attr('src', imgSrc);

                    // Show the modal
                    $('#zoomModal').modal('show');
                });
            });




        </script>
    </body>
    </html>
<?php } ?>