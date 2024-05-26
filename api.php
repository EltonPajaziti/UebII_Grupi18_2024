<?php
include 'db.php';


$method = $_SERVER['REQUEST_METHOD'];   
$action = (isset($_GET['action']) && !empty($_GET['action'])) ? $_GET['action'] : '';

// Action: Get users
// HTTP verb: GET
// URL: http://localhost/editedueb2/api.php?action=get_doctors

if($action == 'get_doctors' && $method == 'GET') {
    $doctors = []; 

    $doctors_stm = $pdo->prepare("SELECT `id`,`name`, `lastname`, `position`, `email` FROM `users`");
    $doctors_stm->execute();
    while($row = $doctors_stm->fetch(PDO::FETCH_ASSOC)) {
            $doctors[] = $row;
    }

    echo json_encode(['doctors' => $doctors]);
}


// Action: Get user Doctors
// HTTP verb: GET
// URL: http://localhost/ushtrim/api.php?action=get_user_doctors

if($action == 'get_user_doctors' && $method == 'GET') {
    $user_doctors = []; 

    $user_doctors_stm = $pdo->prepare("SELECT `id`, `name`, `lastname`, `email` ,`position`
FROM users WHERE `position` = 'Doctor'");
    $user_doctors_stm->execute();
    while($row = $user_doctors_stm->fetch(PDO::FETCH_ASSOC)) {
            $user_doctors[] = $row;
    }

    echo json_encode(['user_doctors' => $user_doctors]);
}