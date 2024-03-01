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
     <title>Document</title>
</head>
<?php include "../fonts.php"; ?>
<style>
    .scroll{
        overflow: scroll;
        height: 50vh;;
 
    }
    .scroll::-webkit-scrollbar {
    display: none; 
}
</style>
<body>
     <?php include "admin-header.php"; ?>

<!-- Main-body -Start  -->
     <div class="container py-3">
    <?php
    //Announcement insertdb script
    $alert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if ($method == 'POST') {
        $get_id = mysqli_real_escape_string($conn, $_GET['announcement']);
        if (isset($_POST['submit'])) {
            // Input details
            $anno_topic = mysqli_real_escape_string($conn, $_POST['anno_topic']);
            $anno_desc = mysqli_real_escape_string($conn, $_POST['anno_desc']);
            $admin_name = $_SESSION['name'];
            if (!empty($anno_topic) && !empty($anno_desc)) {
                $sql_query = "INSERT INTO `announcement_threads` (`anno_thread_name`, `anno_thread_desc`, `announcement_id`, `anno_by`) VALUES ('{$anno_topic}', '{$anno_desc}', '{$get_id}', '{$admin_name}')";
                $result = mysqli_query($conn, $sql_query);
                if ($result) {
                    $alert = true;
                } else {
                    echo' <div class="alert alert-danger" role="alert" style="font-size:15px;">Opps! Somthing went wrong : (</div>';

                }
            } else {
                
                echo' <div class="alert alert-danger" role="alert" style="font-size:15px;">Please properly fill out the form!</div>';

            }
        }
    }

    // Success loading -start
    if ($alert) {
        echo '<div class="w-100 text-success" type="button" id="alertMsg" disabled>
        <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
        <span role="status">Loading...</span>
      </div>';
        echo '<script>
        setTimeout(function() {
            document.getElementById("alertMsg").style.display = "none";
            window.location="announcement-thread.php?announcement=' . $get_id . '";
        }, 2000);
    </script>';
    }
    // Success loading -end
    ?>

    <h3>Add an announcement</h3>
    <?php if (isset($_SESSION['name'])) { ?>

        <!-- Announcement form -Start  -->
        <form action="<?php echo htmlentities($_SERVER['REQUEST_URI']); ?>" method="post" class="border px-5 py-5">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Announcement topic</label>
                <input type="text" class="form-control rounded-0" id="exampleFormControlInput1" name="anno_topic">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Announcement description</label>
                <textarea class="form-control rounded-0" id="exampleFormControlTextarea1" rows="3"
                          name="anno_desc"></textarea>
            </div>
            <div class="mb-3">
                <button type="submit" name="submit" class="btn btn-danger rounded-0">Add Topic</button>
            </div>
        </form>
        <!-- Announcement form -End  -->

        <!-- Alert message if you are not logged in ... -start -->
    <?php } else { ?>
        <div class="alert alert-danger d-flex align-items-center" role="alert">
            <use xlink:href="#exclamation-triangle-fill" />
            </svg>
            <div>
                <i class="ri-alert-fill"></i> You are not logged In! Please <a href="login.php" style="color:maroon;">logIn</a> to start discussion.
            </div>
        </div>
    <?php } ?>
    <!-- Alert message if you are not logged in ... -End -->

<!-- Sub-body -Start  -->
<div class="my-3">
<!-- Scroll -Start  -->
<div class="scroll">
    <?php 
$get_id = mysqli_real_escape_string($conn, $_GET['announcement']);
$sql_fetch = "SELECT * FROM `announcement_threads` WHERE announcement_id = '{$get_id}'";
$result = mysqli_query($conn, $sql_fetch);

if($result && mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
?>
<!-- Announcement thread container -Start  -->
<div class="container bg-light border rounded-0 my-3 py-5 px-5">
<h6><b><i class="ri-user-star-fill"></i><?php echo $row['anno_by'] ?></b></h6>
  <h4><b><?php echo $row['anno_thread_name'] ?></b><br>
  <b style="font-size:12px; font-weight:lighter;"><?php echo $row['last_update']; ?></b>
</h4>
<p><?php echo $row['anno_thread_desc']; ?></p>
<a href="edit-announcement-thread.php?edit=<?php echo $row['anno_thread_id']; ?>" class="card-link text-success"
        style="text-decoration:none; font-size:1.5rem;"><i class="ri-edit-box-line"></i><a>
<a href="delete-announcement-thread.php?delete=<?php echo $row['anno_thread_id']; ?>" class="card-link text-danger"
        style="text-decoration:none; font-size:1.5rem; padding-left:20px;"><i class="ri-delete-bin-5-line"></i></a>

</div>
<!-- Announcement thread container -End  -->
<?php 
    }
} else {
    echo "<div class='container'>No data found</div>";
}
?>

</div>
<!-- Scroll -End  -->
</div>
<!-- Main-body -End  -->

<?php include "../bootstrapjs.php"; ?>
</body>
</html>
<?php } ?>