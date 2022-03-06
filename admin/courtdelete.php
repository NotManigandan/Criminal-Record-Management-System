<?php

require_once 'pdo_connect.php';

$id = $_POST['id'] ?? null;
if (!$id) {
    header('Location: court.php');
    exit;
}

$statement = $pdo->prepare('DELETE FROM `courts` WHERE `courtid` = :id');
$statement->bindValue(':id', $id);
$statement->execute();

header('Location: court.php');
