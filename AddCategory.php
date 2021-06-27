<?php

$conn = mysqli_connect('localhost', 'mani1', 'mani2002', 'crms');

if (isset($_POST['bclkcategory'])) {
    $Catname = $_POST['CategoryName'];
    $Catno = $_POST['CategoryNumber'];
    $Catsen = $_POST['Sentence'];

    // database insert SQL code
    $sql = "INSERT INTO `categories` (`Catno`, `Catname`, `Catsen`) VALUES('$Catno', '$Catname', '$Catsen')";

    $rs = mysqli_query($conn, $sql);

    if (!$rs) {
        echo mysqli_error($conn);
    } else {
        header("Location: Categories.php");
    }
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<?php include('header.html'); ?>

<?php include('AddCategory.html'); ?>

<div class="form">
    <form method="POST" action="AddCategory.php">
        <div class="contain">
            <span id="title">
                <h1>Add Category</h1>
                <p>Please fill the details of the new category</p>
            </span>
            <hr>

            <label for="Category Number"><b>Category Number: </b></label>
            <input type="text" placeholder="Enter Category Number" name="CategoryNumber" id="Catno" required>
            <br>

            <label for="Category Name"><b>Category Name: </b></label>
            <input type="text" placeholder="Enter Name of Category" name="CategoryName" id="Catname" required>
            <br>



            <label for="Sentence"><b>Jail Sentence: </b></label>
            <input type="text" placeholder="Enter Length of Sentence" name="Sentence" id="Catsen" required>
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
            &nbsp;
            &nbsp;
            &nbsp;
            &nbsp;
            <button class=" button-1 btn btn-success btn-lg" value="Save" name="bclkcategory">Save</button>
        </div>
    </form>
</div>
</body>

</html>