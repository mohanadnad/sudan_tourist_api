<?php
include 'connect.php';

$lang = $_GET['lang'] ?? 'ar';

$titleCol = $lang == 'en' ? 'titleEn' : 'title';
$cityCol = $lang == 'en' ? 'cityNameEn' : 'cityName';
$typeCol = $lang == 'en' ? 'travelTypeEn' : 'travelType';
$descCol = $lang == 'en' ? 'descriptionEn' : 'discription';

$stmt = $connection->prepare("
    SELECT id, $titleCol AS title, $cityCol AS cityName, 
           $typeCol AS travelType, $descCol AS discription,
           imageUrl, youtubeUrl, latitude, longitude, categoryId, budget,rating,
                (SELECT AVG(rating_value) FROM ratings WHERE place_id = travels.id) AS avgRating
    FROM travels
");
$stmt->execute();

echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
