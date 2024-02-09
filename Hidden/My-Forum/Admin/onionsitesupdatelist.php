<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="refresh" content="5"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Admin - Check Reviews</title>
    <style>
        :root {
            --bodyColor: #1e293b;
            --containerColor: #475569;
        }

        body {
            margin: 0;
            padding: 0;
            background-color: var(--bodyColor);
            color: yellow;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto,
    Oxygen, Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;

        }

        h2 {
            text-align: center;
        }

        .mainContainer {
            width: 1200px;
            background-color: var(--containerColor);
            border-radius: 5px;
            padding: 10px;
            margin: 0 auto;
            margin-top: 5%;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

        }

        table, tr, td {
            border-collapse: collapse;
            border: 2px solid yellow;
            margin-bottom: 10px;
            font-weight: bolder;
            padding: 10px;
        }

        th {
            color: black;
            padding: 10px;
            background-color: yellow;

        }

        p {
            font-weight: bolder;
        }

        a {
            color: red;
        }
         button{
          background-color: red;
          border: none;
          color: white;
          font-weight: bolder;
          border-radius: 2px;
          padding: 5px;
          width: 100%;
          margin-top: 10px;
          transition: all 4ms ease-in;

     }
     button:hover{
          transform: translateY(2%);
          cursor: pointer;


     }
    </style>
</head>
<body>
<div class="mainContainer">
    <center>
        <h2>Check Reviews</h2>
        <hr>
        <table>
            <th>Onion site name</th>
            <th>Onion site link</th>
            <th>Catagory</th>
            <th>Last update</th>
            <th>Action</th>
            <?php
            include "../db_connection.php";
            $sqlquery = "SELECT * FROM `onionsites`";
            $fetching = mysqli_query($conn, $sqlquery);
            if ($fetching) {
                if (mysqli_num_rows($fetching) > 0) {
                    while ($row = mysqli_fetch_assoc($fetching)) {
                        ?>
                        <tr>
                         <?php 
                         echo'
                            <td>'. $row["onionsitename"] .'</td>
                            <td> '. $row["onionsitelink"].' </td>
                            <td>'.  $row["catagory"].' </td>
                            <td>'. $row["uploadetime"] .'</td>';
                            ?>
                            <td>
                            
                                <form method="post" action="">
                                    <input type="hidden" name="onion_id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" name="delete_onion">Delete</button>
                                </form>
                            </td>
                        </tr>
                        <?php
                    }
                }
            } else {
                die("Something went wrong!" . mysqli_error($conn));
            }
            ?>
        </table>
     
        <?php
        function deleteComment($onionID, $conn)
        {
            $sql = "DELETE FROM `onionsites` WHERE id = $onionID";
            $conn->query($sql);
        }

        if (isset($_POST['delete_onion'])) {
            $onionID = $_POST['onion_id'];
            deleteComment($onionID, $conn);
            header("Location: " . $_SERVER['PHP_SELF']);
        }
        ?>

        <hr>

        <p> Go to <a href="admin.php">admin page</a></p>
    </center>
</div>
</body>
</html>
