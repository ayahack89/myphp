<?php
session_start();

include "db_connection.php";
$itemsPerPage = 8;

// Fetching total count of records
$sqlTotalRecords = "SELECT COUNT(*) as total FROM `onionsites`";
$resultTotalRecords = mysqli_query($conn, $sqlTotalRecords);
$rowTotalRecords = mysqli_fetch_assoc($resultTotalRecords);
$totalRecords = $rowTotalRecords['total'];

// Calculate total pages
$totalPages = ceil($totalRecords / $itemsPerPage);

// Determine current page
$currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;

// Calculate offset based on current page
$offset = ($currentPage - 1) * $itemsPerPage;

// Fetch data based on the offset and number of items per page
$sqlFetchData = "SELECT * FROM `onionsites` LIMIT $offset, $itemsPerPage";
$resultFetchData = mysqli_query($conn, $sqlFetchData);

// Check if the "Load More" button is clicked
if (isset($_POST['load_more'])) {
    // Update the current page for the next load
    $currentPage++;
    // Redirect to the same page with the updated page number
    header("Location: market.php?page=$currentPage");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Welcome to fSociety your anonymous market - home</title>
    <style>
      <?php include "css/market.css"; ?>
    </style>
</head>
<body>

<div class="header header_background">
    <div class="logo">
        <img src="img/fsocietylogo.png" width="120px" height="120px" alt="fsocietylogo"/>
    </div>
    <div class="logoText">
        <h2><b class="bigtext">fSociety</b><br><b class="smalltext">the anonymous community</b></h2>
    </div>
</div>

<div class="navbar">
    <?php include "afterlog.php"; ?>
</div>
<span style="margin-left:20px;"><a href="home.php" style="text-decoration:none; color:black; font-size:12px;">Home</a> &rarr; <a href="market.php" style="text-decoration:none; color:black;font-size:12px;">Market</a></span>

<div class="bigBox">
    <div class="useraccount">
        <div class="username">
            User Name:
        </div>
        <div class="yourname">
            <?php echo $_SESSION['username']; ?> <i>(You)</i>
        </div>
    </div>

<p>Lorem ipsum dolor sit amet consectetur adipisicing elit.Lorem Assumenda tenetur saepe molestias, iure, corporis facilis blanditiis repudiandae nostrum, sint reprehenderit dolorum veniam non tempora dicta suscipit ad ullam excepturi doloribus?</p>
    <form method="post">
        <div class="searchBar">
            <select name="search">
                <option value="">--Search by Category --</option>
                <option value="Drugs">Drugs</option>
                <option value="Guns">Guns</option>
                <option value="Hacking_Tools">Hacking Tools</option>
                <option value="Banned_Books">Banned Books</option>
            </select>
            <button type="submit" name="submit" class="searchbtn">Go</button>
        </div>
    </form>
<?php 
    if (isset($_POST["submit"])) {
    $search = mysqli_real_escape_string($conn, $_POST["search"]);
    $sql_search = "SELECT * FROM `onionsites` WHERE catagory LIKE '%$search%' ";
    $result = mysqli_query($conn, $sql_search);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    } else {
        if (mysqli_num_rows($result) > 0) {
            echo '<div class="sortedData">
                    <table style="width:100%;">
                    <th>Onion site name</th>
                    <th>Onion site link</th>
                    <th>Catagory</th>
                    <th>Last update</th>';

            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>
              
                        <td style="color:green; text-transform: uppercase;">' . $row['onionsitename'] . '</td>
                        <td><a href="' . $row['onionsitelink'] . '" target="blank">'.$row['onionsitelink'].'</td>
                        <td style="color:blue;">' . $row['catagory'] . '</td>
                        <td style="color:red;">' . $row['uploadetime'] . '</td>
                      </tr>';
            }

            echo '</table>
                  </div>';
        } else {
            echo "<h2 style='text-align:center;'>Site not found : (</h2>";
        }
    }
}
?>

    <center>
        <table style="width:100%;">
            <th>Onion site names</th>
            <th>Onion site links</th>
            <th>Categories</th>
            <th>Last update</th>
            <?php
            while ($row = mysqli_fetch_assoc($resultFetchData)) {
                echo '<tr>
                    <td style=" text-transform: uppercase; width:20%;">' . $row['onionsitename'] . '</td>
                    <td style="width:50%;"><a href="' . $row['onionsitelink'] . '" target="blank">'.$row['onionsitelink'].'</td>
                    <td style="color:blue; width:10%;">' . $row['catagory'] . '</td>
                    <td style="color:red; width:20%">' . $row['uploadetime'] . '</td>
                  </tr>';
            }
            ?>
        </table>
    </center>

    <?php if ($currentPage < $totalPages): ?>
        <form method="post" action="?page=<?php echo $currentPage; ?>">
            <input type="submit" name="load_more" value="Load More" class="searchbtn" style="margin-top:10px;">
        </form>
    <?php endif; ?>

</div>

<div class="footer">000fSociety</div>

</body>
</html>
