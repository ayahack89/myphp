<style>
    .nav-bar {
        box-shadow: 0 -1px 5px rgba(0,0,0,0.1);
        background-color: #f8f9fa;
    }
    .nav-bar-brand {
        flex-grow: 1;
        text-align: center;
        font-size: 1rem;
    }
    .nav-bar-brand i {
        display: block;
        font-size: 1.5rem; /* Icon size */
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
    <a class="navbar-brand nav-bar-brand" href="main.php"><i class="ri-earth-line" id="recentTab"></i></a>
    <!--Recent post -End-->
    
    <!--trending - Start -->
    <a class="navbar-brand nav-bar-brand" href="trending.php"><i class="ri-funds-box-line" id="trendingTab"></i></a>
    <!--trending - End-->
    
    <!-- New post -Start -->
    <?php if (isset($_SESSION['username'])) { ?>
    <a class="navbar-brand nav-bar-brand" href="newpost.php"><i class="ri-edit-box-line" id="newpostTab"></i></a>
    <?php } else { ?>
    <a class="navbar-brand nav-bar-brand" href="login.php"><i class="ri-edit-box-line"></i></a>
    <?php } ?>
    <!-- New post -End -->
    
    <!-- Members -Start -->
    <a class="navbar-brand nav-bar-brand" href="members.php"><i class="ri-team-line" id="membersTab"></i></a>
    <!-- Members -End -->
    
    <!-- Profile -Start -->
    <?php if (isset($_SESSION['username'])) { ?>
    <a class="navbar-brand nav-bar-brand" href="profile.php"><i class="ri-account-circle-line" id="profileTab"></i></a>
    <?php } else { ?>
    <a class="navbar-brand nav-bar-brand" aria-current="page" href="login.php"><i class="ri-account-circle-line" id="profile-Tab"></i></a>
    <?php } ?>
    <!-- Profile -End -->
  </div>
</div>
<script>
  // Function to toggle CSS class
function toggleClass(element, beforeClass, afterClass) {
    element.classList.toggle(beforeClass);
    element.classList.toggle(afterClass);
}

// Assign elements and class names to an array for easy iteration
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

// Add event listeners to each tab
tabs.forEach(tab => {
    tab.element.addEventListener('click', () => {
        toggleClass(tab.element, tab.beforeClass, tab.afterClass);
    });
});

    
    
    
    //recent Tab
    
    
</script>
