<?php

include('db_connect.php');

if (isset($_POST['bclkcourt'])) {
    $courtid = ($_POST['CourtID']);
    $courtname = ($_POST['CourtName']);
    $courttype = ($_POST['CourtType']);
    $courtcity = ($_POST['CourtCity']);
    $courtstate = ($_POST['CourtState']);
    $courtcountry = ($_POST['CourtCountry']);

    $sql = "INSERT INTO `courts` (`courtid`,`courtname`,`courttype`,`courtcity`,`courtstate`,`courtcountry`) VALUES ('$courtid', '$courtname', '$courttype','$courtcity','$courtstate','$courtcountry')";

    $rs = mysqli_query($conn, $sql);
    if (!$rs) {
        echo mysqli_error($conn);
    }
}
mysqli_close($conn);
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
                <span class="dashboard">Court Details (Add)</span>
            </div>
            <?php if (isset($_POST['bclkcourt'])) { ?>
                <div class="alert" style="background-color: #009578; border-radius: 5px">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                    <strong>Success!</strong> The entered details have been added.
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
                        <div class="number">Please Fill The Required Details To Add The Court</div>
                        <div class="container">
                            <div class="content">
                                <form method="POST" action="courtadd.php">
                                    <div class="user-details">
                                        <div class="input-box">
                                            <span class="details"><label for="Cid">Court ID:</label></span>
                                            <input type="text" placeholder="Enter the Court ID" name="CourtID" id="Cid" pattern="[0-9]{5}" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details"><label for="Cname">Court Name:</label></span>
                                            <input type="text" placeholder="Enter the Court Name" name="CourtName" id="Cname" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details"><label for="Cty">Court Type:</label></span>
                                            <input type="text" placeholder="Enter the Court Type" name="CourtType" id="Cty" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details"><label for="Ccty">City:</label></span>
                                            <input type="text" placeholder="Enter the City Where Court Is Located" name="CourtCity" id="Ccty" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details"><label for="Cst">State:</label></span>
                                            <input type="text" placeholder="Enter the State Where Court Is Located" name="CourtState" id="Cst" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details"><label for="Pcoun">Country:</label></span>
                                            <input type="text" placeholder="Enter the Country Where Court Is Located" name="CourtCountry" id="Pcoun" required>
                                        </div>

                                    </div>

                                    <div class="add">
                                        <button name="bclkcourt">Add Court</button>

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