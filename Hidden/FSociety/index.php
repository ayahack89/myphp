<?php
include "db_connection.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
</head>

<body>
  <?php
  echo $_SESSION['username'];
  ?>
  <br>
  <button><a href="post.php">Post</a></button>

  <br><br>
  <div style="display:flex;">
    <table>
      <th>Profile pic</th>

      <?php
      $sql_query = "SELECT * FROM `user`";
      $result = mysqli_query($conn, $sql_query);

      if ($result) {
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {


            ?>
            <tr>

              <td><img src="img/images/<?php echo $row['profile_pic']; ?>" alt="yourimage" height="50px" width="80px"></td>
            </tr>
            <?php
          }
        } else {

        }
      }

      ?>

    </table>
    <table>
      <th>ID</th>
      <th>Topic Name</th>
      <th>Views</th>
      <th>Creator</th>
      <th>Date</th>
      <?php

      $sql = "SELECT * FROM `topics`";
      $result = mysqli_query($conn, $sql);
      if ($result) {
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['topic_id'];
            ?>

            <tr>
              <td>
                <?php echo $row['topic_id']; ?>
              </td>
              <td>
                <a href="topic.php?id=<?php echo $id; ?>">
                  <?php echo $row['topic_name']; ?>
                </a>


                </a>
              </td>
              <td>
                <?php echo $row['views'] ?>
              </td>
              <td>
                <?php echo $row['topic_creator'] ?>
              </td>
              <td>
                <?php echo $row['date']; ?>
              </td>
            </tr>
            <?php
          }
        } else {
          echo "No topic found!";
        }

      } else {
        echo "Opps! Somthing went wrong";
      }

      ?>

    </table>
  </div>
</body>

</html>