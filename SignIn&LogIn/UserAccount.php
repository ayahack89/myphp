<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>User Account</title>
</head>
<body>
     <style>
          body{
               background-color: black;
          }
          .container{
               width: 500px;
               margin: 0 auto;
               padding: 5px;
          }
          table{
               border: 2px solid green;
               border-collapse: collapse;
               
          }
          th{
               background-color: green;
               color: black;
               padding: 10px;
          }
          table,td{
               border: 2px solid green;
               padding: 10px;
               color: green;
               font-family: 'Courier New', Courier, monospace;
               font-size: 2rem;
               font-weight: bolder;
          }
          p{
               color: green;
               font-family: 'Courier New', Courier, monospace;
               font-weight: bolder;
          }
     </style>
     

     
     <div class="container">
     <table>
    <tr>
        <th>User Name</th>
    </tr>
    <tr>
     <td><?php echo $_SESSION['Uname']; ?></td>
    </tr>
</table>
<p>Welcome [<?php echo $_SESSION['Uname']; ?>] Now you are the one of the member of our community : )</p>

                    

               
               
               
               
               
                    
         
     </div>
     
</body>
</html>