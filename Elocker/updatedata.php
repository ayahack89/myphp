<?php
session_start();
include "db_config.php";


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Edit password</title>
</head>

<body style="background-color:gainsboro;">
    <?php


    $update = isset($_GET['id']) ? $_GET['id'] : 'Sorry! unable to update!';
    $email = isset($_GET['email']) ? $_GET['email'] : 'A problem occurred in your email';
    $links = isset($_GET['links']) ? $_GET['links'] : 'A problem occurred in your links';
    $password = !empty($_POST['password']) ? mysqli_real_escape_string($conn, $_POST['password']) : '';
    $note = isset($_GET['note']) ? $_GET['note'] : 'A problem occurred in your note';

    if (isset($_POST['submit'])) {
        // Assuming you have a valid database connection stored in $conn
        // Add error checking for the connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Use mysqli_real_escape_string to sanitize input
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $links = mysqli_real_escape_string($conn, $_POST['links']);
        $password = mysqli_real_escape_string($conn, $_POST['password']); // Corrected variable name
        $note = mysqli_real_escape_string($conn, $_POST['note']);

        // Print or log the SQL query
        $query = "UPDATE `storage` SET email = '$email', links = '$links', password = '$password', note = '$note' WHERE password = '$password'";
        echo "Query: " . $query;

        // Execute the query and check for errors
        $result = mysqli_query($conn, $query);

        if ($result) {
            header("Location: managepassword.php");
            mysqli_close($conn);
            exit;
        } else {
            echo "Update failed: " . mysqli_error($conn);
        }
    }
    ?>



    <form class="container mt-5 border rounded p-3 shadow-sm bg-light"
        action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="Post" style="width:500px;">

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">User Name:</span>
            </div>
            <input class="form-control" type="text" placeholder="Disabled input" aria-label="Disabled input example"
                value="<?php echo $_SESSION['username']; ?>" disabled>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-append">
                <span class="input-group-text" id="basic-addon2">Email:</span>
            </div>
            <input type="text" name="email" class="form-control" value="<?php echo $_GET['email']; ?>"
                aria-label="Recipient's username" aria-describedby="basic-addon2">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon3">Sites Link:</span>
            </div>
            <input type="text" name="links" class="form-control" id="basic-url" aria-describedby="basic-addon3"
                value="<?php echo $_GET['links']; ?>"> <!-- Corrected variable name -->
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon3">Password:</span>
            </div>
            <input type="password" name="password" class="form-control" id="basic-url" aria-describedby="basic-addon3"
                value="<?php echo $_GET['password']; ?>">

        </div>




        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text p-4">Note:</span>
            </div>
            <textarea class="form-control" aria-label="textarea"
                name="note"><?php echo htmlentities($_GET['note']); ?></textarea>
        </div>

        <div class="">
            <button class="btn btn-primary p-2 mt-2" type="submit" name="submit" style="font-size:1rem;">Update
                Data</button>
        </div>
    </form>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</html>