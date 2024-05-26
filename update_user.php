<?php
include 'db.php';

$id = $_POST['id'];
$name = $_POST['name'];
$lastname = $_POST['lastname'];

$stmt = $pdo->prepare("UPDATE users SET name=?, lastname=? WHERE id=?");
$stmt->execute([$name, $lastname, $id]);

echo "Name and Lastname updated successfully";
?>
