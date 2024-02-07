<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>fSociety - Check your reviews</title>
  </head>
  <style><?php include "css/review.css"; ?></style>
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
     
          <center>  
          <table>
               <th>User</th>
               <th>Comments</th>
               <tr>
               <?php 
               include "db_connection.php";
               $sqlquery = "SELECT * FROM `review`";
               $fetching = mysqli_query($conn, $sqlquery);
               if($fetching){
                    if(mysqli_num_rows($fetching) > 0){
                         while($row = mysqli_fetch_assoc($fetching)){

               ?>
                    <td><?php echo $row["user"] ;?></td>
                    <td><?php echo $row["comments"]; ?></td>
                </tr>
               <?php 
               
          }
     }
}else{
     die("Somthing went wrong!".mysqli_error($conn));
}

               ?>
          </table>
        </center>
      </div>
      <div class="footer">000fSociety</div>
  </body>
</html>
