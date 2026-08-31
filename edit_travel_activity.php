<?php
header("Content-Type: application/json");
include "connect.php";

$id = $_POST["id"];
$travel_id = $_POST["travel_id"];
$activities = $_POST["activities"];
$activitiesEn = $_POST["activitiesEn"];

$stmt = $connection->prepare("
    UPDATE travel_description SET
        travel_id = :travel_id,
        activities = :activities,
        activitiesEn = :activitiesEn
    WHERE id = :id
");

$stmt->execute([
    ":travel_id" => $travel_id,
    ":activities" => $activities,
    ":activitiesEn" => $activitiesEn,
    ":id" => $id
]);

echo json_encode(["status" => "success"]);
