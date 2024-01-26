<?php
global $conn;
session_start();
include('./config/DbConfig.php');

 index($conn);

 function index($conn)
 {
     $tickets = $conn->query('SELECT * FROM wallets')->fetchAll();
     var_dump(json_encode($tickets));

 }