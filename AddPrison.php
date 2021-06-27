<?php


$conn = mysqli_connect('localhost', 'mani1', 'mani2002', 'crms');

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
	} else {
		header("Location: Prison.php");
	}
}
mysqli_close($conn);

?>
<!DOCTYPE html>
<html lang="en">

<?php include('header.html'); ?>

<?php include('AddPrison.html'); ?>

<div class="form">
	<form method="POST" action="AddPrison.php">
		<div class="contain">
			<span id="title">
				<h1>Add Prison</h1>
				<p>Please fill the details of the new prison</p>
			</span>
			<hr>

			<label for="Prison ID"><b>Prison ID: </b></label>
			<input type="text" placeholder="Enter Prison ID" name="PrisonID" id="Pid" required>
			<br>

			<label for="Prison Name"><b>Prison Name: </b></label>
			<input type="text" placeholder="Enter Prison Name" name="PrisonName" id="Pname" required>
			<br>

			<label for="Type"><b>Type: </b></label>
			<input type="text" placeholder="Enter Prison Type" name="PrisonType" id="Pty" required>
			<br>

			<label for="Capacity"><b>Capacity: </b></label>
			<input type="text" placeholder="Enter Prison Capacity" name="PrisonCapacity" id="Pcp" required>
			<br>

			<label for="City"><b>City: </b></label>
			<input type="text" placeholder="Enter Prison City" name="PrisonCity" id="Pcty" required>
			<br>

			<label for="State"><b>State: </b></label>
			<input type="text" placeholder="Enter Prison State" name="PrisonState" id="Pst" required>
			<br>

			<label for="Country"><b>Country: </b></label>
			<input type="text" placeholder="Enter Prison Country" name="PrisonCountry" id="Pcoun" required>

			<a class=" button-1 btn btn-success btn-lg" href="Prison.php" role="button">Go Back</a>

			<button style="margin-left: 25em;" class=" button-1 btn btn-success btn-lg" value="Save" name="bclkprison">Save</button>
		</div>
	</form>
</div>

</body>

</html>