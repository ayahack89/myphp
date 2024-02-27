<?php
include "db_connection.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <?php include "bootstrapcss-and-icons.php"; ?>
  <title>fSociety - Check your reviews</title>
</head>
<?php include "fonts.php"; ?>

<body class="bg-light">
  <?php include "header.php"; ?>


  <div class="container my-3">
    <table class="table table-light table-striped border">
      <thead class="table-dark text-white">
        <th style="font-weight:lighter;">User</th>
        <th style="font-weight:lighter;">Ratings</th>
        <th style="font-weight:lighter;">Comments</th>
      </thead>
      <tbody>
        <tr>
          <?php
          include "db_connection.php";
          $sqlquery = "SELECT * FROM `review`";
          $fetching = mysqli_query($conn, $sqlquery);
          if ($fetching) {
            if (mysqli_num_rows($fetching) > 0) {
              while ($row = mysqli_fetch_assoc($fetching)) {

                ?>
                <td>
                  <?php echo $row["user"]; ?>
                </td>
                <td>
                  <?php echo $row["ratings"]; ?>
                </td>
                <td>
                  <?php echo $row["comments"]; ?>
                </td>
              </tr>
              <?php

              }
            }
          } else {
            die("Somthing went wrong!" . mysqli_error($conn));
          }

          ?>
      </tbody>
    </table>
    <p>Don't forget to give your ratings <br> <a href="rateus.php">click here</a> to give your ratings.</p>
  </div>

  <?php include "footer.php"; ?>
  <?php include "bootstrapjs.php"; ?>
</body>

</html>