<?php
;
require __DIR__ . "/../env.php";

$dsn = "mysql:host=$servername;dbname=$database;charset=UTF8";

try {
    $conn = new \PDO('mysql:host=192.168.240.4;port=3306;dbname=wallet_db', $username, $password);

} catch (PDOException $e) {
    echo $e->getMessage();
}