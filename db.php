<?php

$dsn = 'mysql:host=localhost;dbname=user';
$username = 'root';
$password = '';
$options = [];

try {
    //code...
    $connection = new PDO($dsn, $username, $password, $options);
    echo 'Connection Successful';
} catch (PDOException $e) {
    //throw $th;
    echo 'Error Connecting';
}