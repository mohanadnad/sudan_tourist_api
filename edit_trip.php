<?php
header("Content-Type: application/json");
include "connect.php";

$stmt = $connection->prepare("
    UPDATE trips SET
        title = :title,
        titleEn = :titleEn,
        imageUrl = :imageUrl,
        cityName = :cityName,
        cityNameEn = :cityNameEn,
        categoryId = :categoryId,
        latitude = :lat,
        longitude = :lng,
        travelType = :type,
        travelTypeEn = :typeEn,
        budget = :budget, 
        rating = :rating
    WHERE id = :id
");

$stmt->execute([
    ":id" => $_POST["id"],
    ":title" => $_POST["title"],
    ":titleEn" => $_POST["titleEn"],
    ":imageUrl" => $_POST["imageUrl"],
    ":cityName" => $_POST["cityName"],
    ":cityNameEn" => $_POST["cityNameEn"],
    ":categoryId" => $_POST["categoryId"],
    ":lat" => $_POST["latitude"],
    ":lng" => $_POST["longitude"],
    ":type" => $_POST["travelType"],
    ":typeEn" => $_POST["travelTypeEn"],
    ":budget" => $_POST["budget"],
    ":rating" => $_POST["rating"]
]);

echo json_encode(["status" => "success"]);
