<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Solo Data Print</title>
</head>
<body>
     <form action="<?php echo $_SERVER['PHP_SELF'] ?> " method="post">
     <label for="fname">Name:</br><input type="text" name="fname" id="fname"></label></br>
     <label for="age">Age:</br><input type="text" name="age" id="age"></label></br>
     <input type="submit" name="save" value="Save" style="margin-top: 10px;">

     </form>
     <?php
     
     if(isset($_POST['save'])){
          echo "<pre>";
          echo $_POST['fname']."</br>";
          echo $_POST['age'];
          echo "</pre>";
     }
     
     ?>
     
</body>
</html>