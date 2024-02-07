<?php
ob_start();
include "../db_connection.php";
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Welcome to fSociety your anonymous market - home</title>
  <style>
    <?php include "stylesheet/addtopic.css"; ?>
  </style>
</head>

<body>
  <div class="header header_background">
    <div class="logo">
      <img src="../img/fsocietylogo.png" width="120px" height="120px" alt="fsocietylogo" />
    </div>
    <div class="logoText">
      <h2><b class="bigtext">fSociety</b><br><b class="smalltext">the anonymous market</b></h2>
    </div>
  </div>

  <div class="navbar">
    <?php include "forumnav.php"; ?>
  </div>

  <div class="bigBox">
    <div class="formBox">
      <?php
      if (isset($_GET['data'])) {
        $data = $_GET['data'];
        echo "Data parameter found: $data";

        if (isset($_POST['submit'])) {
          // User Input
          $username = $_POST['username'];
          $comment = $_POST['topic_desc'];

          if (!empty($username) && !empty($comment)) {
            $sql_query = "INSERT INTO `replytopost` (`post_comment`, `username`) VALUES ('$comment', '$username');";
            $result = mysqli_query($conn, $sql_query);

            if ($result) {
              // Redirect after successful form submission
              header("Location: showtopic.php?data=$data");
              exit;
            } else {
              echo "Error executing query: " . mysqli_error($conn);
            }
          } else {
            echo "All form fields are required.";
          }
        }
      } else {
        echo "No 'data' parameter in the URL. URL: " . $_SERVER['REQUEST_URI'];
      }
      ?>

      <form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF'] . '?data=' . urlencode($data)); ?>">
        <p><strong>User Name:</strong><br>
          <input type="text" name="username" style="background-color:gainsboro;"
            value="<?php echo isset($_SESSION["username"]) ? $_SESSION["username"] : ''; ?>">
        </p>
        <p><strong> Comment:</strong><br>
          <textarea name="topic_desc" rows="4" cols="32" wrap="virtual"></textarea>
        </p>
        <p><input type="submit" name="submit" style="padding-right:10px; padding-left: 10px;" value="Post"></p>
      </form>
    </div>

    <div class="footer">000fSociety</div>
  </div>
</body>

</html>