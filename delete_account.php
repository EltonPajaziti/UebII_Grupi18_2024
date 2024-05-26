<?php
include 'db.php';

session_start();
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if user is not logged in
    header("Location: login.php");
    exit();
}

if (isset($_POST['delete_account'])) {
    $user_id = $_SESSION['user_id'];

    try {
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $delete_stm = $pdo->prepare("DELETE FROM Users WHERE id = :user_id");
        $delete_stm->bindParam(':user_id', $user_id);

        if ($delete_stm->execute()) {
            // Log out the user after account deletion
            session_destroy();
            header("Location: welcome.php"); // Redirect to a goodbye page or home page
        } else {
            $response = ['status' => 0, 'message' => 'Failed to delete account.'];
        }
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
}