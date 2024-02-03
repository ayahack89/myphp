<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Record page</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: Arial;
        }

        table, th, td {
            border: 2px solid black;
            border-collapse: collapse;
            padding: 5px;
            width: 800px;
            margin: 0 auto;
        }

        p {
            text-align: center;
        }
    </style>
</head>
<body>


    <table id="myTable">
   
            <th>STD ID</th>
            <th>STD NAME</th>
            <th>STD EMAIL</th>
            <th>STD PHONE</th>
    
        
            <?php 
            // Server details
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "students";

            // Connection
            $conn = mysqli_connect($servername, $username, $password, $dbname) or die("Server not connected!" . mysqli_error($conn));

            // SQL fetch query
            $sql = "SELECT * FROM `studentd`";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<td>' . $row['id'] . '</td>';
                    echo '<td>' . $row['stdname'] . '</td>';
                    echo '<td>' . $row['stdemail'] . '</td>';
                    echo '<td>' . $row['stdphonenum'] . '</td>';
                    echo '</tr>';
                }
            }
            ?>
      

    </table>


    <script>
        $(document).ready(function() {
            function reloadTable() {
                $.ajax({
                    url: 'record.php', // Use the correct file name for fetching data
                    type: 'POST',
                    success: function(data) {
                        $('#myTable tbody').html(data); // Update only the table body
                    },
                    error: function(error) {
                        console.error('Error loading data:', error);
                    }
                });
            }

            // Reload the table every 5 seconds (5000 milliseconds)
            setInterval(reloadTable, 5000);

            // Initial table load
            reloadTable();
        });
    </script>
</body>
</html>
