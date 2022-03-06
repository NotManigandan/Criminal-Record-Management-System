<?php

include("db_connect.php");


$cri_id = $_GET['id'] ?? null;
if (!$cri_id) {
    header('Location: crime.php');
    exit;
}

if (isset($_POST['update'])) {
    $crimno = $_POST['CriminalNo'];
    $crimname = $_POST['CriminalName'];
    $crimcom = $_POST['CrimeComm'];
    $crimdatme = $_POST['CrimeDateTime'];
    $jailsent = $_POST['JailSentence'];

    $sql = "UPDATE `crime` SET `Crino` = '$cri_id', `Criname` = '$crimname', `Cricomm` =  '$crimcom', `Cridt` =  '$crimdatme', `Jailsen` = '$jailsent' WHERE `Crino` = $cri_id";

    $result = $conn->query($sql);

    if ($result == TRUE) {
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_GET['id'])) {
    $cri_id = $_GET['id'];

    $sql = "SELECT * FROM crime WHERE `Crino` = $cri_id";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($cris = $result->fetch_assoc()) {
            $crim_no = $cris['Crino'];
            $crim_name = $cris['Criname'];
            $crim_com = $cris['Cricomm'];
            $crim_dte = $cris['Cridt'];
            $jail_sent = $cris['Jailsen'];
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
                <a href="crime.php" class="active">
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
                <span class="dashboard">Crime Details (Update)</span>
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
                        <div class="number">Please Change The Required Details To Update The Crime</div>
                        <div class="container">
                            <div class="content">
                                <form method="POST">
                                    <div class="user-details">
                                        <div class="input-box">
                                            <span class="details"><label for="Criminal Number">Criminal Number:</label></span>
                                            <input type="text" placeholder="Enter the Criminal Number" name="CriminalNo" id="Criminal Number" value="<?php echo $crim_no ?>" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details"><label for="Criminal Name">Criminal Name:</label></span>
                                            <input type="text" placeholder="Enter the Criminal Name" name="CriminalName" id="Criminal Name" value="<?php echo $crim_name ?>" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details"><label for="Category">Crimes Committed:</label></span>
                                            <input type="text" placeholder="Enter the Crimes Committed by the Criminal" name="CrimeComm" id="Category" value="<?php echo $crim_com ?>" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details"><label for="Date">Date and Time of the Occurrence of the Crime:</label></span>
                                            <input placeholder="Enter the Date and Time of the Occurrence of the Crime" name="CrimeDateTime" id="Date" value="<?php echo $crim_dte ?>" required>
                                        </div>
                                        <div class="input-box">

                                            <span class="details"><label for="Crime Number">Jail Sentence:</label></span>
                                            <input type="text" placeholder="Enter the Jail Sentence" name="JailSentence" id="Crime Number" value="<?php echo $jail_sent ?>" required>
                                        </div>

                                    </div>

                                    <div class="add">
                                        <button name="update">Update Crime</button>
                                    </div>
                                    <div class="goback">
                                        <a href="crime.php"><input type="button" onclick="" value="Go Back"></a>
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