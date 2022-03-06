<?php

require_once 'pdo_connect.php';

$id = $_POST['id'] ?? null;
if (!$id) {
    header('Location: criminal.php');
    exit;
}

$statement = $pdo->prepare('DELETE FROM `criminal` WHERE `Crino` = :id');
$statement->bindValue(':id', $id);
$statement->execute();

header('Location: criminal.php');
