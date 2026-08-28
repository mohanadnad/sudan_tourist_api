<?php
header("Content-Type: application/json");
include "connect.php"; // ملف الاتصال بقاعدة البيانات

$user_id = $_GET['user_id'];

$stmt = $connection->prepare("SELECT * FROM bookings WHERE user_id = ?");
$stmt->execute([$user_id]);
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode([
    "status" => "success",
    "bookings" => $data
]);
