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
    <link rel="icon" type="image/x-icon" href="img/background/agguoralogo.jpg">
    <?php include "bootstrapcss-and-icons.php"; ?>
    <?php
    $get_id = mysqli_real_escape_string($conn, $_GET['announcement']);
$sql_fetch = "SELECT * FROM `announcement_threads` WHERE announcement_id = '{$get_id}'";
$result = mysqli_query($conn, $sql_fetch);

if($result && mysqli_num_rows($result) > 0){
    $seo = mysqli_fetch_assoc($result);
?>
<meta name="description" content="<?php echo $seo['anno_thread_desc']; ?>">
    <title><?php echo $seo['anno_thread_name']; ?> | Announcement Thread | Agguora</title>
    <?php } ?>
    <?php include "fonts.php"; ?>
        <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-YXXL0NCGLE"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-YXXL0NCGLE');
</script>
</head>
<body class="bg-light">
    <?php include "header.php"; ?>
<?php

$get_id = mysqli_real_escape_string($conn, $_GET['announcement']);

// Fetch announcement threads
$sql_fetch = "SELECT * 
              FROM `announcement_threads` 
              WHERE announcement_id = '{$get_id}'
              ORDER BY last_update DESC;";
$result = mysqli_query($conn, $sql_fetch);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $anno_id = $row['announcement_id'];

        // Fetch the related announcement details
        $Q = "SELECT * FROM `announcement` WHERE anno_id = '{$anno_id}'";
        $run = mysqli_query($conn, $Q);
        if ($run && mysqli_num_rows($run) > 0) {
            while ($rowss = mysqli_fetch_assoc($run)) {
                echo '<div class="container mb-2 mt-3 rounded border-none">
                        <div class="border-none rounded my-2">
                          <span class="text-danger"><i class="ri-user-star-fill"></i>';

                $anno_by = $row['anno_by'];
                $sql = "SELECT * FROM `admin` WHERE id = '{$anno_by}'";
                $query = mysqli_query($conn, $sql);
                if ($query && mysqli_num_rows($query) > 0) {
                    $admin = mysqli_fetch_assoc($query);
                    echo $admin['name'] . '</span><br>
                          <span class="text-secondary" style="font-size:12px;">
                          <i class="ri-calendar-2-fill" style="font-size:12px;"></i> ' . $row["last_update"] . '</span><br>
                          <span class="text-danger py-3" style="font-size:1rem;">
                          <span>' . $rowss['anno_name'] . '>> </span>' . $row['anno_thread_name'] . '</span><br>
                        </div>';
                }
                echo '<div class="card-body">
                        <blockquote class="blockquote mb-0">
                          <p style="font-size:15px;">' . $row['anno_thread_desc'] . '</p>
                      </div>
                    </div>';
            }
        }
    }
} else {
    echo "<div class='container'>No data found</div>";
}

?>

<?php include "footer.php"; ?>
<?php include "bootstrapjs.php" ?>

</body>
</html>
