<?php

include('db_connect.php');

$sql = 'SELECT * FROM crimes ORDER BY Crino';

$result = mysqli_query($conn, $sql);

$crimes = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);

mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">

<?php include('header.html'); ?>

<?php include('CrimeHeader.php'); ?>

<div id="main-div-2">

	<?php foreach ($crimes as $crime) { ?>
		<div class="div-2">
			<p><b>Criminal Number: </b><?php echo htmlspecialchars($crime['Crino']); ?></p>
			<p><b>Criminal Name: </b><?php echo htmlspecialchars($crime['Criname']); ?></p>
			<p><b>Crime No: </b><?php echo htmlspecialchars($crime['Crno']); ?></p>
			<p><b>Crime Category: </b><?php echo htmlspecialchars($crime['Crname']); ?></p>
			<p><b>Date of Crime: </b><?php echo htmlspecialchars($crime['Crdate']); ?></p>
		</div>
	<?php } ?>

</div>


</body>

</html>