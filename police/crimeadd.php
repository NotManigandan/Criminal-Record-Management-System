<?php

include("db_connect.php");


if (isset($_POST['bclkcrime'])) {
    $crino = $_POST['CriminalNo'];
    $criname = $_POST['CriminalName'];
    $cricomm = $_POST['CrimeComm'];
    $cridatetime = $_POST['CrimeDateTime'];
    $jsen = $_POST['JailSentence'];


    $sql = "INSERT INTO `crime` (`Crino`, `Criname`, `Cricomm`, `Cridt`, `Jailsen`) VALUES ('$crino', '$criname', '$cricomm', '$cridatetime', '$jsen')";

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
                <a href="crime.php" class="active">
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
                <span class="dashboard">Crime Details (Add)</span>
            </div>
            <?php if (isset($_POST['bclkcrime'])) { ?>
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
                        <div class="number">Please Fill The Required Details To Add The Crime</div>
                        <div class="container">
                            <div class="content">
                                <form method="POST" action="crimeadd.php">
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
                                            <span class="details"><label for="Category">Crimes Committed:</label></span>
                                            <input type="text" placeholder="Enter the Crimes Committed by the Criminal" name="CrimeComm" id="Category" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details"><label for="Date">Date and Time of the Occurrence of the Crime:</label></span>
                                            <input type="datetime-local" placeholder="Enter the Date and Time of the Occurrence of the Crime" name="CrimeDateTime" id="Date" required>
                                        </div>
                                        <div class="input-box">

                                            <span class="details"><label for="Crime Number">Jail Sentence:</label></span>
                                            <input type="text" placeholder="Enter the Jail Sentence" name="JailSentence" id="Crime Number" required>
                                        </div>

                                    </div>

                                    <div class="add">
                                        <button name="bclkcrime">Add Crime</button>

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