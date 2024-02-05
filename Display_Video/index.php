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
     // if (isset($_FILES['video']) && isset($_POST['submit'])) {
     //      $videoName = $_FILES['video']['name'];
     //      $videoTempName = $_FILES['video']['tmp_name'];
     

     //      $position = strpos($videoName, ".");
     //      $fileExtension = substr($videoName, $position + 1);
     //      $fileExtension = strtolower($fileExtension);
     
     //      if (empty($videoName)) {
     //           echo '<h1 style="text-align:center; font-family:Courier New, Courier, monospace;">Please choose a file!</h1>';
     //      } elseif (!in_array($fileExtension, array("mp4", "ogg", "webm"))) {
     //           echo "The file extension must be .mp4, .ogg, or .webm in order to be uploaded.";
     //      } else {
     //           $path = '../Display_Video/UploadedVids/';
     //           $destination = $path . $videoName;
     
     //           if (move_uploaded_file($videoTempName, $destination)) {
     //                echo "Video uploaded.";
     //                header('Location: upload.php');
     
     //           } else {
     //                echo "Failed to upload the video.";
     //           }
     //      }
     // }
     
     if (isset($_POST['submit']) && isset($_FILES['video'])) {

          $name = $_FILES['video']['name'];
          $path = $_FILES['video']['full_path'];
          $type = $_FILES['video']['type'];
          $tmp_name = $_FILES['video']['tmp_name'];
          $error = $_FILES['video']['error'];
          $size = $_FILES['video']['size'];

          if ($error === 0) {
               $video_x = pathinfo($name, PATHINFO_EXTENSION);

               $video_ex_lower = strtolower($video_x);
               $allow_type = array("m4", "webm", "avi", "flv");

               if (in_array($video_ex_lower, $allow_type)) {

                    echo "cool";

               } else {
                    echo "You can't upload file on this type!";
                    header("Location: index.php?error=$em");

               }

          }

          //           [name] => Basic Student Registration.mp4
//     [full_path] => Basic Student Registration.mp4
//     [type] => video/mp4
//     [tmp_name] => C:\xampp\tmp\php454B.tmp
//     [error] => 0
//     [size] => 17520816
     

          echo '<pre>';
          print_r($_FILES['video']);
          echo '</pre>';

     }


     // To Be Continue...... 
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