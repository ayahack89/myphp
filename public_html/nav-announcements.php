<?php 
include "db_connection.php";
include "fonts.php";
include "bootstrapcss-and-icons.php";
session_start();
ini_set('display_errors', 0);


?>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="google-site-verification" content="2MFbMdbyunwBJ4iibPaO_wI5PoMj08UC1i-W3iTEO1U" />
     <meta name="description" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" type="image/x-icon" href="img/background/agguoralogo.jpg">

<title>Announcements | Agguora</title>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-YXXL0NCGLE"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-YXXL0NCGLE');
</script>

</head>
<style>
    .card {
        border-radius: 10px;
    }

    .list-group-item {
        border: none;
        border-bottom: 1px solid #f1f1f1;
    }

    .list-group-item:last-child {
        border-bottom: none;
    }

    .list-group-item-action:hover {
        background-color: #f8f9fa;
    }

    .list-group-item .text-secondary {
        font-size: 12px;
    }

    .list-group-item .ri-calendar-2-line {
        font-size: 14px;
    }

    @media (max-width: 576px) {
        .card-header h3 {
            font-size: 1.25rem;
        }
    }
</style>
<body class="bg-light">
    <?php include "header.php"; ?>
    
    <div class="container my-4">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-0">
                    <h3 class="mb-0 text-danger">Announcements</h3>
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        <?php 
                        $sql = "SELECT * FROM `announcement_threads` ORDER BY last_update DESC";
                        $result = mysqli_query($conn, $sql);
                        if($result && mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_assoc($result)){
                                ?>
                                <a href="announcement-thread.php?announcement=<?php echo htmlspecialchars($row['announcement_id']); ?>" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center text-dark">
                                    <div>
                                        <span style="font-size:14px;"><?php echo htmlspecialchars($row['anno_thread_name']); ?></span>
                                        <div class="text-secondary" style="font-size:12px;">
                                            <?php echo htmlspecialchars($row['last_update']); ?> &#8226;
                                           <i class="ri-global-line"></i>
                                        </div>
                                    </div>
                                </a>
                                <?php 
                            }
                        } else {
                            ?>
                            <div class="list-group-item text-center text-secondary">
                                No announcements available.
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "bootstrapjs.php"; ?>


</body>
</html>