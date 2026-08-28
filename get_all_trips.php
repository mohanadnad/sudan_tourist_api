<?php
include 'connect.php';

$lang = $_GET['lang'] ?? 'ar';

$titleCol = $lang == 'en' ? 'titleEn' : 'title';
$cityCol = $lang == 'en' ? 'cityNameEn' : 'cityName';

$stmt = $connection->prepare("
    SELECT id, $titleCol AS title, $cityCol AS cityName,
           imageUrl, latitude, longitude, categoryId,travelTypeEn, travelType, budget, rating,
                (SELECT AVG(rating_value) FROM ratings WHERE place_id = trips.id) AS avgRating
    FROM trips
");
$stmt->execute();

echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
