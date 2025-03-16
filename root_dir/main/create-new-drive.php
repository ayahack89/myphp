<?php
session_start();
if (!isset($_SESSION['username'])) {
    echo 'Oops! first you need to <a href="login.php">login</a> & proof that you are a true member.';
} else {
    ?>
    <?php
    include "../db/db_connection.php";
    ini_set('display_errors', 0);
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="" />
        <?php include "../include/bootstrapcss-and-icons.php"; ?>

        <link rel="icon" type="image/x-icon" href="img/background/">
        <title>Create-new-drive.php</title>
    
    </head>
    <?php include "../include/fonts.php"; ?>
    <style>
        .from-box {
            width: 30vw;
            margin: auto;
        }
    </style>

    <body>
        <!--Create new drives -Start -->
        <div class="container mt-5">
            <div class="col-md-6 mx-auto">
                <div class="text-center mb-4">
                    <h2>Create a New Drive</h2>
                    <p>Your drive should be clean that reflect your community purpose</p>
                </div>
                <?php

                if (isset($_POST['submit'])) {
                    $drivename = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['drive_name']));
                    $drivedescription = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['drive_description']));
                    $created_by = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['userid']));
                    // $genre = htmlspecialchars(mysqli_real_escape_string($conn, strtolower(str_replace(' ', '', $_POST['drive_genre']))));

                    if (!empty($drivename) && !empty($drivedescription)) {
                        $sql_query = "INSERT INTO `catagory` (catagory_name, catagory_desc, created_by) 
                VALUES ('{$drivename}', '{$drivedescription}', '{$created_by}')";

                        $result_q = mysqli_query($conn, $sql_query);

                        if ($result_q) {
                            echo '<div class="alert alert-success" role="alert">New drive created successfully!</div>';
                            echo "<script>setTimeout(function() { window.location.href='drives.php'; }, 2000);</script>"; // Redirect to drives.php after 2 seconds
                        } else {
                            echo '<div class="alert alert-danger" role="alert">Problem creating drive: ' . mysqli_error($conn) . '</div>';
                        }
                    } else {
                        echo '<div class="alert alert-warning" role="alert">Please fill out all fields.</div>';
                    }
                }
                ?>

                <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post"
                    class="bg-light p-4 border rounded shadow-sm">
                    <?php
                    $username = $_SESSION['username'];
                    $sql = "SELECT * FROM `user` WHERE username = '{$username}' ";
                    $result = mysqli_query($conn, $sql);
                    if ($result && mysqli_num_rows($result) > 0) {
                        while ($rows = mysqli_fetch_assoc($result)) {

                            ?>
                            <input type="hidden" name="userid" value="<?php echo $rows['id']; ?>">
                            <?php
                        }
                    }
                    ?>

                    <div class="form-group">
                        <label for="driveName">Drive Name</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text rounded-0"><i class="ri-box-1-fill"></i></span>
                            </div>
                            <input type="text" class="form-control rounded-0" id="driveName" name="drive_name"
                                placeholder="Drive name" aria-label="Drive name" required>
                        </div>
                        <br>
                        <label for="unique-drive-genre">Genre (g/)</label>
                        <!-- <div class="mb-2">
                            <input type="text" class="form-control rounded-0" id="driveGenre" name="drive_genre"
                                placeholder="e.g. meme, tech, qna, art etc..." aria-label="Drive genre" required>
                            <span style="font-size:12px; color:grey;">Provide a unique genre to identify your drive (e.g.,
                                meme, qna, art, etc.).</span>
                        </div> -->
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control rounded-0" id="description" name="drive_description" rows="3"
                            placeholder="Enter a brief description" required></textarea>
                    </div><br>
                    <button type="submit" class="btn btn-dark btn-block rounded" name="submit">Create New Drive +</button>
                </form>
            </div>
        </div>
        <!--Create new drives -End-->

        <script>
            // function sanitizeInput(input) {
            //     return input.replace(/[^a-zA-Z0-9]/g, '');
            // }

            // document.getElementById('driveGenre').addEventListener('input', function () {
            //     this.value = sanitizeInput(this.value);
            // });

        </script>

    </body>

    </html>
<?php } ?>