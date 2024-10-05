<?php
include "db_connection.php";
session_start();
ini_set('display_errors', 0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description"
    content="Kindly share your honest review to help us build and grow our community. Your contribution matters!">
  <?php include "bootstrapcss-and-icons.php"; ?>

  <link rel="icon" type="image/x-icon" href="img/background/agguoralogo.jpg">
  <title>User Review | Agguora</title>
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-YXXL0NCGLE"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag() { dataLayer.push(arguments); }
    gtag('js', new Date());

    gtag('config', 'G-YXXL0NCGLE');
  </script>
  <style>
    .review {
        background-color: #f9f9f9;
        border-radius: 10px;
        padding: 15px;
    }
    .review .user-avatar img {
        border: 2px solid #ddd;
        object-fit: cover;
    }
    .review h6 {
        font-weight: bold;
    }
    .review .ratings span {
        font-size: 14px;
        padding: 5px 10px;
        font-weight: bold;
    }
    .review .comments p {
        font-size: 15px;
        line-height: 1.4;
    }
    /* Mobile responsiveness */
    @media (max-width: 768px) {
        .review {
            padding: 10px;
        }
        .review h6 {
            font-size: 16px;
        }
        .review .comments p {
            font-size: 14px;
        }
        .card-footer p {
            font-size: 14px;
        }
    }
</style>
</head>
<?php include "fonts.php"; ?>

<body class="bg-light">
  <?php include "header.php"; ?>


  <div class="container my-3">
    <div class="card shadow-md p-3 mb-4 bg-white rounded">
        <div class="card-header bg-dark text-white text-center">
            <h4 class="mb-0" style="font-weight: lighter;">User Reviews</h4>
        </div>
        <div class="card-body">
            <?php
            include "db_connection.php";
            $sql_query = "SELECT * FROM `review`";
            $fetching = mysqli_query($conn, $sql_query);
            if ($fetching) {
                if (mysqli_num_rows($fetching) > 0) {
                    while ($row = mysqli_fetch_assoc($fetching)) {
                        ?>
                        <div class="review mb-4 p-3 shadow-sm rounded">
                            <div class="d-flex align-items-center">
                                <?php
                                $userId = $row['user_id'];
                                $sql = "SELECT * FROM `user` WHERE id = '{$userId}'";
                                $result = mysqli_query($conn, $sql);
                                if ($result && mysqli_num_rows($result) > 0) {
                                    $userData = mysqli_fetch_assoc($result);
                                    ?>
                                    <div class="user-avatar">
                                        <?php if (!empty($userData['profile_pic'])): ?>
                                            <img src="img/images/<?php echo $userData['profile_pic']; ?>" alt="User Image" class="rounded-circle" width="50" height="50">
                                        <?php else: ?>
                                            <img src="img/images/default.jpg" alt="User Image" class="rounded-circle" width="50" height="50">
                                        <?php endif; ?>
                                    </div>
                                    <div class="ms-3">
                                        <h6 class="mb-1 fw-bold"><?php echo $userData['username']; ?></h6>
                                        <span class="text-muted small">Member</span>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="ratings mt-3">
                                <span class="badge bg-success rounded-pill px-3 py-2">
                                    <?php if (!empty($row['ratings'])) {
                                        echo $row["ratings"];
                                    } else {
                                        echo 'No rating';
                                    } ?>
                                </span>
                            </div>
                            <div class="comments mt-3">
                                <p class="mb-0"><?php echo $row['comments']; ?></p>
                            </div>
                        </div>
                    <?php
                    }
                } else {
                    echo '<div class="alert alert-warning" role="alert">No reviews available.</div>';
                }
            } else {
                echo '<div class="alert alert-danger rounded-0" role="alert" style="font-size:15px;">Oops! Something went wrong : (</div>';
            }
            ?>
        </div>
        <div class="card-footer text-center">
            <p class="mb-0">Don't forget to give your ratings!</p>
            <a href="rateus.php" class="btn btn-outline-primary mt-2">Click here to rate us</a>
        </div>
    </div>
</div>

  <?php include "footer.php"; ?>
  <?php include "bootstrapjs.php"; ?>
</body>

</html>