<?php
header("Content-Type: application/json");
include "connect.php";

$stmt = $connection->query("SELECT * FROM hotels ORDER BY id DESC");
echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
