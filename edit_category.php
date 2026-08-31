<?php
header("Content-Type: application/json");
include "connect.php";

$stmt = $connection->prepare("
    UPDATE categories SET
        title = :title,
        titleEn = :title_en,
        imageUrl = :imageUrl
    WHERE id = :id
");

$stmt->execute([
    ":id" => $_POST["id"],
    ":title" => $_POST["title"],
    ":title_en" => $_POST["titleEn"],
    ":imageUrl" => $_POST["imageUrl"]
]);

echo json_encode(["status" => "success"]);
