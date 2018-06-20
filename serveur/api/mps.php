<?php

include("../lib/connexion.php");
$emetteur = $_POST["emetteur"];
$recepteur = $_POST["recepteur"];

$stmt = $pdo->prepare("SELECT * FROM mps WHERE (emetteur = ? AND recepteur = ?) OR ((emetteur = ? AND recepteur = ?))");
$stmt->execute([$emetteur, $recepteur, $recepteur, $emetteur]);
$users = $stmt->fetchAll();

echo json_encode($users);