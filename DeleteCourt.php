<?php

include('db_connect.php');

if (isset($_POST['dltc'])) {
    $Cno = $_POST['cno'];

    // database insert SQL code
    $sql = "DELETE FROM `courts` WHERE `courtid` = '$Cno'";

    $rs = mysqli_query($conn, $sql);

    if (!$rs) {
        echo mysqli_error($conn);
    } else {
        header('Location: Court.php');
    }
}
mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">

<?php include('header.html'); ?>
<?php include('AddCourt.html'); ?>
<div class="form">
    <form method="POST" action="DeleteCourt.php">
        <div class="contain">
            <span id="title">
                <h1>Delete Court</h1>
                <p>Please fill the details of court to be deleted</p>
            </span>
            <hr>

            <label for="Name"><b>Court Number: </b></label>
            <input type="text" placeholder="Enter Court Number" name="cno" id="Name" required>
            <br>

            <a class=" button-1 btn btn-success btn-lg" href="Court.php" role="button">Go Back</a>
            &nbsp;
            &nbsp;
            &nbsp;
            &nbsp;
            &nbsp;
            &nbsp;
            &nbsp;
            &nbsp;
            &nbsp;
            &nbsp;
            &nbsp;
            &nbsp;
            &nbsp;
            &nbsp;
            <button class=" button-1 btn btn-danger btn-lg" value="Save" name="dltc">Delete</button>
        </div>
    </form>
</div>
</body>

</html>