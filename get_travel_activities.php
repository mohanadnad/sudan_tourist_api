<?php
include 'connect.php';
if (!isset($_GET['travel_id'])) {
    echo json_encode([]);
    exit;
}

$id = $_GET['travel_id'];
$lang = $_GET['lang'] ?? 'ar';

$col = $lang == 'en' ? 'activitiesEn' : 'activities';

$stmt = $connection->prepare("
    SELECT $col AS activities FROM travel_description WHERE travel_id = ?
");
$stmt->execute([$id]);

echo json_encode($stmt->fetchAll(PDO::FETCH_COLUMN));
