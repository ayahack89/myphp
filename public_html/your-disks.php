<?php 
session_start();
if(!isset($_SESSION['username'])){
echo 'Opps! atfirst you need to <a href="login.php">login</a> & proof that you are a true member.';
}else{ ?>
<?php
include "db_connection.php";
ini_set('display_errors', 0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <?php include "bootstrapcss-and-icons.php"; ?>
     
     <link rel="icon" type="image/x-icon" href="img/background/agguoralogo.jpg">
     <title>Drive Activity | Agguora</title>
     <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-YXXL0NCGLE"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-YXXL0NCGLE');
</script>
</head>
<?php include "fonts.php"; ?>

<body>
     <?php include "header.php"; ?>
     
     <?php
$username = $_SESSION['username'];
$u = "SELECT * FROM `user` WHERE username='{$username}'";
$qr = mysqli_query($conn, $u);

if ($qr && mysqli_num_rows($qr) > 0) {
    $ed = mysqli_fetch_assoc($qr);
    $user_id = $ed['id'];

    $w = "SELECT * FROM `user` WHERE id='{$user_id}'";
    $r = mysqli_query($conn, $w);

    if ($r && mysqli_num_rows($r) > 0) {
        $e = mysqli_fetch_assoc($r);
        $createdBy = $e['id'];

        $sql = "SELECT * FROM `catagory` WHERE created_by='{$createdBy}' ORDER BY created DESC";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                while ($disk = mysqli_fetch_assoc($result)) {
?>
                    <!-- Disk box -Start  -->
                    <div class="card rounded-0">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?php echo htmlspecialchars($disk['catagory_name']); ?>
                            </h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary">
                                <?php
                                $createdBy = $disk['created_by'];
                                $user_sql = "SELECT * FROM `user` WHERE id='{$createdBy}'";
                                $user_result = mysqli_query($conn, $user_sql);

                                if ($user_result && mysqli_num_rows($user_result) > 0) {
                                    $user = mysqli_fetch_assoc($user_result);
?>
                                    <b style="color:black;">
                                        @<?php echo htmlspecialchars($user['username']); ?>
                                    </b>
<?php
                                }
?>
                                <br>
                                <b style="font-weight:lighter; font-size:12px;">
                                    <?php echo htmlspecialchars($disk['created']); ?>
                                </b>
                            </h6>
                            <p class="card-text">
                                <?php echo htmlspecialchars($disk['catagory_desc']); ?>
                            </p>
                            <a href="user-disk-edit-page.php?edit=<?php echo $disk['catagory_id']; ?>" class="card-link text-success" style="text-decoration:none;"><i class="ri-edit-box-line"></i></a>
                            <a href="delete-your-disks.php?delete=<?php echo $disk['catagory_id']; ?>" class="card-link text-danger" style="text-decoration:none;"><i class="ri-delete-bin-5-line"></i></a>
                        </div>
                    </div>
                    <!-- Disk box -End  -->
<?php
                }
            } else {
                echo '<div class="alert alert-warning rounded-0" role="alert" style="font-size:15px;">No disks found :(</div>';
            }
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
} else {
    echo '<div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">Invalid user!</div>';
}
?>

     

     <?php include "footer.php"; ?>
     <?php include "bootstrapjs.php"; ?>
</body>
</html>
<?php } ?>