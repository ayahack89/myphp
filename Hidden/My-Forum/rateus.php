<?php
include "db_connection.php";
session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <?php include "bootstrapcss-and-icons.php"; ?>
     <title>fSociety review section</title>
</head>
<?php include "fonts.php"; ?>

<body>
     <?php include "header.php"; ?>
     </div>
     <div class="container w-50">
          <?php
          if (isset($_POST["submit"])) {
               //User Input
               $user = mysqli_real_escape_string($conn, $_SESSION["username"]);
               $rating = mysqli_real_escape_string($conn, $_POST['rating']);
               $comment = mysqli_real_escape_string($conn, $_POST["comments"]);

               if (!empty($user) && !empty($rating)) {
                    $sqlQuery = "INSERT INTO `review` (`user`, `ratings`, `comments`) VALUES ('{$user}', '{$rating}', '{$comment}');"; // Added comma between '{$rating}' and '{$comment}'
                    $runQuery = mysqli_query($conn, $sqlQuery);
                    if ($runQuery) {
                         echo '<script>window.location="reviews.php";</script>';
                         mysqli_close($conn);
                         exit;
                    } else {
                         die("Something went wrong!" . mysqli_error($conn));
                    }
               } else {
                    echo "Please select the ratings!";
               }
          }


          ?>
          <?php if (isset($_SESSION['username'])) {
               ?>
               <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
                    <div class="input-group mb-3">
                         <span class="input-group-text" id="basic-addon1">@</span>
                         <input type="text" class="form-control" placeholder="Username" aria-label="Username"
                              aria-describedby="basic-addon1" value="<?php echo $_SESSION['username']; ?>" disabled>
                    </div>
                    <div class="input-group mb-3">
                         <select name="rating" class="form-select bg-light" aria-label="Default select example">
                              <option selected>--Rating---</option>
                              <option value="★">★</option>
                              <option value="★★">★★</option>
                              <option value="★★★">★★★</option>
                              <option value="★★★★">★★★★</option>
                              <option value="★★★★★">★★★★★</option>
                         </select>
                    </div>

                    <div class="form-floating">
                         <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                              style="height: 100px" name="comments"></textarea>
                         <label for="floatingTextarea2">Comments</label>
                    </div><br>
                    <button type="submit" class="btn btn-dark" name="submit">Submit Your Feedback</button>
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

     <p>Want to see reviews? <a href="reviews.php">click here</a>.</p>
     <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti doloribus atque, nam repudiandae
          deserunt officiis velit voluptatem expedita! At minus commodi, quos voluptatum dolor esse rerum quis
          tempora repudiandae laborum!</p>
     <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti doloribus atque, nam repudiandae
          deserunt officiis velit voluptatem expedita! At minus commodi, quos voluptatum dolor esse rerum quis
          tempora repudiandae laborum!</p>





     <?php include "footer.php"; ?>
     <?php include "bootstrapjs.php"; ?>
</body>

</html>