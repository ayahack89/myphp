<?php 
//setcookie(name,value,expire,path,domain,secure,httponly);

$cookie_name = "AYANABHA";
$cookie_value = "FSOCIty";
if(!isset($_COOKIE[$cookie_name])){
     setcookie($cookie_name, $cookie_value, time() + (86400*30), "/");

}



?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>My Cookies</title>
</head>
<body>
     <?php

     if(isset($_COOKIE[$cookie_name])){

          echo "COOKIE NAME: ".$_COOKIE[$cookie_name];
     }else{

          echo "COOKIE IS NOT SET!";
          

     }
     

     
     ?>
     
</body>
</html>