<?php
header("Content-Type: application/json");
include "connect.php";

$hotel_id = $_GET["hotel_id"];

$stmt = $connection->prepare("SELECT * FROM hotel_description WHERE hotel_id = :id");
$stmt->execute([":id" => $hotel_id]);

echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
