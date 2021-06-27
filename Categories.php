<?php

include('db_connect.php');

$sql = 'SELECT * FROM categories ORDER BY Catno';

$result = mysqli_query($conn, $sql);

$categories = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);

mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">

<?php include('header.html'); ?>

<?php include('CategoryHeader.php'); ?>

<div id="main-div-2">

	<?php foreach ($categories as $category) { ?>
		<div class="div-2">
			<p><b>Category Number: </b><?php echo htmlspecialchars($category['Catno']); ?></p>
			<p><b>Category Name: </b><?php echo htmlspecialchars($category['Catname']); ?></p>
			<p><b>Sentence: </b><?php echo htmlspecialchars($category['Catsen']); ?></p>

		</div>
	<?php } ?>

</div>


</body>

</html>