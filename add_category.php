<?php
header("Content-Type: application/json");
include "connect.php";

$stmt = $connection->prepare("
    INSERT INTO categories (id, title, titleEn, imageUrl)
    VALUES (:id, :title, :title_en, :imageUrl)
");

$stmt->execute([
    ":id" => $_POST["id"],
    ":title" => $_POST["title"],
    ":title_en" => $_POST["titleEn"],
    ":imageUrl" => $_POST["imageUrl"]
]);

echo json_encode(["status" => "success"]);
