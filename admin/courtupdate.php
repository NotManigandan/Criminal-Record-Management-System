<?php

include('db_connect.php');


$court_id = $_GET['id'] ?? null;
if (!$court_id) {
    header('Location: court.php');
    exit;
}

if (isset($_POST['update'])) {
    $court_id = ($_POST['CourtID']);
    $court_name = ($_POST['CourtName']);
    $court_type = ($_POST['CourtType']);
    $court_city = ($_POST['CourtCity']);
    $court_state = ($_POST['CourtState']);
    $court_country = ($_POST['CourtCountry']);

    $sql = "UPDATE `courts` SET `courtid`='$court_id' , `courtname`='$court_name' , `courttype`='$court_type', `courtcity`='$court_city',`courtstate`='$court_state',`courtcountry`='$court_country' WHERE `courtid`='$court_id'";

    $result = $conn->query($sql);

    if ($result == TRUE) {
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_GET['id'])) {
    $court_id = $_GET['id'];

    $sql = "SELECT * FROM `courts` WHERE `courtid` = $court_id";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($courts = $result->fetch_assoc()) {
            $c_id = $courts['courtid'];
            $c_name = $courts['courtname'];
            $c_type = $courts['courttype'];
            $c_city = $courts['courtcity'];
            $c_state = $courts['courtstate'];
            $c_country = $courts['courtcountry'];
        }
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
    <link rel="stylesheet" href="css/form.css">
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
                <a href="court.php" class="active">
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
                <span class="dashboard">Court Details (Update)</span>
            </div>
            <?php if (isset($_POST['update'])) { ?>
                <div class="alert" style="background-color: #009578; border-radius: 5px">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                    <strong>Success!</strong> The entered details have been updated.
                </div>
            <?php } ?>
            <div class="profile-details">
                <img src="images\profile.png" alt="user_image">
                <span class="admin_name">Admin</span>
            </div>
        </nav>

        <div class="home-content">
            <div class="overview-boxes">
                <div class="box">
                    <div class="right-side">
                        <div class="number">Please Change The Required Details To Update The Court</div>
                        <div class="container">
                            <div class="content">
                                <form method="POST">
                                    <div class="user-details">
                                        <div class="input-box">
                                            <span class="details"><label for="Cid">Court ID:</label></span>
                                            <input type="text" placeholder="Enter the Court ID" name="CourtID" id="Cid" pattern="[0-9]{5}" value="<?php echo $c_id ?>" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details"><label for="Cname">Court Name:</label></span>
                                            <input type="text" placeholder="Enter the Court Name" name="CourtName" id="Cname" value="<?php echo $c_name ?>" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details"><label for="Cty">Court Type:</label></span>
                                            <input type="text" placeholder="Enter the Court Type" name="CourtType" id="Cty" value="<?php echo $c_type ?>" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details"><label for="Ccty">City:</label></span>
                                            <input type="text" placeholder="Enter the City Where Court Is Located" name="CourtCity" id="Ccty" value="<?php echo $c_city ?>" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details"><label for="Cst">State:</label></span>
                                            <input type="text" placeholder="Enter the State Where Court Is Located" name="CourtState" id="Cst" value="<?php echo $c_state ?>" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details"><label for="Pcoun">Country:</label></span>
                                            <input type="text" placeholder="Enter the Country Where Court Is Located" name="CourtCountry" id="Pcoun" value="<?php echo $c_country ?>" required>
                                        </div>

                                    </div>

                                    <div class="add">
                                        <button name="update">Update Court</button>

                                    </div>
                                    <div class="goback">
                                        <a href="court.php"><input type="button" onclick="" value="Go Back"></a>
                                    </div>
                                </form>
                            </div>
                        </div>

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