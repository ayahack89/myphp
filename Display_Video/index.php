<?php
include "video_db.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Uploade Video</title>
</head>
<style>
     .container {
          width: 500px;
          margin: 0 auto;
          padding: 10px;
          background-color: transparent;
          border: 4px dashed black;
          border-radius: 10px;
          margin-top: 5%;
     }

     h1 {
          text-align: center;
          font-family: 'Courier New', Courier, monospace;
     }

     form {
          display: flex;
          flex-direction: column;
     }

     input[type="file"] {
          border: 2px solid black;
          padding: 8px;
          width: 50%;
          font-size: 1rem;
          margin-left: 25%;
          font-family: 'Courier New', Courier, monospace;
          font-weight: bolder;
     }

     input[type="submit"] {
          width: 20%;
          padding: 5px;
          font-size: 1rem;
          margin-top: 20px;
          margin-left: 25%;
          font-family: 'Courier New', Courier, monospace;
          font-weight: bolder;
          background-image: linear-gradient(orange, red);
          border: 1px solid black;
          border-radius: 5px;
          transition: all 4ms ease-in;

     }

     input[type="submit"]:hover {
          cursor: pointer;
          transform: translateY(2%);

     }
</style>

<body>


     <?php

     // echo "<pre>";
     // print_r($_FILES['video']);
     // echo "</pre>";
     
     if (isset($_POST['submit'])) {
          $name = mysqli_real_escape_string($connection, $_FILES['video']['name']);
          $tmp_name = $_FILES['video']['tmp_name'];
          $error = $_FILES['video']['error'];

          if ($error === UPLOAD_ERR_OK) {
               $video_upload_path = "UploadedVids/" . $name;
               if (move_uploaded_file($tmp_name, $video_upload_path)) {
                    $sql = "INSERT INTO `uploaded_videos` (`videoname`) VALUES ('{$name}');";
                    $uploaded = mysqli_query($connection, $sql);
                    if ($uploaded) {
                         header("Location: upload.php");
                         exit();
                    } else {
                         echo "Sorry! your video is not uploaded!";
                    }
               } else {
                    echo "Oops! Something went wrong :(";
               }
          } else {
               echo "Error uploading the file. Please try again.";
          }
     }


     ?>


     <div class="container">

          <form action="index.php" method="post" enctype="multipart/form-data">
               <h1>Uploade A Video</h1>
               <input type="file" name="video" id="vids">
               <input type="submit" value="Uploade" name="submit">
          </form>
     </div>

</body>

</html>