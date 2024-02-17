<?php
include "db_connection.php";
session_start();
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

<body>
     <?php include "header.php"; ?>

     <div class="container">
          <div class="d-flex flex-wrap">
               <?php
               $query = "SELECT * FROM `user`";
               $result = mysqli_query($conn, $query);
               if ($result) {
                    if (mysqli_num_rows($result) > 0) {
                         while ($row = mysqli_fetch_assoc($result)) {
                              ?>
                              <div class=" my-2 mx-2 " style="width: 18rem;">
                                   <img src="img/images/<?php echo $row['profile_pic']; ?>" class="card-img-top rounded-top" alt="...">
                                   <div class="py-2 px-3 border rounded-bottom">
                                        <h5>
                                             <i class="ri-user-3-fill"></i>
                                             <b>
                                                  <?php echo $row['username']; ?>
                                             </b><br><b style="font-weight:lighter; font-size:12px; ">Joined at
                                                  <?php echo $row['datetime']; ?>
                                             </b>
                                        </h5>
                                        <p class="card-text">
                                             <?php echo $row['about']; ?>
                                        </p>
                                        <a href="allprofile.php?user=<?php echo $row['id']; ?>" class="btn btn-dark">View Profile</a>
                                   </div>
                              </div>

                              <?php
                         }
                    }
               }
               ?>

          </div>
     </div>








     <?php include "footer.php"; ?>
     <?php include "bootstrapjs.php"; ?>
</body>

</html>