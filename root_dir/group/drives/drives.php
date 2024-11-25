<?php
include "../../include/db_connection.php";
session_start();
ini_set('display_errors', 0);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <link rel="icon" type="image/x-icon" href="img/background/agguoralogo.jpg">
    <?php include "../../include/bootstrapcss-and-icons.php"; ?>
    <?php include "../../include/bootstrapjs.php"; ?>
    <title>All Drives | Agguora</title>

</head>
<?php include "../../include/fonts.php"; ?>
<style>
    .div-hover:hover {
        background-color: whitesmoke;
        border-radius: 10px;
        cursor: pointer;
    }
</style>

<body class="bg-light">
    <?php include "../../include/header.php"; ?>

    <div class="container">
        <div class="mb-5 py-3">
            <div class="container">
                <h2>Drives</h2>
            </div>
            <!-- Search-bar -Start -->
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post"
                class=" container d-flex my-3">
                <input class="form-control rounded-0" type="search" placeholder="Search drives by name, date, content.."
                    name="search" aria-label="default input example">
                <button type="submit" name="submit" class="btn btn-dark rounded-0"><i
                        class="ri-search-line"></i></button>
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
                                <a href="disk.php?Disk=<?php echo $search_disk['catagory_id']; ?>"
                                    style="text-decoration:none; color:white;">
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
            <?php if (isset($_SESSION['username'])) { ?>
                <div class="container my-3">
                    <button class="btn btn-dark rounded"><a href="create-new-drive.php" class="text-light"
                            style="text-decoration:none;">Create New Drive +</a></button>
                </div>
            <?php } ?>

            <div class="container">
                <div class="row">
                    <?php
                    $sql = "SELECT * FROM `catagory` ORDER BY created DESC";
                    $print = mysqli_query($conn, $sql);

                    if ($print) {
                        if (mysqli_num_rows($print) > 0) {
                            while ($disk = mysqli_fetch_assoc($print)) {
                                ?>
                                <!-- Disk Card - Start -->
                                <div class="col-md-4 col-sm-6 col-lg-3 mb-4">
                                    <div class="card h-100 border-0 shadow-sm">
                                        <!-- Icon Section -->
                                        <div class="card-body text-center bg-light d-flex align-items-center justify-content-center"
                                            style="height: 120px;">
                                            <i class="ri-box-1-fill" style="font-size: 60px; color: #333;"></i>
                                        </div>

                                        <!-- Disk Details Section -->
                                        <div class="card-body">
                                            <h5 class="card-title text-truncate" style="font-size: 12px; font-weight: bold;">
                                                <a href="disk.php?Disk=<?php echo htmlspecialchars($disk['catagory_id']); ?>"
                                                    class="text-dark text-decoration-none h6">
                                                    <?php echo htmlspecialchars($disk['catagory_name']); ?><br>
                                                    <?php if (!empty($disk['genre'])) { ?>
                                                        <span style="font-size:12px; color:grey;">g/
                                                            <?php echo $disk['genre']; ?></span>
                                                    <?php } else { ?>
                                                        <span style="font-size:12px; color:grey;">g/ empty </span>
                                                    <?php } ?>

                                                </a>
                                            </h5>

                                            <?php
                                            if (!empty($disk['created_by'])) {
                                                $created_by = $disk['created_by'];
                                                $sqlQuery = "SELECT * FROM `user` WHERE id = '$created_by'";
                                                $re = mysqli_query($conn, $sqlQuery);

                                                if ($re && mysqli_num_rows($re) > 0) {
                                                    $user = mysqli_fetch_assoc($re);
                                                    $profilePic = htmlspecialchars($user['profile_pic'] ?? 'default.jpg');
                                                    $about = htmlspecialchars($user['about'] ?? '');
                                                    ?>
                                                    <div class="d-flex align-items-center mt-3"
                                                        style="gap: 10px; font-size: 14px; color: #555;">
                                                        <img src="../../media/images/<?php echo $profilePic; ?>" class="rounded-circle"
                                                            alt="<?php echo $about; ?>"
                                                            style="width: 32px; height: 32px; object-fit: cover;">
                                                        <span class="text-truncate">
                                                            created_by
                                                            <?php echo htmlspecialchars($user['username'] ?? 'Unknown User'); ?>
                                                        </span>
                                                    </div>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <div class="d-flex align-items-center mt-3"
                                                        style="gap: 10px; font-size: 14px; color: #555;">
                                                        <img src="img/images/default.jpg" class="rounded-circle" alt="Default user image"
                                                            style="width: 32px; height: 32px; object-fit: cover;">
                                                        <span>Unknown User</span>
                                                    </div>
                                                    <?php
                                                }
                                            } else {
                                                ?>
                                                <div class="d-flex align-items-center mt-3"
                                                    style="gap: 10px; font-size: 14px; color: #555;">
                                                    <img src="img/images/default.jpg" class="rounded-circle" alt="Default user image"
                                                        style="width: 32px; height: 32px; object-fit: cover;">
                                                    <span>Unknown User</span>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- Disk Card - End -->
                                <?php
                            }
                        } else {
                            echo '<div class="alert alert-light rounded-0 text-center w-100" role="alert" style="font-size:15px;">No disks found! Be the first person to create new disks.</div>';
                        }
                    } else {
                        echo '<div class="alert alert-danger rounded-0 text-center w-100" role="alert" style="font-size:15px;">Oops! Something went wrong :(</div>';
                    }
                    ?>
                </div>
            </div>

            <?php include "../../include/bottom-nav.php"; ?>
</body>

</html>