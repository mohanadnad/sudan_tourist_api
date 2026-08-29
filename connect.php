<?php
header('Content-Type: application/json; charset=utf-8');

$db   = "sudan_tourst_database";
$user = "mohanad";
$pass = "GpcJNUQxH6qcmvD32VzdnTxkUo1OgI3V";
$host = "dpg-da9i582jnfac73dv2d7g-a";
$port = "5432";

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
