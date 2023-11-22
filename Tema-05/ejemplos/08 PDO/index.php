<?php

/*
    Conexión mediante PDO
*/

$server = 'localhost';
$user = 'root';
$pass = '';
$database = 'fp';

#Conexión
try {
    $dsn = "mysql:host=$server;dbname=$database";

    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ];

    $pdo = new PDO($dsn, $user, $pass, $options);
}
catch(PDOException $e){
    include('errorDB.php');
    exit();
}