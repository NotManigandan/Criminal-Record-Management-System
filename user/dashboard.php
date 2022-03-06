<?php

require_once 'db_connect.php';

$user_id = $_GET['id'] ?? null;

if (!$user_id) {
    header('Location: login.php');
    exit;
}

$idsql = "SELECT * FROM `users` WHERE `Aadhar`='$user_id'";

$idresult = $conn->query($idsql);

if ($idresult->num_rows > 0) {
    while ($id = $idresult->fetch_assoc()) {
        $uid = $id['Full_Name'];
    }
}


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <title>CRMS</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/dashboard.css">
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
                <a href="dashboard.php?id=<?php echo $user_id ?>" class="active">
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
                <a href="firfiled.php?id=<?php echo $user_id ?>">
                    <i class='bx bx-book-alt'></i>
                    <span class="links_name">Filed FIRs</span>
                </a>
            </li>
            <li>
                <a href="nearbypolicestation.php?>">
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
                <a href="queries.php?id=<?php echo $user_id ?>">
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
                <span class="dashboard">Dashboard</span>
            </div>
            <div class="profile-details">
                <img src="images/profile.png" alt="user_image">
                <span class="admin_name"><?php echo $uid ?></span>
            </div>
        </nav>

        <div class="home-content">
            <div class="overview-boxes">
                <div class="box">
                    <div class="right-side">
                        <div class="number">File a FIR</div>
                        <div class="indicator">
                            <i class='bx bx-link'></i>
                            <span class="text"><a href="fir.php?id=<?php echo $user_id ?>">File a FIR</a></span>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="right-side">
                        <div class="number">Filed FIRs</div>
                        <div class="indicator">
                            <i class='bx bx-link'></i>
                            <span class="text"><a href="firfiled.php?id=<?php echo $user_id ?>">View your filed FIRs</a></span>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="right-side">
                        <div class="number">Nearby Police Station</div>
                        <div class="indicator">
                            <i class='bx bx-link'></i>
                            <span class="text"><a href="nearbypolicestation.php">View Nearby Police Station</a></span>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="right-side">
                        <div class="number">Court Details</div>
                        <div class="indicator">
                            <i class='bx bx-link'></i>
                            <span class="text"><a href="court.php">View Court Details</a></span>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="right-side">
                        <div class="number">Ask Your Queries</div>
                        <div class="indicator">
                            <i class='bx bx-link'></i>
                            <span class="text"><a href="queries.php?id=<?php echo $user_id ?>">Ask your Query</a></span>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="right-side">
                        <div class="number">Asked Queries</div>
                        <div class="indicator">
                            <i class='bx bx-link'></i>
                            <span class="text"><a href="queryanswered.php?id=<?php echo $user_id ?>">View Your Asked Queries</a></span>
                        </div>
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