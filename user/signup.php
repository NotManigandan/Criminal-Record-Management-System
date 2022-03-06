<?php

include 'db_connect.php';
if (isset($_POST["loginbutton"])) {
    $full_name = $_POST["Fname"];
    $adar_num = $_POST["Aadharno"];
    $fon_num = $_POST["PhNo"];
    $mail_id = $_POST["EmailID"];
    $pass = md5($_POST["Cpass"]);

    $sql = "INSERT INTO `users` (`User_id`,`Aadhar`,`Pass`,`Full_Name`,`email`,`phno`) VALUES (NULL, '$adar_num', '$pass', '$full_name', '$mail_id', '$fon_num')";

    $rs = mysqli_query($conn, $sql);

    if (!$rs) {
        echo mysqli_error($conn);
    }
}
mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criminal Record Management System</title>
    <link rel="stylesheet" type="text/css" href="css/signup.css">
</head>

<body>
    <div class="loginbox">
        <img src="images/avatar.jpg" class="avatar">
        <h1>CRMS</h1>
        <form action="signup.php" method="POST">
            <h1>User Sign Up</h1>
            <label for="Fullname"><b>Name</b></label>
            <input type="text" name="Fname" placeholder="Enter the Full name" id="Fullname" required>
            <label for="Aadhar Card Number"><b>Aadhar Card Number</b></label>
            <input type="text" name="Aadharno" placeholder="Enter the Aadhar Card Number" id="Aadhar Card Number" required>
            <label for="Phone Number"><b>Phone Number</b></label>
            <input type="text" name="PhNo" placeholder="Enter the Phone Number" id="Phone Number" required>
            <label for="Email ID"><b>Email ID</b></label>
            <input type="text" name="EmailID" placeholder="Enter the Email ID" id="Email ID" required>
            <label for="password"><b>Password</b></label>
            <input type="password" name="Cpass" placeholder="Enter the Password" id="password" required>
            <input type="submit" name="loginbutton" value="Sign Up">
        </form>
    </div>
</body>

</html>