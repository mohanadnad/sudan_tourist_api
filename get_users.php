<?php
include "connect.php";
header("Content-Type: application/json");

try {
    $stmt = $connection->prepare("
        SELECT 
            users.id,
            users.user_id,
            users.name,
            users.email,
          
           
            users.created_at,
            (SELECT COUNT(*) FROM bookings WHERE bookings.user_id = users.user_id) AS bookings_count
        FROM users
        ORDER BY users.created_at DESC
    ");

    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode(["status" => "success", "data" => $data]);
} catch (PDOException $e) {
    echo json_encode(["status" => "error", "message" => $e->getMessage()]);
}
