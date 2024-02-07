<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Welcome to fSociety your anonymus market - home</title>
</head>
<style>
  <?php include "css/market.css"; ?>
</style>

<body>
  <div class="header header_background">
    <div class="logo">
      <img src="img/fsocietylogo.png" width="120px" height="120px" alt="fsocietylogo" />
    </div>
    <div class="logoText">
      <h2><b class="bigtext">fSociety</b><br><b class="smalltext">the anonymus market</b></h2>
    </div>
  </div>
  <div class="navbar">
    <?php include "afterlog.php"; ?>
  </div>
  <span style="margin-left:20px;"><a href="home.php" style="text-decoration:none; color:black; font-size:12px;">Home</a>
    &rarr; <a href="market.php" style="text-decoration:none; color:black; font-size:12px;">Market</a>
    &rarr; <a href="forum.php" style="text-decoration:none; color:black; font-size:12px;">Forum</a>
  </span>

  <div class="bigBox">

    <div class="useraccount">
      <div class="username">
        User Name:
      </div>
      <div class="yourname">
        <?php echo $_SESSION['username']; ?> <i>(You)</i>
      </div>
    </div>

    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. In corporis saepe quos quod alias dicta aperiam optio
      molestiae
      autem, maxime, culpa necessitatibus sequi nostrum quia minus, porro consequuntur laboriosam quaerat.</p>


  </div>




  <div class="footer">000fSociety</div>
</body>

</html>