<?php

include("../lib/connexion.php");

$stmt = $pdo->prepare("SELECT * FROM users");
$stmt->execute();
$users = $stmt->fetchAll();

echo json_encode($users);