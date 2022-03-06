<?php

require_once 'pdo_connect.php';

$id = $_POST['id'] ?? null;
if (!$id) {
    header('Location: fir.php');
    exit;
}

$statement = $pdo->prepare('DELETE FROM `fir` WHERE `firno` = :id');
$statement->bindValue(':id', $id);
$statement->execute();

header('Location: fir.php');
