<?php

include('db_connect.php');

$sql = 'SELECT * FROM police';

$result = mysqli_query($conn, $sql);

$polices = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);

mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">

<?php include('header.html'); ?>

<?php include('PoliceHeader.php'); ?>

<div id="main-div-2">

	<?php foreach ($polices as $police) { ?>
		<div class="div-2">
			<img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($police['image']); ?>" width=" 150" height="150">
			<p><b>Name: </b><?php echo htmlspecialchars($police['Poname']); ?></p>
			<p><b>Rank: </b><?php echo htmlspecialchars($police['porank']); ?></p>
			<p><b>Police Station: </b><?php echo htmlspecialchars($police['policestation']); ?></p>
			<p><b>Contact: </b><?php echo htmlspecialchars($police['contact']); ?></p>
			<p><b>Remark: </b><?php echo htmlspecialchars($police['remark']); ?></p>
			<p><b>Address: </b><?php echo htmlspecialchars($police['address']); ?></p>
			<p><b>Service Years: </b><?php echo htmlspecialchars($police['service_yrs']); ?></p>
		</div>
	<?php } ?>

</div>


</body>

</html>