<!-- 
<div class="nav">
     <div class="logo">

          <div class="logoText">
               <span class="bigtext">fsociety<br></span>
               <span class="smalltext"><i>"Your Hidden Society"</i></span>
          </div>
     </div>


     <div class="menu">

          <ul>
               <li><a href="topic_listing.php">Forum</a></li>
               <li><a href="../chats/chatroom.php">Live Chat</a></li>
               <li><a href="../profile.php">Profile</a></li>
               <li><a href="../members.php">Members</a></li>
               <li><a href="../rateus.php">Review</a></li>
               <li><a href="#">FAQ</a></li>
               <li><a href="#">Contact</a></li>
               <li><a href="../logout.php">Logout</a></li>
               <li><a href="../index.php">Home</a></li>
          </ul>

     </div>
</div> -->
<style>
     i {
          font-size: 1.2rem;
     }
</style>
<?php
include "../db_connection.php";

?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
     <div class="container-fluid">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
               aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
               <ul class="navbar-nav">
                    <li class="nav-item">
                         <a class="nav-link active" aria-current="page" href="../index.php"><i
                                   class="ri-home-7-fill"></i>
                              Home</a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link active" aria-current="page" href="../profile.php"><i
                                   class="ri-account-circle-fill"></i> Profile</a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link active" aria-current="page" href="../members.php"><i
                                   class="ri-team-fill"></i>
                              Members</a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link active" aria-current="page" href="chatroom.php"><i
                                   class="ri-chat-3-fill"></i> Live Chat</a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link active" href="../rateus.php"><i class="ri-bar-chart-grouped-fill"></i>
                              Reviews</a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link active" href="#"><i class="ri-questionnaire-fill"></i> FAQ</a>
                    </li>
                    <li class="nav-item">
                         <a class="nav-link active" href="#"><i class="ri-phone-fill"></i> Contact Us</a>
                    </li>
                    <?php if (isset($_SESSION['username'])) {
                         ?>
                         <li class="nav-item">
                              <a class="nav-link active" href="../logout.php"><i class="ri-logout-circle-fill"></i>
                                   Logout</a>
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
                                   <li><a class="dropdown-item" href="../login.php"><i class="ri-login-circle-fill"></i> Log
                                             In</a></li>
                                   <li><a class="dropdown-item" href="../register.php"><i class="ri-login-box-fill"></i> Sign
                                             Up</a></li>

                              </ul>
                         </div>

                         <?php
                    }

                    ?>

               </ul>
          </div>
     </div>
</nav>