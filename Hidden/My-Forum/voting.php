<?php
include 'db_connection.php'; // Assuming this file contains the database connection code
header('Content-Type: application/json');

if (
     isset($_POST['type']) && $_POST['type'] != '' &&
     isset($_POST['thread_id']) && $_POST['thread_id'] > 0
) {
     $type = mysqli_real_escape_string($conn, $_POST['type']);
     $id = mysqli_real_escape_string($conn, $_POST['thread_id']);

     if ($type == 'vote') {
          if (!isset($_COOKIE['vote_' . $id])) {
               setcookie('vote_' . $id, "yes", time() + 60 * 60 * 24 * 365 * 2);
               $sql = "UPDATE `threads` SET vote_count=vote_count+1 WHERE thread_id='{$id}'";
               $operation = "vote";
          } else {
               // User has already voted, so remove the vote
               setcookie('vote_' . $id, "", time() - 3600); // Set expiry time in the past to delete the cookie
               $sql = "UPDATE `threads` SET vote_count=vote_count-1 WHERE thread_id='{$id}'";
               $operation = "unvote";
          }

          mysqli_query($conn, $sql);
          $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `threads` WHERE thread_id='{$id}'"));
          echo json_encode([
               'operation' => $operation,
               'vote_count' => $row['vote_count']
          ]);
     }
}
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>