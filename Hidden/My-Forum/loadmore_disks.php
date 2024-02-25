<?php include "db_connection.php"; ?>
<?php
$perpage = $_POST['page'];
$start_loading = $_POST['starting'];
?>

<?php
$sql = "SELECT * FROM `catagory` LIMIT $start_loading,$perpage";
$print = mysqli_query($conn, $sql);
$output = '';
if ($print) {
     if (mysqli_num_rows($print) > 0) {
          while ($disk = mysqli_fetch_assoc($print)) {

               $output .= '
               <a href="disk.php?Disk=' . $disk['catagory_id'] . '" style="text-decoration:none; color:white;" class="row">
                    <div class="card mx-2 my-2">
                         <!-- Disk Card -Start -->

                         <div class="card-body">
                              <h5 class="card-title">
                                   <i class="ri-hard-drive-fill"></i>
                                   ' . $disk['catagory_name'] . '<br>
                                   <b style="font-size:11px; font-weight:lighter;">Disk added on:
                                        ' . $disk['created'] . '
                                   </b>
                              </h5>
                              <p class="card-text" style="font-size:12px;">
                                   ' . $disk['catagory_desc'] . '
                              </p>

                         </div>

                       
                    </div>
               </a>';

          }
          echo $output;
     } else {
          echo "<h5>No Disk Found : (</h5>";
     }
} else {
     echo "<h5>Somthing Went Wrong! : (</h5>";
}
?>