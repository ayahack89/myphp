<?php
include "db_connection.php";
session_start();
?>

<?php
$row = mysqli_query($conn, "SELECT * FROM `threads`");
if (
     isset($_POST['type']) && $_POST['type'] != '' &&
     isset($_POST['thread_id']) && $_POST['thread_id'] > 0
) {
     $type = mysqli_real_escape_string($conn, $_POST['type']);
     $id = mysqli_real_escape_string($conn, $_POST['thread_id']);

     if ($type == 'like') {
          if (!isset($_COOKIE['like_' . $id])) {
               setcookie('like_' . $id, "yes", time() + 60 * 60 * 24 * 365 * 2);
               $sql = "UPDATE `threads` SET like_count=like_count+1 WHERE thread_id='{$id}'";
               $operation = "unlike";
          } else {
               // User has already liked, so remove the like
               setcookie('like_' . $id, "", time() - 3600); // Set expiry time in the past to delete the cookie
               $sql = "UPDATE `threads` SET like_count=like_count-1 WHERE thread_id='{$id}'";
               $operation = "like";
          }


     }

     if ($type == 'dislike') {
          if (!isset($_COOKIE['dislike_' . $id])) {
               setcookie('dislike_' . $id, "yes", time() + 60 * 60 * 24 * 365 * 2);
               $sql = "UPDATE `threads` SET dislike_count=dislike_count+1 WHERE thread_id='{$id}'";
               $operation = "undislike";
          } else {
               // User has already disliked, so remove the dislike
               setcookie('dislike_' . $id, "", time() - 3600); // Set expiry time in the past to delete the cookie
               $sql = "UPDATE `threads` SET dislike_count=dislike_count-1 WHERE thread_id='{$id}'";
               $operation = "dislike";
          }

     }


     mysqli_query($conn, $sql);
     $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `threads` WHERE thread_id='{$id}' "));
     echo json_encode([
          'operation' => $operation,
          'like_count' => $row['like_count'],
          'dislike_count' => $row['dislike_count']
     ]);


}
?>



<?php include "js/jQuery.js"; ?>