<?php 

session_start();

echo "<pre>";
print_r($_SESSION);
echo "</pre>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Session View</title>
</head>
<body>
     <?php 
     
     if(isset($_SESSION['AYANABHA'])){
          echo " BWU/BCA/22/ ".$_SESSION['AYANABHA'];

     }else{
          echo "Your session is already distroyed.";
     }
     
     
     ?>
     
</body>
</html>