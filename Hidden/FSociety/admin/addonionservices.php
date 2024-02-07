<?php 
include "../db_connection.php";
session_start(); 
?>
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
     input[type="submit"]{
          background-color: red;
          border: none;
          color: white;
          font-weight: bolder;
          border-radius: 2px;
          padding: 8px;
          width: 20%;
          margin-top: 10px;
          transition: all 4ms ease-in;

     }
     input[type="submit"]:hover{
          transform: translateY(2%);
          cursor: pointer;


     }

</style>
<body> 

 
   <div style="width:600px; margin:auto;">
   <h3>Uploade onion services .  . . . . .onion</h3>
   <?php 
include "../db_connection.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["submit"])) {
        $onionsitename = $_POST["onionsitename"];
        $catagory = $_POST["catagory"];
        $onionlink = $_POST["onionlink"];

        if (!empty($onionsitename) && !empty($catagory) && !empty($onionlink)) {
          $sql_query = "INSERT INTO `onionsites` (`onionsitename`, `onionsitelink`, `catagory`) VALUES ( '$onionsitename', '$onionlink', '$catagory');";
            $result = mysqli_query($conn, $sql_query);

            if ($result) {
                header("Location: onionsitesupdatelist.php");
                mysqli_close($conn);
            } else {
                die("Something went wrong!" . mysqli_error($conn));
            }
        }
    }
}
?>
     <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
          <label for="onionsitename"
            >Onion Site name <br />
            <input type="text" name="onionsitename" style="width:50%; padding:5px" placeholder="Onion site name. . . . . ."  /> </label
          ><br />
          <label for="catagory">
               <select name="catagory">
                  <option value="">--Select Catagory --</option>
                  <option value="Drugs">Drugs</option>
                  <option value="Guns">Guns</option>
                  <option value="Hacking_Tools">Hacking Tools</option>
                  <option value="Banned_Books">Banned Books</option>
                </select>
</br>
          <label for="onionlink"
            >Onion link <br />
            <input type="text" name="onionlink" style="width:80%; padding:5px;" placeholder="Onion site link . . . . . . . . . . .onion" /> </label
          ><br />
          <input type="submit" name="submit" value="Uploade" />
        </form>
        </div>
     
   
     
     
</body>
</html>