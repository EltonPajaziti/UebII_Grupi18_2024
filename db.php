<?php

$host = "localhost:4307";// Adresa e serverit të bazës së të dhënave
$database = "mbrojtja_projektit";// Emri i bazës së të dhënave  
$charset = "utf8mb4";// Seti i karaktereve që përdoret për të shmangur problemet e kodimit të të dhënave
$username = "root";// Emri i përdoruesit për akses në bazën e të dhënave
$password = "";// Fjalëkalimi për akses në bazën e të dhënave
$dsn = "mysql:host=$host;dbname=$database;charset=$charset";// Data Source Name që përshkruan lidhjen me DB

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
?>