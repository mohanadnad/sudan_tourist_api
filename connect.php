<?php
header('Content-Type: application/json; charset=utf-8');

$db   = "bncppwmccmwighcaw6yf";
$user = "ubic8juwohiwkdyr";
$pass = "Pm6D6re3nR99YvF1Xyrl";
$host = "bncppwmccmwighcaw6yf-mysql.services.clever-cloud.com";
$port = "3306";

$connection = new PDO("mysql:host=$host;port=$port;dbname=$db;charset=utf8", $user, $pass);

try {
    $connection = new PDO($dsn, $user, $pass);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // أهم خطوة لحل مشكلة اللغة العربية
    $connection->exec("SET NAMES utf8");
    $connection->exec("SET CHARACTER SET utf8");
} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()], JSON_UNESCAPED_UNICODE);
}
