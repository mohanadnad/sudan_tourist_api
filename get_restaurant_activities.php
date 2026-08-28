<?php
include 'connect.php';
if (!isset($_GET['restaurant_id'])) {
    echo json_encode([]);
    exit;
}

$id = $_GET['restaurant_id'];
$lang = $_GET['lang'] ?? 'ar';

$col = $lang == 'en' ? 'activitiesEn' : 'activities';

$stmt = $connection->prepare("
    SELECT $col AS activities FROM restaurant_description WHERE restaurant_id = ?
");
$stmt->execute([$id]);

echo json_encode($stmt->fetchAll(PDO::FETCH_COLUMN));
