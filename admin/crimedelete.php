<?php

require_once 'pdo_connect.php';

$id = $_POST['id'] ?? null;
if (!$id) {
    header('Location: crime.php');
    exit;
}

$statement = $pdo->prepare('DELETE FROM `crime` WHERE `Crino` = :id');
$statement->bindValue(':id', $id);
$statement->execute();

header('Location: crime.php');
