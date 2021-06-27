<?php

$msg="";

$conn = mysqli_connect('localhost', 'mani1', 'mani2002', 'crms');

if(isset($_POST['bclkcri']))
{
	$Crimno = $_POST['No'];
	$Crimname = $_POST['Name'];
	$status = $_POST['Status'];
	$Height = $_POST['Height'];
	$Contact = $_POST['Contact'];
	$Ccommited = $_POST['Ccommited'];
	$Adress = $_POST['Adress'];
	$Nationality = $_POST['Nationality'];

	$target = "images/".basename($_FILES['image']['name']);
	$image = $_FILES['image']['name'];

	// database insert SQL code
	$sql = "INSERT INTO `criminal` (`Crino`, `Criname`, `status`, `height`, `contact`, `crimes_comm`,`address`,`nationality`, `image`) VALUES ('$Crimno', '$Crimname', '$status', '$Height', '$Contact', '$Ccommited', '$Adress', '$Nationality', '$image')";

	$rs = mysqli_query($conn, $sql);

	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
		$msg = "Image uploaded successfully";
	}else{
		$msg = "Failed to upload image";
	}

	if(!$rs)
    {
        echo mysqli_error($conn);
    }
    else
    {
		header("Location: Criminals.php");
    }
}
mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">

<?php include('header.html'); ?>

<?php include('AddCriminal.html'); ?>

<div class="form">
    	<form method="Post" action="AddCriminal.php" enctype="multipart/form-data">
    		<div class = "contain">
				<span id="title">
    			<h1>Add Criminal</h1>
    			<p>Please fill the details of the new criminal</p>
				</span>
    			<hr>
				<label for="No"><b>Criminal Number: </b></label>
    			<input type="text" placeholder="Enter Criminal Number" name="No" id="No" required>
				<br>

    			<label for="Name"><b>Criminal Name: </b></label>
    			<input type="text" placeholder="Enter Name" name="Name" id="Name" required>
    			<br>

			    <label for="Status"><b>Status: </b></label>
			    <input type="text" placeholder="Enter Status" name="Status" id="Status" required>
			    <br>

			    <label for="Height"><b>Height: </b></label>
			    <input type="text" placeholder="Enter Height" name="Height" id="Height" required>
			    <br>

			    <label for="Contact"><b>Contact: </b></label>
			    <input type="text" placeholder="Enter Contact Number" name="Contact" id="Contact" required>
			    <br>

			    <label for="Ccommited"><b>Crimes Commited: </b></label>
			    <input type="text" placeholder="Enter Crimes Commited" name="Ccommited" id="Ccommited" required>
			    <br>

			    <label for="Adress"><b>Adress: </b></label>
			    <input type="text" placeholder="Enter Adress" name="Adress" id="Adress" required>
			    <br>

			    <label for="Nationality"><b>Nationality: </b></label>
			    <input type="text" placeholder="Enter Nationality" name="Nationality" id="Nationality" required>

			    <label for="Pic"><b>Please upload a picture of the criminal: </b></label>
			    <input type="file" name="image" id="Pic" accept="image/png, image/jpeg" required>

			    <a class=" button-1 btn btn-success btn-lg" href="Criminals.php" role="button">Go Back</a>

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
			    
			    
                <button style="width:15%; height:25%" class=" button-1 btn btn-success btn-lg" value="Save" name="bclkcri">Save</button>
			</div>
		</form>
	</div>
</body>
</html>