<?php
include 'connect.php';
if (!isset($_GET['trip_id'])) {
    echo json_encode([]);
    exit;
}

$id = $_GET['trip_id'];
$lang = $_GET['lang'] ?? 'ar';

$col = $lang == 'en' ? 'activitiesEn' : 'activities';

$stmt = $connection->prepare("
    SELECT $col AS activities FROM trip_description WHERE trip_id = ?
");
$stmt->execute([$id]);

echo json_encode($stmt->fetchAll(PDO::FETCH_COLUMN));
