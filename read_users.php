
<?php

session_start();
include 'db.php';

$user_id = $_SESSION['user_id'];


$stmt = $pdo->prepare("SELECT id, name, lastname FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($users);
?>
