<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['message'])) {
    $message = htmlspecialchars($_POST['message']);
    $user = $_SESSION['username'];

    file_put_contents('chatlog.txt', "<strong>$user:</strong> $message<br>", FILE_APPEND);

    // Redirect to prevent form resubmission
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'])) {
    $_SESSION['username'] = htmlspecialchars($_POST['username']);
    // Redirect to prevent form resubmission
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="30"> 
    <title>fSociety - chatroom</title>
</head>
<style><?php include "../css/chatroom.css"; ?></style>
<body>
      <div class="header header_background">
        <div class="logo">
          <img
            src="../img/fsocietylogo.png"
            width="120px"
            height="120px"
            alt="fsocietylogo"
          />
        </div>
        <div class="logoText">
          <h2><b class="bigtext">fSociety</b><br><b class="smalltext">the anonymus market</b></h2>
        </div>
      </div>
      <div class="navbar">
        <?php include "chatnav.php"; ?>
      </div>
      <span style="margin-left:20px;"><a href="../home.php" style="text-decoration:none; color:black; font-size:12px;">Home</a> &rarr; <a href="../market.php" style="text-decoration:none; color:black; font-size:12px;">Market</a>
      &rarr; <a href="../forum.php" style="text-decoration:none; color:black; font-size:12px;">Forum</a>  &rarr; <a href="chatroom.php" style="text-decoration:none; color:black; font-size:12px;">Live Chat</a>
    </span>
      <div class="main">
      <div class="scroll background">  
        <div class="messageBox">  
    <?php echo file_get_contents('chatlog.txt'); ?>
      </div>
      </div>
      <center>
        <form method="post" action="">
    <?php
    if (!isset($_SESSION['username'])) {
        echo "Somthing went wrong : (";
        echo "You are not a member of our community.";
        echo "Please login to acces our chatroom.";
    } else {
        echo '<label for="message"> @' . $_SESSION['username'] . '> </label>
      <input type="text" id="message" name="message" placeholder="Let\'s talk. . . ." required>
      <input type="submit" value="Send">';

    }
    ?></form>
      </center>
      <p> <b>Note that:</b> This page is refreshed after every 30 seconds. So please write the message within 30 seconds and just press the enter button. 
      This is the most epic chatroom on the darknet. There is no restriction on your communication. You can talk whatever you want. 
      But please kindly maintain the community rules as a human & strictly please don't share any kind of child pornographic content link, 
      drug links or any kind of illegal links. This community is specifically for hacking purposes. So maintain this thing and make fun : ) </p>
   
      </div>
      <div class="footer">000fSociety</div>
  </body>
</html>
