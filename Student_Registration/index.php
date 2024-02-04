<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Database</title>
</head>
<style>
    body {
        font-family: Arial;

    }

    form {
        width: 500px;
        margin: 0 auto;
        padding: 10px;
    }

    input[type="submit"] {
        margin-top: 10px;
        cursor: pointer;
    }
</style>

<body>


    <?php
    //Server details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "student_db";

    //Connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        echo "Server not connected!";
        die("Error : (" . mysqli_error($conn));
    }

    //button condition
    if (isset($_POST['submit'])) {
        //user input
        $stdname = $_POST['name'];
        $stdemail = $_POST['email'];
        $stdphone = $_POST['phone'];

        if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['phone'])) {
            $sqlquery = "INSERT INTO `studentd` (`stdname`, `stdemail`, `stdphonenum`) VALUES ('$stdname', '$stdemail', '$stdphone');";
            //Run sql query
            $run = mysqli_query($conn, $sqlquery);
            if ($run) {
                header("Location: record.php");
                mysqli_close($conn);
            } else {
                echo "<h2>Somthing went wront : (";
                die("Error" . mysqli_error($conn));
            }
        }


    }


    ?>

    <form action="" method="post">
        <h2>Students Registration</h2>
        <label for="name">Student Name: <br></label>
        <input type="text" name="name" required>
        <br>
        <label for="email">Email: <br></label>
        <input type="text" name="email" required>
        <br>
        <label for="phone">Phone Number: <br></label>
        <input type="text" name="phone" required>
        <br>
        <input type="submit" value="Upload" name="submit">
        <p>Click here to check the <a href="record.php">records</a></p>
    </form>


</body>

</html>