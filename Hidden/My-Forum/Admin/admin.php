<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Welcome <?php echo $_SESSION["name"]; ?></title>
</head>
<style>
:root {
  --bodyColor: #1e293b;
  --containerColor: #475569;
}

body {
  margin: 0;
  padding: 0;
  font-weight: bolder;
  background-color: var(--bodyColor);
  color: yellow;
  font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto,
    Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
}

.container {
  width: 400px;
  margin: 0 auto;
  background-color: skyblue;
  margin-top: 2%;
  padding: 20px;
  font-size: 1.2rem;
  background-color: var(--containerColor);
  border-radius: 5px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

     ul,li{
          list-style-type: none;
     }
     h2{
          text-align: center;
     }
     a{
          color:red;
     }

</style>
<body> 
     
     <h2> Admin: <?php echo $_SESSION["name"]; ?> </h2>
     <div class="container">
     <p><a href="logout.php">LogOut</a></p>
     <hr>
     Welcome <?php echo $_SESSION["name"]; ?>
     <ul>
          <li style="border:1px solid yellow; border-radius:5px; padding:5px; width:200px;"><a href="checkreview.php" style="color:yellow;  text-decoration: none;">Check users reviews</a></li>
          <li style="border:1px solid yellow; border-radius:5px; padding:5px; width:200px;"><a href="addonionservices.php" style="color:yellow;  text-decoration: none;">Add Onion Services</a></li>
          <li style="border:1px solid yellow; border-radius:5px; padding:5px; width:200px;"><a href="#" style="color:yellow;  text-decoration: none;">Service providers </a></li>
          <li></li>
          <li></li>
     </ul>
     </div>
     
   
     
     
</body>
</html>