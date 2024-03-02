<?php
include "db_connection.php";
// Simulated database
$likes = 0;

// Check if action is set
if(isset($_POST['action']) && $_POST['action'] == 'like') {
    // Update likes count
    $likes++;

    // Simulate saving likes count to the database
    // In a real scenario, you'd use SQL queries to update the database
}

// Prepare response
$response = array(
    'status' => 'success',
    'message' => 'Liked successfully!',
    'likes' => $likes
);

// Send JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
