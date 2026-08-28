<?php
include "connect.php";

$place_id = $_GET["place_id"];

$stmt = $connection->prepare("SELECT AVG(rating_value) AS avg_rating FROM ratings WHERE place_id=?");
$stmt->execute([$place_id]);

$data = $stmt->fetch(PDO::FETCH_ASSOC);

echo json_encode([
    "rating" => round($data["avg_rating"], 1)
]);
