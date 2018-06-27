<?php

include("../lib/connexion.php");
$nom = $_POST["nom"] ?? "";
if(!empty($nom)) {
    $stmt = $pdo->prepare("INSERT INTO rooms (nom, created) VALUES (?,?)");
    $result = $stmt->execute([$nom, (new DateTime("now"))->format("Y-m-d")]);
    if($result) {
        echo json_encode(["status" => "OK"]);
    } else {
        echo json_encode(["status" => "NOK"]);
    }
} else {
    echo json_encode(["status" => "NOK"]);
}
