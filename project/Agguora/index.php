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
     <?php include "bootstrapcss-and-icons.php"; ?>
     <title>Catagory-Page</title>
</head>
<?php include "fonts.php"; ?>
<style>
     :root {
          --success-result: #86efac;
     }
     .center{
          width: 80vw;
          margin: auto;
     }
     @media only screen and (max-width:1000px){
     .center{
          width: 100vw;
          margin: auto;
     }

     }
</style>

<body class="bg-black">
     <div class="container px-3 py-3 bg-light center">
     <?php include "header.php"; ?>
     <!-- Hero Section -Start -->
     <div class="px-4 py-5 my-1 text-center border">
          <div class="col-lg-6 mx-auto">
          <!-- Hero description -Start  -->
          <?php 
if(isset($_SESSION['username'])){
    ?>
    <p class="lead mb-4" style="font-size:15px;"> 
    
        <b style="font-size:2rem;"><a href="profile.php" style="text-decoration:none;"><i class="ri-user-4-fill" style="font-size:2rem;"></i><?php echo $_SESSION['username']; ?></a></b>
        <br>
        Hey there, <?php echo $_SESSION['username']; ?> ! Welcome to our awesome community! Feel free to dive into the endless threads, stir up some fun with new discussions, and rack up those sweet, sweet karmas. Don't miss out on the latest announcements, and hey, don't forget to read the terms and conditions.
    </p>
<?php 
} else {
?>
    <p class="lead mb-4" style="font-size:15px;">Hey there, guest user! Ready to join the community? Dive in and become the ultimate sweet karma collector! Engage in community activities, mingle with fellow members, and who knows, you might just crown yourself the karma king! Let's make some virtual magic together!</p>
<?php 
} 
?>


          <!-- Hero description -End  -->
               <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">

             
                    <button type="button" class="btn btn-danger btn-lg px-4 gap-3 rounded-0"><a href="Chat/spachat.php"
                              style="text-decoration:none; color:white;"><i class="ri-chat-3-fill"></i> Live
                              Chat</a></button>
                    <?php
                    if (!isset($_SESSION['username'])) {
                         ?>
                         <button type="button" class="btn btn-dark btn-lg px-4 rounded-0">
                              <a href="login.php" style="text-decoration:none; color:white;"><i
                                        class="ri-login-circle-line"></i> Log
                                   In</a>
                         </button>
                         <?php
                    }
                    ?>

               </div>
          </div>
     </div>
     <!-- Hero Section -End -->


     <!-- Action Section -Start -->
     <div class="container w-100">
          <!-- Search-bar -Start -->
          <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" class=" container d-flex my-3">
               <span type="button" class="w-50 btn btn-light rounded-0 border" l style="" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    <b>Create +</b>
               </span>
               <input class="form-control rounded-0" type="search" placeholder="Search Disks by name, date, content.."
                    name="search" aria-label="default input example">
               <button type="submit" name="submit" class="btn btn-dark rounded-0"><i
                         class="ri-search-line"></i></button>
                         
          </form>

          <?php
          if (isset($_POST['submit'])) {
               $search = mysqli_real_escape_string($conn, $_POST['search']);
               if (!empty($search)) {
                    $search_query = "SELECT * FROM `catagory` WHERE catagory_name LIKE '%{$search}%' OR catagory_desc LIKE '%{$search}%' OR created LIKE '%{$search}%' ";
                    $result = mysqli_query($conn, $search_query);
                    if ($result) {
                         if (mysqli_num_rows($result) > 0) {
                              while ($search_disk = mysqli_fetch_assoc($result)) {
                                   ?>
                                   <a href="disk.php?Disk=<?php echo $search_disk['catagory_id']; ?>" style="text-decoration:none; color:white;">
                                        <div class="card px-3 py-3 container rounded-0" style="background-color:var(--success-result);">
                                             <div class="card-body">
                                                  <h5 class="card-title">
                                                       <i class="ri-hard-drive-fill"></i>
                                                       <?php echo $search_disk['catagory_name']; ?><br>
                                                       <b style="font-size:11px; font-weight:lighter;"><i class="ri-calendar-2-line" style="font-size:12px;"></i>
                                                            <?php echo $search_disk['created']; ?>
                                                       </b>
                                                  </h5>
                                                  <p class="card-text" style="font-size:12px;">
                                                       <?php echo $search_disk['catagory_desc']; ?>
                                                  </p>
                                             </div>
                                        </div>
                                   </a>
                                   <?php
                              }
                         } else {
                              echo' <div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">Opps! Somthing went wrong : (</div>';
                         }
                    } else {
                         echo' <div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">Opps! Somthing went wrong : (</div>';
                    }
               }
          }
          ?>
          <!-- Search-bar -End -->


          <!-- Createt New Disk -Start  -->

          <?php
          if (isset($_POST["submit"])) {
               $catagory_created_by = $_SESSION['username'];
               $catagory_name = mysqli_real_escape_string($conn, $_POST['catagory_name']);
               $catagory_desc = mysqli_real_escape_string($conn, $_POST['about']);
               if (!empty($_POST['catagory_name']) && !empty($_POST['about'] && !empty($catagory_created_by))) {
                    $sql_query = "INSERT INTO `catagory` (`catagory_name`, `catagory_desc` ,`created_by`) VALUES ( '{$catagory_name}', '{$catagory_desc}', '{$catagory_created_by}');";
                    $result = mysqli_query($conn, $sql_query);
                    if ($result) {
                         echo "<script>window.location='index.php'</script>";
                         exit();


                    } else {
                         echo' <div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">Opps! Somthing went wrong : (</div>';
                    }

               }
          }
          ?>
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
               aria-hidden="true">
               <div class="modal-dialog">
                    <div class="modal-content">
                         <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">Create a new disk</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"
                                   aria-label="Close"></button>
                         </div>
                         <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
                              <div class="modal-body">
                                   <div class="mb-3">
                                        <div class="input-group mb-3">
                                             <span class="input-group-text" id="basic-addon1">@</span>
                                             <input type="text" class="form-control"
                                                  value="<?php echo $_SESSION['username']; ?>" aria-label="Username"
                                                  aria-describedby="basic-addon1" disabled>
                                        </div>

                                        <label for="exampleFormControlInput1" class="form-label">Disk name</label>
                                        <input type="text" class="form-control" name="catagory_name"
                                             id="exampleFormControlInput1" placeholder="Enter your disk name...">
                                   </div>
                                   <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">About</label>
                                        <textarea class="form-control" name="about" id="exampleFormControlTextarea1"
                                             rows="3" placeholder="Talking about..."></textarea>
                                   </div>

                              </div>
                              <div class="modal-footer">
                                   <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                   <button type="submit" name="submit" class="btn btn-dark">Create</button>
                              </div>
                         </form>
                    </div>
               </div>
          </div>
          <!-- Create New Disk -End -->
     </div>
     <!-- Action Section -End  -->

