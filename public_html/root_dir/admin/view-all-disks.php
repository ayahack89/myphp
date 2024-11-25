<?php 
session_start();
if(!isset($_SESSION['name'])){
echo 'Opps! atfirst you need to <a href="index.php">login</a> & proof that you are an admin.';
}else{ ?>
<?php
include "../db_connection.php";
ini_set('display_errors', 0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <?php include "../bootstrapcss-and-icons.php"; ?>
     <title>View All Drives | Admin Panel | Agguora</title>
</head>
<?php include "../fonts.php"; ?>
<body>

    <!-- All disks -Start -->
<?php
$sql = "SELECT * FROM `catagory` ORDER BY created DESC";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    while ($disk = mysqli_fetch_assoc($result)) {
?>
        <!-- Disk box -Start  -->
        <div class="card rounded-0">
            <div class="card-body">
                <h5 class="card-title">
                    <?php echo $disk['catagory_name']; ?>
                </h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">
                    <?php 
                    $created_by = $disk['created_by'];
                    $q = "SELECT * FROM `user` WHERE id='{$created_by}'";
                    $result_user = mysqli_query($conn, $q);

                    if ($result_user && mysqli_num_rows($result_user) > 0) {
                        $r = mysqli_fetch_assoc($result_user);
                        echo '<b style="color:black;">' . $r['username'] . '</b><br>';
                    }
                    ?>
                    <b style="font-weight:lighter; font-size:12px;">
                        <?php echo $disk['created']; ?>
                    </b>
                </h6>
                <p class="card-text">
                    <?php echo $disk['catagory_desc']; ?>
                </p>
                <a href="delete-disks.php?delete=<?php echo $disk['catagory_id']; ?>" class="card-link text-light" style="text-decoration:none; font-size:1rem;">
                    <button type="button" class="btn btn-danger rounded-0">Banned <i class="ri-delete-bin-5-line"></i></button>
                </a>
            </div>
        </div>
        <!-- Disk box -End  -->
<?php
    }
} else {
    echo '<div class="alert alert-warning rounded-0" role="alert" style="font-size:12px;">No Disk Found!</div>';
}
?>
<!-- All disks -End  -->



     <?php include "../bootstrapjs.php"; ?>
</body>
</html>
<?php } ?>