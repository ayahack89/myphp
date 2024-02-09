<?php
session_start();

include "db_connection.php";
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
    <?php include "bootstrapcss-and-icons.php"; ?>
    <title>Welcome to fSociety - Home</title>
</head>
<?php include "fonts.php"; ?>

<body>

    <?php include "header.php"; ?>
    <div style="display:flex;">

        <div class="container">


            <div class="useraccount">

                <span>
                    <b>User:</b>
                    <?php
                    if (isset($_SESSION['username'])) {
                        echo $_SESSION['username'];

                    } else {
                        echo "you are not logged in!";
                    }

                    ?> <i>(You)</i>
                </span>



            </div>

            <div style="width:50vw; margin:auto;">
                <form method="post" style="text-align:right;">
                    <input class="form-control form-control-sm my-3 py-2 border" type="text" name="search"
                        placeholder="Search By username, topics, content" aria-label=".form-control-sm example">
                    <input type="submit" name="submit" style="display:none;">
                </form>
            </div>

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

                <table class="table table-light table-striped border">

                    <thead class="table-dark">
                        <tr>

                            <th colspan="2" style="text-align:center; font-weight:lighter;">Author</th>
                            <th colspan="2" style="font-weight:lighter;">Topics</th>


                        </tr>
                    </thead>

                    <tbody>



                        <?php
                        if (mysqli_num_rows($runQuery) > 0) {
                            while ($row = mysqli_fetch_assoc($runQuery)) {
                                // Display search results
                                ?>
                                <tr style="background-color:#bbf7d0;">
                                    <td style="width:5%;"></td>
                                    <td style="width:25%;">
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
                </tbody>
            </table>

            <table class="table table-light table-striped border">

                <thead class="table-dark">
                    <tr>

                        <th colspan="2" style="text-align:center; font-weight:lighter;">Author</th>
                        <th colspan="2" style="font-weight:lighter;">Topics</th>


                    </tr>
                </thead>

                <tbody>

                    <?php
                    if (mysqli_num_rows($resultFetchData) > 0) {
                        while ($row = mysqli_fetch_assoc($resultFetchData)) {
                            // Display fetched data
                            ?>
                            <tr>
                                <td style="width:5%;"></td>
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

                                    About: <span>
                                        <?php echo $row["topic_desc"]; ?>
                                    </span>
                                </td>



                                <?php
                        }
                    } else {
                        echo "<p>No data found.</p>";
                    }
                    ?>
                </tbody>
            </table>




            <?php if ($totalPages > 1): ?>
                <div class="pagination">
                    <nav aria-label="Page navigation">
                        <ul class="pagination pagination-sm" style="color:black;">
                            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                <li class="page-item <?php echo ($i === $currentPage) ? 'active' : ''; ?>">
                                    <a class="page-link text-dark bg-light border-dark" href="?page=<?php echo $i; ?>">
                                        <?php echo $i; ?>
                                    </a>
                                </li>
                            <?php endfor; ?>
                        </ul>
                    </nav>
                </div>
            <?php endif; ?>





        </div>









    </div>

    <?php include "footer.php" ?>
    <?php include "bootstrapjs.php" ?>
</body>

</html>