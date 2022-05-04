<?php

$dsn = 'mysql:host=localhost;dbname=user';
$username = 'root';
$password = '';
$options = [];

try {
    //code...
    $connection = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    //throw $th;
    echo 'Error Connecting';
}