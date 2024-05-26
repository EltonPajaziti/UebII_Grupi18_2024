<?php
include 'db.php';
session_start();
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if user is not logged in
    header("Location: login.php");
    exit();
}

if (isset($_POST['update_email'])) {
    $user_id = $_SESSION['user_id'];
    $new_email = $_POST['new_email'];

    try {
       

        $update_stm = $pdo->prepare("UPDATE Users SET email = :new_email WHERE id = :user_id");
        $update_stm->bindParam(':new_email', $new_email);
        $update_stm->bindParam(':user_id', $user_id);

        if ($update_stm->execute()) {
            $response = ['status' => 1, 'message' => 'Email updated successfully.'];
            header('location: index.php');
        } else {
            $response = ['status' => 0, 'message' => 'Failed to update email.'];
        }
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
}
?>