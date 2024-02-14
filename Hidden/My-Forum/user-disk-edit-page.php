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


     <?php
     $edit_id = mysqli_real_escape_string($conn, $_GET['edit']);
     echo $edit_id;

     $sql = "SELECT * FROM `catagory` WHERE catagory_id = '{$edit_id}'";
     $run = mysqli_query($conn, $sql);

     if (mysqli_num_rows($run) > 0) {
          $row = mysqli_fetch_assoc($run); // Fetch category details
          if (isset($_POST['submit'])) {
               $disk_name = mysqli_real_escape_string($conn, $_POST['name']);
               $disk_desc = mysqli_real_escape_string($conn, $_POST['desc']);
               $catagory_id = $row['catagory_id'];

               if (!empty($disk_name) || !empty($disk_desc)) {
                    $sql_query = "UPDATE `catagory` 
                          SET `catagory_name` = '{$disk_name}', `catagory_desc` = '{$disk_desc}' 
                          WHERE `catagory_id` = '{$catagory_id}'";

                    $result = mysqli_query($conn, $sql_query);
                    if ($result) {
                         $alert = true;
                         // Success message -start
                         if ($alert) {
                              echo '<div id="alertMsg" class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> Your thread has been added successfully. Wait for community response.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
                              ini_set('display_errors', 0);
                              echo '<script>
                            setTimeout(function() {
                                document.getElementById("alertMsg").style.display = "none";
                                window.location="delete-your-disk.php";
                            }, 2000);
                          </script>';

                              //     Success message -end
                         }
                    } else {
                         echo "Oops! something went wrong :(";
                    }
               } else {
                    echo "Please edit something and go to the previous page...";
               }
          }

          // Display category details in an HTML form for editing
          ?>
          <form class="container my-5 w-75" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
               <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">@</span>
                    <input type="text" class="form-control" placeholder="Username" value="<?php echo $row['created_by']; ?>"
                         aria-label="Username" aria-describedby="basic-addon1" disabled>
               </div>

               <div class="mb-3">
                    <div class="input-group">
                         <span class="input-group-text" id="basic-addon3">Disk name</span>
                         <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3 basic-addon4"
                              name="name" value="<?php echo $row['catagory_name']; ?>">
                    </div>
               </div>
               <div class="input-group">
                    <span class="input-group-text">With textarea</span>
                    <textarea class="form-control" aria-label="With textarea"
                         name="desc"><?php echo $row['catagory_desc']; ?></textarea>
               </div>
               <button type="submit" class="btn btn-dark my-3" name="submit">Update your disk</button>
          </form>

          <?php
     } else {
          echo "No category found with the given ID.";
     }
     ?>




     <?php include "bootstrapjs.php"; ?>
</body>

</html>