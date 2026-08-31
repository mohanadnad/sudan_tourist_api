<?php
header("Content-Type: application/json");
include "connect.php";

$travel_id = $_GET["travel_id"];

$stmt = $connection->prepare("SELECT * FROM travel_images WHERE travel_id = :id");
$stmt->execute([":id" => $travel_id]);

echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
