<?php
include "connect.php";
header("Content-Type: application/json");

$user_id = $_POST["user_id"];

try {
    $stmt = $connection->prepare("DELETE FROM users WHERE user_id = ?");
    $stmt->execute([$user_id]);

    echo json_encode(["status" => "success"]);
} catch (PDOException $e) {
    echo json_encode(["status" => "error", "message" => $e->getMessage()]);
}
