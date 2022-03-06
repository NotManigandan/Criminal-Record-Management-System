<?php

include('db_connect.php');


$fir_id = $_GET['id'] ?? null;
if (!$fir_id) {
    header('Location: fir.php');
    exit;
}

if (isset($_POST['update'])) {
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

    $sql = "UPDATE `fir` SET `firno` = '$fir_id', `firname` = '$name', `firfathername` =  '$fathername',`firmothername` =  '$mothername', `aadhar` = '$aadhar', `phno` = '$phno', `email` = '$email', `datetime` = '$dt', `placeocc` = '$place', `address` = '$addr', `crimedesc`= '$desc', `status` = '$status' WHERE `firno` = '$fir_id'";

    $result = $conn->query($sql);

    if ($result == TRUE) {
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_GET['id'])) {
    $fir_id = $_GET['id'];

    $sql = "SELECT * FROM `fir` WHERE `firno` = $fir_id";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($firs = $result->fetch_assoc()) {
            $cname = $firs['firname'];
            $fname = $firs['firfathername'];
            $mname = $firs['firmothername'];
            $aadharno = $firs['aadhar'];
            $cno = $firs['phno'];
            $mail = $firs['email'];
            $dattim = $firs['datetime'];
            $occ = $firs['placeocc'];
            $adres = $firs['address'];
            $cdesc = $firs['crimedesc'];
            $sta = $firs['status'];
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
                <span class="dashboard">First Information Report (Update)</span>
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
                        <div class="number">Please Change The Required Details To Update The FIR</div>
                        <div class="container">
                            <div class="content">
                                <form method="POST">
                                    <div class="user-details">
                                        <div class="input-box">
                                            <span class="details"><label>Complainant's Name:</label></span>
                                            <input type="text" name="name" value="<?php echo $cname ?>">
                                        </div>
                                        <div class="input-box">
                                            <span class="details"><label>Complainant's Father Name:</label></span>
                                            <input type="text" name="fname" value="<?php echo $fname ?>">
                                        </div>
                                        <div class="input-box">
                                            <span class="details"><label>Complainant's Mother Name:</label></span>
                                            <input type="text" name="mname" value="<?php echo $mname ?>">
                                        </div>
                                        <div class="input-box">
                                            <span class="details"><label>Complainant's Aadhar Number:</label></span>
                                            <input type="number" name="aadhar" value="<?php echo $aadharno ?>">
                                        </div>
                                        <div class="input-box">
                                            <span class="details"><label>Complainant's Contact Number:</label></span>
                                            <input type="number" name="phno" value="<?php echo $cno ?>">
                                        </div>
                                        <div class="input-box">
                                            <span class="details"><label>Complainant's Email ID:</label></span>
                                            <input type="text" name="mail" value="<?php echo $mail ?>">
                                        </div>
                                        <div class="input-box">
                                            <span class="details"><label>Date and Time of the Occurence of the Crime: </label></span>
                                            <input type="datetime" name="dt" value="<?php echo $dattim ?>">
                                        </div>
                                        <div class="input-box">
                                            <span class="details"><label>Place of Occurence of the Crime:</label></span>
                                            <input type="text" name="place" value="<?php echo $occ ?>">
                                        </div>
                                        <div class="input-box">
                                            <span class="details"><label>Complainant's Home Address: </label></span>
                                            <input type="text" name="address" value="<?php echo $adres ?>">
                                        </div>
                                        <div class="input-box">
                                            <span class="details"><label>Crime Description:</label></span>
                                            <input type="text" name="desc" value="<?php echo $cdesc ?>">
                                        </div>
                                        <div class="input-box">
                                            <span class="details"><label>Case Status (Pending/On Action/Closed):</label></span>
                                            <input type="text" name="status" value="<?php echo $sta ?>">
                                        </div>

                                    </div>

                                    <div class="add">
                                        <button name="update">Update FIR</button>
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