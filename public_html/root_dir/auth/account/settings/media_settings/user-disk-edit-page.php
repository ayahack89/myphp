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
     
     <link rel="icon" type="image/x-icon" href="img/background/agguoralogo.jpg">
     <title>Edit Your Drives | Categories | Agguora</title>
     <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-YXXL0NCGLE"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-YXXL0NCGLE');
</script>
</head>
<body>
     <!-- User disk edit action -Start  -->
     <?php
     if (isset($_GET['edit'])) {
          $edit_id = mysqli_real_escape_string($conn, $_GET['edit']);

          // Fetch category details
          $sql = "SELECT * FROM `catagory` WHERE catagory_id = '{$edit_id}'";
          $run = mysqli_query($conn, $sql);

          if ($run && mysqli_num_rows($run) > 0) {
               $row = mysqli_fetch_assoc($run);

               // Handle form submission
               if (isset($_POST['submit'])) {
                    $disk_name = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['name']));
                    $disk_desc = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['desc']));

                    // Update only if name or description is not empty
                    if (!empty($disk_name) || !empty($disk_desc)) {
                         $sql_query = "UPDATE `catagory` 
                              SET `catagory_name` = '{$disk_name}', `catagory_desc` = '{$disk_desc}' 
                              WHERE `catagory_id` = '{$edit_id}'";

                         $result = mysqli_query($conn, $sql_query);

                         if ($result) {
                             ?>
                             <script>window.location.href="https://www.agguora.site/your-disks.php";</script>
                             <?php 
                              exit;
                         } else {
                              echo' <div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">Opps! Somthing went wrong while updating : (</div>';
                         }
                    } else {
                         echo' <div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">Please provide a name or description.</div>';
                    }
               }
               ?>
               <form class="container bg-light border py-5 px-5 mt-5"
                    action="<?php echo htmlentities($_SERVER['PHP_SELF'] . '?edit=' . $edit_id); ?>" method="post">
                    <div class="mb-3">
                         <div class="input-group">
                              <span class="input-group-text rounded-0" id="basic-addon3">Disk name</span>
                              <input type="text" class="form-control rounded-0" id="basic-url" aria-describedby="basic-addon3 basic-addon4"
                                   name="name" value="<?php echo $row['catagory_name']; ?>">
                         </div>
                    </div>
                    <div class="input-group">
                         <span class="input-group-text rounded-0">Description</span>
                         <textarea class="form-control rounded-0" aria-label="With textarea"
                              name="desc"><?php echo $row['catagory_desc']; ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-dark my-3 rounded-0" name="submit">Update Category</button>
               </form>
               <?php
          } else {
               echo' <div class="alert alert-warning rounded-0" role="alert" style="font-size:15px;">No catagory found of this given ID!</div>';
          }
     } else {
          echo' <div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">Edit Id is missing!</div>';
     }
     ?>
     <!-- User disk edit action -End  -->

     <?php include "bootstrapjs.php"; ?>
</body>
</html>
<?php } ?>