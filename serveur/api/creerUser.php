<?php

include("../lib/connexion.php");
$pseudo = $_POST["pseudo"] ?? "";
if(!empty($pseudo)) {
    $stmt = $pdo->prepare("INSERT INTO users (pseudo, created) VALUES (?,?)");
    $result = $stmt->execute([$pseudo, (new DateTime("now"))->format("Y-m-d")]);
    if($result) {
        $id = $pdo->lastInsertId();
        echo json_encode(["status" => "OK", "id" => $id]);
    } else {
        echo json_encode(["status" => "NOK"]);
    }
} else {
    echo json_encode(["status" => "NOK"]);
}
