<?php

include('db_connect.php');

$user_id = $_GET['id'] ?? null;

$user_id = $_GET['id'] ?? null;
if (!$user_id) {
    header('Location: dashboard.php');
    exit;
}

$idsql = "SELECT * FROM `users` WHERE `Aadhar`='$user_id'";

$idresult = $conn->query($idsql);

if ($idresult->num_rows > 0) {
    while ($id = $idresult->fetch_assoc()) {
        $uid = $id['Full_Name'];
    }
}

$search = $_GET['search'] ?? '';

if ($search) {
    $sql = "SELECT * FROM fir WHERE `firno` LIKE '%$search%' OR `firname` LIKE '%$search%' OR `firfathername` LIKE '%$search%' OR `firmothername` LIKE '%$search%' OR `aadhar` LIKE '%$search%' OR `phno` LIKE '%$search%' OR `email` LIKE '%$search%' OR `datetime` LIKE '%$search%' OR `placeocc` LIKE '%$search%' OR `address` LIKE '%$search%' OR `crimedesc` LIKE '%$search%' OR `status` LIKE '%$search%'";
} else {
    $sql = "SELECT * FROM fir WHERE `aadhar`='$user_id'";
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
                <a href="firfiled.php?id=<?php echo $user_id ?>" class="active">
                    <i class='bx bx-book-alt'></i>
                    <span class="links_name">Filed FIRs</span>
                </a>
            </li>
            <li>
                <a href="nearbypolicestation.php?id=<?php echo $user_id ?>">
                    <i class='bx bx-current-location'></i>
                    <span class="links_name">Nearby Police Station</span>
                </a>
            </li>
            <li>
                <a href="court.php?id=<?php echo $user_id ?>">
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
                <span class="dashboard">Filed FIRs</span>
            </div>
            <div class="profile-details">
                <img src="images\profile.png" alt="user_image">
                <span class="admin_name"><?php echo $uid ?></span>
            </div>
        </nav>
        <div class="home-content">
            <div class="overview-boxes">
                <?php foreach ($firs as $fir) { ?>
                    <div class="box">
                        <div class="right-side">
                            <div class="text">
                                <p><b>FIR ID: </b><?php echo htmlspecialchars($fir['firno']); ?></p>
                                <p><b>Name: </b><?php echo htmlspecialchars($fir['firname']); ?></p>
                                <p><b>Father Name: </b><?php echo htmlspecialchars($fir['firfathername']); ?></p>
                                <p><b>Mother Name: </b><?php echo htmlspecialchars($fir['firmothername']); ?></p>
                                <p><b>Aadhar Number: </b><?php echo htmlspecialchars($fir['aadhar']); ?></p>
                                <p><b>Contact Number: </b><?php echo htmlspecialchars($fir['phno']); ?></p>
                                <p><b>Email ID: </b><?php echo htmlspecialchars($fir['email']); ?></p>
                                <p><b>Date and Time of the Occurence of the Crime: </b><?php echo htmlspecialchars($fir['datetime']); ?></p>
                                <p><b>Place of Occurence of the Crime: </b><?php echo htmlspecialchars($fir['placeocc']); ?></p>
                                <p><b> Home Address: </b><?php echo htmlspecialchars($fir['address']); ?></p>
                                <p><b>Crime Description: </b><?php echo htmlspecialchars($fir['crimedesc']); ?></p>
                                <p><b>Case Status: </b><?php echo htmlspecialchars($fir['status']); ?></p>
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