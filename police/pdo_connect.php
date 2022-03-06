<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=crms', 'mani1', 'mani2002');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
