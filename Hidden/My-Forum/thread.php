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
<style>
     /*Like & Diskike CSS script*/
     button {
          cursor: pointer;
          outline: 0;
          color: #AAA;

     }

     .btn:focus {
          outline: none;
     }

     .green {
          color: green;
     }

     .red {
          color: red;
     }
</style>

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


                                        <a href="disk.php?Disk=" class="btn btn-dark">Go
                                             back</a><br><br>
                                        <?php echo $thread['thread_time']; ?>
                                   </div>

                                   <div class="card-footer text-body">



                                        <div class="container">
                                             <button class="btn" id="likeButton<?php echo $thread['thread_id']; ?>"
                                                  onclick="setLikeDislike('like', '<?php echo $thread['thread_id']; ?>')">
                                                  <i class="fa fa-thumbs-up fa-lg" aria-hidden="true"></i>
                                                  <span id="likeCount<?php echo $thread['thread_id']; ?>">
                                                       <?php echo $thread['like_count']; ?>
                                                  </span>
                                             </button>
                                             <button class="btn" id="dislikeButton<?php echo $thread['thread_id']; ?>"
                                                  onclick="setLikeDislike('dislike', '<?php echo $thread['thread_id']; ?>')">
                                                  <i class="fa fa-thumbs-down fa-lg" aria-hidden="true"></i>
                                                  <span id="dislikeCount<?php echo $thread['thread_id']; ?>">
                                                       <?php echo $thread['dislike_count']; ?>
                                                  </span>
                                             </button>
                                        </div>







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
                                                  <!--Reply button trigger modal -->
                                                  <button type="button" class="border-0 bg-light mx-2" data-bs-toggle="modal"
                                                       data-bs-target="#exampleModal">
                                                       <i class="ri-reply-fill" style="font-size:15px;"></i> Reply someone
                                                  </button>
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


                                                                      </a>
                                                                      <?php
                                                                      if (empty($thread['tag_someone'])) {

                                                                      } else {
                                                                           ?>
                                                                           <?php
                                                                           $sql = "SELECT * FROM `user` WHERE username = '{$thread['tag_someone']}'";
                                                                           if (mysqli_query($conn, $sql) && mysqli_num_rows(mysqli_query($conn, $sql))) {
                                                                                $tag_user = mysqli_fetch_assoc(mysqli_query($conn, $sql));
                                                                                ?>
                                                                                <i class="ri-arrow-right-double-line"></i>
                                                                                <a href="allprofile.php?user=<?php echo $tag_user['id'] ?>"
                                                                                     style="color:black; text-decoration:none;">
                                                                                     <?php
                                                                           }
                                                                           ?>
                                                                                @
                                                                                <?php echo $thread['tag_someone'] ?>
                                                                           </a>
                                                                           <?php
                                                                      }
                                                                      ?>
                                                                      <br> <b style="font-size:11px; font-weight:lighter;">at
                                                                           <?php echo $thread['comment_time']; ?>
                                                                      </b>
                                                                 </h6>

                                                                 <p style="font-size:12px;">
                                                                      <?php echo $thread['comment_content']; ?>
                                                                 </p>


                                                                 <!-- Reply action -Start  -->
                                                                 <?php
                                                                 $alert = false;
                                                                 $method = $_SERVER['REQUEST_METHOD'];
                                                                 if ($method == 'POST') {
                                                                      $thread_id = mysqli_real_escape_string($conn, $_GET['thread']);
                                                                      if (isset($_POST['reply_submit'])) {
                                                                           $reply_content = mysqli_real_escape_string($conn, $_POST['reply']);
                                                                           $tag_someone = mysqli_real_escape_string($conn, $_POST['tag']);
                                                                           if (!empty($reply_content)) {
                                                                                $username = $_SESSION['username'];
                                                                                $sql_query = "SELECT * FROM `user` WHERE username = '{$username}'";
                                                                                $user = mysqli_query($conn, $sql_query);
                                                                                if (mysqli_num_rows($user) > 0) {
                                                                                     $user_account = mysqli_fetch_assoc($user);
                                                                                     $reply_by = $user_account['id'];
                                                                                     $sql_insert_reply = "INSERT INTO `comments` (`comment_content`, `thread_id`, `comment_by`, `tag_someone`) VALUES ('{$reply_content}', '{$thread_id}', '{$reply_by}', '{$tag_someone}')";
                                                                                     $result = mysqli_query($conn, $sql_insert_reply);
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
                                                                 // Success alert section -Start
                                                                 if ($alert) {
                                                                      echo '<div id="alertMsg" class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your reply has been added successfully. Wait for community response.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
                                                                      ini_set('display_errors', 0);
                                                                      echo '<script>
            setTimeout(function() {
                document.getElementById("alertMsg").style.display = "none";
                window.location="thread.php?thread=' . $thread_id . '";
            }, 2000);
        </script>';
                                                                 }
                                                                 //Success alert section -End 
                                                                 ?>
                                                                 <!-- Reply section -End  -->



                                                                 <!-- Modal form -Start -->
                                                                 <form class="modal fade" id="exampleModal"
                                                                      action="<?php echo htmlentities($_SERVER['PHP_SELF'] . '?thread=' . $thread_id); ?>"
                                                                      tabindex="-1" aria-labelledby="exampleModalLabel" method="post" aria-hidden="true">
                                                                      <div class="modal-dialog">
                                                                           <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                     <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                                          <?php echo '@' . $_SESSION['username']; ?> <b
                                                                                               style="font-size:12px">(you)</b>
                                                                                     </h1>
                                                                                     <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                                          aria-label="Close"></button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                     <select class="form-select" name="tag" aria-label="Default select example">
                                                                                          <option selected>@Tag Someone</option>
                                                                                          <?php
                                                                                          $sql_query = "SELECT * FROM `user`";
                                                                                          $query = mysqli_query($conn, $sql_query);
                                                                                          if ($query && mysqli_num_rows($query)) {
                                                                                               while ($username = mysqli_fetch_assoc($query)) {
                                                                                                    ?>
                                                                                                    <option value="<?php echo $username['username']; ?>">
                                                                                                         <?php echo $username['username']; ?>
                                                                                                    </option>
                                                                                                    <?php
                                                                                               }

                                                                                          }
                                                                                          ?>
                                                                                     </select>
                                                                                </div>


                                                                                <div class="modal-body">
                                                                                     <div class="form-floating">
                                                                                          <textarea class="form-control" placeholder="Leave a reply here"
                                                                                               id="floatingTextarea" name="reply"></textarea>
                                                                                          <label for="floatingTextarea">Reply</label>
                                                                                     </div>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                     <button type="button" class="btn btn-secondary"
                                                                                          data-bs-dismiss="modal">Close</button>
                                                                                     <button type="submit" class="btn btn-primary" name="reply_submit">Reply</button>
                                                                                </div>
                                                                           </div>
                                                                      </div>
                                                                 </form>
                                                                 <!-- Modal form -End  -->

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
     <?php include "js/jQuery.js"; ?>
     <script>
          //Like & Disklike responce script
          //Css responce script
          // var btn1 = document.querySelector('#green');
          // var btn2 = document.querySelector('#red');

          // btn1.addEventListener('click', function () {

          //      if (btn2.classList.contains('red')) {
          //           btn2.classList.remove('red');
          //      }
          //      this.classList.toggle('green');

          // });

          // btn2.addEventListener('click', function () {

          //      if (btn1.classList.contains('green')) {
          //           btn1.classList.remove('green');
          //      }
          //      this.classList.toggle('red');

          // });

          //Ajax responce script
          function setLikeDislike(type, id) {
               jQuery.ajax({
                    url: 'setLikeDislike.php',
                    type: 'post',
                    data: 'type=' + type + '&thread_id=' + id,
                    success: function (result) {
                         /*
                         'operation' => $operation,
                         'like_count' => $row['like_count'],
                         'dislike_count' => $row['dislike_count']
                         */
                         result = jQuery.parseJSON(result);
                         if (result.operation == 'like') {
                              // Perform actions if the operation is 'like'
                              jQuery('#post' + id + ' #like').html(result.like_count);
                              jQuery('#post' + id + ' #dislike').html(result.dislike_count);
                         }
                         // Update the HTML elements with the updated like and dislike counts

                    }
               });
          }

          // function setLikeDislike(type, id) {
          //      jQuery.ajax({
          //           url: 'setLikeDislike.php',
          //           type: 'post',
          //           data: 'type=' + type + '&thread_id=' + id,
          //           success: function (result) {
          //                result = jQuery.parseJSON(result);
          //                // Update like count
          //                jQuery('#likeCount' + id).html(result.like_count);
          //                // Update dislike count
          //                jQuery('#dislikeCount' + id).html(result.dislike_count);
          //           }
          //      });
          // }




     </script>
</body>

</html>