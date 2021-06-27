<?php

include('db_connect.php');

$sql = 'SELECT * FROM criminal';

$result = mysqli_query($conn, $sql);

$criminals = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);

mysqli_close($conn);

?>
<!DOCTYPE html>
<html lang="en">

<?php include('header.html'); ?>

<?php include('CriminalHeader.php'); ?>

<div id="main-div-2">

	<?php foreach ($criminals as $criminal) { ?>
		<div class="div-2">
			<?php 
			echo "<div id='img_div'>";
			echo "<img src='images/".$criminal['image']."' >"; 
			echo "</div>";
			?>
			<p><b>Criminal ID: </b><?php echo htmlspecialchars($criminal['Crino']); ?></p>
			<p><b>Criminal Name: </b><?php echo htmlspecialchars($criminal['Criname']); ?></p>
			<p><b>Height: </b><?php echo htmlspecialchars($criminal['height']); ?></p>
			<p><b>Address: </b><?php echo htmlspecialchars($criminal['address']); ?></p>
			<p><b>Contact: </b><?php echo htmlspecialchars($criminal['contact']); ?></p>
			<p><b>Nationality: </b><?php echo htmlspecialchars($criminal['nationality']); ?></p>
			<p><b>Crimes Comitted: </b><?php echo htmlspecialchars($criminal['crimes_comm']); ?></p>
			<p><b>Status: </b><?php echo htmlspecialchars($criminal['status']); ?></p>
			
		</div>
	<?php } ?>

</div>


</body>

</html>