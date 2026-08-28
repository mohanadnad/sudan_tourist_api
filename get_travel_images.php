<?php
include 'connect.php';
if (!isset($_GET['travel_id'])) {
    echo json_encode([]);
    exit;
}

$id = $_GET['travel_id'];

$stmt = $connection->prepare("
    SELECT imageUrl FROM travel_images WHERE travel_id = ?
");
$stmt->execute([$id]);

echo json_encode($stmt->fetchAll(PDO::FETCH_COLUMN));
