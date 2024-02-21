<?php
include "db_connection.php";
?>

<?php
if (isset($_GET['vote_transfer'])) {
     $thread_id = mysqli_real_escape_string($conn, $_GET['vote_transfer']);

     $sql_query = "SELECT * FROM `threads` WHERE thread_id = '{$thread_id}' ";
     $result = mysqli_query($conn, $sql_query);
     if ($result) {
          if (mysqli_num_rows($result) > 0) {
               $thread = mysqli_fetch_assoc($result);
               ?>

               <button class="btn" id="VoteButton<?php echo $thread['thread_id']; ?>"
                    onclick="setLikeDislike('vote', '<?php echo $thread['thread_id']; ?>')">
                    <i class="ri-arrow-up-circle-fill"></i>
                    <span id="VoteCount<?php echo $thread['thread_id']; ?>">
                         <?php echo $thread['vote_count']; ?>
                    </span>
               </button>

               <?php
          }
     }
}
?>