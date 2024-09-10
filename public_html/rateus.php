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
     </div>
     <div class="container py-5">
<div class="row justify-content-center">
<div class="col-md-6">
          <?php
          if (isset($_POST["submit"])) {
               //User Input
               $user = htmlspecialchars(mysqli_real_escape_string($conn, $_SESSION["username"]));
               $rating = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['rating']));
               $comment = htmlspecialchars(mysqli_real_escape_string($conn, $_POST["comments"]));

               if (!empty($user) && !empty($rating)) {
                    $sqlQuery = "INSERT INTO `review` (`user`, `ratings`, `comments`) VALUES ('{$user}', '{$rating}', '{$comment}');"; // Added comma between '{$rating}' and '{$comment}'
                    $runQuery = mysqli_query($conn, $sqlQuery);
                    if ($runQuery) {
                         echo '<script>window.location="https://www.agguora.site/reviews.php";</script>';
                         mysqli_close($conn);
                         exit;
                    } else {
                         echo' <div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">Opps! Somthing went wrong : (</div>';
                    }
               } else {
                    echo' <div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">Please select the ratings!</div>';
               }
          }


          ?>
          <?php if (isset($_SESSION['username'])) {
               ?>
               <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" class="border py-5 px-5 rounded-0 my-3 bg-light">
                    <div class="input-group mb-3">
                         <span class="input-group-text rounded-0" id="basic-addon1">@</span>
                         <input type="text" class="form-control rounded-0" placeholder="Username" aria-label="Username"
                              aria-describedby="basic-addon1" value="<?php echo $_SESSION['username']; ?>" disabled>
                    </div>
                    <div class="input-group mb-3 rounded-0">
                         <select name="rating" class="form-select bg-light rounded-0" aria-label="Default select example">
                              <option selected>--Rating---</option>
                              <option value="★">★</option>
                              <option value="★★">★★</option>
                              <option value="★★★">★★★</option>
                              <option value="★★★★">★★★★</option>
                              <option value="★★★★★">★★★★★</option>
                         </select>
                    </div>

                    <div class="form-floating">
                         <textarea class="form-control rounded-0" placeholder="Leave a comment here" id="floatingTextarea2"
                              style="height: 100px" name="comments"></textarea>
                         <label for="floatingTextarea2">Comments</label>
                    </div><br>
                    <button type="submit" class="btn btn-dark rounded-0" name="submit">Submit your feedback</button>
               </form>

               <?php
          } else {
               ?>
               <div class="alert alert-danger d-flex align-items-center" role="alert">

                    <use xlink:href="#exclamation-triangle-fill" />
                    </svg>
                    <div>
                         <i class="ri-alert-fill"></i> You are not logged In! Please <a href="login.php"
                              style="color:maroon;">logIn</a> to get access.
                    </div>
               </div>
               <?php
          }
          ?>

     </div>
     </div>
     </div>
<center>
     <p>Want to see reviews? <a href="reviews.php">click here</a>.</p>
</center>  





     <?php include "footer.php"; ?>
     <?php include "bootstrapjs.php"; ?>
</body>

</html>