<?php
header("Content-Type: application/json");
include "connect.php";

$id = $_POST["id"];
$restaurant_id = $_POST["restaurant_id"];
$activities = $_POST["activities"];
$activitiesEn = $_POST["activitiesEn"];

$stmt = $connection->prepare("
    UPDATE restaurant_description SET
        restaurant_id = :restaurant_id,
        activities = :activities,
        activitiesEn = :activitiesEn
    WHERE id = :id
");

$stmt->execute([
    ":restaurant_id" => $restaurant_id,
    ":activities" => $activities,
    ":activitiesEn" => $activitiesEn,
    ":id" => $id
]);

echo json_encode(["status" => "success"]);