<div class="container d-flex px-3 py-3 row" style="margin:auto;">

<!-- Announcements -Start  -->
<?php 
     
     $sql_count = "SELECT COUNT(*) AS total_rows FROM announcement";
     $result = mysqli_query($conn, $sql_count);
     if ($result && mysqli_num_rows($result) > 0) {
         $row = mysqli_fetch_assoc($result);
     ?>
<h4>Announcements(<?php echo $row['total_rows']; ?>)</h4>
<?php } ?>
<?php 
$sql = "SELECT * FROM `announcement`";
$print = mysqli_query($conn, $sql);
if ($print) {
     if (mysqli_num_rows($print) > 0) {
          while ($anno = mysqli_fetch_assoc($print)) {
               ?>
               <!-- Disk Fetch -Start -->
             
                    <div class="card my-2 rounded-0">
                         <!-- Disk Card -Start -->

                         <div class="card-body">
                              <h5 class="card-title">
                              <a href="announcement-thread.php?announcement=<?php echo $anno['anno_id']; ?>" style="text-decoration:none; color:white;">
                                   <b style="font-weight:lighter;" class="text-danger"><i class="ri-hard-drive-fill"></i>
                                        <?php echo $anno['anno_name']; ?>
                                   </b>  </a><br>
                                   <b style="font-weight:lighter; font-size:12px;" class="text-dark"><i class="ri-calendar-2-line" style="font-size:12px;"></i>
                                        <?php echo $anno['anno_date']; ?>
                                   </b>
                              </h5>
                              <p class="card-text" style="font-size:12px;">
                                   <?php echo $anno['anno_desc']; ?>
                              </p>
                         </div>
                         <!-- Disk Card -End -->
                    </div>
               <!-- Disk Fetch -End -->
               <?php
          }
     } else {
          echo' <div class="alert alert-warning rounded-0" role="alert" style="font-size:15px;">No Disk Found : (</div>';
     }
} else {
     echo' <div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">Opps! Somthing went wrong : (</div>';
}

