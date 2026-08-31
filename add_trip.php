<?php
header("Content-Type: application/json");
include "connect.php";

$stmt = $connection->prepare("
    INSERT INTO trips (
        id, title, titleEn, imageUrl, cityName, cityNameEn,
        categoryId, latitude, longitude, travleType, travleTypeEn, budget, rating
    ) VALUES (
        :id, :title, :titleEn, :imageUrl, :cityName, :cityNameEn,
        :categoryId, :lat, :lng, :type, :typeEn, :budget, :rating
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
    ":type" => $_POST["travleType"],
    ":typeEn" => $_POST["travleTypeEn"],
    ":budget" => $_POST["budget"],
    ":rating" => $_POST["rating"]
]);

echo json_encode(["status" => "success"]);
