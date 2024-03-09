<?php
session_start();
include_once "config.php";

// Sanitize and retrieve user input
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$c_password = mysqli_real_escape_string($conn, $_POST['c_password']);

// Check if all required fields are not empty
if (!empty($username) && !empty($password) && !empty($c_password)) {
    // Validate the username format (optional)
    if (preg_match("/^[a-zA-Z0-9]+$/", $username)) {
        // Check if the passwords match
        if ($password == $c_password) {
            // Generate a unique hashtag
            $hastag = '#' . rand(1000, 9999);
            // Concatenate the username and hashtag to create the full username
            $full_username = $username . $hastag;

            // Check if the username already exists in the database
            $sql_check_username = "SELECT * FROM users WHERE username = '$username'";
            $result_check_username = mysqli_query($conn, $sql_check_username);
            if (mysqli_num_rows($result_check_username) > 0) {
                $_SESSION['alertError'] = "This username already exists!";
                header("location: ../Auth/auth.php?auth=signup");
                exit(); // Stop script execution
            }

            // Hash the password
            $encrypt_pass = md5($password);

            // Insert user data into the database
            $ran_id = rand(time(), 100000000);
            $status = "Active now";
            $insert_query = "INSERT INTO users (unique_id, username, hastag, full_username, password, status)
                             VALUES ('$ran_id', '$username', '$hastag', '$full_username', '$encrypt_pass', '$status')";
            if (mysqli_query($conn, $insert_query)) {
                // Retrieve user data after successful insertion
                $sql_get_user = "SELECT * FROM users WHERE username = '$username'";
                $result_get_user = mysqli_query($conn, $sql_get_user);
                if ($row = mysqli_fetch_assoc($result_get_user)) {
                    $_SESSION['unique_id'] = $row['unique_id'];
                    $_SESSION['alertSuccess'] = "You have signed up successfully!";
                    header("location: ../users.php");
                    exit(); // Stop script execution
                } else {
                    $_SESSION['alertError'] = "Failed to fetch user data!";
                }
            } else {
                $_SESSION['alertError'] = "Failed to register user. Please try again!";
            }
        } else {
            $_SESSION['alertError'] = "Password and Confirm Password do not match!";
        }
    } else {
        $_SESSION['alertError'] = "Invalid username format!";
    }
} else {
    $_SESSION['alertError'] = "All input fields are required!";
}

// Redirect back to the signup page with error message
header("location: ../Auth/auth.php?auth=signup");
?>
