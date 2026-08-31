<?php
header("Content-Type: application/json");
include "connect.php";

$restaurant_id = $_GET["restaurant_id"];

$stmt = $connection->prepare("SELECT * FROM restaurant_description WHERE restaurant_id = :id");
$stmt->execute([":id" => $restaurant_id]);

echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
