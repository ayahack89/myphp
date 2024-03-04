<?php
include "db_connection.php";

header('Content-Type: application/json');

if (
    isset($_POST['type']) && $_POST['type'] != '' &&
    isset($_POST['catagory_id']) && $_POST['catagory_id'] > 0
) {
    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $id = mysqli_real_escape_string($conn, $_POST['catagory_id']); // Corrected the variable name

    if ($type == 'like') {
        if (!isset($_COOKIE['like_' . $id])) {
            setcookie('like_' . $id, "yes", time() + 60 * 60 * 24 * 365 * 2);
            $sql = "UPDATE `catagory` SET count=count+1 WHERE catagory_id='{$id}'";
            $operation = "like";
        }

        // Check if $sql is defined and execute the query
        if (isset($sql) && !empty($sql)) {
            if (mysqli_query($conn, $sql)) {
                $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT count FROM `catagory` WHERE catagory_id='{$id}'"));
                echo json_encode([
                    'operation' => $operation,
                    'count' => $row['count']
                ]);
            } else {
                // Log detailed error message if SQL query fails
                echo json_encode([
                    'error' => 'Failed to execute SQL query: ' . mysqli_error($conn)
                ]);
            }
        } else {
            // Handle case when $sql is not defined
            echo json_encode([
                'error' => 'SQL query is not defined'
            ]);
        }
    }
}

?>
