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
     <title>Rateus | Agguora</title>
     <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-YXXL0NCGLE"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-YXXL0NCGLE');
</script>
</head>
<?php include "fonts.php"; ?>
<body>
     <?php include "header.php"; ?>
     <div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <?php
            include "db_connection.php"; // Ensure this is placed correctly for DB connection

            if (isset($_POST["submit"])) {
                // User Input
                $user_id = htmlspecialchars(mysqli_real_escape_string($conn, $_SESSION["id"]));
                $rating = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['rating']));
                $comment = htmlspecialchars(mysqli_real_escape_string($conn, $_POST["comments"]));

                if (!empty($user_id)) {
                    // SQL query to insert the data
                    $sqlQuery = "INSERT INTO `review` (`user_id`, `ratings`, `comments`) VALUES ('{$user_id}', '{$rating}', '{$comment}')";
                    $runQuery = mysqli_query($conn, $sqlQuery);

                    if ($runQuery) {
                        echo '<script>window.location.href="reviews.php";</script>'; // Simplified redirect
                        mysqli_close($conn);
                        exit;
                    } else {
                        echo '<div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">Oops! Something went wrong : (</div>';
                    }
                } else {
                    echo '<div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">User not found : (</div>';
                }
            }
            ?>

            <?php if (isset($_SESSION['username']) && isset($_SESSION['id'])) { ?>
                <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" class="border py-4 px-5 rounded-0 my-3 bg-light shadow-sm">
                    <!-- Username Display -->
                    <div class="input-group mb-3">
                        <span class="input-group-text rounded-0" id="basic-addon1">@</span>
                        <input type="text" class="form-control rounded-0" aria-label="Username" aria-describedby="basic-addon1" 
                            value="<?php echo $_SESSION['username']; ?>" disabled>
                    </div>
                    
                    <!-- Rating Selection -->
                    <div class="input-group mb-3 rounded-0">
                        <select name="rating" class="form-select bg-light rounded-0" aria-label="Default select example" required>
                            <option value="" disabled selected>--Select Rating--</option>
                            <option value="★">★</option>
                            <option value="★ ★">★ ★</option>
                            <option value="★ ★ ★">★ ★ ★</option>
                            <option value="★ ★ ★ ★">★ ★ ★ ★</option>
                            <option value="★ ★ ★ ★ ★">★ ★ ★ ★ ★</option>
                        </select>
                    </div>

                    <!-- Comments Input -->
                    <div class="form-floating mb-4">
                        <textarea class="form-control rounded-0" placeholder="Leave a comment here" id="floatingTextarea2" 
                            style="height: 120px" name="comments"></textarea>
                        <label for="floatingTextarea2">Comments</label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-dark w-100 rounded-0" name="submit">Submit your feedback</button>
                </form>
            <?php } else { ?>
                <!-- Error if not logged in -->
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                    <i class="ri-alert-fill me-2"></i>
                    You are not logged in! Please <a href="login.php" style="color: maroon;">log in</a> to submit your feedback.
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<!-- Reviews Link -->
<div class="text-center mt-4">
    <p>Want to see reviews? <a href="reviews.php">Click here</a>.</p>
</div>






     <?php include "footer.php"; ?>
     <?php include "bootstrapjs.php"; ?>
</body>

</html>