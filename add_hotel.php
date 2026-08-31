<?php
header("Content-Type: application/json");
include "connect.php";

$stmt = $connection->prepare("
    INSERT INTO hotels (
        id, title, titleEn, imageUrl, cityName, cityNameEn,
        categoryId, latitude, longitude, travelType, travelTypeEn, budget,rating, webUrl
    ) VALUES (
        :id, :title, :titleEn, :imageUrl, :cityName, :cityNameEn,
        :categoryId, :lat, :lng, :type, :typeEn, :budget, :rating, :webUrl
    )
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
    ":rating" => $_POST["rating"],
    ":webUrl" => $_POST["webUrl"]
]);

echo json_encode(["status" => "success"]);
