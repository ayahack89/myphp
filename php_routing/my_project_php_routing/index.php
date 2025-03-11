<?php
declare(strict_types=1);

// Get the rewritten path from .htaccess
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$path = str_replace('/my_project/', '', $path); // Fixed slash issue

switch ($path) {
    case '':
    case '/':
        echo "Welcome";
        break;
    case 'about':
        echo "About page";
        break;
    case 'data':
        include("db_connection.php");
        $sqlQuery = "SELECT * FROM `Users`";
        $result = mysqli_query($conn, $sqlQuery);

        if (!$result) {
            echo "Something went wrong :(";
        } else {
            if (mysqli_num_rows($result)) {
                ?>
                <table>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <?php while ($data = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?= htmlspecialchars($data["id"]) ?></td>
                            <td><?= htmlspecialchars($data["firstName"]) ?></td>
                            <td><?= htmlspecialchars($data["lastName"]) ?></td>
                            <td><?= htmlspecialchars($data["email"]) ?></td>
                        </tr>
                    <?php } ?>
                </table>
                <?php
            }
        }
        break;

    default:
        http_response_code(404);
        echo "404 not found";
}
?>



