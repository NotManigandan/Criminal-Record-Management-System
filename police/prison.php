<?php

include('db_connect.php');

$search = $_GET['search'] ?? '';

if ($search) {
    $sql = "SELECT * FROM prisons WHERE `prisonid` LIKE '%$search%' OR `prisonname` LIKE '%$search%' OR `prisontype` LIKE '%$search%' OR `prisoncity` LIKE '%$search%' OR `prisonstate` LIKE '%$search%' OR `prisoncountry` LIKE '%$search%' OR `prisoncapacity` LIKE '%$search%'";
} else {
    $sql = 'SELECT * FROM prisons ORDER BY prisonstate';
}


$result = mysqli_query($conn, $sql);

$prisons = mysqli_fetch_all($result, MYSQLI_ASSOC);

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
    <link rel="stylesheet" href="css/content.css">
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
                <a href="dashboard.html">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="../admin/police_police.php">
                    <i class='bx bx-list-ul'></i>
                    <span class="links_name">Police Details</span>
                </a>
            </li>
            <li>
                <a href="../admin/police_criminal.php">
                    <i class='bx bx-info-circle'></i>
                    <span class="links_name">Criminal Details</span>
                </a>
            </li>
            <li>
                <a href="crime.php">
                    <i class='bx bx-pie-chart-alt-2'></i>
                    <span class="links_name">Crime Details</span>
                </a>
            </li>
            <li>
                <a href="prison.php" class="active">
                    <i class='bx bx-building'></i>
                    <span class="links_name">Prison Details</span>
                </a>
            </li>
            <li>
                <a href="fir.php">
                    <i class='bx bx-book-alt'></i>
                    <span class="links_name">FIR</span>
                </a>
            </li>
            <li>
                <a href="queries.php">
                    <i class='bx bx-message'></i>
                    <span class="links_name">Queries</span>
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
                <span class="dashboard">Prison Details</span>
            </div>
            <div class="search-box">
                <form>
                    <input style="height: 50px;" type="text" name="search" value="<?php echo $search ?>" placeholder="Search...">
                    <button type="submit"><i class='bx bx-search'></i></button>
                </form>
            </div>
            <div class="profile-details">
                <img src="images\profile.png" alt="user_image">
                <span class="admin_name">Police</span>
            </div>
        </nav>
        <div class="home-content">
            <div class="overview-boxes">
                <?php foreach ($prisons as $prison) { ?>
                    <div class="box">
                        <div class="right-side">

                            <div class="text">
                                <p><b>Prison ID: </b><?php echo htmlspecialchars($prison['prisonid']); ?></p>
                                <p><b>Prison Name: </b><?php echo htmlspecialchars($prison['prisonname']); ?></p>
                                <p><b>Type: </b><?php echo htmlspecialchars($prison['prisontype']); ?></p>
                                <p><b>Capacity: </b><?php echo htmlspecialchars($prison['prisoncapacity']); ?></p>
                                <p><b>City: </b><?php echo htmlspecialchars($prison['prisoncity']); ?></p>
                                <p><b>State: </b><?php echo htmlspecialchars($prison['prisonstate']); ?></p>
                                <p><b>Country: </b><?php echo htmlspecialchars($prison['prisoncountry']); ?></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
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

</html>