<?php include "db_connection.php"; ?>
<?php ini_set('display_errors', 0); ?>
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
                    <div class="card my-2 rounded-0">
                         <!-- Disk Card -Start -->

                         <div class="card-body">
                              <h5 class="card-title">
                              <a href="disk.php?Disk=' . $disk['catagory_id'] . '" style="text-decoration:none; color:white;">
                              <b style="font-weight:lighter;" class="text-danger"><i class="ri-hard-drive-fill"></i>
                                                  '.$disk['catagory_name'].'
                                             </b></a><br>
                                             <b style="font-size:11px; font-weight:lighter;"><i class="ri-calendar-2-line" style="font-size:12px;"></i>
                                                  '. $disk['created'].'
                                             </b>
                                   
                              </h5>
                              <p class="card-text" style="font-size:12px;">
                                   ' . $disk['catagory_desc'] . '
                              </p>
                         </div>
                    </div>
               ';

          }
          echo $output;
     } else {
          echo "<h5>No Disk Found : (</h5>";
     }
} else {
     echo "<h5>Somthing Went Wrong! : (</h5>";
}
?>