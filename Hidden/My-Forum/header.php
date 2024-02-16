<style>
     i {
          font-size: 1.2rem;
     }
</style>
<?php
include "db_connection.php";

?>
<!-- Navbar -Start  -->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
     <div class="container-fluid">
          <a class="navbar-brand" href="index.php">Navbar</a>
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
                         <a class="nav-link active" aria-current="page" href="members.php"><i class="ri-team-fill"></i>
                              Members</a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link active" aria-current="page" href="Chats/chatroom.php"><i
                                   class="ri-chat-3-fill"></i> Live Chat</a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link active" href="reviews.php"><i class="ri-bar-chart-grouped-fill"></i>
                              Reviews</a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link active" href="#"><i class="ri-questionnaire-fill"></i> FAQ</a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link active" href="#"><i class="ri-phone-fill"></i> Contact Us</a>
                    </li>
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
                              <a class="btn btn-secondary btn-sm my-2 btn-dark dropdown-toggle" href="#" role="button"
                                   data-bs-toggle="dropdown" aria-expanded="false">
                                   <i class="ri-account-circle-line" style="font-size:1rem;"></i> Create your account
                              </a>

                              <ul class="dropdown-menu">
                                   <li><a class="dropdown-item" href="login.php"><i class="ri-login-circle-fill"></i> Log
                                             In</a></li>
                                   <li><a class="dropdown-item" href="register.php"><i class="ri-login-box-fill"></i> Sign
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