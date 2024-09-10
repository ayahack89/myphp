<?php
include "db_connection.php";
session_start();
ini_set('display_errors', 0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Kindly share your honest review to help us build and grow our community. Your contribution matters!">
  <?php include "bootstrapcss-and-icons.php"; ?>
  
  <link rel="icon" type="image/x-icon" href="img/background/agguoralogo.jpg">
  <title>User Review | Agguora</title>
  <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-YXXL0NCGLE"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-YXXL0NCGLE');
</script>
<style>
    td{
        font-size:12px;
    }
</style>
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
            echo' <div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">Opps! Somthing went wrong : (</div>';
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