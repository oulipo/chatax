<?php

include("../lib/connexion.php");

$user_id = $_POST["user_id"] ?? 0;
$room_id = $_POST["room_id"] ?? 0;
$message = $_POST["message"] ?? "";

if(!empty($message)) {
    $stmt = $pdo->prepare("INSERT INTO messages (user_id, room_id, message, created) VALUES (?,?,?,?)");
    $result = $stmt->execute([$user_id, $room_id, $message, (new DateTime("now"))->format("Y-m-d")]);
    if($result) {
        echo json_encode(["status" => "OK"]);
    } else {
        echo json_encode(["status" => "NOK"]);
    }
} else {
    echo json_encode(["status" => "NOK"]);
}
