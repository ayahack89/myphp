<?php 
session_start();
if(!isset($_SESSION['username'])){
echo 'Opps! atfirst you need to <a href="login.php">login</a> & proof that you are a true member.';
}else{ 
?>
<?php
include "db_connection.php";
ini_set('display_errors', 0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Explore what's new and join us securely, explore new threads, participate to the community and be an active user." />
  <?php include "bootstrapcss-and-icons.php"; ?>
  
  <link rel="icon" type="image/x-icon" href="img/background/agguoralogo.jpg">
  <title>Login | Agguora</title>
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
            <p>Just add a drive name & description</p>
        </div>
        <?php 
    
        if(isset($_POST['submit'])){
            $drivename = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['drive_name']));
            $drivedescription = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['drive_description']));
            $created_by = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['userid']));
            
            if(!empty($drivename) && !empty($drivedescription)){
                $sql_query = "INSERT INTO `catagory` (catagory_name, catagory_desc, created_by) 
                VALUES ('{$drivename}', '{$drivedescription}', '{$created_by}')";
                
                $result_q = mysqli_query($conn, $sql_query);
                
                if($result_q){
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
    
        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" class="bg-light p-4 border rounded shadow-sm">
            <?php 
            $username = $_SESSION['username'];
            $sql = "SELECT * FROM `user` WHERE username = '{$username}' ";
            $result = mysqli_query($conn, $sql);
            if($result && mysqli_num_rows($result) > 0){
                while($rows=mysqli_fetch_assoc($result)){
                   
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
                        <span class="input-group-text rounded-0"><i class="ri-folder-3-fill"></i></span>
                    </div>
                    <input type="text" class="form-control rounded-0" id="driveName" name="drive_name" placeholder="Drive name" aria-label="Drive name" required>
                </div>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control rounded-0" id="description" name="drive_description" rows="3" placeholder="Enter a brief description" required></textarea>
            </div><br>
            <button type="submit" class="btn btn-dark btn-block rounded-0" name="submit">Create New Drive +</button>
        </form>
    </div>
</div>
<!--Create new drives -End-->

</body>
</html>
<?php } ?>