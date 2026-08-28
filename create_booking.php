<?php
include "connect.php";

$user_id     = $_POST["user_id"];
$user_name   = $_POST["user_name"];
$phone       = $_POST["phone"];
$trip_id     = $_POST["trip_id"];
// $hotel_id    = $_POST["hotel_id"];
$adults      = $_POST["adults"];
$children    = $_POST["children"];
$infants     = $_POST["infants"];
$total_price = $_POST["total_price"];
// $date        = $_POST["date"];
$trip_time        = $_POST["trip_time"];
$email        = $_POST["email"];
// $days = $_POST["days"];

try {
    $stmt = $connection->prepare("
        INSERT INTO bookings 
        (user_id, user_name, phone, trip_id,  adults, children, infants, total_price, trip_time, email)
        VALUES 
        (:user_id, :user_name, :phone, :trip_id,  :adults, :children, :infants, :total_price, :trip_time, :email)
    ");

    $stmt->execute([
        ":user_id"     => $user_id,
        ":user_name"   => $user_name,
        ":email"   => $email,
        ":phone"       => $phone,
        ":trip_id"     => $trip_id,
        // ":hotel_id"    => $hotel_id,
        ":adults"      => $adults,
        ":children"    => $children,
        ":infants"     => $infants,
        ":total_price" => $total_price,
        // ":date"        => $date,
        ":trip_time"        => $trip_time,
        // ":days"        => $days
    ]);

    echo json_encode(["status" => "success"]);
} catch (PDOException $e) {
    echo json_encode(["status" => "error", "message" => $e->getMessage()]);
}
