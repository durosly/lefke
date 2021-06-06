<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "esl";

try {
    $dsn = "mysql:host={$host};dbname={$db}";
    $conn = new PDO($dsn, $user, $password);
} catch(PDOException $e) {
    die("Database error occured");
}