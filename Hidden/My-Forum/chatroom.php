<?php
include "db_connection.php";
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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include "bootstrapcss-and-icons.php"; ?>
  <title>Chat-Page</title>
</head>
<?php include "fonts.php"; ?>

<body class="bg-light">
  <?php include "header.php"; ?>
  <div style="margin:auto; margin-top:20px;">
    <div class="container py-5 px-5  border rounded-0">
      <div class="scroll background">
        <div class="messageBox" style="font-size:12px;">
          <?php echo file_get_contents('chatlog.txt'); ?>
        </div>
      </div>
    </div>

    <form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
      <?php
      if (!isset($_SESSION['username'])) {
        ?>
        <div class="alert alert-danger my-2 d-flex align-items-center" role="alert">

          <use xlink:href="#exclamation-triangle-fill" />
          </svg>
          <div>
            <i class="ri-alert-fill"></i> You are not a member of our community. Please <a href="../login.php"
              style="color:maroon;">logIn</a> and get access of our chatroom.
          </div>
        </div>
        <?php
      } else {
        echo '<div class="container w-100 py-2 px-2 bg-light border rounded-0">';
        echo ' <div class="input-group">';
        echo ' <div class="input-group-text bg-dark text-light rounded-0"> <i class="ri-user-line"></i>' . $_SESSION['username'] . ' </div>
      <input type="text" id="message" name="message" class="form-control" placeholder="Let\'s talk. . . ." required>
      <button type="submit" class="btn btn-dark rounded-0" ><i class="ri-send-plane-fill"></i></button>
      </div>
     
      </div>';


      }
      ?>
    </form>
  </div>

  <?php include "footer.php"; ?>
  <?php include "bootstrapjs.php"; ?>
</body>

</html>