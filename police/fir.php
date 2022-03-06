<?php

include('db_connect.php');

$search = $_GET['search'] ?? '';

if ($search) {
    $sql = "SELECT * FROM fir WHERE `firno` LIKE '%$search%' OR `firname` LIKE '%$search%' OR `firfathername` LIKE '%$search%' OR `firmothername` LIKE '%$search%' OR `aadhar` LIKE '%$search%' OR `phno` LIKE '%$search%' OR `email` LIKE '%$search%' OR `datetime` LIKE '%$search%' OR `placeocc` LIKE '%$search%' OR `address` LIKE '%$search%' OR `crimedesc` LIKE '%$search%' OR `status` LIKE '%$search%'";
} else {
    $sql = 'SELECT * FROM fir ORDER BY firno';
}

$result = mysqli_query($conn, $sql);

$firs = mysqli_fetch_all($result, MYSQLI_ASSOC);

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
                <a href="prison.php">
                    <i class='bx bx-building'></i>
                    <span class="links_name">Prison Details</span>
                </a>
            </li>
            <li>
                <a href="fir.php" class="active">
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
                <span class="dashboard">First Information Reports</span>
            </div>
            <div class="search-box">
                <form>
                    <input style="height: 50px;" type="text" name="search" value="<?php echo $search ?>" placeholder="Search...">
                    <button type="submit"><i class='bx bx-search'></i></button>
                </form>
            </div>
            <div>
                <button type="button" class="add_button">
                    <span class="add_button_text"><a href="firadd.php">Add</a></span>
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
                <?php foreach ($firs as $fir) { ?>
                    <div class="box">
                        <div class="right-side">
                            <div class="text">
                                <p><b>FIR ID: </b><?php echo htmlspecialchars($fir['firno']); ?></p>
                                <p><b>Complainant's Name: </b><?php echo htmlspecialchars($fir['firname']); ?></p>
                                <p><b>Complainant's Father Name: </b><?php echo htmlspecialchars($fir['firfathername']); ?></p>
                                <p><b>Complainant's Mother Name: </b><?php echo htmlspecialchars($fir['firmothername']); ?></p>
                                <p><b>Complainant's Aadhar Number: </b><?php echo htmlspecialchars($fir['aadhar']); ?></p>
                                <p><b>Complainant's Contact Number: </b><?php echo htmlspecialchars($fir['phno']); ?></p>
                                <p><b>Complainant's Email ID: </b><?php echo htmlspecialchars($fir['email']); ?></p>
                                <p><b>Date and Time of the Occurence of the Crime: </b><?php echo htmlspecialchars($fir['datetime']); ?></p>
                                <p><b>Place of Occurence of the Crime: </b><?php echo htmlspecialchars($fir['placeocc']); ?></p>
                                <p><b>Complainant's Home Address: </b><?php echo htmlspecialchars($fir['address']); ?></p>
                                <p><b>Crime Description: </b><?php echo htmlspecialchars($fir['crimedesc']); ?></p>
                                <p><b>Case Status (Pending/On Action/Closed): </b><?php echo htmlspecialchars($fir['status']); ?></p>
                                <div class="end_button">
                                    <div class="in_button">
                                        <button type="button" class="update_button">
                                            <span class="update_button_text"><a href="firupdate.php?id=<?php echo $fir['firno'] ?>">Update</a></span>
                                            <span class=" update_button_icon">
                                                <i class='bx bx-pencil'></i>
                                            </span>
                                        </button>
                                    </div>
                                </div>
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