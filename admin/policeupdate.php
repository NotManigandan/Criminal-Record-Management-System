<?php

require 'db_connect.php';


$poli_id = $_GET['id'] ?? null;
if (!$poli_id) {
    header('Location: police.php');
    exit;
}

if (isset($_POST['update'])) {
    $id_ = $_POST['pid'];
    $P_name = $_POST['Name'];
    $P_rank = $_POST['Rank'];
    $P_station = $_POST['Pstation'];
    $P_Contact = $_POST['Contact'];
    $P_remark = $_POST['Remark'];
    $Adress_ = $_POST['Adress'];
    $P_yrs = $_POST['Serviceyrs'];

    // database insert SQL code
    $sql = "UPDATE `police` SET `Poid` = '$poli_id', `Poname` = '$P_name', `porank` =  '$P_rank',`policestation` =  '$P_station', `contact` = '$P_Contact', `remark` = '$P_remark', `address` = '$Adress_', `service_yrs` = '$P_yrs' WHERE `Poid` = '$poli_id'";

    $result = $conn->query($sql);

    if ($result == TRUE) {
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_GET['id'])) {
    $poli_id = $_GET['id'];

    $sql = "SELECT * FROM `police` WHERE `Poid` = $poli_id";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($pis = $result->fetch_assoc()) {
            $poli_name = $pis['Poname'];
            $poli_rank = $pis['porank'];
            $poli_station = $pis['policestation'];
            $contct = $pis['contact'];
            $rmek = $pis['remark'];
            $addrss = $pis['address'];
            $s_yrs = $pis['service_yrs'];
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
                <a href="police.php" class="active">
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
                <span class="dashboard">Police Details (Update)</span>
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
                        <div class="number">Please Change The Required Details To Update The Police</div>
                        <div class="container">
                            <div class="content">
                                <form method="POST">
                                    <div class="user-details">
                                        <div class="input-box">
                                            <span class="details"><label for="poid">Police ID:</label></span>
                                            <input type="number" placeholder="Enter the ID of the Police Officer" name="pid" id="poid" pattern="[0-9]{6}" value="<?php echo $poli_id ?>" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details"><label for="Name">Police Name:</label></span>
                                            <input type="text" placeholder="Enter the Name of the Police Officer" name="Name" id="Name" value="<?php echo $poli_name ?>" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details"><label for="Rank">Police Rank:</label></span>
                                            <input type="text" placeholder="Enter the Rank of the Police Officer" name="Rank" id="Rank" value="<?php echo $poli_rank ?>" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details"><label for="Pstation">Police Station:</label></span>
                                            <input type="text" placeholder="Enter the name of the Police Station where the Police Officer is Working" name="Pstation" id="Pstation" value="<?php echo $poli_station ?>" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details"><label for="Contact">Contact Number:</label></span>
                                            <input type="number" placeholder="Enter the Contact Number of the Police Officer" name="Contact" id="Contact" pattern="[0-9]{10}" value="<?php echo $contct ?>" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details"> <label for="Remark">Remark:</label></span>
                                            <input type="text" placeholder="Enter the Remark of the Police Officer" name="Remark" id="Remark" value="<?php echo $rmek ?>" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details"><label for="Adress">Address:</label></span>
                                            <input type="text" placeholder="Enter the Address of the Police Officer" name="Adress" id="Adress" value="<?php echo $addrss ?>" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details"><label for="Serviceyrs">Service Time:</label></span>
                                            <input type="text" placeholder="Enter the Service Time of the Police Officer" name="Serviceyrs" id="Serviceyrs" value="<?php echo $s_yrs ?>" required>
                                        </div>
                                    </div>

                                    <div class="add">
                                        <button name="update">Update Police</button>

                                    </div>
                                    <div class="goback">
                                        <a href="police.php"><input type="button" onclick="" value="Go Back"></a>
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