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
          <!-- Logo - start  -->
          <a class="navbar-brand d-flex align-items-center" href="main.php">
               <i class="ri-box-2-line text-danger" style="font-size:2rem;"></i>
               <strong class="ms-2" style="font-size:1.5rem;">agguora</strong>
          </a>
          <!-- Logo - end  -->

          <!-- Toggle button -start  -->
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
               aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
          </button>
          <!-- Toggle button -end  -->
          <div class="collapse navbar-collapse" id="navbarNav">
               <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <!-- Recent tab - start -->
                    <li class="nav-item">
                         <a class="nav-link d-flex align-items-center text-dark" aria-current="page" href="main.php"
                              style="text-decoration: none;">
                              <i class="ri-earth-fill me-1" style="color: #010101; font-size: 1.2em;"></i>
                              <span class="fw-semibold">Recent</span>
                         </a>
                    </li>
                    <!-- Recent tab - end -->

                    <!-- Trending tab - start -->
                    <li class="nav-item">
                         <a class="nav-link d-flex align-items-center text-dark" aria-current="page" href="trending.php"
                              style="text-decoration: none;">
                              <i class="ri-funds-box-fill me-1" style="color: #010101; font-size: 1.2em;"></i>
                              <span class="fw-semibold">Trending</span>
                         </a>
                    </li>
                    <!-- Trending tab - end -->

                    <!-- Profile tab - start -->
                    <li class="nav-item">
                         <a class="nav-link d-flex align-items-center text-dark" aria-current="page"
                              href="<?php echo isset($_SESSION['username']) ? 'profile.php' : 'login.php'; ?>"
                              style="text-decoration: none;">
                              <i class="ri-account-circle-fill me-1" style="color: #010101; font-size: 1.2em;"></i>
                              <span
                                   class="fw-semibold"><?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Profile'; ?></span>
                         </a>
                    </li>
                    <!-- Profile tab - end -->

                    <!-- Karma count - start -->
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
                              $disks = $result && mysqli_num_rows($result) > 0 ? mysqli_fetch_assoc($result)['total_rows'] : 0;

                              $sql_count = "SELECT COUNT(*) AS total_rows FROM `threads` WHERE thread_user_id = '{$user_id}'";
                              $result = mysqli_query($conn, $sql_count);
                              $threads = $result && mysqli_num_rows($result) > 0 ? mysqli_fetch_assoc($result)['total_rows'] : 0;

                              $sql_count = "SELECT COUNT(*) AS total_rows FROM `comments` WHERE comment_by = '{$user_id}'";
                              $result = mysqli_query($conn, $sql_count);
                              $comments = $result && mysqli_num_rows($result) > 0 ? mysqli_fetch_assoc($result)['total_rows'] : 0;

                              $karma = $disks + $threads + $comments;
                              ?>
                              <a class="nav-link d-flex align-items-center text-dark" aria-current="page" href="profile.php"
                                   style="text-decoration: none;">
                                   <i class="ri-trophy-fill me-1" style="color: #FFD700; font-size: 1.2em;"></i>
                                   <span class="fw-semibold">Karma:</span>
                                   <b class="ms-1"><?php echo $karma; ?></b>
                              </a>
                         <?php } ?>
                    </li>
                    <!-- Karma count - end -->

                    <!-- Add new post - start -->
                    <li class="nav-item">
                         <a class="nav-link d-flex align-items-center text-dark" aria-current="page"
                              href="<?php echo isset($_SESSION['username']) ? 'newpost.php' : 'login.php'; ?>"
                              style="text-decoration: none;">
                              <i class="ri-edit-box-fill me-1" style="color: #010101; font-size: 1.2em;"></i>
                              <span class="fw-semibold">Add New Post</span>
                         </a>
                    </li>
                    <!-- Add new post - end -->


                    <!-- Drives tab - start -->
                    <li class="nav-item">
                         <?php
                         $sql_count = "SELECT COUNT(*) AS total_rows FROM catagory";
                         $result = mysqli_query($conn, $sql_count);
                         if ($result && mysqli_num_rows($result) > 0) {
                              $row = mysqli_fetch_assoc($result);
                              ?>
                              <a class="nav-link d-flex align-items-center text-dark" aria-current="page" href="drives.php"
                                   style="text-decoration: none;">
                                   <i class="ri-box-1-fill me-1" style="color: #010101; font-size: 1.2em;"></i>
                                   <span class="fw-semibold">Drives</span>
                                   <span class="badge bg-danger ms-2 p-1" style="font-size: 0.9em;">
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
                              <a class="nav-link d-flex align-items-center text-dark" aria-current="page" href="members.php"
                                   style="text-decoration: none;">
                                   <i class="ri-team-fill me-1" style="color: #010101; font-size: 1.2em;"></i>
                                   <span class="fw-semibold">Members</span>
                                   <span class="badge bg-danger ms-2 p-1" style="font-size: 0.9em;">
                                        <?php
                                        $active_count = $row['total_rows'] - 3;
                                        echo $active_count; ?>+
                                   </span>
                              </a>
                         <?php } ?>
                    </li>
                    <!-- Members tab - end -->

                    <!-- Announcements tab - start -->
                    <li class="nav-item">
                         <?php
                         $sql_count = "SELECT COUNT(*) AS total_rows FROM announcement_threads";
                         $result = mysqli_query($conn, $sql_count);
                         if ($result && mysqli_num_rows($result) > 0) {
                              $row = mysqli_fetch_assoc($result);
                              ?>
                              <a class="nav-link d-flex align-items-center text-dark" aria-current="page"
                                   href="nav-announcements.php" style="text-decoration: none;">
                                   <i class="ri-megaphone-fill me-1" style="color: #010101; font-size: 1.2em;"></i>
                                   <span class="fw-semibold">Announcements</span>
                                   <span class="badge bg-danger ms-2 p-1" style="font-size: 0.9em;">
                                        <?php
                                        $active_count = $row['total_rows'] - 3;
                                        echo $active_count; ?>+
                                   </span>
                              </a>
                         <?php } ?>
                    </li>
                    <!-- Announcements tab - end -->


                    <!-- Review tab - start -->
                    <li class="nav-item">
                         <?php
                         $sql_count = "SELECT COUNT(*) AS total_rows FROM review";
                         $result = mysqli_query($conn, $sql_count);
                         if ($result && mysqli_num_rows($result) > 0) {
                              $row = mysqli_fetch_assoc($result);
                              ?>
                              <a class="nav-link d-flex align-items-center text-dark" aria-current="page" href="reviews.php"
                                   style="text-decoration: none;">
                                   <i class="ri-bar-chart-grouped-fill me-1" style="color: #5a5a5a; font-size: 1.2em;"></i>
                                   <span class="fw-semibold">Reviews</span>
                                   <span class="badge bg-danger ms-2 p-1" style="font-size: 0.9em;">
                                        <?php
                                        $active_count = $row['total_rows'] - 3;
                                        echo $active_count; ?>+
                                   </span>
                              </a>
                         <?php } ?>
                    </li>
                    <!-- Review tab - end -->


               </ul>

               <!-- Logout/LogIn  -->
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
                                   <li><a class="dropdown-item" href="login.php"><i class="ri-login-circle-line"></i> Log
                                             In</a></li>
                                   <li><a class="dropdown-item" href="tac-agreed.php"><i class="ri-login-box-line"></i> Sign
                                             Up</a></li>
                              </ul>
                         </li>
                    <?php } ?>
               </ul>
          </div>
     </div>
</nav>

<!-- Navbar -End  -->