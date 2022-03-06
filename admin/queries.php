<?php

include('db_connect.php');

$search = $_GET['search'] ?? '';

if ($search) {
    $sql = "SELECT * FROM query WHERE `qid` LIKE '%$search%' OR `name` LIKE '%$search%' OR `aadhar` LIKE '%$search%' OR `phno` LIKE '%$search%' OR `email` LIKE '%$search%' OR `query` LIKE '%$search%' OR `reply` LIKE '%$search%'";
} else {
    $sql = 'SELECT * FROM query ORDER BY qid';
}

$result = mysqli_query($conn, $sql);

$queries = mysqli_fetch_all($result, MYSQLI_ASSOC);

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
                <a href="police.php">
                    <i class='bx bx-list-ul'></i>
                    <span class="links_name">Police Details</span>
                </a>
            </li>
            <li>
                <a href="criminal.php">
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
                <a href="court.php">
                    <i class='bx bx-buildings'></i>
                    <span class="links_name">Court Details</span>
                </a>
            </li>
            <li>
                <a href="prison.php">
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
                <a href="queries.php" class="active">
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
                <span class="dashboard">Queries</span>
            </div>
            <div class="search-box">
                <form>
                    <input style="height: 50px;" type="text" name="search" value="<?php echo $search ?>" placeholder="Search...">
                    <button type="submit"><i class='bx bx-search'></i></button>
                </form>
            </div>
            <div class="profile-details">
                <img src="images\profile.png" alt="user_image">
                <span class="admin_name">Admin</span>
            </div>
        </nav>
        <div class="home-content">
            <div class="overview-boxes">
                <?php foreach ($queries as $query) { ?>
                    <div class="box">
                        <div class="right-side">
                            <div class="text">
                                <p><b>Query ID: </b><?php echo htmlspecialchars($query['qid']); ?></p>
                                <p><b>Questioner: </b><?php echo htmlspecialchars($query['name']); ?></p>
                                <p><b>Aadhar Number: </b><?php echo htmlspecialchars($query['aadhar']); ?></p>
                                <p><b>Contact Number: </b><?php echo htmlspecialchars($query['phno']); ?></p>
                                <p><b>Email ID: </b><?php echo htmlspecialchars($query['email']); ?></p>
                                <p><b>Query: </b><?php echo htmlspecialchars($query['query']); ?></p>
                                <p><b>Reply: </b><?php echo htmlspecialchars($query['reply']); ?></p>
                                <div class="end_button">
                                    <div class="in_button">
                                        <button type="button" class="update_button">
                                            <span class="update_button_text"><a href="queryupdate.php?id=<?php echo $query['qid'] ?>">Update</a></span>
                                            <span class=" update_button_icon">
                                                <i class='bx bx-pencil'></i>
                                            </span>
                                        </button>
                                    </div>
                                    <div class="in_button">
                                        <form method="POST" action="querydelete.php">
                                            <input type="hidden" name="id" value="<?php echo $query['qid'] ?>" />
                                            <button type="submit" class="delete_button">
                                                <span class="delete_button_text">Delete</span>
                                                <span class="delete_button_icon">
                                                    <i class='bx bx-minus'></i>
                                                </span>
                                            </button>
                                        </form>
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