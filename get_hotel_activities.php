<?php
include 'connect.php';
if (!isset($_GET['hotel_id'])) {
    echo json_encode([]);
    exit;
}

$id = $_GET['hotel_id'];
$lang = $_GET['lang'] ?? 'ar';

$col = $lang == 'en' ? 'activitiesEn' : 'activities';

$stmt = $connection->prepare("
    SELECT $col AS activities FROM hotel_description WHERE hotel_id = ?
");
$stmt->execute([$id]);

echo json_encode($stmt->fetchAll(PDO::FETCH_COLUMN));
