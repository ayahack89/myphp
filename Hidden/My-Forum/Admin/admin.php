<?php session_start(); ?>
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

<body class="bg-dark">
<?php include "admin-header.php"; ?>

     <div class=" bg-light py-5 px-5">
          <h2 class="bg-dark text-white py-2 px-2"><i class="ri-account-box-line"></i> 
               <b style="font-size:1.5rem;"><?php echo $_SESSION["name"]; ?></b>
          </h2>
          <h5><a href="logout.php">Logout</a></h5>
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
                              <a href="announcement.php" class="btn btn-danger rounded-0 w-100"><i class="ri-question-answer-line" style="font-size:1.2rem;"></i>Announcement</a>
                         </div>
                    </div>
               </div>
          </div>

     </div>



     <?php include "../bootstrapjs.php"; ?>
</body>

</html>