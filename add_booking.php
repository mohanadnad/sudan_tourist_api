<?php
header("Content-Type: application/json");
include "connect.php";

$stmt = $connection->prepare("
    INSERT INTO bookings (
        user_id, user_name, phone, trip_id, 
        adults, children, infants, total_price, trip_time
    ) VALUES (
        :uid, :uname, :phone, :trip, 
        :adults, :children, :infants, :price, :trip_time
    )
");

$stmt->execute([
    ":uid" => $_POST["user_id"],
    ":uname" => $_POST["user_name"],
    ":phone" => $_POST["phone"],
    ":trip" => $_POST["trip_id"],
    // ":hotel" => $_POST["hotel_id"],
    ":adults" => $_POST["adults"],
    ":children" => $_POST["children"],
    ":infants" => $_POST["infants"],
    ":price" => $_POST["total_price"],
    ":trip_time" => $_POST["trip_time"]
]);

echo json_encode(["status" => "success"]);
