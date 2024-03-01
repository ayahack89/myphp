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
     <title>Document</title>
</head>
<body>
     <!-- Edit action -Start  -->
     <?php
     if (isset($_GET['edit'])) {
          $edit_id = mysqli_real_escape_string($conn, $_GET['edit']);

          // Fetch category details
          $sql = "SELECT * FROM `announcement` WHERE anno_id = '{$edit_id}'";
          $run = mysqli_query($conn, $sql);

          if ($run && mysqli_num_rows($run) > 0) {
               $row = mysqli_fetch_assoc($run);

               // Handle form submission
               if (isset($_POST['submit'])) {
                    $anno_name = mysqli_real_escape_string($conn, $_POST['anno_name']);
                    $anno_desc = mysqli_real_escape_string($conn, $_POST['anno_desc']);

                    // Update only if name or description is not empty
                    if (!empty($anno_name) || !empty($anno_desc)) {
                         $sql_query = "UPDATE `announcement` 
                              SET `anno_name` = '{$anno_name}', `anno_desc` = '{$anno_desc}' 
                              WHERE `anno_id` = '{$edit_id}'";

                         $result = mysqli_query($conn, $sql_query);

                         if ($result) {
                              ?>
                              <script>window.location.href="view-announcement.php";</script>
                              <?php 
                              exit;
                         } else {
                              echo' <div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">Oops! Something went wrong while updating.</div>';

                         }
                    } else {
                     
                         echo' <div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">Please provide a name or description.</div>';

                    }
               }
               ?>
               <form class="container my-5 w-75 bg-light border py-5 px-5"
                    action="<?php echo htmlentities($_SERVER['PHP_SELF'] . '?edit=' . $edit_id); ?>" method="post">
                    <div class="mb-3">
                         <div class="input-group">
                              <span class="input-group-text" id="basic-addon3">Announcement name</span>
                              <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3 basic-addon4"
                                   name="anno_name" value="<?php echo $row['anno_name']; ?>">
                         </div>
                    </div>
                    <div class="input-group">
                         <span class="input-group-text">Announcement description</span>
                         <textarea class="form-control" aria-label="With textarea"
                              name="anno_desc"><?php echo $row['anno_desc']; ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-dark my-3" name="submit">Update Category</button>
               </form>
               <?php
          } else {
             
               echo' <div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">No category found with the given ID.</div>';

          }
     } else {
          
          echo' <div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">Edit ID is missing.</div>';

     }
     ?>
     <!-- User disk edit action -End  -->

     <?php include "../bootstrapjs.php"; ?>
</body>
</html>
<?php } ?>