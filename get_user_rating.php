<?php
include "connect.php";

$user_id = $_GET["user_id"];
$place_id = $_GET["place_id"];

$stmt = $connection->prepare("SELECT rating_value FROM ratings WHERE user_id=? AND place_id=?");
$stmt->execute([$user_id, $place_id]);

if ($stmt->rowCount() > 0) {
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode(["rating" => $data["rating_value"]]);
} else {
    echo json_encode(["rating" => 0]);
}
