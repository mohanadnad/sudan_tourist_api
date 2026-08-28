<?php
include "connect.php";

$booking_id = $_POST["booking_id"] ?? null;

if (!$booking_id) {
    echo json_encode([
        "status" => "error",
        "message" => "booking_id is required",
    ]);
    exit;
}

try {
    // أولاً نتأكد أن الحجز موجود
    $checkStmt = $connection->prepare("
        SELECT id FROM bookings WHERE id = :id LIMIT 1
    ");
    $checkStmt->execute([":id" => $booking_id]);

    if ($checkStmt->rowCount() == 0) {
        echo json_encode([
            "status" => "error",
            "message" => "Booking not found",
        ]);
        exit;
    }

    // حذف الحجز
    $deleteStmt = $connection->prepare("
        DELETE FROM bookings WHERE id = :id
    ");
    $deleteStmt->execute([":id" => $booking_id]);

    echo json_encode([
        "status" => "success",
        "message" => "Booking deleted successfully",
    ]);
} catch (PDOException $e) {
    echo json_encode([
        "status" => "error",
        "message" => $e->getMessage(),
    ]);
}
