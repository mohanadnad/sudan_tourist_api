<?php
header("Content-Type: application/json");
include "connect.php";

$stmt = $connection->prepare("
    INSERT INTO travel_images (travel_id, imageUrl)
    VALUES (:id, :img)
");

$stmt->execute([
    ":id" => $_POST["travel_id"],
    ":img" => $_POST["imageUrl"]
]);

echo json_encode(["status" => "success"]);
