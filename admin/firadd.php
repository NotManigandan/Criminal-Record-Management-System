<?php

include("db_connect.php");


if (isset($_POST['bclkfir'])) {
    $name = $_POST['name'];
    $fathername = $_POST['fname'];
    $mothername = $_POST['mname'];
    $aadhar = $_POST['aadhar'];
    $phno = $_POST['phno'];
    $email = $_POST['mail'];
    $dt = $_POST['dt'];
    $place = $_POST['place'];
    $addr = $_POST['address'];
    $desc = $_POST['desc'];
    $status = $_POST['status'];

    $sql = "INSERT INTO `fir` (`firname`, `firfathername`, `firmothername`, `aadhar`, `phno`, `email`, `datetime`, `placeocc`,  `address`, `crimedesc`, `status`) VALUES ('$name', '$fathername', '$mothername', '$aadhar', '$phno', '$email', '$dt', '$place', '$addr', '$desc', '$status')";

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
                <span class="dashboard">First Information Report (Add)</span>
            </div>
            <?php if (isset($_POST['bclkfir'])) { ?>
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
                        <div class="number">Please Fill The Required Details To Add The FIR</div>
                        <div class="container">
                            <div class="content">
                                <form method="POST" action="firadd.php">
                                    <div class="user-details">
                                        <div class="input-box">
                                            <span class="details"><label for="name">Complainant's Name:</label></span>
                                            <input type="text" name="name" placeholder="Enter the Complainant's Name" id="name" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details"><label for="fname">Complainant's Father Name:</label></span>
                                            <input type="text" name="fname" placeholder="Enter the Complainant's Father Name" id="fname" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details"><label for="mname">Complainant's Mother Name:</label></span>
                                            <input type="text" name="mname" placeholder="Enter the Complainant's Mother Name" id="mname" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details"><label for="aadhar">Complainant's Aadhar Number:</label></span>
                                            <input type="number" name="aadhar" placeholder="Enter the Complainant's Aadhar Number" id="aadhar" pattern="[0-9]{12}" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details"><label for="no">Complainant's Contact Number:</label></span>
                                            <input type="number" name="phno" placeholder="Enter the Complainant's Contact Number" id="no" pattern="[0-9]{10}" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details"><label for="mail">Complainant's Email ID:</label></span>
                                            <input type="email" name="mail" placeholder="Enter the Complainant's Email ID" id="mail" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details"><label for="date">Date and Time of the Occurence of the Crime: </label></span>
                                            <input type="datetime-local" name="dt" placeholder="Enter the Date and Time of the Occurence of the Crime" id="date" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details"><label for="place">Place of Occurence of the Crime:</label></span>
                                            <input type="text" name="place" placeholder="Enter the Place of Occurence of the Crime" id="place" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details"><label for="address">Complainant's Home Address:</label></span>
                                            <input type="text" name="address" placeholder="Enter the Complainant's Home Address" id="address" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details"><label for="cdesc">Crime Description:</label></span>
                                            <input type="text" name="desc" placeholder="Enter the Description of the Crime" id="cdesc" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details"><label for="status">Case Status (Pending/On Action/Closed):</label></span>
                                            <input type="text" name="status" placeholder="Enter the Case Status (Pending/On Action/Closed)" id="status" required>
                                        </div>

                                    </div>

                                    <div class="add">
                                        <button name="bclkfir">Add FIR</button>

                                    </div>
                                    <div class="goback">
                                        <a href="fir.php"><input type="button" onclick="" value="Go Back"></a>
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