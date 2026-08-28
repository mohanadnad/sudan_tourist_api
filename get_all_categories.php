<?php
include 'connect.php';

$lang = $_GET['lang'] ?? 'ar';

$titleCol = $lang == 'en' ? 'title_en' : 'title';

$stmt = $connection->prepare("
    SELECT id, $titleCol AS title, imageUrl
    FROM categories
");
$stmt->execute();

echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
