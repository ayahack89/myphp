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
                    $disk_name = mysqli_real_escape_string($conn, $_POST['name']);
                    $disk_desc = mysqli_real_escape_string($conn, $_POST['desc']);

                    // Update only if name or description is not empty
                    if (!empty($disk_name) || !empty($disk_desc)) {
                         $sql_query = "UPDATE `catagory` 
                              SET `catagory_name` = '{$disk_name}', `catagory_desc` = '{$disk_desc}' 
                              WHERE `catagory_id` = '{$edit_id}'";

                         $result = mysqli_query($conn, $sql_query);

                         if ($result) {
                              header("Location: your-disks.php");
                              exit;
                         } else {
                              echo "Oops! Something went wrong while updating.";
                         }
                    } else {
                         echo "Please provide a name or description.";
                    }
               }
               ?>
               <form class="container my-5 w-75" action="<?php echo htmlentities($_SERVER['PHP_SELF'] . '?edit=' . $edit_id); ?>"
                    method="post">
                    <div class="mb-3">
                         <div class="input-group">
                              <span class="input-group-text" id="basic-addon3">Disk name</span>
                              <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3 basic-addon4"
                                   name="name" value="<?php echo $row['catagory_name']; ?>">
                         </div>
                    </div>
                    <div class="input-group">
                         <span class="input-group-text">Description</span>
                         <textarea class="form-control" aria-label="With textarea"
                              name="desc"><?php echo $row['catagory_desc']; ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-dark my-3" name="submit">Update Category</button>
               </form>
               <?php
          } else {
               echo "No category found with the given ID.";
          }
     } else {
          echo "Edit ID is missing.";
     }
     ?>
     <!-- User disk edit action -End  -->

     <?php include "bootstrapjs.php"; ?>
</body>

</html>