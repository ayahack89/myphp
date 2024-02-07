<?php
session_start();

include "../db_connection.php";

$itemsPerPage = 5;

// Fetch total count of records
$sqlTotalRecords = "SELECT COUNT(*) as total FROM `addtopics`";
$resultTotalRecords = mysqli_query($conn, $sqlTotalRecords);

// Check for query error
if (!$resultTotalRecords) {
    die("Error in SQL query: " . mysqli_error($conn));
}

$rowTotalRecords = mysqli_fetch_assoc($resultTotalRecords);
$totalRecords = $rowTotalRecords['total'];

// Calculate total pages
$totalPages = ceil($totalRecords / $itemsPerPage);

// Determine current page
$currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;

// Ensure currentPage is within valid range
if ($currentPage < 1) {
    $currentPage = 1;
} elseif ($currentPage > $totalPages) {
    $currentPage = $totalPages;
}

// Calculate offset based on current page
$offset = ($currentPage - 1) * $itemsPerPage;

// Fetch data based on the offset and number of items per page
$sqlFetchData = "SELECT * FROM `addtopics` LIMIT $offset, $itemsPerPage";
$resultFetchData = mysqli_query($conn, $sqlFetchData);

// Check for query error
if (!$resultFetchData) {
    die("Error in SQL query: " . mysqli_error($conn));
}

// Check if the "Load More" button is clicked
if (isset($_POST['load_more'])) {
    // Update the current page for the next load
    $currentPage++;
    // Ensure currentPage is within valid range after clicking "Load More"
    if ($currentPage > $totalPages) {
        $currentPage = $totalPages;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Welcome to fSociety - Home</title>
    <style>
        <?php include "stylesheet/topic_listing.css"; ?>
    </style>
</head>

<body style="background-color:#cbd5e1;">
    <div style="width: 80vw; margin:auto; background-color:white; border:1px solid #64748b;">
        <?php include "forum-header.php"; ?>
        <div style="display:flex;">

            <div class="mainContainer">
                <span style="margin-left:20px;"><a href="../home.php"
                        style="text-decoration:none; color:black; font-size:12px;">Home</a> &rarr; <a
                        href="../market.php" style="text-decoration:none; color:black; font-size:12px;">Market</a>
                    &rarr; <a href="../forum.php" style="text-decoration:none; color:black; font-size:12px;">Forum</a>
                    &rarr; <a href="topic_listing.php" style="text-decoration:none; color:black; font-size:12px;">Topic
                        Catagories</a>
                </span>
                <div class="bigBox">
                    <div class="useraccount">

                        <span>
                            <b>User:</b>
                            <?php echo $_SESSION['username']; ?> <i>(You)</i>
                        </span>



                    </div>
                    <form method="post" style="text-align:right;">
                        <input type="text" name="search"
                            style="padding:8px; margin-top:10px; width:25%;border-radius:5px; border:2px solid gainsboro; font-size:1rem;"
                            placeholder="Search . . . . . . . .">
                        <input type="submit" name="submit" style="display:none;">
                    </form>

                    <?php
                    if (isset($_POST["submit"])) {
                        $search = mysqli_real_escape_string($conn, $_POST["search"]);
                        $sql_search = "SELECT * FROM `addtopics` WHERE topic_id LIKE '%$search%' OR topic_title LIKE '%$search%' OR username LIKE '%$search%'";
                        $runQuery = mysqli_query($conn, $sql_search);

                        // Check for query error
                        if (!$runQuery) {
                            die("Error in SQL query: " . mysqli_error($conn));
                        }
                        ?>
                        <center>
                            <table style="width:100%;">
                                <th colspan="2" style="background-color:#052e16;">Author</th>
                                <th colspan="2" style="background-color:#052e16;">Topics</th>


                                <?php
                                if (mysqli_num_rows($runQuery) > 0) {
                                    while ($row = mysqli_fetch_assoc($runQuery)) {
                                        // Display search results
                                        ?>
                                        <tr style="background-color:#bbf7d0;">
                                            <td style="width:5%;"><img src="img/1379958.png" alt="userImage" width="50px"
                                                    height="50px" style="margin-left:10px;"></td>
                                            <td style="width:25%;">[
                                                <?php echo $row["username"]; ?>] <br>
                                                <b style="font-size:12px; font-weight:lighter;">
                                                    <?php echo $row["topic_create_time"]; ?>
                                                </b>
                                            </td>

                                            <td style="width:70%;">Topic: <a style="color:#475569;"
                                                    href="showtopic.php?data=<?php echo urlencode($row["topic_title"]); ?>">
                                                    <?php echo $row["topic_title"]; ?>
                                                </a> <br><br>
                                                About: <i style="color:#1f2937;">
                                                    <?php echo $row["topic_desc"]; ?>
                                                </i>
                                            </td>

                                        </tr>
                                        <?php
                                    }
                                } else {
                                    echo '<tr  style="background-color:#bbf7d0;">';
                                    echo "<td style='color:red; text-decoration:none;' colspan='4'>No results found.</td>";
                                    echo '</tr>';
                                }
                    }
                    ?>
                        </table>
                    </center>
                    <center>
                        <table style="width:100%;">
                            <th colspan="2">Author</th>
                            <th colspan="3">Topics</th>

                            <?php
                            if (mysqli_num_rows($resultFetchData) > 0) {
                                while ($row = mysqli_fetch_assoc($resultFetchData)) {
                                    // Display fetched data
                                    ?>
                                    <tr>
                                        <td style="width:5%;"><img src="img/1379958.png" alt="userImage" width="50px"
                                                height="50px" style="margin-left:10px;"></td>
                                        <td style="width:25%;">[
                                            <?php echo $row["username"]; ?>] <br>
                                            <b style="font-size:12px; font-weight:lighter;">
                                                <?php echo $row["topic_create_time"]; ?>
                                            </b>
                                        </td>

                                        <td style="width:65%;">Topic: <a style="color:#475569;"
                                                href="showtopic.php?data=<?php echo urlencode($row["topic_id"]); ?>">
                                                <?php echo $row["topic_title"]; ?>
                                            </a>
                                            <br><br>
                                            Catagory: <a style="color: #475569;"
                                                href="showcatagories.php?catagory=<?php echo urlencode($row["catagories"]); ?>">
                                                <?php echo $row["catagories"]; ?>
                                            </a>
                                            <br>

                                            About: <i style="color:#1f2937;">
                                                <?php echo $row["topic_desc"]; ?>
                                            </i>
                                        </td>



                                        <?php
                                }
                            } else {
                                echo "<p>No data found.</p>";
                            }
                            ?>
                        </table>
                    </center>



                    <?php if ($totalPages > 1): ?>
                        <div class="pagination">
                            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                <button
                                    style="background-color:#94a3b8; padding:8px;  margin-top:10px; margin-bottom:10px; border:none;"><a
                                        href="?page=<?php echo $i; ?>"
                                        class="<?php echo ($i === $currentPage) ? 'active' : ''; ?>"
                                        style="text-decoration:none; color:white; font-size:1rem;">
                                        <?php echo $i; ?>
                                    </a></button>
                            <?php endfor; ?>
                        </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>

        <div class="footer">000fSociety</div>
    </div>
</body>

</html>