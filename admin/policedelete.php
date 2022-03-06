<?php

require_once 'pdo_connect.php';

$id = $_POST['id'] ?? null;
if (!$id) {
    header('Location: police.php');
    exit;
}

$statement = $pdo->prepare('DELETE FROM `police` WHERE `Poname` = :id');
$statement->bindValue(':id', $id);
$statement->execute();

header('Location: police.php');
