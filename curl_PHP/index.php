<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>cURL - PHP</title>
</head>

<body>
     <?php
     //cURL = Client URL
     //Step by step fcnstion guide
     /* curl_init(); => Initialized the curl.
     curl_setopt(); => when we try to transfer a data using curl.
     curl_exec(); => when we try to execute curl.
     curl_close(); => to close the curl. */

     //How to retrive data from a server using cURL.
     // $ch = curl_init();
     // curl_setopt($ch, CURLOPT_URL, "https://www.google.com/");
     // curl_exec($ch);
     // curl_close($ch);
     
     //How to download images from a server using cURL.
     
     $downloat_img = "https://s1.zerochan.net/Jigoku.no.Fubuki.600.2998863.jpg";
     $folder_location = "img/image.jpg";
     $fimage = fopen($folder_location, 'w+');
     $ch = curl_init($downloat_img);
     curl_setopt($ch, CURLOPT_FILE, $fimage);
     // curl_setopt($ch, CURLOPT_TIMEOUT, 1000);
     $exe = curl_exec($ch);
     if ($exe) {

          echo "<h2 style='color:green; font-family:Arial;'>You image is already downloaded, Please check the img folder.</h2>";
          curl_close($ch);
          fclose($fimage);

     } else {
          curl_close($ch);
          fclose($fimage);
          echo "<h2 style='color:red; font-family:Arial;'>Sorry : ( somthing went wrong!, Please change your image link.</h2>";
     }



     //If you want to store the cURL data output on a variable.
     /* $ch = curl_init();
      $url = "https://www.something.com";
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  // for get method
      curl_setopt($ch, CURLOPT_POSTFIELDS, true);  // for post method
      
      $output = curl_exec($ch);
      print_r($output);
      curl_close($ch);*/





     ?>

</body>

</html>