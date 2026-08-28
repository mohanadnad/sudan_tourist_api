<?php
include 'connect.php';

$lang = $_GET['lang'] ?? 'ar';

$titleCol = $lang == 'en' ? 'titleEn' : 'title';
$cityCol = $lang == 'en' ? 'cityNameEn' : 'cityName';


$stmt = $connection->prepare("
    SELECT id, $titleCol AS title, $cityCol AS cityName,
           imageUrl, latitude, longitude, categoryId, travelTypeEn, travelType,budget,rating, webUrl,     
            (SELECT AVG(rating_value) FROM ratings WHERE place_id = restaurants.id) AS avgRating
    FROM restaurants
");
$stmt->execute();

echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
