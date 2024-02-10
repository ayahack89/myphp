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
     <?php
     $query = "SELECT * FROM `user`";
     $result = mysqli_query($conn, $query);
     if ($result) {
          if (mysqli_num_rows($result) > 0) {
               while ($row = mysqli_fetch_assoc($result)) {
                    ?>

                    <div class="container mt-5 mb-5 ">
                         <div class="d-flex justify-content-center row ">
                              <div class="col-md-5">
                                   <div class="row p-2 bg-white border rounded bg-light">
                                        <div class="col-md-5 mt-1 "><a href="allprofile.php?user=<?php echo $row['id']; ?>"><img
                                                       class="img-fluid img-responsive rounded product-image"
                                                       src="img/images/<?php echo $row['profile_pic']; ?>"></a></div>
                                        <div class="col-md-6 mt-1 ">
                                             <h5> <b><a href="allprofile.php?user=<?php echo $row['id']; ?>"
                                                            style="text-decoration:none; color: black;">
                                                            <?php echo $row['username']; ?>
                                                       </a></b></h5>
                                             <div class="d-flex flex-row">
                                                  <div class="ratings mr-2"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                            class="fa fa-star"></i><i class="fa fa-star"></i></div><span>
                                                       <?php echo $row['datetime']; ?>
                                                  </span>
                                             </div>
                                             <div class="mt-1 mb-1 spec-1"><span>
                                                       <?php echo $row['country']; ?>
                                                  </span></div>
                                             <div class="mt-1 mb-1 spec-1"><span class="dot"></span><span>
                                                       <?php echo $row['gender']; ?><br>
                                                  </span></div>
                                             <p class="text-justify text-truncate para mb-0">
                                                  <?php echo $row['about']; ?><br><br>
                                             </p>
                                        </div>
                                        <div class="d-flex flex-column mt-4"><button class="btn btn-dark text-light btn-md w-100"
                                                  type="button"><a href="allprofile.php?user=<?php echo $row['id']; ?>"
                                                       style="text-decoration:none; color: white;">Visit
                                                       Profile <i class="ri-user-shared-fill"></i></a></button><button
                                                  class="btn btn-outline-primary btn-md w-100 mt-2" type="button">Add to
                                                  wishlist</button></div>
                                        <div class="align-items-center align-content-center col-md-3 border-left mt-1">


                                        </div>
                                   </div>
                              </div>
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