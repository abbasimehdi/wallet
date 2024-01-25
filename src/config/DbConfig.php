<?php

$servername = "192.168.240.4";
$username = "root";
$password = "123456";
$database = "wallet_db";

$dsn = "mysql:host=$servername;dbname=$database;charset=UTF8";

try {
    $conn = new \PDO('mysql:host=192.168.240.4;port=3306;dbname=wallet_db', 'root', '123456');

} catch (PDOException $e) {
    echo $e->getMessage();
}