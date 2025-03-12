<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=names;charset=utf8mb4', 'names', 'HCfD7xSPnnDgCOeT', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
}
catch (PDOException $e) {
    // var_dump($e->getMessage());
    echo 'A problem occured with the database connection...';
    die();
}

$stmt = $pdo->prepare('SELECT * FROM `names`');
$stmt->execute();
$data = $stmt->fetch(PDO::FETCH_ASSOC);
var_dump($data);