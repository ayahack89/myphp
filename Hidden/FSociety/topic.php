<?php
include "db_connection.php";
session_start();

if (isset($_GET['id'])) {
     $get_id = $_GET['id'];

     $sql_topic = "SELECT * FROM `topics` WHERE topic_id = '{$get_id}'";
     $result_topic = mysqli_query($conn, $sql_topic);

     if ($result_topic && mysqli_num_rows($result_topic) > 0) {
          $topic = mysqli_fetch_assoc($result_topic);

          $topic_creator_username = $topic['topic_creator'];
          $sql_user = "SELECT * FROM `user` WHERE username = '{$topic_creator_username}'";
          $result_user = mysqli_query($conn, $sql_user);

          if ($result_user && mysqli_num_rows($result_user) > 0) {
               $user_profile = mysqli_fetch_assoc($result_user);
               ?>

               <div>
                    <h2>
                         <?php echo $topic['topic_name']; ?>
                    </h2>
                    <p>
                         <?php echo $topic['topic_content']; ?>
                    </p>
                    <p>Created by: <a href="allprofile.php?user=<?php echo $user_profile['id'];
                    ?>">
                              <?php echo $topic_creator_username; ?>
                         </a></p>
                    <p>Views:
                         <?php echo $topic['views']; ?>
                    </p>
                    <p>Date:
                         <?php echo $topic['date']; ?>
                    </p>
               </div>

               <?php
          } else {
               echo "Profile not found : ( ->(Please Create your account!)";
          }
     } else {
          echo "No Topics Found !";
     }
} else {
     echo "Id Not Found :(";
}
?>