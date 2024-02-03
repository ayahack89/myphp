<?php include "db_config.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Records</title>
</head>
<style>
    body{
        font-size: 2rem;
        background-color: black;
    }
  
    strong{
        font-family: 'Courier New', Courier, monospace;
        
      
        color: white;
        padding: 5px;
        border-radius: 50px;
        color: yellow;
    }
    center{
       
        margin: 10px;
    }
    button{
        cursor: pointer;
        padding: 8px;
        margin: 5px;
        border-radius: 80px;
        background-color: red;
        
        
    }
    button a{
        color: white;
        font-weight: bolder;
    }
 
    
   
</style>
<body>
<?php 
$limit = 3;

$page = isset($_GET["page"]) ? $_GET["page"] : 1;
if($page == '' || $page == 1){
    $page1 = 0;
}else{
    $page1 = ($page * $limit) - $limit;
}

$sql = "SELECT * FROM `table` LIMIT $page1, $limit";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        echo '<center>';
        
        echo "<strong>".$row["email"]."</strong></br>";
        
        echo '<center>';
    }
}

// Pagination
$run = mysqli_query($conn, "SELECT COUNT(*) as total FROM `table`");
$row = mysqli_fetch_assoc($run);
$total_records = $row['total'];

$pages = ceil($total_records / $limit);

for($i = 1; $i <= $pages; $i++){

    
   
    echo '<button><a href="index.php?page='.$i.'" style="text-decoration:none;">', $i, '</a></button>';

    
   
   
}
?>

     
     
</body>
</html>