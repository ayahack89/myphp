<?php
session_start();
include "../db_connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Welcome to fSociety your anonymous market - home</title>
  <style>
    <?php include "stylesheet/showtopic.css"; ?>
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
    <?php
    // Check if 'data' parameter is set
    if (isset($_GET['data'])) {
      $data = $_GET['data'];
      echo "Parameter found: " . $data;

      // Display information about the main topic
      $sqlquery = "SELECT * FROM `addtopics` WHERE topic_id = '$data'";
      $run = mysqli_query($conn, $sqlquery);

      if ($run) {
        if (mysqli_num_rows($run) > 0) {
          $row = mysqli_fetch_assoc($run);

          echo '<div style="display:flex; padding:20px; background-color:#cbd5e1; border:1px outset #cbd5e1; border-radius:5px; margin:5px">';
          echo '<div style="display:grid; width:20%;">';
          echo '<span><b style="color:green">Post admin:</b> ' . $row['username'] . '</span>';
          echo '<span style=" font-size:12px; font-weight:lighter;"> [' . $row['topic_create_time'] . ']</span>';
          echo '</div>';
          echo '<div style="display:grid; width:80%;">';
          echo '<span><b style="color:red; padding-left:50px;">Topic name: </b> ' . $row['topic_title'] . '</span>';
          echo '<span style="padding-left:50px;">&rarr; ' . $row['topic_desc'] . '</span>';
          echo '<span style="padding-left:50px; margin-top:20px;"><a style="background-color:#94a3b8; width:10px; text-decoration:none; padding:5px; border-radius:5px; color:#1e293b; " href="replytopost.php?data=' . $row['topic_desc'] . '">Comment</a>' . '</span>';
          echo '</div>';
          echo '</div>';
        } else {
          echo "<h4 style='color:red;'>No data found :  (</h4>";
        }
      } else {
        echo "Error in SQL query: " . mysqli_error($conn);
      }
      // Display comments related to the main topic
      $sql = "SELECT * FROM `replytopost` WHERE post_comment = '$_GET[post_comment]'";
      $result = mysqli_query($conn, $sql);

      if ($result) {
        if (mysqli_num_rows($result) > 0) {
          echo '<table>'; // Uncomment this line if you want to use a table
          while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td><b style="color:green;">Comment by:</b> ' . $row['username'] . '</br>[' . $row['post_create_time'] . ']</td>';
            echo '<td><b style="color:red;">Comment on: </b>' . $row['post_title'] . '</br>&rarr;  ' . $row['post_comment'] . '</td>';
            echo '<td><a style="background-color:#94a3b8; text-decoration:none; padding:5px; border-radius:5px; color:#1e293b; " href="replytopost.php?data=' . $row['post_comment'] . '">Comment</a>' . '</td>';
            echo '</tr>';
          }
          echo '</table>'; // Uncomment this line if you want to use a table
        } else {
          echo "<h4 style='color:red;'>No comments found :  (</h4>";
        }
      } else {
        echo "Error in SQL query: " . mysqli_error($conn);
      }
    } else {
      echo "No 'data' parameter in the URL.";
    }
    ?>
  </div>

  <div class="footer">000fSociety</div>
</body>

</html>