?>
</div>
<!-- Announcements -End  -->

     <!-- Middilbody -Start -->

     <div class="container d-flex px-3 py-3 row" style="margin:auto;" id="content">
     <?php 
     
     $sql_count = "SELECT COUNT(*) AS total_rows FROM catagory";
     $result = mysqli_query($conn, $sql_count);
     if ($result && mysqli_num_rows($result) > 0) {
         $row = mysqli_fetch_assoc($result);
     ?>
     <h4>Catagories(<?php echo $row['total_rows']; ?>)</h4>
     <?php } ?>
          <?php
          $sql = "SELECT * FROM `catagory` LIMIT 0,5";
          $print = mysqli_query($conn, $sql);
          if ($print) {
               if (mysqli_num_rows($print) > 0) {
                    while ($disk = mysqli_fetch_assoc($print)) {
                         ?>
<!-- Disk Fetch -Start -->                  
<div class="card my-2 rounded-0">
    <!-- Disk Card -Start -->
    <div class="card-body">
        <h5 class="card-title">
            <a href="disk.php?Disk=<?php echo $disk['catagory_id']; ?>" style="text-decoration:none; color:white;">
                <b style="font-weight:lighter;" class="text-danger"><i class="ri-hard-drive-fill"></i>
                    <?php echo $disk['catagory_name']; ?>
                </b>
            </a>
            <br>
            <b style="font-size:11px; font-weight:lighter;">
                <i class="ri-calendar-2-line" style="font-size:11px;"></i> <?php echo $disk['created']; ?>
            </b>
        </h5>
        <span class="card-text" style="font-size:12px;">
            <?php echo $disk['catagory_desc']; ?>
        </span><br>
    </div>
    <!-- Disk Card -End -->
</div>
<!-- Disk Fetch -End -->
                         <?php
                    }
               } else {
                    echo' <div class="alert alert-warning rounded-0" role="alert" style="font-size:15px;">No Disks Found : (</div>';

               }
          } else {
               echo' <div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">Opps! Somthing went wrong : (</div>';

          }
          ?>
     </div>
     <!-- Middlebody -End -->

     <!-- Load more btn -Start  -->
     <div class="text-center">
          <button type="button" class="btn btn-dark rounded-0" id="loadmore">Load more</button>
          <input type="hidden" id="startloading" value="0">
     </div>
     <!-- Load more btn -End -->

     <?php include "footer.php"; ?>
     </div>
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script>
          //Load more btn script
          $("#loadmore").click(function () {
               $start_loading = parseInt($("#startloading").val());
               $perpage = 5;
               $start_loading = $start_loading + $perpage;

               $.ajax({
                    url: 'loadmore_disks.php',
                    method: 'POST',
                    data: {
                         'starting': $start_loading,
                         'page': $perpage
                    },
                    success: function (response) {
                         $("#content").append(response);
                    }
               });
          });

     </script>
     <?php include "bootstrapjs.php"; ?>
</body>

</html>