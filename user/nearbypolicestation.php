<?php

include 'db_connect.php';

$search = $_GET['search'] ?? '';

if ($search) {
    $sql = "SELECT * FROM nearbypolicestation WHERE `psid` LIKE '%$search%' OR `psname` LIKE '%$search%' OR `psaddress` LIKE '%$search%'";
} else {
    $sql = 'SELECT * FROM nearbypolicestation ORDER BY psid';
}

$result = mysqli_query($conn, $sql);

$nbpss = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);

mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <title>CRMS</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/contentother.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript">
        function preventBack() {
            window.history.forward();
        }
        setTimeout("preventBack()", 0);
        window.onunload = function() {
            null
        };
    </script>
</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <i class='bx bx-book-reader'></i>
            <span class="logo_name">CRMS</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="dashboard.php?id=<?php echo $user_id ?>">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="fir.php?id=<?php echo $user_id ?>">
                    <i class='bx bx-book-add'></i>
                    <span class="links_name">File a FIR</span>
                </a>
            </li>
            <li>
                <a href="firfiled.php">
                    <i class='bx bx-book-alt'></i>
                    <span class="links_name">Filed FIRs</span>
                </a>
            </li>
            <li>
                <a href="nearbypolicestation.php" class="active">
                    <i class='bx bx-current-location'></i>
                    <span class="links_name">Nearby Police Station</span>
                </a>
            </li>
            <li>
                <a href="court.php">
                    <i class='bx bx-buildings'></i>
                    <span class=" links_name">Court Details</span>
                </a>
            </li>
            <li>
                <a href="queries.php">
                    <i class='bx bx-message-alt-add'></i>
                    <span class="links_name">Ask Your Queries</span>
                </a>
            </li>
            <li>
                <a href="queryanswered.php?id=<?php echo $user_id ?>">
                    <i class='bx bx-message-alt-check'></i>
                    <span class="links_name">Asked Queries</span>
                </a>
            </li>
            <li class="log_out">
                <a href="login.php">
                    <i class='bx bx-log-out'></i>
                    <span class="links_name">Log out</span>
                </a>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <i class='bx bx-menu sidebarBtn'></i>
                <span class="dashboard">Nearby Police Station</span>
            </div>
            <div class="search-box">
                <form>
                    <input style="height: 50px;" type="text" name="search" value="<?php echo $search ?>" placeholder="Search...">
                    <button type="submit"><i class='bx bx-search'></i></button>
                </form>
            </div>
            <div>
                <button type="button" class="update_button">
                    <span class="update_button_text"><a href="nearbypolicestationmap.php">Map View</a></span>
                    <span class="update_button_icon">
                        <i class='bx bx-map-alt'></i>
                    </span>
                </button>
            </div>
            <div class="profile-details">
                <img src="images\profile.png" alt="user_image">
                <span class="admin_name">User</span>
            </div>
        </nav>

        <div class="home-content">
            <div class="overview-boxes">
                <?php foreach ($nbpss as $nbps) { ?>
                    <div class="box">
                        <div class="right-side">
                            <p><b>Name of the Police Station: </b><?php echo htmlspecialchars($nbps['psname']); ?></p>
                            <p><b>Address: </b><?php echo htmlspecialchars($nbps['psaddress']); ?></p>
                            <p><b>Contact Number: </b><?php echo htmlspecialchars($nbps['psphno']); ?></p>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        </div>
        </div>
    </section>

    <script>
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
            if (sidebar.classList.contains("active")) {
                sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
            } else
                sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
        }
    </script>
</body>

</html>