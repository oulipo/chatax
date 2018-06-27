<?php

include("../lib/connexion.php");
$room_id = $_POST["room_id"];

$stmt = $pdo->prepare("SELECT * FROM msgs WHERE room_id = ?");
$stmt->execute([$room_id]);
$messages = $stmt->fetchAll();

echo json_encode([
    "status" => "OK",
    "messages" => $messages
]);