<?php 
include "db_connection.php";
session_start();
ini_set('display_errors', 0);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "bootstrapcss-and-icons.php"; ?>
    <title>Document</title>
    <?php include "fonts.php"; ?>
</head>
<body class="bg-light">
    <?php include "header.php"; ?>
<?php
 
$get_id = mysqli_real_escape_string($conn, $_GET['announcement']);
$sql_fetch = "SELECT * FROM `announcement_threads` WHERE announcement_id = '{$get_id}'";
$result = mysqli_query($conn, $sql_fetch);

if($result && mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
?>

<div class="card container mb-2 mt-3 rounded-0">
  <div class="card-header border rounded-0 my-2 bg-danger">
  <b class="text-light py-3" style="font-size:2rem;"><?php echo $row['anno_thread_name']; ?></b><br>
  <b class="text-light"><i class="ri-user-star-fill"></i> <?php echo $row['anno_by']; ?></b>
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
      <p><?php echo $row['anno_thread_desc']; ?></p>
     <footer class="blockquote-footer"><i class="ri-calendar-2-fill"></i> <?php echo $row['last_update']; ?></footer>
    </blockquote>
  </div>
</div>
<?php 
    }
} else {
    echo "<div class='container'>No data found</div>";
}
?> 

<?php include "footer.php"; ?>
<?php include "bootstrapjs.php" ?>

</body>
</html>
