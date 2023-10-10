<?php 
if(isset($_FILES['image'])){
     // echo "<pre>";
     // print_r($_FILES['image']);
     // echo "</pre>";

     $file_name = $_FILES['image']['name'];
     $fill_path = $_FILES['image']['full_path'];
     $file_type = $_FILES['image']['type'];
     $temp_name = $_FILES['image']['tmp_name'];
     $error = $_FILES['image']['error'];
     $file_size = $_FILES['image']['size'];

     move_uploaded_file($temp_name, "uploaded-img/".$file_name);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Please Uploade Your file....</title>
</head>
<body>
     <h3 style="text-align:center; font-family: Arial; ">Choose Your File.</h3>
     <div style=" display:flex; margin:auto; width:400px; padding:50px;"> 
     <form action="FileUploade.php" method="post" enctype="multipart/form-data" >   
     <input type="file" name="image" id="img">
     <input type="submit" value="Uploade" style="width: 20%; margin-top:10px;">
     </form>
     </div>
     
</body>
</html>