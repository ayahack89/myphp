<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Images</title>
</head>
<body>
     <center>
          <table>
               <?php 
               $directory = "../Display_Images/uploade"; 
               $images = glob($directory . "/*.jpg"); 

               if (!empty($images)) {
                    
                    echo '<tr>';
                    foreach ($images as $file_name) {
                         echo '<td><img src="' . $file_name . '" alt="Image" width = 400px height=400px></td>';
                    }
                    echo '</tr>';
               } else {
                    echo '<p>No images found in the directory.</p>';
               }
               ?>
          </table>
     </center>
</body>
</html>
