<?php include "db_connection.php"; ?>
<?php
$perpage = $_POST['page'];
$start_loading = $_POST['starting'];
?>
<?php
$sql = "SELECT * FROM `catagory`";
$run = mysqli_query($conn, $sql);
if ($run && mysqli_num_rows($run) > 0) {
     while ($disk = mysqli_fetch_assoc($run)) {
          $disk_id = $disk['catagory_id'];

          $sql_query = "SELECT * FROM `threads` WHERE thread_catagory_id = '{$disk_id}' LIMIT $start_loading, $perpage";
          $result = mysqli_query($conn, $sql_query);
          $output = '';
          if ($result) {

               if (mysqli_num_rows($result) > 0) {
                    $check_result = false;
                    while ($thread = mysqli_fetch_assoc($result)) {
                         $thread_id = $thread['thread_id'];
                         $thread_name = $thread['thread_name'];
                         $thread_desc = $thread['thread_desc'];
                         $thread_catagory_id = $thread['thread_catagory_id'];
                         $thread_user_id = $thread['thread_user_id'];
                         $thread_time = $thread['thread_time'];
                         $sql = "SELECT * FROM `user` WHERE id = '{$thread_user_id}'";
                         $run = mysqli_query($conn, $sql);
                         if ($run) {
                              if (mysqli_num_rows($run) > 0) {
                                   $user = mysqli_fetch_assoc($run);
                                   $output = '
                         <div class="container d-flex bg-light border py-4 px-4" id="content">
                             <div class="px-3">';
                                   if (isset($_SESSION['username'])) {
                                        $output .= '
                                 <a href="allprofile.php?user=' . $user['id'] . '"><img src="img/images/' . $user['profile_pic'] . '" alt="" width="50px" height="50px" class="my-1"></a>';
                                   } else {
                                        $output .= '<img src="img/images/default.png" alt="" width="50px" height="50px" class="my-1">';
                                   }
                                   $output .= '
                             </div>
                             <div class="text">
                                 <h5>
                                     <a href="allprofile.php?user=' . $user['id'] . '" style="color:black; text-decoration:none; font-size:1rem;">
                                         <b>@' . $user['username'] . '</b>
                                     </a><br>
                                     <b style="font-size:11px; font-weight:lighter;">Post at: ' . $thread['thread_time'] . '</b><br>
                                     <a href="thread.php?thread=' . $thread['thread_id'] . '" class="text-dark">' . $thread['thread_name'] . '</a>
                                 </h5>
                                 <p style="font-size:12px;">' . $thread['thread_desc'] . '</p>';
                                   if (!empty($thread['uploaded_image'])) {
                                        $output .= '
                                     <figure class="figure">
                                         <img src="img/upload/' . $thread['uploaded_image'] . '" class="figure-img img-fluid rounded" alt="..." width="300px" height="300px">
                                     </figure>';
                                   }
                                   $output .= '
                             </div>
                         </div>';




                              } else {
                                   echo "No user found.";
                              }

                         } else {
                              echo "User ID Not Found!";
                         }
                         $check_result = true;
                    }

                    if (!$check_result) {

                    }
               } else {
                    $output = '
          <div class="container px-4">
               <h2>No Result Found : (</h2>
               <p style="font-size:12px;">Be the first person to add a topic....</p>
          </div>';


               }



          } else {
               echo "Somthing Went Wrong : (";
          }
     }
}
?>