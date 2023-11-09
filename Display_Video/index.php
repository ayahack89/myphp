<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Uploade Video</title>
</head>
<style>
    
     .container{
          width: 500px;
          margin: 0 auto;
          padding: 10px;
          background-color: transparent;
          border: 4px dashed black;
          border-radius: 10px;
          margin-top: 5%;
     }
     h1{
          text-align: center;
          font-family:'Courier New', Courier, monospace;
     }
     form{
          display: flex;
          flex-direction: column;
     }
     input[type="file"]{
          border: 2px solid black;
          padding: 8px;
          width: 50%;
          font-size: 1rem;
          margin-left: 25%;
          font-family:'Courier New', Courier, monospace;
          font-weight: bolder;
     }
     input[type="submit"]{
          width: 20%;
          padding: 5px;
          font-size: 1rem;
          margin-top: 20px;
          margin-left: 25%;
          font-family:'Courier New', Courier, monospace;
          font-weight: bolder;
          background-image: linear-gradient(orange, red);
          border: 1px solid black;
          border-radius: 5px;
          transition: all 4ms ease-in;
          
     }
     input[type="submit"]:hover{
          cursor: pointer;
          transform: translateY(2%);
          
     }
</style>
<body>
<?php 
if(isset($_FILES['video'])){
    $videoName = $_FILES['video']['name'];
    $videoTempName = $_FILES['video']['tmp_name'];
    
    $position = strpos($videoName, ".");
    $fileExtension = substr($videoName, $position + 1);
    $fileExtension = strtolower($fileExtension);
    
    if(empty($videoName)){
        echo '<h1 style="text-align:center; font-family:Courier New, Courier, monospace;">Please choose a file!</h1>';
    } elseif (!in_array($fileExtension, array("mp4", "ogg", "webm"))) {
        echo "The file extension must be .mp4, .ogg, or .webm in order to be uploaded.";
    } else {
        $path = '../Display_Video/uploadedVids/'; 
        $destination = $path . $videoName;
        
        if(move_uploaded_file($videoTempName, $destination)){
            echo "Video uploaded.";
            header('Location: upload.php');
             
        } else {
            echo "Failed to upload the video.";
        }
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