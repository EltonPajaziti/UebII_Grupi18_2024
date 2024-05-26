<?php
include 'db.php';


 $sql = "CREATE TABLE IF NOT EXISTS Users (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL,
        position VARCHAR(50) NOT NULL,
        email VARCHAR(50) NOT NULL UNIQUE,
        password VARCHAR(50) NOT NULL
    )";

try {
    $pdo->exec($sql);
    echo "Tabela Users u krijua me sukses";
} catch (PDOException $e) {
    echo "Gabim gjatë krijimit të tabelës: " . $e->getMessage();
}

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $position = $_POST['position'];
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $password = md5($password); 

    try {
        $register_stm = $pdo->prepare("INSERT INTO Users (name, lastname, position, email, password)
        VALUES (:name, :lastname, :position, :email, :password)");
        
        $register_stm->bindParam(':name', $name);
        $register_stm->bindParam(':lastname', $lastname);
        $register_stm->bindParam(':position', $position);
        $register_stm->bindParam(':email', $email);
        $register_stm->bindParam(':password', $password);

        if ($register_stm->execute()) {
            $response = ['status' => 1, 'message' => 'Perdoruesi u regjistrua me sukses.'];
            header("Location: login.php");
        } else {
            $response = ['status' => 0, 'message' => 'Perdoruesi nuk u regjistrua - dicka shkoi keq!'];
        }
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
}

//login
session_start(); 

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']); 

    try {
        $login_stm = $pdo->prepare("SELECT id FROM Users WHERE email = :email AND password = :password");
        $login_stm->bindParam(':email', $email);
        $login_stm->bindParam(':password', $password);

        $login_stm->execute();

        if ($login_stm->rowCount() == 1) {
            $user = $login_stm->fetch(PDO::FETCH_ASSOC);
            $_SESSION['user_id'] = $user['id']; 
            
            header("Location: index.php");
        } else {
            $response = ['status' => 0, 'message' => 'Invalid email or password.'];
        }
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
}

