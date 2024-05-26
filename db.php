<?php

$host = "localhost:4307";
$database = "mbrojtja_projektit"; 
$charset = "utf8mb4";
$username = "root";
$password = "";
$dsn = "mysql:host=$host;dbname=$database;charset=$charset";

try {
    $pdo = new PDO($dsn, $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}