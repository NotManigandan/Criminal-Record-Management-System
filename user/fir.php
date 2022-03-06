<?php

include("db_connect.php");

$user_id = $_GET['id'] ?? null;

if (!$user_id) {
    header('Location: dashboard.php');
    exit;
}

$idsql = "SELECT * FROM `users` WHERE `Aadhar`='$user_id'";

$idresult = $conn->query($idsql);

if ($idresult->num_rows > 0) {
    while ($id = $idresult->fetch_assoc()) {
        $uid = $id['Full_Name'];
    }
}


if (isset($_POST['report'])) {
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

    $sql = "INSERT INTO `fir` (`firname`, `firfathername`, `firmothername`, `aadhar`, `phno`, `email`, `datetime`, `placeocc`,  `address`, `crimedesc`, `status`) VALUES ('$name', '$fathername', '$mothername', '$aadhar', '$phno', '$email', '$dt', '$place', '$addr', '$desc', 'Pending')";

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
<style>
    form .add {
        height: 45px;
        margin: 35px 0
    }

    form .add button {
        height: 100%;
        width: 100%;
        border-radius: 5px;
        border: none;
        color: #fff;
        justify-content: center;
        align-items: center;
        font-size: 18px;
        font-weight: 500;
        letter-spacing: 1px;
        cursor: pointer;
        transition: all 0.3s linear;
        background: linear-gradient(135deg, #008168, #009578);
    }

    form .add button:hover {
        /* transform: scale(0.99); */
        transition-delay: 2s;
        background: linear-gradient(-135deg, #008168, #009578);
    }
</style>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <i class='bx bx-book-reader'></i>
            <span class="logo_name">CRMS</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="dashboard.php?id=<?php echo $user_id ?>">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="fir.php?id=<?php echo $user_id ?>" class="active">
                    <i class='bx bx-book-add'></i>
                    <span class="links_name">File a FIR</span>
                </a>
            </li>
            <li>
                <a href="firfiled.php?id=<?php echo $user_id ?>">
                    <i class='bx bx-book-alt'></i>
                    <span class="links_name">Filed FIRs</span>
                </a>
            </li>
            <li>
                <a href="nearbypolicestation.php?id=<?php echo $user_id ?>">
                    <i class='bx bx-current-location'></i>
                    <span class="links_name">Nearby Police Station</span>
                </a>
            </li>
            <li>
                <a href="court.php?id=<?php echo $user_id ?>">
                    <i class='bx bx-buildings'></i>
                    <span class=" links_name">Court Details</span>
                </a>
            </li>
            <li>
                <a href="queries.php?id=<?php echo $user_id ?>">
                    <i class='bx bx-message-alt-add'></i>
                    <span class="links_name">Ask Your Queries</span>
                </a>
            </li>
            <li>
                <a href="queryanswered.php?id=<?php echo $user_id ?>">
                    <i class='bx bx-message-alt-check'></i>
                    <span class="links_name">Asked Queries</span>
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
                <span class="dashboard">File a First Information Report (FIR)</span>
            </div>
            <?php if (isset($_POST['report'])) { ?>
                <div class="alert" style="background-color: #009578; border-radius: 5px">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                    <strong>Success!</strong> The FIR has been filed.
                </div>
            <?php } ?>
            <div class="profile-details">
                <img src="images\profile.png" alt="user_image">
                <span class="admin_name"><?php echo $uid ?></span>
            </div>
        </nav>

        <div class="home-content">
            <div class="overview-boxes">
                <div class="box">
                    <div class="right-side">
                        <div class="number">Please Fill The Required Details To File A Complaint</div>
                        <div class="container">
                            <div class="content">
                                <form action="fir.php?id=<?php echo $user_id ?>" method="POST">
                                    <div class="user-details">
                                        <div class="input-box">
                                            <span class="details"><label for="nme">Name</label></span>
                                            <input type="text" id="nme" name="name" placeholder=" Enter Your Name" required>
                                        </div>
                                        <br>
                                        <div class="input-box">
                                            <span class="details"><label for="fnme">Father Name</label></span>
                                            <input type="text" id="fnme" name="fname" placeholder="Enter Your Father's Name" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details"><label for="mnme">Mother Name</label></span>
                                            <input type="text" id="mnme" name="mname" placeholder="Enter Your Mother's Name" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details"><label for="ph">Phone Number</label></span>
                                            <input type="tel" id="ph" name="phno" pattern="[0-9]{10}" placeholder="Enter Your Phone Number" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details"><label for="adhar">Aadhar Number</label></span>
                                            <input type="tel" id="adhar" name="aadhar" pattern="[0-9]{12}" placeholder="Enter Your Aadhar Number" required>
                                        </div>

                                        <div class="input-box">
                                            <span class="details"><label for="maill">Email</label></span>
                                            <input type="email" id="maill" name="mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Enter Your Email" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details"><label for="dtoc">Date And Time Of Occurence</label></span>
                                            <input type="datetime-local" id="dtoc" name="dt" placeholder="Enter Your Email" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details"><label for="ploc">Place Of Occurence</label></span>
                                            <input type="text" id="ploc" name="place" placeholder="Enter The Place Of Occurence" required>
                                        </div>
                                        <div class="input-box">
                                            <span class="details"><label for="addr">Address</label></span>
                                            <textarea id="addr" name="address" placeholder="Enter Your Address" style="height:200px"></textarea>
                                        </div>

                                        <div class="input-box">
                                            <span class="details"><label for="cdesc">Crime Description</label></span>
                                            <textarea id="cdesc" name="desc" placeholder="Describe The Crime Sequence" style="height:200px"></textarea>
                                        </div>

                                    </div>
                                    <div class="add">
                                        <button name="report">Report</button>
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