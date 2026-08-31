<?php
include "connect.php";
header("Content-Type: application/json");

$user_id = $_POST["user_id"];
$name    = $_POST["name"];
$email   = $_POST["email"];
$phone   = $_POST["phone"];

try {
    $stmt = $connection->prepare("
        UPDATE users 
        SET name = :name, email = :email
        WHERE user_id = :user_id
    ");

    $stmt->execute([
        ":name" => $name,
        ":email" => $email,

        ":user_id" => $user_id
    ]);

    echo json_encode(["status" => "success"]);
} catch (PDOException $e) {
    echo json_encode(["status" => "error", "message" => $e->getMessage()]);
}
