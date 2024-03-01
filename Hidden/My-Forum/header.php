<style>
     i {
          font-size: 1.2rem;
     }
</style>
<?php
include "db_connection.php";
ini_set('display_errors', 0);
?>
<!-- Navbar -Start  -->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
     <div class="container-fluid">
          <a class="navbar-brand my-1 mb-0" href="index.php"><b class="bg-danger px-1 py-2">Ag</b><b
                    class="bg-dark px-1 py-2" style="color:white;">guora</b></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
               aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
               <!-- Navlist -Start  -->
               <ul class="navbar-nav">
                    <li class="nav-item">
                         <a class="nav-link active" aria-current="page" href="index.php"><i class="ri-home-7-fill"></i>
                              Home</a>
                    </li>
                    <!-- Navbar user constraint -Start -->
                    <?php
                    if (isset($_SESSION['username'])) {
                         ?>
                         <li class="nav-item">
                              <a class="nav-link active" aria-current="page" href="profile.php"><i
                                        class="ri-account-circle-fill"></i>
                                   <?php echo $_SESSION['username']; ?>
                              </a>
                         </li>
                         <?php
                    } else {
                         ?>
                         <li class="nav-item">
                              <a class="nav-link active" aria-current="page" href="#"><i class="ri-account-circle-fill"></i>
                                   Profile</a>
                         </li>
                    <?php } ?>
                    <!-- Navbar user constraint -End  -->

                    <li class="nav-item">
                    <?php 
     
                      $sql_count = "SELECT COUNT(*) AS total_rows FROM user";
                      $result = mysqli_query($conn, $sql_count);
                      if ($result && mysqli_num_rows($result) > 0) {
                      $row = mysqli_fetch_assoc($result);
                      // Update this line to echo the count
                       ?>
                         <a class="nav-link active" aria-current="page" href="members.php"><i class="ri-team-fill"></i>
                              Members(<?php echo $row['total_rows'];  ?>)</a>
                              <?php } ?>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link active" aria-current="page" href="chatroom.php"><i
                                   class="ri-chat-3-fill"></i> Live Chat</a>
                    </li>
                    <li class="nav-item">
                         <!-- All disks listing -Start  -->
                         <div class="btn-group">
                         <!-- Disk count -Start  -->
                         <?php 
                         $sql_count = "SELECT COUNT(*) AS total_rows FROM catagory";
                         $result = mysqli_query($conn, $sql_count);
                         if ($result && mysqli_num_rows($result) > 0) {
                              $row = mysqli_fetch_assoc($result);?>
                              <button class=" btn-sm my-2 border-0 bg-light text-dark" type="button">
                                   <i class="ri-hard-drive-3-fill"></i> Disks(<?php echo $row['total_rows'] ?>)
                              </button>
                              <?php } ?>
                         <!-- Disk count -End  -->
                              <button type="button"
                                   class="border-0 dropdown-toggle dropdown-toggle-split my-2 bg-light text-dark"
                                   data-bs-toggle="dropdown" aria-expanded="false">
                                   <span class="visually-hidden">Toggle Dropdown</span>
                              </button>
                              <ul class="dropdown-menu">
                                   <?php
                                   $sql = "SELECT * FROM `catagory`";
                                   $result = mysqli_query($conn, $sql);
                                   if ($result) {
                                        if (mysqli_num_rows($result) > 0) {
                                             while ($list = mysqli_fetch_assoc($result)) {
                                                  ?>
                                                  <li> <a href="disk.php?Disk=<?php echo $list['catagory_id']; ?>"
                                                            class="dropdown-item bg-dark text-light"
                                                            style="text-decoration:none; color:black;"><i
                                                                 class="ri-hard-drive-3-line"></i>
                                                            <?php echo $list['catagory_name']; ?>
                                                       </a></li>

                                                  <?php
                                             }
                                        }
                                   }
                                   ?>

                              </ul>
                         </div>
                         <!-- All disks listing -End  -->
                    </li>

                    <li class="nav-item">
                         <a class="nav-link active" href="#"><i class="ri-questionnaire-fill"></i> FAQ</a>
                    </li>



                    <!-- <li class="nav-item">
                         <a class="nav-link active" href="#" id="notification">
                              <i class="ri-notification-2-fill"></i>
                         </a>
                    </li> -->


                    <!-- Navbar user login constraint -Start  -->
                    <?php if (isset($_SESSION['username'])) {
                         ?>
                         <li class="nav-item">
                              <a class="nav-link active" href="logout.php"><i class="ri-logout-circle-fill"></i> Logout</a>
                         </li>
                         <?php

                    } else {
                         ?>
                         <div class="dropdown">
                              <a class="btn  btn-sm my-2 btn-danger dropdown-toggle rounded-0 text-light" role="button"
                                   data-bs-toggle="dropdown" aria-expanded="false" style="color:black;">
                                   <i class="ri-account-circle-line" style="font-size:1rem;"></i> Create your account
                              </a>

                              <ul class="dropdown-menu">
                                   <li><a class="dropdown-item bg-dark text-light" href="login.php"><i
                                                  class="ri-login-circle-line"></i> Log
                                             In</a></li>
                                   <li><a class="dropdown-item bg-dark text-light" href="register.php"><i
                                                  class="ri-login-box-line"></i> Sign
                                             Up</a></li>

                              </ul>
                         </div>

                         <?php
                    }

                    ?>
                    <!-- Navbar user login constraint -End  -->

               </ul>
               <!-- Navlist -End  -->
          </div>
     </div>
</nav>



<!-- Navbar -End  -->