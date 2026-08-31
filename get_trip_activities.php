<?php
header("Content-Type: application/json");
include "connect.php";

$trip_id = $_GET["trip_id"];

$stmt = $connection->prepare("SELECT * FROM trip_description WHERE trip_id = :id");
$stmt->execute([":id" => $trip_id]);

echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
