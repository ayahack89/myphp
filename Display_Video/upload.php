<?php
include "video_db.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Succes</title>
</head>

<body>
     <?php


     $sql_query = "SELECT * FROM `uploaded_videos`";
     $result = mysqli_query($connection, $sql_query);
     if ($result) {
          if (mysqli_num_rows($result) > 0) {
               while ($view = mysqli_fetch_assoc($result)) {
                    ?>
                    <video id="myvideo" width="300px" controls>
                         <source src="<?php echo 'UploadedVids/' . $view['videoname']; ?>">
                    </video>
                    <?php
               }
          } else {
               echo "No videos found in database!";
          }
     } else {
          echo "Oops! Something went wrong :(";
     }


     ?>
     <br><br>
     <a href="index.php">Home</a>





</body>

</html>