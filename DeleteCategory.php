<?php

include('db_connect.php');

if (isset($_POST['dltc'])) {
    $Cno = $_POST['cno'];

    // database insert SQL code
    $sql = "DELETE FROM `categories` WHERE `Catno` = '$Cno'";

    $rs = mysqli_query($conn, $sql);

    if (!$rs) {
        echo mysqli_error($conn);
    } else {
        header('Location: Categories.php');
    }
}
mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">

<?php include('header.html'); ?>
<?php include('AddCategory.html'); ?>
<div class="form">
    <form method="POST" action="DeleteCategory.php">
        <div class="contain">
            <span id="title">
                <h1>Delete Category</h1>
                <p>Please fill the details of cateogory to be deleted</p>
            </span>
            <hr>

            <label for="Name"><b>Category Number: </b></label>
            <input type="text" placeholder="Enter Category Number" name="cno" id="Name" required>
            <br>

            <a class=" button-1 btn btn-success btn-lg" href="Categories.php" role="button">Go Back</a>
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