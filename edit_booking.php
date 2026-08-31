<?php
header("Content-Type: application/json");
include "connect.php";

$id = $_POST["id"];

$stmt = $connection->prepare("
    UPDATE bookings SET
        // user_id = :uid,
        user_name = :uname,
        phone = :phone,
        // trip_id = :trip,
        // hotel_id = :hotel,
        adults = :adults,
        children = :children,
        infants = :infants,
        // total_price = :price,
        trip_time = :trip_time,
        // date = :date
    WHERE id = :id
");

$stmt->execute([
    // ":uid" => $_POST["user_id"],
    ":uname" => $_POST["user_name"],
    ":phone" => $_POST["phone"],
    // ":trip" => $_POST["trip_id"],
    // ":hotel" => $_POST["hotel_id"],
    ":adults" => $_POST["adults"],
    ":children" => $_POST["children"],
    ":infants" => $_POST["infants"],
    // ":price" => $_POST["total_price"],
    ":trip_time" => $_POST["trip_time"],
    // ":date" => $_POST["date"],
    ":id" => $id
]);

echo json_encode(["status" => "success"]);
