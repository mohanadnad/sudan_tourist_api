<?php
header("Content-Type: application/json");
include "connect.php";

$stmt = $connection->prepare("DELETE FROM trips WHERE id = :id");
$stmt->execute([":id" => $_POST["id"]]);

echo json_encode(["status" => "success"]);
