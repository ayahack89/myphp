<?php 
include "db_connection.php"; 
?>

<?php
 
$get_id = mysqli_real_escape_string($conn, $_GET['announcement']);
$sql_fetch = "SELECT * FROM `announcement_threads` WHERE announcement_id = '{$get_id}'";
$result = mysqli_query($conn, $sql_fetch);

if($result && mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
?>
<div class="container bg-light border rounded-0 my-3">
    <h4><?php echo $row['anno_thread_name']; ?></h4>
    <p><?php echo $row['anno_thread_desc']; ?></p>
    <p>Created By: <?php echo $row['anno_by']; ?></p>
    <p>Announcement ID: <?php echo $row['announcement_id']; ?></p>
    <p>Last Update: <?php echo $row['last_update']; ?></p>
</div>
<?php 
    }
} else {
    echo "<div class='container'>No data found</div>";
}
?>