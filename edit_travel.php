<?php
header("Content-Type: application/json");
include "connect.php";

$stmt = $connection->prepare("
    UPDATE travels SET
        title = :title,
        titleEn = :titleEn,
        imageUrl = :imageUrl,
        youtubeUrl = :youtubeUrl,
        discription = :desc,
        descriptionEn = :descEn,
        cityName = :cityName,
        cityNameEn = :cityNameEn,
        travelType = :type,
        travelTypeEn = :typeEn,
        categoryId = :categoryId,
        latitude = :lat,
        longitude = :lng,
        budget = :budget,
        rating = :rating
    WHERE id = :id
");

$stmt->execute([
    ":id" => $_POST["id"],
    ":title" => $_POST["title"],
    ":titleEn" => $_POST["titleEn"],
    ":imageUrl" => $_POST["imageUrl"],
    ":youtubeUrl" => $_POST["youtubeUrl"],
    ":desc" => $_POST["discription"],
    ":descEn" => $_POST["descriptionEn"],
    ":cityName" => $_POST["cityName"],
    ":cityNameEn" => $_POST["cityNameEn"],
    ":type" => $_POST["travelType"],
    ":typeEn" => $_POST["travelTypeEn"],
    ":categoryId" => $_POST["categoryId"],
    ":lat" => $_POST["latitude"],
    ":lng" => $_POST["longitude"],
    ":budget" => $_POST["budget"],
    ":rating" => $_POST["rating"]
]);

echo json_encode(["status" => "success"]);
