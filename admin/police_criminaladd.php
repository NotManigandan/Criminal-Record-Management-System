<?php

$msg = "";

require 'db_connect.php';

if (isset($_POST['bclkcri'])) {
    $Crimno = $_POST['CriminalNo'];
    $Crimname = $_POST['CriminalName'];
    $status = $_POST['Status'];
    $Height = $_POST['Height'];
    $Contact = $_POST['Contact'];
    $Ccommited = $_POST['Ccommited'];
    $Adress = $_POST['Adress'];
    $Nationality = $_POST['Nationality'];

    $target = "images/" . basename($_FILES['image']['name']);
    $image = $_FILES['image']['name'];

    // database insert SQL code
    $sql = "INSERT INTO `criminal` (`Crino`, `Criname`, `status`, `height`, `contact`, `crimes_comm`,`address`,`nationality`, `image`) VALUES ('$Crimno', '$Crimname', '$status', '$Height', '$Contact', '$Ccommited', '$Adress', '$Nationality', '$image')";

    $rs = mysqli_query($conn, $sql);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
    } else {
        $msg = "Failed to upload image";
    }

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
                <a href="../police/dashboard.html">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="police_police.php">
                    <i class='bx bx-list-ul'></i>
                    <span class="links_name">Police Details</span>
                </a>
            </li>
            <li>
                <a href="police_criminal.php" class="active">
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
                <span class="dashboard">Criminal Details (Add)</span>
            </div>
            <?php if (isset($_POST['bclkcri'])) { ?>
                <div class="alert" style="background-color: #009578; border-radius: 5px">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                    <strong>Success!</strong> The entered details have been added.
                </div>
            <?php } ?>
            <div class="profile-details">
                <img src="images\profile.png" alt="user_image">
                <span class="admin_name">Police</span>
            </div>
        </nav>

        <div class="home-content">
            <div class="overview-boxes">
                <div class="box">
                    <div class="right-side">
                        <div class="number">Please Fill The Required Details To Add The Criminal</div>
                        <div class="container">
                            <div class="content">
                                <form method="POST" action="police_criminaladd.php" enctype="multipart/form-data">
                                    <div class="user-details">
                                        <div class="input-box">
                                            <span class="details"><label for="Criminal Number">Criminal Number:</label></span>
                                            <input type="text" placeholder="Enter the Criminal Number" name="CriminalNo" id="Criminal Number" pattern="[0-9]{6}" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details"><label for="Criminal Name">Criminal Name:</label></span>
                                            <input type="text" placeholder="Enter the Criminal Name" name="CriminalName" id="Criminal Name" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details"><label for="Status">Status:</label></span>
                                            <input type="text" placeholder="Enter the Status of the Criminal" name="Status" id="Status" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details"><label for="Height">Height:</label></span>
                                            <input type="text" placeholder="Enter the Height of the Criminal" name="Height" id="Height" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details"><label for="Contact">Contact:</label></span>
                                            <input type="number" placeholder="Enter Contact Number of the Criminal/Criminal's Relative" name="Contact" id="Contact" pattern="[0-9]{10}" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details"><label for="Ccommited">Number of Crimes Commited:</label></span>
                                            <input type="number" placeholder="Enter the Number of Crimes Commited by the Criminal" name="Ccommited" id="Ccommited" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details"><label for="Adress">Address:</label></span>
                                            <input type="text" placeholder="Enter the Address of the Criminal" name="Adress" id="Adress" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details"><label for="Nationality">Nationality:</label></span>
                                            <input type="text" placeholder="Enter the Nationality of the Criminal" name="Nationality" id="Nationality" required>
                                        </div>
                                        <div>
                                            <span class="details"><label for="Pic">Upload a picture of the criminal:</label></span>
                                            <input class="input-box" type="file" name="image" id="Pic" accept="image/png, image/jpeg" required>
                                        </div>
                                    </div>

                                    <div class="add">
                                        <button name="bclkcri">Add Criminal</button>

                                    </div>
                                    <div class="goback">
                                        <a href="police_criminal.php"><input type="button" onclick="" value="Go Back"></a>
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