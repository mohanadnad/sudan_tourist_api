<?php
session_start();
include "../connect.php";



$id = $_GET["id"];
$hotel_id = $_GET["hotel_id"];

$stmt = $connection->prepare("DELETE FROM hotel_description WHERE id = :id");
$stmt->execute([":id" => $id]);

header("Location: hotel_description.php?hotel_id=" . $hotel_id);
exit;
