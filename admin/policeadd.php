<?php

require_once 'db_connect.php';

if (isset($_POST['policebclk'])) {
    $id = $_POST['pid'];
    $Pname = $_POST['Name'];
    $Prank = $_POST['Rank'];
    $Pstation = $_POST['Pstation'];
    $PContact = $_POST['Contact'];
    $Premark = $_POST['Remark'];
    $Adress = $_POST['Adress'];
    $Pyrs = $_POST['Serviceyrs'];

    $target = "images/" . basename($_FILES['image']['name']);
    $image = $_FILES['image']['name'];

    // database insert SQL code
    $sql = "INSERT INTO `police` (`Poid`, `Poname`, `porank`, `policestation`, `contact`, `remark`,`address`,`service_yrs`, `image`) VALUES ('$id', '$Pname', '$Prank', '$Pstation', '$PContact', '$Premark', '$Adress', '$Pyrs', '$image')";

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
                <span class="dashboard">Police Details (Add)</span>
            </div>
            <?php if (isset($_POST['policebclk'])) { ?>
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
                        <div class="number">Please Fill The Required Details To Add The Police</div>
                        <div class="container">
                            <div class="content">
                                <form method="POST" action="policeadd.php" enctype="multipart/form-data">
                                    <div class="user-details">
                                        <div class="input-box">
                                            <span class="details"><label for="poid">Police ID:</label></span>
                                            <input type="number" placeholder="Enter the ID of the Police Officer" name="pid" id="poid" pattern="[0-9]{6}" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details"><label for="Name">Police Name:</label></span>
                                            <input type="text" placeholder="Enter the Name of the Police Officer" name="Name" id="Name" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details"><label for="Rank">Police Rank:</label></span>
                                            <input type="text" placeholder="Enter the Rank of the Police Officer" name="Rank" id="Rank" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details"><label for="Pstation">Police Station:</label></span>
                                            <input type="text" placeholder="Enter the name of the Police Station where the Police Officer is Working" name="Pstation" id="Pstation" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details"><label for="Contact">Contact Number:</label></span>
                                            <input type="number" placeholder="Enter the Contact Number of the Police Officer" name="Contact" id="Contact" pattern="[0-9]{10}" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details"> <label for="Remark">Remark:</label></span>
                                            <input type="text" placeholder="Enter the Remark of the Police Officer" name="Remark" id="Remark" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details"><label for="Adress">Address:</label></span>
                                            <input type="text" placeholder="Enter the Address of the Police Officer" name="Adress" id="Adress" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details"><label for="Serviceyrs">Service Time:</label></span>
                                            <input type="text" placeholder="Enter the Service Time of the Police Officer" name="Serviceyrs" id="Serviceyrs" required>
                                        </div>
                                        <div>
                                            <span class="details"><label for="Pic">Upload a picture of the Police Oficer:</label></span>
                                            <input class="input-box" type="file" name="image" id="Pic" accept="image/png, image/jpeg" required>
                                        </div>

                                    </div>

                                    <div class="add">
                                        <button name="policebclk">Add Police</button>

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