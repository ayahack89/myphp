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
  <title>Welcome to fSociety your anonymous market - home</title>
</head>
<?php include "fonts.php"; ?>

<body>
  <?php include "header.php"; ?>
  <?php
  if (isset($_GET['topic'])) {
    $data = mysqli_real_escape_string($conn, isset($_GET['topic']) ? $_GET['topic'] : 'Invalid Data');
    // echo "Data parameter found: $data";
  
    if (isset($_POST['submit'])) {
      // User Input
      $username = $_SESSION['username'];
      $comment = $_POST['comment'];

      if (!empty($username) && !empty($comment)) {
        $sql_query = "INSERT INTO `replytopost` (`post_comment`, `username`) VALUES ('$comment', '$username');";
        $result = mysqli_query($conn, $sql_query);

        if ($result) {
          // Redirect after successful form submission
          header('Location: showtopic.php?topic="$data"');
          exit();
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
  <div class="container w-50 px-5 py-5">
    <form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF'] . '?data=' . urlencode($data)); ?>">

      <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">@</span>
        <input type="text" class="form-control" placeholder="Username" aria-label="Username"
          aria-describedby="basic-addon1" value="<?php echo $_SESSION['username']; ?>" disabled>
      </div>
      <div class="form-floating">
        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"
          name="comment"></textarea>
        <label for="floatingTextarea2">Comments</label>
      </div><br>
      <button type="submit" name="submit" class="btn btn-dark text-light">Comment</button>
    </form>
  </div>

  <?php include "footer.php"; ?>
  <?php include "bootstrapjs.php"; ?>
</body>

</html>