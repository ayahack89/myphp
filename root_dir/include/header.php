<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Navbar</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
     <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
     <style>
          /* Navbar customization */
          .navbar {
               background-color: #fff;
               border-bottom: 1px solid #e0e0e0;
          }

          .navbar-brand {
               font-size: 1.5rem;
               font-weight: bold;
          }

          .navbar-toggler.custom-toggler {
               border: none;
          }

          .custom-toggler .ri-menu-3-fill {
               font-size: 1.7rem;
               color: #333;
          }

          .custom-toggler.collapsed .ri-menu-3-fill {
               color: #ff4c4c;
          }

          .nav-link {
               color: #333;
               font-size: 1.1rem;
          }

          .nav-link:hover,
          .nav-link:focus {
               background-color: whitesmoke;
               border: none;
               border-radius: 50px;
          }

          .badge {
               background-color: #ff4c4c;
               font-size: 0.75rem;
          }
     </style>
</head>

<body>

     <nav class="navbar navbar-expand-lg shadow-sm">
          <div class="container-fluid">
               <!-- Logo -->
               <a class="navbar-brand d-flex align-items-center" href="../home/main.php">
                    <i class="ri-box-2-line text-danger me-2" style="font-size: 2rem;"></i>
                    <span><strong>agguora</strong></span>
               </a>

               <!-- Toggle button for mobile view -->
               <button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="ri-menu-3-fill"></i>
               </button>

               <div class="collapse navbar-collapse" id="navbarNav">
                    <!-- Left side links -->
                    <ul class="navbar-nav me-auto">
                         <li class="nav-item">
                              <a class="nav-link d-flex align-items-center" href="../home/main.php">
                                   <i class="ri-earth-line me-1"></i> Recent
                              </a>
                         </li>
                         <li class="nav-item">
                              <a class="nav-link d-flex align-items-center" href="../home/trending.php">
                                   <i class="ri-funds-box-line me-1"></i> Trending
                              </a>
                         </li>
                         <li class="nav-item">
                              <?php
                              if (isset($_SESSION['username'])){
                              $username = $_SESSION['username'];
                              $user_db = "SELECT * FROM `user` WHERE username= '{$username}'";
                              $run = mysqli_query($conn, $user_db);
                              if ($run && mysqli_num_rows($run) > 0) {
                                   $u = mysqli_fetch_assoc($run);
                                   $user_id = $u['id'];

                                   $sql_count = "SELECT COUNT(*) AS total_rows FROM `catagory` WHERE created_by = '{$user_id}'";
                                   $result = mysqli_query($conn, $sql_count);
                                   $disks = $result && mysqli_num_rows($result) > 0 ? mysqli_fetch_assoc($result)['total_rows'] : 0;

                                   $sql_count = "SELECT COUNT(*) AS total_rows FROM `threads` WHERE thread_user_id = '{$user_id}'";
                                   $result = mysqli_query($conn, $sql_count);
                                   $threads = $result && mysqli_num_rows($result) > 0 ? mysqli_fetch_assoc($result)['total_rows'] : 0;

                                   $sql_count = "SELECT COUNT(*) AS total_rows FROM `comments` WHERE comment_by = '{$user_id}'";
                                   $result = mysqli_query($conn, $sql_count);
                                   $comments = $result && mysqli_num_rows($result) > 0 ? mysqli_fetch_assoc($result)['total_rows'] : 0;

                                   $karma = $disks + $threads + $comments;
                                   ?>
                                   <a class="nav-link d-flex align-items-center" href="../user_account/profile.php">
                                        <i class="ri-trophy-fill me-1 text-warning"></i> <span><?php echo $karma; ?></span>
                                   </a>
                              <?php }}else{

                              } ?>
                         </li>
                         <li class="nav-item">
                              <a class="nav-link d-flex align-items-center"
                                   href="<?php echo isset($_SESSION['username']) ? '../main/newpost.php' : '../authentication/login.php'; ?>">
                                   <i class="ri-edit-box-line me-1"></i> Post 
                              </a>
                         </li>

                         <li class="nav-item">
                              <a class="nav-link d-flex align-items-center"
                                   href="<?php echo isset($_SESSION['username']) ? '../notification/notification.php' : '../authentication/login.php'; ?>">
                                   <i class="ri-notification-2-line"></i>&nbsp;Notification
                              </a>
                         </li>

                         <!-- Explore Dropdown -->
                         <li class="nav-item dropdown">
                             
                              <a class="nav-link dropdown-toggle" href="#" id="exploreDropdown" role="button"
                                   data-bs-toggle="dropdown" aria-expanded="false">
                                   Explore
                              </a>
                              <ul class="dropdown-menu" aria-labelledby="exploreDropdown">
                              <div class="container">
                                   <!-- Drives tab - start -->
                                   <li class="nav-item">
                                        <?php
                                        $sql_count = "SELECT COUNT(*) AS total_rows FROM catagory";
                                        $result = mysqli_query($conn, $sql_count);
                                        if ($result && mysqli_num_rows($result) > 0) {
                                             $row = mysqli_fetch_assoc($result);
                                             ?>
                                             <a class="nav-link d-flex align-items-center text-dark" aria-current="page"
                                                  href="../main/drives.php" style="text-decoration: none;">
                                                  <i class="ri-box-1-line me-1"
                                                       style="color: #010101; font-size: 1.1em;"></i>
                                                  <span>Drives</span>
                                                  <span class="badge bg-danger ms-2 p-1 rounded-circle" style="font-size: 0.7em;">
                                                       <?php
                                                       $active_count = $row['total_rows'] - 3;
                                                       echo $active_count; ?>+
                                                  </span>
                                             </a>
                                        <?php } ?>
                                   </li>
                                   <!-- Drives tab - end -->
                                   <!-- Members tab - start -->
                                   <li class="nav-item">
                                        <?php
                                        $sql_count = "SELECT COUNT(*) AS total_rows FROM user";
                                        $result = mysqli_query($conn, $sql_count);
                                        if ($result && mysqli_num_rows($result) > 0) {
                                             $row = mysqli_fetch_assoc($result);
                                             ?>
                                             <a class="nav-link d-flex align-items-center text-dark" aria-current="page"
                                                  href="../users/members.php" style="text-decoration: none;">
                                                  <i class="ri-team-line me-1" style="color: #010101; font-size: 1.1em;"></i>
                                                  <span>Members</span>
                                                  <span class="badge bg-danger ms-2 p-1 rounded-circle" style="font-size: 0.7em;">
                                                       <?php
                                                       $active_count = $row['total_rows'] - 3;
                                                       echo $active_count; ?>+
                                                  </span>
                                             </a>
                                        <?php } ?>
                                   </li>
                                   <!-- Members tab - end -->

                                   <!-- Announcement tab was removed  -->
                                   <!-- Announcements tab - start -->
                                   <!-- <li class="nav-item">
                                        <?php
                                        // $sql_count = "SELECT COUNT(*) AS total_rows FROM announcement_threads";
                                        // $result = mysqli_query($conn, $sql_count);
                                        // if ($result && mysqli_num_rows($result) > 0) {
                                        //      $row = mysqli_fetch_assoc($result);
                                             ?>
                                             <a class="nav-link d-flex align-items-center text-dark" aria-current="page"
                                                  href="nav-announcements.php" style="text-decoration: none;">
                                                  <i class="ri-megaphone-line me-1"
                                                       style="color: #010101; font-size: 1.1em;"></i>
                                                  <span>Announcements</span>
                                                  <span class="badge bg-danger ms-2 p-1 rounded-circle" style="font-size: 0.7em;">
                                                       <?php
                                                       // $active_count = $row['total_rows'] - 3;
                                                       // echo $active_count; ?>+
                                                  </span>
                                             </a>
                                        <?php 
                                        // } 
                                        ?>
                                   </li> -->
                                   <!-- Announcements tab - end -->

                                   <!-- Review tab was removed -->
                                   <!-- Review tab - start -->
                                   <!-- <li class="nav-item">
                                        <?php
                                        // $sql_count = "SELECT COUNT(*) AS total_rows FROM review";
                                        // $result = mysqli_query($conn, $sql_count);
                                        // if ($result && mysqli_num_rows($result) > 0) {
                                        //      $row = mysqli_fetch_assoc($result);
                                             ?>
                                             <a class="nav-link d-flex align-items-center text-dark" aria-current="page"
                                                  href="reviews.php" style="text-decoration: none;">
                                                  <i class="ri-bar-chart-grouped-line me-1"
                                                       style="color: #5a5a5a; font-size: 1.1em;"></i>
                                                  <span>Reviews</span>
                                                  <span class="badge bg-danger ms-2 p-1 rounded-circle" style="font-size: 0.7em;">
                                                       <?php
                                                       // $active_count = $row['total_rows'] - 3;
                                                       // echo $active_count; ?>+
                                                  </span>
                                             </a>
                                        <?php
                                   //  } 
                                    ?>
                                   </li> -->
                                   <!-- Review tab - end -->
                              </div>
                         </li>
                         </ul>
                    </ul>

                    <!-- Right side links (Profile/Login/Logout) -->
                    <ul class="navbar-nav">
                         <li class="nav-item">
                              <a class="nav-link d-flex align-items-center"
                                   href="<?php echo isset($_SESSION['username']) ? '../user_account/profile.php' : '../authentication/login.php'; ?>">
                                   <?php if (isset($_SESSION['username'])) { ?>
                                        <?php
                                        $userId = $_SESSION['id'];
                                        $sql = "SELECT * FROM `user` WHERE id = '{$userId}'";
                                        $result = mysqli_query($conn, $sql);
                                        if ($result && mysqli_num_rows($result) > 0) {
                                             $dp = mysqli_fetch_assoc($result);
                                             ?>
                                             <img src="../media/images/<?php echo $dp['profile_pic']; ?>" class="rounded-circle me-2"
                                                  alt="<?php echo htmlspecialchars($dp['about']); ?>"
                                                  style="width: 32px; height: 32px; object-fit: cover;">
                                        <?php } ?>
                                   <?php } else { ?>
                                        <i class="ri-account-circle-line me-1"></i> 
                                   <?php } ?>
                              </a>
                         </li>
                         <?php if (isset($_SESSION['username'])) { ?>
                              <li class="nav-item">
                              <a class="nav-link d-flex align-items-center text-danger" href="../authentication/logout.php">
                              <i class="ri-logout-circle-line"></i>&nbsp;Logout
                              </a>
                              </li>
                         <?php } else { ?>
                              <a class="nav-link d-flex align-items-center" href="../authentication/login.php">
                              <i class="ri-login-circle-line"></i>&nbsp;Login
                              </a>
                              <li class="nav-item ms-2">
                              <a class="nav-link d-flex align-items-center" href="../authentication/register.php">
                              <i class="ri-user-add-line"></i>&nbsp;  Signup
                              </a>
                              </li>
                         <?php } ?>
                    </ul>
               </div>
          </div>
     </nav>
</body>

</html>