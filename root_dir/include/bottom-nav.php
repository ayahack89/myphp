<style>
    .nav-bar {
        box-shadow: 0 -1px 5px rgba(0, 0, 0, 0.1);
        background-color: #f8f9fa;
    }

    .nav-bar-brand {
        flex-grow: 1;
        text-align: center;
        font-size: 1rem;
    }

    .nav-bar-brand i {
        display: block;
        font-size: 1.5rem;
        /* Icon size */
    }

    @media (max-width: 768px) {

        /* For mobile devices */
        .nav-bar {
            display: flex;
        }

        .nav-bar-brand {
            font-size: 0.9rem;
        }

        .nav-bar-brand i {
            font-size: 1.6rem;
        }
    }

    @media (min-width: 769px) {

        /* For desktop devices */
        .nav-bar {
            display: none;
        }
    }
</style>

<div class="navbar nav-bar fixed-bottom bg-body-tertiary">
    <div class="container-fluid d-flex justify-content-around">
        <!--Recent post -Start-->
        <a class="navbar-brand nav-bar-brand" href="../home/main.php"><i class="ri-earth-line" id="recentTab"></i></a>
        <!--Recent post -End-->

        <!--trending - Start -->
        <a class="navbar-brand nav-bar-brand" href="../home/trending.php"><i class="ri-funds-box-line" id="trendingTab"></i></a>
        <!--trending - End-->

        <!-- New post -Start -->
        <?php if (isset($_SESSION['username'])) { ?>
            <a class="navbar-brand nav-bar-brand" href="../main/newpost.php"><i class="ri-edit-box-line" id="newpostTab"></i></a>
        <?php } else { ?>
            <a class="navbar-brand nav-bar-brand" href="../authentication/login.php"><i class="ri-edit-box-line"></i></a>
        <?php } ?>
        <!-- New post -End -->

        <!-- Members -Start -->
        <a class="navbar-brand nav-bar-brand" href="../users/members.php"><i class="ri-team-line" id="membersTab"></i></a>
        <!-- Members -End -->

        <!-- Profile -Start -->
        <a class="nav-link d-flex align-items-center"
            href="<?php echo isset($_SESSION['username']) ? '../user_account/profile.php' : '../authentication/login.php'; ?>">
            <?php if (isset($_SESSION['username'])) { ?>
                <?php
                $userId = $_SESSION['id'];
                $sql = "SELECT * FROM `user` WHERE id = '{$userId}'";
                $result = mysqli_query($conn, $sql);
                if ($result && mysqli_num_rows($result) > 0) {
                    $dp = mysqli_fetch_assoc($result);
                    ?>
                    <img src="../media/images/<?php echo $dp['profile_pic']; ?>" class="rounded-circle me-2"
                        alt="<?php echo htmlspecialchars($dp['about']); ?>"
                        style="width: 32px; height: 32px; object-fit: cover;">
                <?php } ?>
            <?php } else { ?>
                <a href="../authentication/login.php" class="navbar-brand nav-bar-brand"><i class="ri-account-circle-line me-1" id="profileTab"></i></a>
            <?php } ?>
        </a>
        <!-- Profile -End -->
    </div>
</div>
<script>
    function toggleClass(element, beforeClass, afterClass) {
        element.classList.toggle(beforeClass);
        element.classList.toggle(afterClass);
    }

    const tabs = [
        {
            element: document.getElementById("recentTab"),
            beforeClass: "ri-earth-line",
            afterClass: "ri-earth-fill"
        },
        {
            element: document.getElementById("trendingTab"),
            beforeClass: "ri-funds-box-line",
            afterClass: "ri-funds-box-fill"
        },
        {
            element: document.getElementById("newpostTab"),
            beforeClass: "ri-edit-box-line",
            afterClass: "ri-edit-box-fill"
        },
        {
            element: document.getElementById("membersTab"),
            beforeClass: "ri-team-line",
            afterClass: "ri-team-fill"
        },
        {
            element: document.getElementById("profileTab"),
            beforeClass: "ri-account-circle-line",
            afterClass: "ri-account-circle-fill"
        }
    ];

    tabs.forEach(tab => {
        tab.element.addEventListener('click', () => {
            toggleClass(tab.element, tab.beforeClass, tab.afterClass);
        });
    });




</script>