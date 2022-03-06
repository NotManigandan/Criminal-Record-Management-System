<?php

require_once 'pdo_connect.php';

$id = $_POST['id'] ?? null;
if (!$id) {
    header('Location: prison.php');
    exit;
}

$statement = $pdo->prepare('DELETE FROM `prisons` WHERE `prisonid` = :id');
$statement->bindValue(':id', $id);
$statement->execute();

header('Location: prison.php');
