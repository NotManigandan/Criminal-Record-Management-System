<?php

include('db_connect.php');

$sql = 'SELECT * FROM prisons ORDER BY prisonstate';

$result = mysqli_query($conn, $sql);

$prisons = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);

mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">

<?php include('header.html'); ?>

<?php include('PrisonHeader.php'); ?>

<div id="main-div-2">

    <?php foreach ($prisons as $prison) { ?>
        <div class="div-2">
            <p><b>Prison ID: </b><?php echo htmlspecialchars($prison['prisonid']); ?></p>
            <p><b>Prison Name: </b><?php echo htmlspecialchars($prison['prisonname']); ?></p>
            <p><b>Type: </b><?php echo htmlspecialchars($prison['prisontype']); ?></p>
            <p><b>Capacity: </b><?php echo htmlspecialchars($prison['prisoncapacity']); ?></p>
            <p><b>City: </b><?php echo htmlspecialchars($prison['prisoncity']); ?></p>
            <p><b>State: </b><?php echo htmlspecialchars($prison['prisonstate']); ?></p>
            <p><b>Country: </b><?php echo htmlspecialchars($prison['prisoncountry']); ?></p>
        </div>
    <?php } ?>

</div>


</body>

</html>