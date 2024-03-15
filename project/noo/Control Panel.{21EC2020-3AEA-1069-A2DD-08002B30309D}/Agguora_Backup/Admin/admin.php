<?php 
session_start(); 
if(!isset($_SESSION['name'])){
echo 'Opps! atfirst you need to <a href="index.php">login</a> & proof that you are an admin.';
}else{ ?>
<?php 
ini_set('display_errors', 0);
include "../db_connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <?php include "../bootstrapcss-and-icons.php"; ?>
     <title>Welcome
          <?php echo $_SESSION["name"]; ?>
     </title>
</head>
<?php include "../fonts.php"; ?>

<body>
<?php include "admin-header.php"; ?>

<div class="container mt-5">
<h2 class="bg-dark text-white py-2 px-2"><i class="ri-account-box-line"></i> 
               <b style="font-size:1.5rem;"><?php echo $_SESSION["name"]; ?></b></h2>
          <h5><a href="logout.php">Logout</a></h5>
</div>
<section class="container mt-5">
    		    <div class="row">
			<div class="col-lg-3 col-xs-6">
				    <!-- small box -->
				    <div class="small-box bg-success px-3 py-3 text-light">
					<div class="inner">
                         <?php
                           $sql = "SELECT COUNT(*) AS total_user FROM user";
                           $result = mysqli_query($conn, $sql);
                          if($result && mysqli_num_rows($result) > 0){
                          $row = mysqli_fetch_assoc($result);
                          $total_user = $row['total_user'];?>
                         <h3><?php echo $total_user; ?></h3>
                        <?php  } ?>

					    <p>Total user</p>
					</div>
					<div class="icon">
					    <i class="ion ion-stats-bars"></i>
					</div>
					<a href="view-all-members.php" class="small-box-footer text-white">More info <i class="fa fa-arrow-circle-right"></i></a>
				    </div>
				</div>
    			<!-- ./col -->
    			<div class="col-lg-3 col-xs-6">
    			    <!-- small box -->
    			    <div class="small-box bg-warning py-3 px-3 text-light">
    				<div class="inner">
                         <?php 
                         $sql = "SELECT COUNT(*) AS total_disks FROM catagory";
                         $result = mysqli_query($conn, $sql);
                         if($result && mysqli_num_rows($result) > 0){
                         $disk = mysqli_fetch_assoc($result);
                         $total_disks = $disk['total_disks'];

                         $sql_query = "SELECT COUNT(*) AS total_threads FROM threads";
                         $result = mysqli_query($conn, $sql_query);
                         if($result && mysqli_num_rows($result) > 0){
                         $thread = mysqli_fetch_assoc($result);
                         $total_threads = $thread['total_threads'];

                         $sql_q = "SELECT COUNT(*) AS total_comments FROM comments";
                         $result = mysqli_query($conn, $sql_q);
                         if($result && mysqli_num_rows($result) > 0){
                         $comment = mysqli_fetch_assoc($result);
                         $total_comments = $comment['total_comments'];

                         $total = $total_disks + $total_threads + $total_comments;

                         
                         ?>
    				    <h3><?php echo $total; ?></h3>
                        <?php }}} ?>
    				    <p>Number of Activities</p>
    				</div>
    				<div class="icon">
    				    <i class="ion ion-person-add"></i>
    				</div>
    				<a href="admin.php" class="small-box-footer text-light">More info <i class="fa fa-arrow-circle-right"></i></a>
    			    </div>
    			</div>
                   <div class="col-lg-3 col-xs-6">
				    <div class="small-box bg-primary py-3 px-3 text-light">
					<div class="inner">
                              <?php 
                               $sql = "SELECT COUNT(*) AS total_reviews FROM review";
                               $result = mysqli_query($conn, $sql);
                               if($result && mysqli_num_rows($result) > 0){
                               $re = mysqli_fetch_assoc($result);
                               $total_reviews = $re['total_reviews'];
                              
                              ?>
					    <h3><?php echo $total_reviews; ?></h3>
                             <?php } ?>

					    <p>User reviews</p>
					</div>
					<div class="icon">
					    <i class="ion ion-pie-graph"></i>
					</div>
					<a href="checkreview.php" class="small-box-footer text-light">More info <i class="fa fa-arrow-circle-right"></i></a>
				    </div>
				</div>
                   

			    	<!-- <div class="col-lg-3 col-xs-6">
				    <div class="small-box bg-secondary py-3 px-3 text-light">
					<div class="inner">
					    <h3>0</h3>

					    <p>Chats Activities</p>
					</div>
					<div class="icon">
					    <i class="ion ion-pie-graph"></i>
					</div>
					<a href="centre-student-online-original-grade-card.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
				    </div>
				</div> -->
				    			<!-- ./col -->
    		    </div>
		<div class="row">
	
			</div> </div></div> 
</section>



     <div class=" bg-light py-5 px-5">
          <div class="row">
               <div>
                    <div class="card rounded-0">
                         <div class="card-body">

                              <a href="view-all-members.php" class="btn btn-danger rounded-0 w-100"><i class="ri-group-2-line" style="font-size:1.2rem;"></i> View all members</a>
                         </div>
                    </div>
               </div>
               <div>
                    <div class="card rounded-0">
                         <div class="card-body">
                              <a href="view-all-disks.php" class="btn btn-danger rounded-0 w-100"><i class="ri-hard-drive-line" style="font-size:1.2rem;"></i> View all disks</a>
                         </div>
                    </div>
               </div>
               <div>
                    <div class="card rounded-0">
                         <div class="card-body">
                              <a href="view-all-threads.php" class="btn btn-danger rounded-0 w-100"><i class="ri-threads-fill" style="font-size:1.2rem;"></i> View all threads</a>
                         </div>
                    </div>
               </div>
               <div>
                    <div class="card rounded-0">
                         <div class="card-body">
                              <a href="view-all-comments.php" class="btn btn-danger rounded-0 w-100"><i class="ri-question-answer-line" style="font-size:1.2rem;"></i> View all comments</a>
                         </div>
                    </div>
               </div>
               <div>
                    <div class="card rounded-0">
                         <div class="card-body">
                              <a href="announcement.php" class="btn btn-danger rounded-0 w-100"><i class="ri-mic-fill" style="font-size:1.2rem;"></i> Announcement</a>
                         </div>
                    </div>
               </div>
               <div>
                    <div class="card rounded-0">
                         <div class="card-body">
                              <a href="checkreview.php" class="btn btn-danger rounded-0 w-100"><i class="ri-bar-chart-grouped-fill" style="font-size:1.2rem;"></i> Check user review</a>
                         </div>
                    </div>
               </div>
          </div>

     </div>

     <?php include "../bootstrapjs.php"; ?>
</body>

</html>
<?php } ?>