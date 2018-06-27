<?php

include("../lib/connexion.php");

$emetteur = $_POST["emetteur"] ?? 0;
$recepteur = $_POST["recepteur"] ?? 0;
$message = $_POST["message"] ?? "";

if(!empty($message)) {
    $stmt = $pdo->prepare("INSERT INTO mps (emetteur, recepteur, message, created) VALUES (?,?,?,?)");
    $result = $stmt->execute([$emetteur, $recepteur, $message, (new DateTime("now"))->format("Y-m-d")]);
    if($result) {
        echo json_encode(["status" => "OK"]);
    } else {
        echo json_encode(["status" => "NOK"]);
    }
} else {
    echo json_encode(["status" => "NOK"]);
}
