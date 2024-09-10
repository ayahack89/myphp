<?php 
session_start();
if(!isset($_SESSION['name'])){
echo 'Opps! atfirst you need to <a href="index.php">login</a> & proof that you are an admin.';
}else{ ?>
<?php
include "../db_connection.php";
ini_set('display_errors', 0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <?php include "../bootstrapcss-and-icons.php"; ?>
     <title>View Announcement | Admin Panel | Agguora</title>
</head>
<?php include "../fonts.php"; ?>

<body>
<?php include "admin-header.php"; ?>
     <!-- Main body -Start -->
     <div class="my-2">
     <?php
     $sql = "SELECT * FROM `announcement`";
     $result = mysqli_query($conn, $sql);
     if ($result) {
          if (mysqli_num_rows($result) > 0) {
               while ($anno = mysqli_fetch_assoc($result)) {
                    ?>
                    <!-- Announcement box -Start  -->
                    <div class="card rounded-0">
                         <div class="card-body">
                              <h5 class="card-title">
                              <a href="announcement-thread.php?announcement=<?php echo $anno['anno_id']; ?>" style="text-decoration:none;"><b><?php echo $anno['anno_name']; ?></b></a>
                              </h5>
                              <h6 class="card-subtitle mb-2 text-body-secondary">
                                   <b style="color:black;">
                                        <?php echo '<i class="ri-user-star-fill"></i>' . $anno['admin_name']; ?>
                                   </b><br>
                                   <b style="font-weight:lighter; font-size:12px;">
                                        <?php echo $anno['anno_date']; ?>
                                   </b>
                              </h6>
                              <p class="card-text">
                                   <?php echo $anno['anno_desc']; ?>
                              </p>
                              <a href="edit-announcement.php?edit=<?php echo $anno['anno_id']; ?>" class="card-link text-success"
                                   style="text-decoration:none; font-size:1.5rem;"><i class="ri-edit-box-line"></i><a>
                              <a href="delete-announcement.php?delete=<?php echo $anno['anno_id']; ?>" class="card-link text-danger"
                                   style="text-decoration:none; font-size:1.5rem; padding-left:20px;"><i class="ri-delete-bin-5-line"></i></a>
                                 
                         </div>
                    </div>
                    <!-- Announcement box -End  -->

                    <?php
               }

          } else {
               echo '<div class="alert alert-warning rounded-0" role="alert" style="font-size:15px;">No Announcement Found !';
          }
     }
     ?>
     </div>
     <!--Main body -End  -->


     <?php include "../bootstrapjs.php"; ?>
</body>
</html>
<?php } ?>