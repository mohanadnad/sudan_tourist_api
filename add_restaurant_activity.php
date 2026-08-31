<?php
header("Content-Type: application/json");
include "connect.php";

$stmt = $connection->prepare("
    INSERT INTO restaurant_description (restaurant_id, activities, activitiesEn)
    VALUES (:id, :act, :actEn)
");

$stmt->execute([
    ":id" => $_POST["restaurant_id"],
    ":act" => $_POST["activities"],
    ":actEn" => $_POST["activitiesEn"]
]);

echo json_encode(["status" => "success"]);
