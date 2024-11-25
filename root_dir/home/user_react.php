<?php
session_start();
include 'db_connection.php';

$user_id = $_SESSION['id']; 
$thread_id = $_POST['thread_id'];

if(isset($user_id) && isset($thread_id)) {
    function toggleLike($user_id, $thread_id, $conn) {
        // Check if user has already liked the post
        $check_like_sql = "SELECT * FROM user_react WHERE user_id = {$user_id} AND thread_id = {$thread_id}";
        $check_like_result = mysqli_query($conn, $check_like_sql);

        if(mysqli_num_rows($check_like_result) > 0) {
            // If user has already liked, unlike the post (remove like)
            $remove_like_sql = "DELETE FROM user_react WHERE user_id = {$user_id} AND thread_id = {$thread_id}";
            mysqli_query($conn, $remove_like_sql);
        } else {
            // If user hasn't liked, add a like
            $add_like_sql = "INSERT INTO user_react (user_id, thread_id) VALUES ('{$user_id}', '{$thread_id}')";
            mysqli_query($conn, $add_like_sql);
        }
    }

    // Function to check if the user has liked the post
    function hasUserLikedPost($user_id, $thread_id, $conn) {
        $sql = "SELECT * FROM user_react WHERE user_id = {$user_id} AND thread_id = {$thread_id}";
        $result = mysqli_query($conn, $sql);
        return mysqli_num_rows($result) > 0;
    }
    toggleLike($user_id, $thread_id, $conn);
    
    // Fetch Updated Like Count
    $like_count_sql = "SELECT COUNT(*) as total_likes FROM user_react WHERE thread_id = {$thread_id}";
    $like_count_result = mysqli_query($conn, $like_count_sql);
    $like_count = mysqli_fetch_assoc($like_count_result)['total_likes'];
    $liked = hasUserLikedPost($user_id, $thread_id, $conn);
    echo json_encode(['liked' => $liked, 'like_count' => $like_count]);
}
?>
