<?php include "db_connection.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Table</title>
</head>
<style>
    body {
        margin: 0;
        padding: 0;
        background-color: whitesmoke;
        font-family: 'Courier New', Courier, monospace;
        font-weight: bolder;
    }

    .container {
        width: 600px;
        margin: 0 auto;

        padding-top: 10px;
    }

    h3 {
        font-family: 'Courier New', Courier, monospace;
        font-weight: bolder;
    }

    table {
        border: 2px solid black;
        border-collapse: collapse;
        width: 100%;
    }

    th {
        background-color: black;
        padding: 10px;
        color: white;
        border: 2px solid white
    }

    td {
        border: 2px solid white;
        background-color: gainsboro;
        color: black;
        padding: 10px;
        font-size: 1.2rem;
        font-family: 'Courier New', Courier, monospace;
        font-weight: bolder;
    }

    .pagination {
        display: flex;
        justify-content: center;
        margin-top: 10px;
    }

    .pagination .page-item {
        list-style-type: none;
        margin: 2px;
    }

    .pagination .page-item a {
        text-decoration: none;
    }
</style>

<body>
    <div class="container">
        <center>
            <h3>DATA TABLE</h3>
            <form method="post">
                Search your email <br>
                <input type="text" name="search" placeholder="Search.."
                    style="padding:5px; width:50%; margin-bottom:10px; background-color:whitesmoke; border-radius:5px; border:1px inset gray;">
                <input type="submit" name="submit" style="display:none;">
            </form>

            <?php
            // Search Data
            if (isset($_POST["submit"])) {
                $search = $_POST["search"];

                if (!empty($search)) {




                    $sqlQuery = "SELECT * FROM `create&read` WHERE email LIKE '%$search%'";
                    $run = mysqli_query($conn, $sqlQuery);

                    echo '<table>
                       
                            <th>Row ID.</th>
                            <th>Email</th>
                            <th>Password</th>
                        ';

                    if (!$run) {
                        echo "<tr><td colspan='3' style='color:red; text-align:center;'>Email not found !</td></tr>";
                    } else {
                        if (mysqli_num_rows($run) > 0) {
                            while ($row = mysqli_fetch_assoc($run)) {
                                echo '<tr>
                                    <td>' . $row['id'] . '</td>
                                    <td>' . $row['email'] . '</td>
                                    <td>' . $row['password'] . '</td>
                                  </tr>';
                            }
                        } else {
                            echo "<tr><td colspan='3' style='text-align:center;'>No results found.</td></tr>";
                        }
                    }

                    echo '
                    </table>';
                }
            }
            ?>

            <table>
                <thead>
                    <th>Row ID.</th>
                    <th>Email</th>
                    <th>Password</th>
                </thead>
                <tbody>
                    <?php
                    // Fetch data from the database
                    $sqlQuery = "SELECT * FROM `create&read`";
                    $result = mysqli_query($conn, $sqlQuery);

                    if ($result && mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>
                                <td>' . $row['id'] . '</td>
                                <td>' . $row['email'] . '</td>
                                <td>' . $row['password'] . '</td>
                              </tr>';
                        }
                    }
                    ?>
                </tbody>
            </table>

            <h3><a href="Index.php">BACK TO THE FORM</a></h3>

        </center>
    </div>

</body>

</html>