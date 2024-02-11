<?php
session_start();
include "db_connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <?php include "bootstrapcss-and-icons.php"; ?>
  <title>Welcome to fSociety your anonymous market - home</title>

</head>
<?php include "fonts.php"; ?>

<body>

  <?php include "header.php"; ?>
  <?php
  // Check if 'data' parameter is set
  if (isset($_GET['data'])) {
    $data = mysqli_real_escape_string($conn, isset($_GET['data']) ? $_GET['data'] : 'Invalid ID');

    // echo "Parameter found: " . $data;
  
    // Display information about the main topic
    $sqlquery = "SELECT * FROM `addtopics` WHERE topic_id = '$data'";
    $run = mysqli_query($conn, $sqlquery);

    if ($run) {
      if (mysqli_num_rows($run) > 0) {
        $row = mysqli_fetch_assoc($run);
        ?>
        <div class="container">
          <div class="d-flex border rounded bg-light px-3 py-3">
            <div>
              <span><b style="color:green">Post admin:</b>
                <?php echo $row['username']; ?>
              </span><br>
              <span style=" font-size:12px; font-weight:lighter;">[
                <?php echo $row['topic_create_time']; ?>]
              </span>
            </div>
            <div style="display:grid; width:80%;">
              <span><b style="color:red; padding-left:50px;">Topic name: </b>
                <?php echo $row['topic_title']; ?>
              </span>
              <span style="padding-left:50px;">&rarr;
                <?php echo $row['topic_desc'] ?>
              </span>
              <button type="button" class="btn btn-dark text-light" style="width:150px; margin-left:50px; margin-top:10px;"><a
                  href="replytopost.php?topic='<?php echo $row['topic_id'] ?> '"
                  style="text-decoration:none; color:white;">Comment</a></button>
            </div>
          </div>
          <?php
      } else {
        echo "<h4 style='color:red;'>No data found :  (</h4>";
      }
    } else {
      echo "Error in SQL query: " . mysqli_error($conn);
    }
    // Display comments related to the main topic
    $get_topic_id = mysqli_real_escape_string($conn, isset($_GET['topic']) ? $_GET['topic'] : 'Sorry Server problem : (');
    $sql = "SELECT * FROM `replytopost` WHERE id = '{$get_topic_id}'";
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
  <?php include "footer.php"; ?>
  <?php include "bootstrapjs.php" ?>
</body>

</html>