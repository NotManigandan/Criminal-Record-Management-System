<?php

include('db_connect.php');

if (isset($_POST['bclkprison'])) {
    $prisonid = ($_POST['PrisonID']);
    $prisonname = ($_POST['PrisonName']);
    $prisontype = ($_POST['PrisonType']);
    $prisoncapacity = ($_POST['PrisonCapacity']);
    $prisoncity = ($_POST['PrisonCity']);
    $prisonstate = ($_POST['PrisonState']);
    $prisoncountry = ($_POST['PrisonCountry']);

    $sql = "INSERT INTO `prisons` (`prisonid`,`prisonname`,`prisontype`,`prisoncapacity`,`prisoncity`,`prisonstate`,`prisoncountry`) VALUES ('$prisonid', '$prisonname', '$prisontype','$prisoncapacity','$prisoncity','$prisonstate','$prisoncountry')";

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
    <script>
        $(".alert").alert('close')
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
                <a href="prison.php" class="active">
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
                <span class="dashboard">Prison Details (Add)</span>
            </div>
            <?php if (isset($_POST['bclkprison'])) { ?>
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
                        <div class="number">Please Fill The Required Details To Add The Prison</div>
                        <div class="container">
                            <div class="content">
                                <form method="POST" action="prisonadd.php">
                                    <div class="user-details">
                                        <div class="input-box">
                                            <span class="details"><label for="Prison ID">Prison ID:</label></span>
                                            <input type="text" placeholder="Enter the Prison ID" name="PrisonID" id="Pid" pattern="[0-9]{5}" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details"><label for="Prison Name">Prison Name:</label></span>
                                            <input type="text" placeholder="Enter the Prison Name" name="PrisonName" id="Pname" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details"><label for="Type">Prison Type:</label></span>
                                            <input type="text" placeholder="Enter the Prison Type" name="PrisonType" id="Pty" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details"><label for="Prison Capacity">Capacity:</label></span>
                                            <input type="text" placeholder="Enter the Prison Capacity" name="PrisonCapacity" id="Pcp" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details"><label for="City">City:</label></span>
                                            <input type="text" placeholder="Enter the City Where Prison is Located" name="PrisonCity" id="Pcty" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details"><label for="State">State:</label></span>
                                            <input type="text" placeholder="Enter the State Where Prison is Located" name="PrisonState" id="Pst" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details"><label for="Country">Country:</label></span>
                                            <input type="text" placeholder="Enter the Country Where Prison is Located" name="PrisonCountry" id="Pcoun" required>
                                        </div>
                                    </div>

                                    <div class="add">
                                        <button name="bclkprison">Add Prison</button>

                                    </div>
                                    <div class="goback">
                                        <a href="prison.php"><input type="button" onclick="" value="Go Back"></a>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>