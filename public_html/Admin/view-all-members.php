<?php 
session_start();
if(!isset($_SESSION['name'])){
echo 'Opps! atfirst you need to <a href="index.php">login</a> & proof that you are an admin.';
}else{ ?>
<?php
require "../db_connection.php";
ini_set('display_errors', 0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <?php include "../bootstrapcss-and-icons.php"; ?>
     <title>View All Members | Admin Panel | Agguora</title>
</head>
<?php include "../fonts.php"; ?>

<body>
     <!-- Members table -Start  -->
     <table class="table">
          <thead>
               <th class="bg-danger text-light text-center">Unique ID</th>
               <th class="bg-danger text-light text-center">Join at</th>
               <th class="bg-danger text-light text-center">Profile pic</th>
               <th class="bg-danger text-light text-center">Date of birth</th>
               <th class="bg-danger text-light text-center">Gender</th>
               <th class="bg-danger text-light text-center">Action</th>
          </thead>
          <?php
          $sql = "SELECT * FROM `user`
ORDER BY datetime DESC";
          $result = mysqli_query($conn, $sql);
          if ($result && mysqli_num_rows($result) > 0) {
               while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                         <td class="px-5 border">
                              @<?php echo $row['username']; ?>_<?php echo $row['id']; ?>
                         </td>
                         <td class="px-5 border">
                              <?php echo $row['datetime']; ?>
                         </td>
                         <td class="px-5 border">
                             <?php 
                             if(!empty($row['profile_pic'])){
                             ?>
                             <img src="../img/images/<?php echo $row['profile_pic']; ?>" alt="<?php echo $row['about']; ?>" width="50"
                                   height="50">
                                   <?php }else{ ?>
                                    <img src="../img/images/default2.jpg" alt="Default gray profile icon on white background." width="50"
                                   height="50">
                                   <?php } ?>
                                   </td>
                         <td class="px-5 border">
                              <?php echo $row['cake_day']; ?>
                         </td>
                         <td class="px-5 border">
                              <?php echo $row['gender']; ?>
                         </td>
                         <td>
                              <button type="button" class="btn btn-danger rounded-0"><a href="deleteuser.php?delete=<?php echo $row['id']; ?>" class="text-light" style="text-decoration:none;">Banned <i class="ri-delete-bin-line"></i></a></button>
                         </td>
                    </tr>


                    <?php
               }


          } else {
              
               echo' <div class="alert alert-warning rounded-0" role="alert" style="font-size:15px;">No members found : (</div>';

          }

          ?>

     </table>
<!-- Members table -End  -->


     <?php include "../bootstrapjs.php"; ?>
</body>
</html>
<?php } ?>