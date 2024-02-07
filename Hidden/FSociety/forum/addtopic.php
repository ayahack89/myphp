<?php
include "../db_connection.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Welcome to fSociety your anonymus market - home</title>
</head>
<style>
  <?php include "stylesheet/addtopic.css"; ?>
</style>

<body>
  <div class="header header_background">
    <div class="logo">
      <img src="../img/fsocietylogo.png" width="120px" height="120px" alt="fsocietylogo" />
    </div>
    <div class="logoText">
      <h2><b class="bigtext">fSociety</b><br><b class="smalltext">the anonymus market</b></h2>
    </div>
  </div>
  <div class="navbar">
    <?php include "forumnav.php"; ?>
  </div>
  <span style="margin-left:20px;"><a href="../home.php"
      style="text-decoration:none; color:black; font-size:12px;">Home</a> &rarr; <a href="../market.php"
      style="text-decoration:none; color:black; font-size:12px;">Market</a>
    &rarr; <a href="../forum.php" style="text-decoration:none; color:black; font-size:12px;">Forum</a> &rarr; <a
      href="addtopic.php" style="text-decoration:none; color:black; font-size:12px;">Add New Topics</a>
  </span>

  <div class="bigBox">
    <div class="formBox">
      <a href="topic_listing.php">Check</a>
      <?php


      if ($_SERVER["REQUEST_METHOD"] == 'POST') {
        if (isset($_POST["submit"])) {
          $username = $_POST["username"];
          $topic_title = $_POST["topic_title"];
          $topic_desc = $_POST["topic_desc"];
          $catagories = $_POST["catagories"];

          if (!empty($username) && !empty($topic_title) && !empty($topic_desc) && !empty($catagories)) {
            $sql_query = "INSERT INTO `addtopics` (`username`,`topic_title`, `catagories`, `topic_desc` ) VALUES ('$username', '$topic_title', '$catagories', '$topic_desc');";
            $result = mysqli_query($conn, $sql_query);

            if ($result) {
              $_SESSION['success_message'] = "Topic added successfully";
              $_SESSION['new_topic_title'] = $topic_title;
              exit();


            } else {
              $_SESSION['error_message'] = "Sorry! Something went wrong :(";
            }
          }
        }
      }
      ?>

      <?php if (isset($_SESSION['success_message'])): ?>
        <strong style='color:green;'>
          <?php echo $_SESSION['success_message']; ?>
        </strong><br>
        </br>
        <h3>New Topic <b style='color:red;'>
            <?php echo $_SESSION['new_topic_title']; ?>
          </b> has been created.</h3></br>
        <?php
        unset($_SESSION['success_message']);
        unset($_SESSION['new_topic_title']);
        ?>
      <?php elseif (isset($_SESSION['error_message'])): ?>
        <strong style='color:red;'>
          <?php echo $_SESSION['error_message']; ?>
        </strong><br>
        <?php unset($_SESSION['error_message']); ?>
      <?php endif; ?>

      <form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
        <p><strong>User Name:</strong><br>
          <input type="text" name="username" style="background-color: gainsboro;"
            value="<?php echo $_SESSION["username"]; ?>">
        </p>
        <p><strong>Topic Title:</strong><br>
          <input type="text" name="topic_title">
        </p>
        <p><strong>Choose Category:</strong><br>
          <select name="catagories">
            <option value="#">--Choose a topic category--</option>
            <option value="Hacking">Hacking</option>
            <option value="Programming">Programming</option>
            <option value="Animals">Animals</option>
            <option value="Girls">Girls</option>
            <option value="Crazy">Crazy</option>
            <option value="Others">Others</option>
          </select>
        </p>
        <p><strong> Topic Description:</strong><br>
          <textarea name="topic_desc" rows="4" cols="32" wrap="virtual"></textarea>
        </p>
        <p><input type="submit" name="submit" value="Add Topic"></p>
      </form>

    </div>

    <div class="footer">000fSociety</div>
</body>

</html>