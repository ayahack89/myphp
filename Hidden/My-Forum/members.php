<?php
include "db_connection.php";
session_start();
ini_set('display_errors', 0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <?php include "bootstrapcss-and-icons.php"; ?>
     <title>Document</title>
</head>
<?php include "fonts.php"; ?>
<style>
     :root {
          --success-result: #86efac;
     }
</style>

<body class="bg-light">
<?php include "header.php"; ?>

<?php 
     if(!isset($_SESSION['username'])){
     $sql_count = "SELECT COUNT(*) AS total_rows FROM user";
     $result = mysqli_query($conn, $sql_count);
     if ($result && mysqli_num_rows($result) > 0) {
         $row = mysqli_fetch_assoc($result);
         echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
         <strong>We currently have ' . $row['total_rows'] . ' active members</strong>. <a href="login.php">Join us</a> now!
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>';
     }}
     ?>
     <form class="container w-100 mt-3" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
          <div class="input-group mb-3">
               <input type="text" class="form-control rounded-0" placeholder="Search members by name, date, about..."
                    name="search" aria-label="Username" aria-describedby="basic-addon1">
               <button class="btn btn-danger rounded-0" type="submit" name="submit_search" id="basic-addon1"><i
                         class="ri-user-search-line"></i></button>
          </div>
</form>
     <?php
     if (isset($_POST['submit_search'])) { // Changed 'search' to 'submit_search'
          $search = mysqli_real_escape_string($conn, $_POST['search']);

          if (!empty($search)) {
               $sql_search_query = "SELECT * FROM `user` WHERE username LIKE '%$search%' OR datetime LIKE '%$search%' OR about LIKE '%$search%'";
               $search_result = mysqli_query($conn, $sql_search_query);
               if ($search_result) {
                    if (mysqli_num_rows($search_result) > 0) { // Changed to check if there are results
                         while ($member = mysqli_fetch_assoc($search_result)) {
                              ?>
                              <div class="container d-flex p-2 bd-highlight border" style="background-color:var(--success-result);">
                                   <div class="image mx-2 my-2">
                                        <a href="allprofile.php?user=<?php echo $member['id']; ?>" style="text-decoration:none; color:black;">
                                             <img src="img/images/<?php echo $member['profile_pic']; ?>" alt="" width="100" height="100">
                                        </a>
                                   </div>
                                   <div class="text mx-5 my-2">
                                        <span class="username">
                                             <a href="allprofile.php?user=<?php echo $member['id']; ?>"
                                                  style="text-decoration:none; color:black;">
                                                  <b style="font-size:1.2rem;"><i class="ri-user-fill"></i>
                                                       <?php echo $member['username']; ?>
                                                  </b>
                                             </a>
                                        </span> <br>
                                        <span class="joined_at">
                                             <b style="font-size:10px; font-weight:lighter;">Joined at
                                                  <?php echo $member['datetime']; ?>
                                             </b>
                                        </span> <br>
                                        <span class="about">
                                             <b style="font-size:12px; font-weight:lighter;">
                                                  <?php echo $member['about']; ?>
                                             </b>
                                        </span>
                                   </div>
                              </div>
                              <?php
                         }
                    } else {
                         echo' <div class="alert alert-warning rounded-0" role="alert" style="font-size:15px;">No Members Found : (</div>';
                    }
               } else {
                    echo' <div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">Opps! Somthing went wrong : (</div>';
               }
          } else {
               echo' <div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">Empty search is not allowed!</div>';
          }
     }
     ?>

     <?php
     $query = "SELECT * FROM `user`";
     $result = mysqli_query($conn, $query);
     if ($result) {
          if (mysqli_num_rows($result) > 0) {
               while ($row = mysqli_fetch_assoc($result)) {
                    ?>


                    <div class="container d-flex p-2 bd-highlight border">
                         <div class="image mx-2 my-2">
                              <a href="allprofile.php?user=<?php echo $row['id']; ?>" style="text-decoration:none; color:black;">
                              <?php if(empty($row['profile_pic'])){
                                   ?>
                                   <img src="img/images/default2.jpg" alt="" width="100" height="100">
                                   <?php 

                              }else{ ?>
                                   <img src="img/images/<?php echo $row['profile_pic']; ?>" alt="" width="100" height="100">
                                   <?php } ?>
                              </a>
                         </div>

                         <div class="text mx-5 my-2">
                              <span class="username">
                                   <a href="allprofile.php?user=<?php echo $row['id']; ?>" style="text-decoration:none; color:black;">
                                        <b style="font-size:1.2rem;">
                                             <i class="ri-user-fill"></i>
                                             <?php echo $row['username']; ?>
                                        </b>
                                   </a>
                              </span> <br>
                              <span class="joined_at">
                                   <b style="font-size:10px; font-weight:lighter;">Joined at
                                        <?php echo $row['datetime']; ?>
                                   </b>

                              </span> <br>
                              <span class="about">
                                   <b style="font-size:12px; font-weight:lighter;">
                                        <?php echo $row['about']; ?>
                                   </b>
                              </span>
                         </div>
                    </div>

                    <?php
               }
          }
     }
     ?>


     <?php include "footer.php"; ?>
     <?php include "bootstrapjs.php"; ?>
</body>

</html>