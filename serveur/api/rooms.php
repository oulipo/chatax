<?php

include("../lib/connexion.php");

$stmt = $pdo->prepare("SELECT * FROM rooms");
$stmt->execute();
$rooms = $stmt->fetchAll();

echo json_encode($rooms);