<?php
header("Content-Type: application/json");
include "connect.php";

$stmt = $connection->prepare("DELETE FROM travels WHERE id = :id");
$stmt->execute([":id" => $_POST["id"]]);

echo json_encode(["status" => "success"]);
