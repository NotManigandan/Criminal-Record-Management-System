<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$conn = mysqli_connect('localhost', 'mani1', 'mani2002', 'crms');

if (isset($_POST['policebclk'])) {
    $Pname = $_POST['Name'];
    $Prank = $_POST['Rank'];
    $Pstation = $_POST['Pstation'];
    $PContact = $_POST['Contact'];
    $Premark = $_POST['Remark'];
    $Adress = $_POST['Adress'];
    $Pyrs = $_POST['Serviceyrs'];
    $Pic = $_POST['Pic'];

    // database insert SQL code
    $sql = "INSERT INTO `police` (`Poname`, `porank`, `policestation`, `contact`, `remark`,`address`,`service_yrs`, `image`) VALUES ('$Pname', '$Prank', '$Pstation', '$PContact', '$Premark', '$Adress', '$Pyrs', '$Pic')";

    $rs = mysqli_query($conn, $sql);

    if (!$rs) {
        echo mysqli_error($conn);
    } else {
        header("Location: Police.php");
    }
}
mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">

<?php include('header.html'); ?>

<?php include('AddPolice.html'); ?>

<div class="form">
    <form method="POST" action="AddPolice.php" enctype="multipart/form-data">
        <div class="contain">
            <span id="title">
                <h1>Add Police</h1>
                <p>Please fill the details of the new police</p>
            </span>
            <hr>

            <label for="Name"><b>Name: </b></label>
            <input type="text" placeholder="Enter Name" name="Name" id="nm" required>
            <br>

            <label for="Rank"><b>Rank: </b></label>
            <input type="text" placeholder="Enter Rank" name="Rank" id="rk" required>
            <br>

            <label for="Pstation"><b>Police Station: </b></label>
            <input type="text" placeholder="Enter Police Station" name="Pstation" id="Ps" required>
            <br>

            <label for="Contact"><b>Contact Number: </b></label>
            <input type="text" placeholder="Enter Contact Number" name="Contact" id="ctc" required>
            <br>

            <label for="Remark"><b>Remark: </b></label>
            <input type="text" placeholder="Enter Remark" name="Remark" id="rmk" required>
            <br>

            <label for="Adress"><b>Address: </b></label>
            <input type="text" placeholder="Enter Adress" name="Adress" id="adr" required>
            <br>

            <label for="Serviceyrs"><b>Service years: </b></label>
            <input type="text" placeholder="Enter Service years" name="Serviceyrs" id="syrs" required>

            <label for="Pic"><b>Please upload a single picture of the police (Size should be less than 64KiB):</b></label>
            <input type="file" name="Pic" id="Pic" accept="image/png, image/jpeg" required>

            <a class=" button-1 btn btn-success btn-lg" href="Police.php" role="button">Go Back</a>
            <button style="margin-left: 25.2em;" class=" button-1 btn btn-success btn-lg" value="Save" name="policebclk">Save</button>
        </div>
    </form>
</div>
</body>

</html>