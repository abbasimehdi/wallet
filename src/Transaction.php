<?php
global $conn;
session_start();
include('./config/DbConfig.php');

 index($conn);

/**
 * @param $conn
 * @return void
 */
function index($conn)
 {
     $wallets = $conn->query('SELECT * FROM wallets')->fetchAll();
     $sum = $conn->query('SELECT * FROM wallets')->fetchAll();

     $sql = "SELECT sum(amount) as rate_sum, count(*) as record_count FROM wallets";
     $query = $conn->query($sql);
     $row = $query->fetch(PDO::FETCH_ASSOC);
     if ($row) {
         $sum = $row['rate_sum'];
         $count = $row['record_count'];
     }

    include_once "resources/views/transaction/transaction.html";
 }