<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Succes</title>
</head>

<body>
     <?php
     $videoName = $_FILES['video']['name'];


     $position = strpos($videoName, ".");
     $fileExtension = substr($videoName, $position + 1);
     $fileExtension = strtolower($fileExtension);

     if (($fileExtension == "mp4" && $fileExtension == "ogg" && $fileExtension == "webm")) {
          $path = '../Display_Video/UploadedVids/';
          echo '<video width="400px" src="' . $path . '/' . $videoName . '" type="video/' . $fileExtension . '"  controls>
     </video>';
     }


     ?>





</body>

</html>