<?php

require_once 'pdo_connect.php';

$search = $_GET['search'] ?? '';

if ($search) {
    $statement = $pdo->prepare("SELECT * FROM police WHERE `Poid` LIKE '%$search%' OR `Poname` LIKE '%$search%' OR `porank` LIKE '%$search%' OR `policestation` LIKE '%$search%' OR `contact` LIKE '%$search%' OR `remark` LIKE '%$search%' OR `address` LIKE '%$search%' OR `service_yrs` LIKE '%$search%'");
} else {
    $statement = $pdo->prepare('SELECT * FROM police');
}

$statement->execute();

$polices = $statement->fetchAll(PDO::FETCH_ASSOC);

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
                <a href="../police/dashboard.html">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="police_police.php" class="active">
                    <i class='bx bx-list-ul'></i>
                    <span class="links_name">Police Details</span>
                </a>
            </li>
            <li>
                <a href="police_criminal.php">
                    <i class='bx bx-info-circle'></i>
                    <span class="links_name">Criminal Details</span>
                </a>
            </li>
            <li>
                <a href="../police/crime.php">
                    <i class='bx bx-pie-chart-alt-2'></i>
                    <span class="links_name">Crime Details</span>
                </a>
            </li>
            <li>
                <a href="../police/prison.php">
                    <i class='bx bx-building'></i>
                    <span class="links_name">Prison Details</span>
                </a>
            </li>
            <li>
                <a href="../police/fir.php">
                    <i class='bx bx-book-alt'></i>
                    <span class="links_name">FIR</span>
                </a>
            </li>
            <li>
                <a href="../police/queries.php">
                    <i class='bx bx-message'></i>
                    <span class="links_name">Queries</span>
                </a>
            </li>
            <li class="log_out">
                <a href="../police/login.php">
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
                <span class="dashboard">Police Details</span>
            </div>
            <div class="search-box">
                <form>
                    <input style="height: 50px;" type="text" name="search" value="<?php echo $search ?>" placeholder="Search...">
                    <button type="submit"><i class='bx bx-search'></i></button>
                </form>
            </div>
            <div>
                <button type="button" class="add_button">
                    <span class="add_button_text"><a href="police_policeadd.php">Add</a></span>
                    <span class="add_button_icon">
                        <i class='bx bx-plus'></i>
                    </span>
                </button>
            </div>
            <div class="profile-details">
                <img src="images\profile.png" alt="user_image">
                <span class="admin_name">Police</span>
            </div>
        </nav>
        <div class="home-content">
            <div class="overview-boxes">
                <?php foreach ($polices as $police) { ?>
                    <div class="box">
                        <div class="right-side">
                            <div class="text">
                                <div>
                                    <?php
                                    echo "<img src='images/" . $police['image'] . "' width='100px' height='125px' align='right'>";
                                    ?>
                                </div>
                                <p><b>Police ID: </b><?php echo htmlspecialchars($police['Poid']); ?></p>
                                <p><b>Name: </b><?php echo htmlspecialchars($police['Poname']); ?></p>
                                <p><b>Rank: </b><?php echo htmlspecialchars($police['porank']); ?></p>
                                <p><b>Police Station: </b><?php echo htmlspecialchars($police['policestation']); ?></p>
                                <p><b>Contact: </b><?php echo htmlspecialchars($police['contact']); ?></p>
                                <p><b>Remark: </b><?php echo htmlspecialchars($police['remark']); ?></p>
                                <p><b>Address: </b><?php echo htmlspecialchars($police['address']); ?></p>
                                <p><b>Service Years: </b><?php echo htmlspecialchars($police['service_yrs']); ?></p>
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