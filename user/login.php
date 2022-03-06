<?php
session_start();
$error = "";
if (isset($_POST['loginbutton'])) {
    $Username = $_POST['uname'];
    $Pass = md5($_POST['pass']);
    extract($_POST);
    include 'db_connect.php';
    $sql = mysqli_query($conn, "SELECT * FROM users where Aadhar='$Username' and Pass='$Pass'");
    $row  = mysqli_fetch_array($sql);
    if (is_array($row)) {
        $_SESSION["uname"] = $row['Username'];
        $_SESSION["Pass"] = $row['Pass'];
        header("Location: dashboard.php?id=$Username");
    } else {
        $error = "Invalid Credentials";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criminal Record Management System</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>

<body>
    <div class="loginbox" style="height: 450px;">
        <img src="images/avatar.jpg" class="avatar">
        <h1> CRMS</h1>
        <form action="login.php" method="post">
            <h1>User Login</h1>
            <?php if (isset($_GET['error'])) { ?>
                <p class="error">
                    <?php echo $_GET['error']; ?>
                </p>
            <?php } ?>
            <label for="username"><b>Aadhar Number</b></label>
            <input type="text" name="uname" placeholder="Enter the Aadhar Number" id="username" required>
            <label for="password"><b>Password</b></label>
            <input type="password" name="pass" placeholder="Enter the Password" id="password" required>
            <p style="color: #ff0033; text-align: center"><?php echo $error; ?></p>
            <input type="submit" name="loginbutton" value="Login">
        </form>
        <a style="text-decoration: none; color: #000" href="signup.php"><b>New User? Click here to Sign Up !</b></a>
    </div>
</body>

</html>