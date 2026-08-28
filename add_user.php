<?php
include "connect.php";
header("Content-Type: application/json");

$user_id = $_POST["user_id"];
$name    = $_POST["name"];
$email   = $_POST["email"];


try {
    // Check if user already exists
    $check = $connection->prepare("SELECT id FROM users WHERE user_id = ?");
    $check->execute([$user_id]);

    if ($check->rowCount() == 0) {
        // Insert new user
        $stmt = $connection->prepare("
            INSERT INTO users (user_id, name, email)
            VALUES (:user_id, :name, :email)
        ");

        $stmt->execute([
            ":user_id" => $user_id,
            ":name"    => $name,
            ":email"   => $email,

        ]);
    }

    echo json_encode(["status" => "success"]);
} catch (PDOException $e) {
    echo json_encode(["status" => "error", "message" => $e->getMessage()]);
}
