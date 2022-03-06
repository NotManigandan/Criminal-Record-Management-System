<?php

require_once 'pdo_connect.php';

$id = $_POST['id'] ?? null;
if (!$id) {
    header('Location: queries.php');
    exit;
}

$statement = $pdo->prepare('DELETE FROM `query` WHERE `qid` = :id');
$statement->bindValue(':id', $id);
$statement->execute();

header('Location: queries.php');
