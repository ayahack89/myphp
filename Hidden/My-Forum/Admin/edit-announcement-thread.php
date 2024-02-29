<?php
include "../db_connection.php";
session_start();
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
     <!-- User disk edit action -Start  -->
     <?php
     if (isset($_GET['edit'])) {
          $edit_id = mysqli_real_escape_string($conn, $_GET['edit']);

          // Fetch category details
          $sql = "SELECT * FROM `announcement_threads` WHERE anno_thread_id = '{$edit_id}'";
          $run = mysqli_query($conn, $sql);

          if ($run && mysqli_num_rows($run) > 0) {
               $row = mysqli_fetch_assoc($run);

               // Handle form submission
               if (isset($_POST['submit'])) {
                    $anno_name = mysqli_real_escape_string($conn, $_POST['anno_name']);
                    $anno_desc = mysqli_real_escape_string($conn, $_POST['anno_desc']);

                    // Update only if name or description is not empty
                    if (!empty($anno_name) || !empty($anno_desc)) {
                         $sql_query = "UPDATE `announcement_threads` 
                              SET `anno_thread_name` = '{$anno_name}', `anno_thread_desc` = '{$anno_desc}' 
                              WHERE `anno_thread_id` = '{$edit_id}'";

                         $result = mysqli_query($conn, $sql_query);

                         if ($result) {
                              ?>
                            <script>window.location.href = "announcement-thread.php?announcement=<?php echo $row['announcement_id']; ?>";</script>
                              <?php 
                              exit;
                         } else {
                              echo "Oops! Something went wrong while updating.";
                         }
                    } else {
                         echo "Please provide a name or description.";
                    }
               }
               ?>
               <form class="container my-5 w-75 bg-light border py-5 px-5"
                    action="<?php echo htmlentities($_SERVER['PHP_SELF'] . '?edit=' . $edit_id); ?>" method="post">
                    <div class="mb-3">
                         <div class="input-group">
                              <span class="input-group-text rounded-0" id="basic-addon3">Announcement topic</span>
                              <input type="text" class="form-control rounded-0" id="basic-url" aria-describedby="basic-addon3 basic-addon4"
                                   name="anno_name" value="<?php echo $row['anno_thread_name']; ?>">
                         </div>
                    </div>
                    <div class="input-group">
                         <span class="input-group-text rounded-0">Announcement description</span>
                         <textarea class="form-control rounded-0" aria-label="With textarea"
                              name="anno_desc"><?php echo $row['anno_thread_desc']; ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-danger my-3 rounded-0" name="submit">Update announcement </button>
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

     <?php include "../bootstrapjs.php"; ?>
</body>

</html>