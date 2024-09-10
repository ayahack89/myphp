<style>
      .navbar-nav .nav-link {
          font-size: 1rem;
          padding: 0.5rem 1rem;
     }
     .navbar-brand {
          font-size: 1.5rem;
     }
     .nav-item .badge {
          font-size: 0.8rem;
</style>
<?php
include "db_connection.php";
ini_set('display_errors', 0);
?>
<!-- Navbar -Start  -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
     <div class="container-fluid">
          <a class="navbar-brand d-flex align-items-center" href="main.php">
               <i class="ri-box-2-line text-danger" style="font-size:2rem;"></i>
               <strong class="ms-2" style="font-size:1.5rem;">agguora</strong>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
               aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
               <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                         <a class="nav-link text-dark" aria-current="page" href="main.php">
                              <i class="ri-earth-fill"></i> Recent
                         </a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link text-dark" aria-current="page" href="trending.php">
                              <i class="ri-funds-box-fill"></i> Trending
                         </a>
                    </li>
                    <?php if (isset($_SESSION['username'])) { ?>
                         <li class="nav-item">
                              <a class="nav-link text-dark" aria-current="page" href="profile.php">
                                   <i class="ri-account-circle-fill"></i> <?php echo $_SESSION['username']; ?>
                              </a>
                         </li>
                    <?php } else { ?>
                         <li class="nav-item">
                              <a class="nav-link text-dark" aria-current="page" href="login.php">
                                   <i class="ri-account-circle-fill"></i> Profile
                              </a>
                         </li>
                    <?php } ?>
                    <li class="nav-item">
                         <?php
                         $username = $_SESSION['username'];
                         $user_db = "SELECT * FROM `user` WHERE username= '{$username}'";
                         $run = mysqli_query($conn, $user_db);
                         if ($run && mysqli_num_rows($run) > 0) {
                              $u = mysqli_fetch_assoc($run);
                              $user_id = $u['id'];

                              $sql_count = "SELECT COUNT(*) AS total_rows FROM `catagory` WHERE created_by = '{$user_id}'";
                              $result = mysqli_query($conn, $sql_count);
                              if ($result && mysqli_num_rows($result) > 0) {
                                   $row = mysqli_fetch_assoc($result);
                                   $disks = $row['total_rows'];
                              }

                              $sql_count = "SELECT COUNT(*) AS total_rows FROM `threads` WHERE thread_user_id = '{$user_id}'";
                              $result = mysqli_query($conn, $sql_count);
                              if ($result && mysqli_num_rows($result) > 0) {
                                   $row = mysqli_fetch_assoc($result);
                                   $threads = $row['total_rows'];
                              }

                              $sql_count = "SELECT COUNT(*) AS total_rows FROM `comments` WHERE comment_by = '{$user_id}'";
                              $result = mysqli_query($conn, $sql_count);
                              if ($result && mysqli_num_rows($result) > 0) {
                                   $row = mysqli_fetch_assoc($result);
                                   $comments = $row['total_rows'];

                                   $karma = $disks + $threads + $comments;
                                   echo '<a class="nav-link text-dark" aria-current="page" href="profile.php">
                                        <i class="ri-trophy-fill"></i> Karma: <b>' . $karma . '</b></a>';
                              }
                         }
                         ?>
                    </li>
                    <li class="nav-item">
                         <?php if (isset($_SESSION['username'])) { ?>
                              <a class="nav-link text-dark" aria-current="page" href="newpost.php">
                                   <i class="ri-edit-box-fill"></i> Add new post
                              </a>
                         <?php } else { ?>
                              <a class="nav-link text-dark" aria-current="page" href="login.php">
                                   <i class="ri-edit-box-fill"></i> Add new post
                              </a>
                         <?php } ?>
                    </li>
                    <li class="nav-item">
                         <?php
                         $sql_count = "SELECT COUNT(*) AS total_rows FROM catagory";
                         $result = mysqli_query($conn, $sql_count);
                         if ($result && mysqli_num_rows($result) > 0) {
                              $row = mysqli_fetch_assoc($result);
                              ?>
                              <a class="nav-link text-dark" aria-current="page" href="drives.php">
                                   <i class="ri-box-1-fill"></i> Drives <span class="text-danger">(<?php
                                   $active_count = $row['total_rows'] - 3;
                                   echo $active_count; ?>+)</span>
                              </a>
                         <?php } ?>
                    </li>
                    <li class="nav-item">
                         <?php
                         $sql_count = "SELECT COUNT(*) AS total_rows FROM user";
                         $result = mysqli_query($conn, $sql_count);
                         if ($result && mysqli_num_rows($result) > 0) {
                              $row = mysqli_fetch_assoc($result);
                              ?>
                              <a class="nav-link text-dark" aria-current="page" href="members.php">
                                   <i class="ri-team-fill"></i> Members <span class="text-danger">(<?php
                                   $active_count = $row['total_rows'] - 3;
                                   echo $active_count; ?>+)</span>
                              </a>
                         <?php } ?>
                    </li>
                    <li class="nav-item">
                         <?php
                         $sql_count = "SELECT COUNT(*) AS total_rows FROM announcement_threads";
                         $result = mysqli_query($conn, $sql_count);
                         if ($result && mysqli_num_rows($result) > 0) {
                              $row = mysqli_fetch_assoc($result);
                              ?>
                              <a class="nav-link text-dark" aria-current="page" href="nav-announcements.php">
                                   <i class="ri-megaphone-fill"></i> Announcements <span class="text-danger">(<?php
                                   $active_count = $row['total_rows'] - 3;
                                   echo $active_count; ?>+)</span>
                              </a>
                         <?php } ?>
                    </li>
                    <li class="nav-item">
                         <?php
                         $sql_count = "SELECT COUNT(*) AS total_rows FROM review";
                         $result = mysqli_query($conn, $sql_count);
                         if ($result && mysqli_num_rows($result) > 0) {
                              $row = mysqli_fetch_assoc($result);
                              ?>
                              <a class="nav-link text-dark" aria-current="page" href="reviews.php">
                                   <i class="ri-bar-chart-grouped-fill"></i> Reviews <span class="text-danger">(<?php
                                   $active_count = $row['total_rows'] - 3;
                                   echo $active_count; ?>+)</span>
                              </a>
                         <?php } ?>
                    </li>
               </ul>
               <ul class="navbar-nav mb-2 mb-lg-0">
                    <?php if (isset($_SESSION['username'])) { ?>
                         <li class="nav-item">
                              <a class="nav-link text-light bg-danger rounded px-2 py-1 mt-1" href="logout.php">
                                   <i class="ri-logout-circle-line"></i> Logout
                              </a>
                         </li>
                    <?php } else { ?>
                         <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle btn btn-sm btn-danger text-light rounded" href="#"
                                   id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                   <i class="ri-account-circle-line"></i> Account
                              </a>
                              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                   <li><a class="dropdown-item" href="login.php"><i class="ri-login-circle-line"></i> Log In</a></li>
                                   <li><a class="dropdown-item" href="tac-agreed.php"><i class="ri-login-box-line"></i> Sign Up</a></li>
                              </ul>
                         </li>
                    <?php } ?>
               </ul>
          </div>
     </div>
</nav>

<!-- Navbar -End  -->