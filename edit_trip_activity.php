<?php
header("Content-Type: application/json");
include "connect.php";

$id = $_POST["id"];
$trip_id = $_POST["trip_id"];
$activities = $_POST["activities"];
$activitiesEn = $_POST["activitiesEn"];

$stmt = $connection->prepare("
    UPDATE trip_description SET
        trip_id = :trip_id,
        activities = :activities,
        activitiesEn = :activitiesEn
    WHERE id = :id
");

$stmt->execute([
    ":trip_id" => $trip_id,
    ":activities" => $activities,
    ":activitiesEn" => $activitiesEn,
    ":id" => $id
]);

echo json_encode(["status" => "success"]);
