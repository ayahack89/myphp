<?php
include "db_connection.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Post</title>
</head>

<body>
     <div class="form">
          <?php
          if (isset($_POST['submit'])) {
               $topic_name = mysqli_real_escape_string($conn, $_POST['topicname']);
               $topic_content = mysqli_real_escape_string($conn, $_POST['content']);
               $topic_creator = $_SESSION['username'];
               $date = date("y-m-d");
               if (!empty($topic_name) && !empty($topic_content)) {
                    if (strlen($topic_content) >= 10 && strlen($topic_content) <= 70) {

                         $sqli_query = "INSERT INTO `topics` (`topic_name`, `topic_content`, `topic_creator`, `date`) VALUES ( '{$topic_name}', '{$topic_content}', '{$topic_creator}', '{$date}');";
                         $result = mysqli_query($conn, $sqli_query);
                         if ($result) {
                              header("Location: index.php");
                              exit();


                         } else {
                              echo "Opps! Somthing went wrong : (";
                         }

                    } else {
                         echo "Topic name must be between 10 and 70 chatecter longer.";
                    }
               }
          }

          ?>
          <form action="" method="post">
               <label for="topic_name">
                    Topic Name: <br>
                    <input type="text" name="topicname" id="topicname">
               </label><br>
               <label for="content">
                    Content: <br>
                    <textarea name="content" id="content" cols="30" rows="10"></textarea>
               </label>
               <br>
               <input type="submit" name="submit" value="Post">


          </form>
     </div>

</body>

</html>