<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Data Table</title>
</head>
<style>
     body{
          margin: 0;
          padding: 0;
          background-color: gray;
     }
     .container{
          width: 500px;
          height: 1000000px;
          margin: 0 auto;
          background-color: white;
          margin-top: 5%;
          padding-top: 10px

     }
     h3{
          font-family: 'Courier New', Courier, monospace;
          font-weight: bolder;
     }
     table{
          border: 2px solid black;
          border-collapse: collapse;
     }
     th{
          background-color: black;
          color:white;
          border: 2px solid white;
          padding: 10px;
          font-size: 1.2rem;
          font-family: 'Courier New', Courier, monospace;
          font-weight: bolder;
     }
     td{
          border: 2px solid white;
          background-color: gray;
          color: white;
          padding: 10px;
          font-size: 1.2rem;
          font-family: 'Courier New', Courier, monospace;
          font-weight: bolder;

     }
</style>
<body>
<div class="container">
          <center>  
               <h3>DATA TABLE</h3>
               
          <table>
          <th>SL.no.</th>
               <th>Email</th>
               <th>Password</th>
               <tr>
          <?php 
               include "db_connection.php";
               // Fetch data from the database
               $sqlQuery = "SELECT * FROM `table`";
               $result = mysqli_query($conn, $sqlQuery);

               if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
               ?>
               
                    <td><?php echo $row['slno']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['password']; ?></td>
               </tr>
               <?php
                    }
               }
               ?>
          </table>
          <h3><a href="Index.php">BACK TO THE FORM</a></h3>
          </center>
     </div>
     
</body>
</html>