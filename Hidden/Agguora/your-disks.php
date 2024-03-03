<?php 
session_start();
if(!isset($_SESSION['username'])){
echo 'Opps! atfirst you need to <a href="login.php">login</a> & proof that you are a true member.';
}else{ ?>
<?php
include "db_connection.php";
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

<body>
     <?php include "header.php"; ?>
     <!-- All disks -Start -->
     <?php
     $created_by = $_SESSION['username'];
     $sql = "SELECT * FROM `catagory` WHERE created_by = '{$created_by}'";
     $result = mysqli_query($conn, $sql);
     if ($result) {
          if (mysqli_num_rows($result) > 0) {
               while ($disk = mysqli_fetch_assoc($result)) {
                    ?>
                    <!-- Disk box -Start  -->
                    <div class="card rounded-0">
                         <div class="card-body">
                              <h5 class="card-title">
                                   <?php echo $disk['catagory_name']; ?>
                              </h5>
                              <h6 class="card-subtitle mb-2 text-body-secondary">
                                   <b style="color:black;">
                                        <?php echo '@' . $disk['created_by']; ?>
                                   </b><br>
                                   <b style="font-weight:lighter; font-size:12px;">
                                        <?php echo $disk['created']; ?>
                                   </b>
                              </h6>
                              <p class="card-text">
                                   <?php echo $disk['catagory_desc']; ?>
                              </p>
                              <a href="user-disk-edit-page.php?edit=<?php echo $disk['catagory_id']; ?>" class="card-link text-success"
                                   style="text-decoration:none;"><i class="ri-edit-box-line"></i></a>
                              <a href="delete-your-disks.php?delete=<?php echo $disk['catagory_id']; ?>" class="card-link text-danger"
                                   style="text-decoration:none;"><i class="ri-delete-bin-5-line"></i></a>
                         </div>
                    </div>
                    <!-- Disk box -End  -->

                    <?php
               }

          } else {
               echo' <div class="alert alert-warning rounded-0" role="alert" style="font-size:15px;">No disks found : (</div>';

          }
     }
     ?>
     <!-- All disks -End  -->

     <?php include "footer.php"; ?>
     <?php include "bootstrapjs.php"; ?>
</body>
</html>
<?php } ?>