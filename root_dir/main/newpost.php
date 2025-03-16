<?php 
session_start();
if(!isset($_SESSION['username'])){
echo 'Oops! at first you need to <a href="login.php">login</a> & proof that you are a true member.';
}else{ 
?>
<?php
include "../db/db_connection.php";
ini_set('display_errors', 0);

?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <?php include "../include/bootstrapcss-and-icons.php"; ?>
<meta name="description" content="">
<link rel="icon" type="image/x-icon" href="img/background/agguoralogo.jpg">
<title>Add new post | Agguora</title>
     

</head>
<?php include "../include/fonts.php"; ?>
<style>
.div-hover:hover{
    background-color:whitesmoke;
    border-radius:10px;
    cursor:pointer;
}

</style>

<body class="bg-light">
     <div class="container">
         <div class="mb-5 py-3">
         
<!-- Search-bar -Start -->
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" class=" container d-flex my-3">
    <input class="form-control rounded-0" type="search" placeholder="Search community by name, date, content.." name="search" aria-label="default input example">
    <button type="submit" name="submit" class="btn btn-dark rounded-0"><i class="ri-search-line"></i></button>
</form>

<?php
if (isset($_POST['submit'])) {

    $search = mysqli_real_escape_string($conn, $_POST['search']);

    if (!empty($search)) {
        $search_query = "SELECT catagory.*, user.username 
                         FROM `catagory` 
                         LEFT JOIN `user` ON catagory.created_by = user.id 
                         WHERE catagory.catagory_name LIKE '%{$search}%' 
                         OR catagory.catagory_desc LIKE '%{$search}%' 
                         OR catagory.created LIKE '%{$search}%'";

        $result = mysqli_query($conn, $search_query);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                while ($search_disk = mysqli_fetch_assoc($result)) {
?>
                    <a href="disk.php?Disk=<?php echo $search_disk['catagory_id']; ?>" style="text-decoration:none; color:white;">
                        <div class="card px-1 py-1 my-1 rounded border div-hover">
                            <div class="card-body">
                                <h5 class="card-title text-success">
                                   <i class="ri-box-1-fill"></i> <?php echo $search_disk['catagory_name']; ?>
                                    </h5>
                            </div>
                        </div>
                    </a>
<?php
                }
            } else {
                echo '<div class="alert alert-warning rounded" role="alert" style="font-size:15px;">No results found : (</div>';
            }
        } else {
            echo '<div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">Oops! Something went wrong.</div>';
        }
    }
}
?>
<!-- Search-bar -End -->

       
<div class="container">
    <p style="font-size:15px;">Please select a drive for your post. Create new drive? Click here &nbsp; <a href="drives.php"><button class="btn btn-sm rounded-circle btn-dark"><i class="ri-arrow-right-double-fill"></i></button></a></p>  
          <?php
          $sql = "SELECT * FROM `catagory`
ORDER BY created DESC";
          $print = mysqli_query($conn, $sql);
          if ($print) {
               if (mysqli_num_rows($print) > 0) {
                    while ($disk = mysqli_fetch_assoc($print)) {
                         ?>
<!-- Disk Fetch -Start -->  


<div class="my-2 py-3 px-3 rounded border div-hover">
    <!-- Disk Card -Start -->
    <div class="card-body">
        <h5 class="card-title">
            <a href="disk.php?Disk=<?php echo $disk['catagory_id']; ?>" style="text-decoration:none; color:white;">
                <b class="text-dark">
                    <i class="ri-box-1-fill"></i> <?php echo $disk['catagory_name']; ?>
                </b><br>
                 
            </a>
            <?php
            $userid = $disk['created_by'];
            $by = "SELECT * FROM `user` WHERE id = {$userid}";
            $result = mysqli_query($conn, $by);
            if($result && mysqli_num_rows($result) > 0){
                $created_by=mysqli_fetch_assoc($result);
                ?>
            
            <?php } ?>
            
        </h5>
    </div>
    <!-- Disk Card -End -->
</div>

<!-- Disk Fetch -End -->
                         <?php
                    }
               } else {
                    echo' <div class="alert alert-light rounded-0" role="alert" style="font-size:15px;">No disks found! Be the first person to create new disks.</div>';

               }
          } else {
               echo' <div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">Opps! Somthing went wrong : (</div>';

          }
          ?>
          </div>
     </div>
<?php include "../include/bottom-nav.php"; ?>
     </body>
</html>
<?php } ?>