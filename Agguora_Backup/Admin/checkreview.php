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
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <?php include "../bootstrapcss-and-icons.php"; ?>
    <title>Admin - Check Reviews</title>
</head>
<?php include "../fonts.php" ?>
<body>
<?php include "admin-header.php"; ?>
<!-- Main body -Start  -->
    <center>
        <h3 class="bg-danger py-2 text-light">Check Reviews</h3>
        <hr>
        <!-- Review table -Start -->
        <table class="table container">
            <th>User</th>
            <th>Ratings</th>
            <th>Comments</th>
           
            <?php
            //Fetching all reviews form the database
            $sqlquery = "SELECT * FROM `review`";
            $fetching = mysqli_query($conn, $sqlquery);
            if ($fetching) {
                if (mysqli_num_rows($fetching) > 0) {
                    while ($row = mysqli_fetch_assoc($fetching)) {
                        ?>
                        <tr>
                            <td><?php echo $row["user"]; ?></td>
                            <td><?php echo $row['ratings']; ?></td>
                            <td><?php echo $row["comments"]; ?></td>
                        </tr>
                        <?php
                    }
                }
            } else {
                die("Something went wrong!" . mysqli_error($conn));
            }
            ?>
        </table>
       <!-- Review table -End  -->

        <hr>
        <p> Go to <a href="admin.php">admin page</a></p>
    </center>
<!-- Main body -End  -->

<?php include "../bootstrapjs.php"; ?>
</body>
</html>
<?php } ?>
