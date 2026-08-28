<?php
include "connect.php";

$booking_id = $_POST["booking_id"] ?? null;
$adults     = $_POST["adults"]     ?? null;
$children   = $_POST["children"]   ?? null;
$infants    = $_POST["infants"]    ?? null;

if (!$booking_id) {
    echo json_encode([
        "status" => "error",
        "message" => "booking_id is required",
    ]);
    exit;
}

try {
    $stmt = $connection->prepare("
        UPDATE bookings
        SET adults = :adults,
            children = :children,
            infants = :infants
        WHERE id = :id
    ");

    $stmt->execute([
        ":adults"   => $adults,
        ":children" => $children,
        ":infants"  => $infants,
        ":id"       => $booking_id,
    ]);

    echo json_encode(["status" => "success"]);
} catch (PDOException $e) {
    echo json_encode(["status" => "error", "message" => $e->getMessage()]);
}
