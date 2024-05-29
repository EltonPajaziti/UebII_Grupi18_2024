<?php

$host = "localhost:4307";
$database = "mbrojtja_projektit";  
$charset = "utf8mb4";
$username = "root";
$password = "";
$dsn = "mysql:host=$host;dbname=$database;charset=$charset";

// Deklarimi i variablës globale $pdo
global $pdo;

try {
    $pdo = new PDO($dsn, $username, $password);
    // Vendosja e mënyrës së trajtimit të gabimeve në PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

/**
 * Merr instancën e lidhjes PDO
 * @return PDO
 */
function &getPDOInstance() {
    global $pdo;
    return $pdo;
}

// Marrja e instancës së PDO për përdorim të mëtejshëm
$pdoInstance =& getPDOInstance();
// Tani $pdoInstance referon te objekti global $pdo që përdoret për lidhjen me databazën
