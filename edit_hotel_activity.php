<?php
header("Content-Type: application/json");
include "connect.php";

$id = $_POST["id"]; // رقم النشاط
$hotel_id = $_POST["hotel_id"]; // رقم الفندق
$activities = $_POST["activities"];
$activitiesEn = $_POST["activitiesEn"];

$stmt = $connection->prepare("
    UPDATE hotel_description SET
        hotel_id = :hotel_id,
        activities = :activities,
        activitiesEn = :activitiesEn
    WHERE id = :id
");

$stmt->execute([
    ":hotel_id" => $hotel_id,
    ":activities" => $activities,
    ":activitiesEn" => $activitiesEn,
    ":id" => $id
]);

echo json_encode(["status" => "success"]);
