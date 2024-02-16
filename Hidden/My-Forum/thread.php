<?php
include "db_connection.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <?php include "bootstrapcss-and-icons.php"; ?>
     <title>Document</title>
</head>
<?php include "fonts.php"; ?>

<body>
     <?php include "header.php"; ?>
     <!-- Thread view section -Start -->
     <?php
     if (isset($_GET['thread'])) {
          $thread_id = mysqli_real_escape_string($conn, $_GET['thread']);
          $sql_query = "SELECT * FROM `threads` WHERE thread_id = '{$thread_id}'";
          $result = mysqli_query($conn, $sql_query);
          if ($result) {
               if (mysqli_num_rows($result) > 0) {
                    while ($thread = mysqli_fetch_assoc($result)) {
                         ?>
                         <div class="container">
                              <div class="card text-center">
                                   <div class="card-header">
                                        Thread No.
                                        <?php echo $thread['thread_id']; ?>
                                        <h6 style="font-size:11px;">Posted by
                                             <?php echo $thread['thread_created_by']; ?>
                                        </h6>
                                   </div>
                                   <div class="card-body">
                                        <h3 class="card-title">
                                             <?php echo $thread['thread_name']; ?>
                                        </h3>
                                        <p class="card-text px-5">
                                             <?php echo $thread['thread_desc']; ?>

                                        </p>
                                        <div class="container">
                                             <?php
                                             if (empty($thread['uploaded_image'])) {

                                             } else {
                                                  ?>
                                                  <img src="img/upload/<?php echo $thread['uploaded_image']; ?>"
                                                       class="figure-img img-fluid rounded" alt="..." width="300px" height="300px">

                                                  <?php

                                             }
                                             ?>

                                        </div>


                                        <a href="disk.php?Disk=<?php echo $thread['thread_catagory_id']; ?>" class="btn btn-dark">Go
                                             back</a>
                                   </div>
                                   <div class="card-footer text-body">
                                        <?php echo $thread['thread_time']; ?>
                                   </div>
                              </div>
                              <!-- Thread view section -End  -->


                              <!-- Post a comment section -start -->
                              <div class="container py-3">
                                   <?php
                                   $alert = false;
                                   $method = $_SERVER['REQUEST_METHOD'];
                                   if ($method == 'POST') {
                                        $thread_id = mysqli_real_escape_string($conn, $_GET['thread']);
                                        if (isset($_POST['submit'])) {
                                             $comments = mysqli_real_escape_string($conn, $_POST['comment']);
                                             if (!empty($comments)) {
                                                  $username = $_SESSION['username'];
                                                  $sqlquery = "SELECT * FROM `user` WHERE username = '{$username}'";
                                                  $user = mysqli_query($conn, $sqlquery);
                                                  if (mysqli_num_rows($user) > 0) {
                                                       $user_account = mysqli_fetch_assoc($user);
                                                       $comment_by = $user_account['id'];
                                                       $sql_query = "INSERT INTO `comments` (`comment_content`, `thread_id`, `comment_by`) VALUES ('{$comments}', '{$thread_id}', '{$comment_by}')";
                                                       $result = mysqli_query($conn, $sql_query);
                                                       if ($result) {
                                                            $alert = true;
                                                       } else {
                                                            echo "Oops! Something went wrong :(";
                                                       }
                                                  } else {
                                                       echo "User not found!";
                                                  }
                                             } else {
                                                  echo "Please add a comment!";
                                             }
                                        }
                                   }
                                   // Success alert section  -Start
                                   if ($alert) {
                                        echo '<div id="alertMsg" class="alert alert-success alert-dismissible fade show" role="alert">
                                      <strong>Success!</strong> Your comment has been added successfully. Wait for community response.
                                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                  </div>';
                                        echo '<script>
                                      setTimeout(function() {
                                          document.getElementById("alertMsg").style.display = "none";
                                          window.location="thread.php?thread=' . $thread_id . '";
                                      }, 2000);
                                  </script>';
                                   }
                                   // Success alert section -End 
               
                                   ?>

                                   <?php if (isset($_SESSION['username'])) {
                                        ?>
                                        <form action="<?php echo htmlentities($_SERVER['REQUEST_URI']); ?>" method="post">
                                             <div class="form-floating">
                                                  <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                                                       style="height: 100px" name="comment"></textarea>
                                                  <label for="floatingTextarea2">Type your comments</label>
                                             </div><br>
                                             <div class="mb-3">
                                                  <button type="submit" name="submit" class="btn btn-dark">Post comments</button>
                                             </div>
                                        </form>
                                        <!-- Post a comment section -end  -->
                                        <?php
                                   } else {
                                        ?>
                                        <!-- If you are not logged in -start  -->
                                        <div class="alert alert-danger d-flex align-items-center" role="alert">

                                             <use xlink:href="#exclamation-triangle-fill" />
                                             </svg>
                                             <div>
                                                  <i class="ri-alert-fill"></i> You are not logged In! Please <a href="login.php"
                                                       style="color:maroon;">logIn</a> to start
                                                  discussion.
                                             </div>
                                        </div>
                                        <!-- If you are not logged in -End  -->
                                        <?php
                                   }
                                   ?>

                              </div>





                              <!-- Comments section -Start  -->
                              <div class="container my-3">
                                   <h3>Comments
                                   </h3>
                              </div>
                              <?php
                              $thread_id = mysqli_real_escape_string($conn, $_GET['thread']);
                              $sql_query = "SELECT * FROM `comments` WHERE thread_id = '{$thread_id}'";
                              $result = mysqli_query($conn, $sql_query);
                              if ($result) {

                                   if (mysqli_num_rows($result) > 0) {
                                        $check_result = false;
                                        while ($thread = mysqli_fetch_assoc($result)) {
                                             $comment_id = $thread['comment_id'];
                                             $comment_content = $thread['comment_content'];
                                             $comment_by = $thread['comment_by'];
                                             $comment_time = $thread['comment_time'];
                                             $sql = "SELECT * FROM `user` WHERE id = '{$comment_by}'";
                                             $run = mysqli_query($conn, $sql);
                                             if ($run) {
                                                  if (mysqli_num_rows($run) > 0) {
                                                       $user = mysqli_fetch_assoc($run);
                                                       ?>
                                                       <!-- <div class="container d-flex bg-light border py-4 px-4">
                                                       <div class="px-3">
                                                            <img src="img/images/default.png" alt="" width="50px" height="50px">
                                                       </div>
                                                     
                                                  </div> -->
                                                       <div class="container d-flex bg-light border py-4 px-4">
                                                            <div class="px-3">
                                                                 <?php
                                                                 if (isset($_SESSION['username'])) {
                                                                      ?>
                                                                      <a href="allprofile.php?user=<?php echo $user['id']; ?>"><img
                                                                                src="img/images/<?php echo $user['profile_pic']; ?>" alt="" width="50px"
                                                                                height="50px"></a>
                                                                      <h6 style="font-size:12px;">

                                                                      </h6>
                                                                      <?php
                                                                 } else {
                                                                      echo '<img src="img/images/default.png" alt="" width="50px" height="50px">';
                                                                 }
                                                                 ?>
                                                            </div>
                                                            <div class="text">
                                                                 <h6 style="font-weight:bolder;">@
                                                                      <a href="allprofile.php?user=<?php echo $user['id']; ?>"
                                                                           style="color:black; text-decoration:none;">
                                                                           <?php echo $user['username']; ?>
                                                                      </a><br> <b style="font-size:11px; font-weight:lighter;">at
                                                                           <?php echo $thread['comment_time']; ?>
                                                                      </b>
                                                                 </h6>

                                                                 <p style="font-size:12px;">
                                                                      <?php echo $thread['comment_content']; ?>
                                                                 </p>
                                                                 <!-- Button trigger modal -->
                                                                 <button type="button" class="btn btn-sm btn-dark" data-bs-toggle="modal"
                                                                      data-bs-target="#exampleModal" style="font-size:10px;">
                                                                      <i class="ri-reply-fill" style="font-size:10px;"></i> Reply
                                                                 </button>

                                                                 <?php
                                                                 $alert = false;
                                                                 $method = $_SERVER['REQUEST_METHOD'];
                                                                 if ($method == 'POST') {
                                                                      $thread_id = mysqli_real_escape_string($conn, $_GET['thread']);
                                                                      if (isset($_POST['reply_submit'])) {
                                                                           $sql_query = "SELECT * FROM `comments`";
                                                                           $result = mysqli_query($conn, $sql_query);
                                                                           if (mysqli_num_rows($result) > 0) {
                                                                                $comment = mysqli_fetch_assoc($result);
                                                                                $parent_comment_id = $comment['comment_id'];
                                                                                $reply = mysqli_real_escape_string($conn, $_POST['reply']);
                                                                                if (!empty($reply)) {
                                                                                     $username = $_SESSION['username'];
                                                                                     $sqlquery = "SELECT * FROM `user` WHERE username = '{$username}'";
                                                                                     $user = mysqli_query($conn, $sqlquery);
                                                                                     if (mysqli_num_rows($user) > 0) {
                                                                                          $user_account = mysqli_fetch_assoc($user);
                                                                                          $reply_by = $user_account['id'];
                                                                                          $sql_query = "INSERT INTO `replies` (`reply_content`, `thread_id`, `comment_id`, `reply_by`) VALUES ('{$reply}', '{$thread_id}', '{$parent_comment_id}', '{$reply_by}')";
                                                                                          $result = mysqli_query($conn, $sql_query);
                                                                                          if ($result) {
                                                                                               $alert = true;
                                                                                          } else {
                                                                                               echo "Oops! Something went wrong :(";
                                                                                          }
                                                                                     } else {
                                                                                          echo "User not found!";
                                                                                     }
                                                                                } else {
                                                                                     echo "Please add a reply!";
                                                                                }
                                                                           }
                                                                      }
                                                                 }
                                                                 // Success alert section - Start
                                                                 if ($alert) {
                                                                      echo '<div id="alertMsg" class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your reply has been added successfully. Wait for community response.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
                                                                      echo '<script>
        setTimeout(function() {
            document.getElementById("alertMsg").style.display = "none";
            window.location="thread.php?thread=' . $thread_id . '";
        }, 2000);
    </script>';
                                                                 }
                                                                 // Success alert section - End 
                                                                 ?>

                                                                 <!-- Modal -->
                                                                 <form class="modal fade" id="exampleModal"
                                                                      action="<?php echo htmlentities($_SERVER['PHP_SELF'] . '?thread=' . $thread_id); ?>"
                                                                      tabindex="-1" aria-labelledby="exampleModalLabel" method="post" aria-hidden="true">
                                                                      <div class="modal-dialog">
                                                                           <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                     <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                                                     <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                                          aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                     <div class="form-floating">
                                                                                          <textarea class="form-control" placeholder="Leave a comment here"
                                                                                               id="floatingTextarea" name="reply"></textarea>
                                                                                          <label for="floatingTextarea">Comments</label>
                                                                                     </div>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                     <button type="button" class="btn btn-secondary"
                                                                                          data-bs-dismiss="modal">Close</button>
                                                                                     <!-- Change type to submit -->
                                                                                     <button type="submit" class="btn btn-primary" name="reply_submit">Reply</button>
                                                                                </div>
                                                                           </div>
                                                                      </div>
                                                                 </form>
                                                                 <br><br>


                                                            </div>
                                                       </div>
                                                  </div>
                                                  </div>


                                                  <?php
                                                  } else {
                                                       echo "Invalid user!";
                                                  }
                                             }
                                             $check_result = true;
                                        }

                                        if (!$check_result) {

                                        }
                                   } else {
                                        ?>
                                   <div class="container px-4">
                                        <h2>No Comments Found : (</h2>
                                        <p style="font-size:12px;">Be the first person to add a comment....</p>
                                   </div>

                                   <?php
                                   }



                              } else {
                                   echo "Somthing Went Wrong : (";
                              }
                              ?>
                         </div>
                         <?php

                    }
               } else {
                    echo "Invalid Thread ID";
               }


          } else {
               echo "Somthing Went Wrong : (";
          }
     } else {
          echo "Invalid User ID";
     }
     ?>

     <!-- Comments section -End  -->

     <?php include "footer.php"; ?>
     <?php include "bootstrapjs.php"; ?>
</body>

</html>