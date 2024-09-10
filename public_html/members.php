<?php
include "db_connection.php";
session_start();
ini_set('display_errors', 0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="description" content="Join our community, Agguora, and become one of our members now.">
     <?php include "bootstrapcss-and-icons.php"; ?>
     
     <link rel="icon" type="image/x-icon" href="img/background/agguoralogo.jpg">
     <title>Community Members | Agguora</title>
     <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-YXXL0NCGLE"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-YXXL0NCGLE');
</script>
</head>
<?php include "fonts.php"; ?>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f0f2f5;
    margin: 0;
    padding: 0;
}

.alert {
    margin: 16px;
    font-size: 1rem;
}

.search-form {
    width: 100%;
    max-width: 600px;
    margin: 16px auto;
}

.input-group {
    display: flex;
    align-items: center;
}

.search-input {
    flex: 1;
    border-radius: 0;
    border: 1px solid #ddd;
    padding: 10px;
    font-size: 1rem;
}

.search-button {
    border-radius: 0;
    background-color: #d9534f;
    color: white;
    font-size: 1.2rem;
    padding: 10px 20px;
}

.members-list, .search-results {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    margin-top: 20px;
}

.user-container {
    display: flex;
    align-items: center;
    width: 100%;
    max-width: 600px;
    padding: 16px;
    margin: 10px;
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    transition: box-shadow 0.3s ease;
}

.user-container:hover {
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.15);
}

.image {
    flex: 0 0 auto;
}

.profile-pic {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    object-fit: cover;
}

.text {
    flex: 1;
    margin-left: 16px;
}

.username b {
    font-size: 1.2rem;
    color: #333;
}

.joined_at b, .about b {
    font-size: 0.9rem;
    color: #777;
    font-weight: normal;
}

.profile-link {
    text-decoration: none;
    color: inherit;
}

@media (max-width: 600px) {
    .user-container {
        flex-direction: column;
        align-items: start;
    }

    .text {
        margin-left: 0;
        margin-top: 10px;
    }

    .profile-pic {
        width: 60px;
        height: 60px;
    }

    .username b {
        font-size: 1rem;
    }
}


</style>

<body class="bg-light">
<?php include "header.php"; ?>

<?php 
if(!isset($_SESSION['username'])){
    $sql_count = "SELECT COUNT(*) AS total_rows FROM user";
    $result = mysqli_query($conn, $sql_count);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>We currently have ' . $row['total_rows'] . ' active members</strong>. <a href="login.php">Join us</a> now!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
}
?>
<form class="container search-form" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
    <div class="input-group">
        <input type="text" class="form-control rounded search-input" placeholder="Search members by name, date, about..." name="search" aria-label="Search" aria-describedby="basic-addon1">
        <button class="btn btn-danger btn-sm search-button rounded" type="submit" name="submit_search" id="basic-addon1"><i class="ri-user-search-line"></i></button>
    </div>
</form>

<?php
if (isset($_POST['submit_search'])) {
    $search = mysqli_real_escape_string($conn, $_POST['search']);

    if (!empty($search)) {
        $sql_search_query = "SELECT * FROM `user` WHERE username LIKE '%$search%' OR datetime LIKE '%$search%' OR about LIKE '%$search%'";
        $search_result = mysqli_query($conn, $sql_search_query);
        if ($search_result) {
            if (mysqli_num_rows($search_result) > 0) {
                echo '<div class="container search-results">';
                while ($member = mysqli_fetch_assoc($search_result)) {
?>

                    <div class="user-container">
                        <div class="image">
                            <a href="allprofile.php?user=<?php echo $member['id']; ?>" class="profile-link">
                                <?php if(empty($member['profile_pic'])){ ?>
                                    <img src="img/images/default2.jpg" alt="Default profile picture" class="profile-pic">
                                <?php } else { ?>
                                    <img src="img/images/<?php echo $member['profile_pic']; ?>" alt="<?php echo $member['about']; ?>" class="profile-pic">
                                <?php } ?>
                            </a>
                        </div>
                        <div class="text">
                            <span class="username">
                                <a href="allprofile.php?user=<?php echo $member['id']; ?>" class="profile-link">
                                    <b><?php echo $member['username']; ?></b>
                                </a>
                            </span> <br>
                            <span class="joined_at">
                                <b>Joined at <?php echo $member['datetime']; ?></b>
                            </span> <br>
                            <span class="about">
                                <b><?php echo $member['about']; ?></b>
                            </span>
                        </div>
                    </div>
                    
<?php
                }
                echo '</div></div>';
            } else {
                echo '<div class="alert alert-warning rounded-0" role="alert">No Members Found :(</div>';
            }
        } else {
            echo '<div class="alert alert-danger rounded-0" role="alert">Oops! Something went wrong :(</div>';
        }
    } else {
        echo '<div class="alert alert-danger rounded-0" role="alert">Empty search is not allowed!</div>';
    }
}
?>


<div class="mb-5 py-3">
<div class="container members-list">
<?php
$sql_members = "SELECT * FROM `user` ORDER BY datetime DESC";
$result_members = mysqli_query($conn, $sql_members);
if ($result_members && mysqli_num_rows($result_members) > 0) {
    while ($member = mysqli_fetch_assoc($result_members)) {
?>
        <div class="user-container">
            <div class="image">
                <a href="allprofile.php?user=<?php echo $member['id']; ?>" class="profile-link">
                    <?php if(empty($member['profile_pic'])){ ?>
                        <img src="img/images/default2.jpg" alt="Default profile picture" class="profile-pic">
                    <?php } else { ?>
                        <img src="img/images/<?php echo $member['profile_pic']; ?>" alt="<?php echo $member['about']; ?>" class="profile-pic">
                    <?php } ?>
                </a>
            </div>
            <div class="text">
                <span class="username">
                    <a href="allprofile.php?user=<?php echo $member['id']; ?>" class="profile-link">
                        <b><?php echo $member['username']; ?></b>
                    </a>
                </span> <br>
                <span class="joined_at">
                    <b>Joined at <?php echo $member['datetime']; ?></b>
                </span> <br>
                <span class="about">
                    <b><?php echo $member['about']; ?></b>
                </span>
            </div>
        </div>
<?php
    }
}
?>
</div>



     <?php include "bottom-nav.php"; ?>
     <?php include "bootstrapjs.php"; ?>
</body>

</html>