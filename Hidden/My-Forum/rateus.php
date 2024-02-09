<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>fSociety review section</title>
  </head>
  <style><?php include "css/rateus.css"; ?></style>
  <body>
      <div class="header header_background">
        <div class="logo">
          <img
            src="img/fsocietylogo.png"
            width="120px"
            height="120px"
            alt="fsocietylogo"
          />
        </div>
        <div class="logoText">
          <h2><b class="bigtext">fSociety</b><br><b class="smalltext">the anonymus market</b></h2>
        </div>
      </div>
      <div class="navbar">
        <?php include "afterlog.php"; ?>
      </div>
      <div class="bigBox">
      <div class="account">
     <div class="useraccount">
          <div class="username">
            User Name:
          </div>
          <div class="yourname">
            <?php echo $_SESSION['username']; ?> <i>(You)</i>
          </div>
        </div>
     </div>
          <div class="form">
               <?php 
               include "db_connection.php";
               if(isset($_POST["submit"])){
                    //User Input
                    $anonymusUser = $_POST["anonymusUser"];
                    $comment = $_POST["comment"];

                    if(!empty($_POST["anonymusUser"]) && !empty($_POST["comment"])){
                         $sqlQuery = "INSERT INTO `review` (`user`, `comments`) VALUES ('$anonymusUser', '$comment');";
                         $runQuery = mysqli_query($conn, $sqlQuery);
                         if($runQuery){
                              header("Location:  http://localhost/fsociety/reviews.php");
                              mysqli_close($conn);
                         }else{
                              die("Somthing went wrong!".mysqli_error($conn));
                         }
                    }
               }
               
               ?>
               <form action="rateus.php" method="post">
                    <label for="username">User Name: <br>
                         <input type="text" name="anonymusUser" placeholder="Enter a random username">
                    </label><br>
                    <label for="message">Comment: <br>
                         <textarea name="comment"  cols="30" rows="5" placeholder=" Comment here..."></textarea>
                    </label><br>
                    <input type="submit" name="submit" value="Post">
               </form>
          </div>
          <div class="paragraph">
               <p>Want to see reviews? <a href="reviews.php">click here</a>.</p>
               <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti doloribus atque, nam repudiandae 
                    deserunt officiis velit voluptatem expedita! At minus commodi, quos voluptatum dolor esse rerum quis 
                    tempora repudiandae laborum!</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti doloribus atque, nam repudiandae 
                    deserunt officiis velit voluptatem expedita! At minus commodi, quos voluptatum dolor esse rerum quis 
                    tempora repudiandae laborum!</p>
                 
          </div>
      </div>
 

      <div class="footer">000fSociety</div>

  </body>
</html>

