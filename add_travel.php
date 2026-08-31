<?php
header("Content-Type: application/json");
include "connect.php";

$stmt = $connection->prepare("
    INSERT INTO travels (
        id, title, titleEn, imageUrl, youtubeUrl, discription, descriptionEn,
        cityName, cityNameEn, travelType, travelTypeEn, categoryId,
        latitude, longitude, budget,rating
    ) VALUES (
        :id, :title, :titleEn, :imageUrl, :youtubeUrl, :desc, :descEn,
        :cityName, :cityNameEn, :type, :typeEn, :categoryId,
        :lat, :lng, :budget, :rating
    )
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
