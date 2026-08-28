<?php
header('Content-Type: application/json; charset=utf-8');

$db   = "if0_42759111_sudan_tourist_guid";
$user = "if0_42759111";
$pass = "J15WCpwgsBVU";
$host = "sql204.infinityfree.com";

$dsn = "mysql:host=$host;dbname=$db;charset=utf8";

try {
    $connection = new PDO($dsn, $user, $pass);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // أهم خطوة لحل مشكلة اللغة العربية
    $connection->exec("SET NAMES utf8");
    $connection->exec("SET CHARACTER SET utf8");
} catch (PDOException $e) {
    echo json_encode(["error" => $e->getMessage()], JSON_UNESCAPED_UNICODE);
}
