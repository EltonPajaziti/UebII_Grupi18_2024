<?php
include 'db.php';
session_start();
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if user is not logged in
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch current email from the database
try {


    $stmt = $pdo->prepare("SELECT email FROM Users WHERE id = :user_id");
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    $current_email = $user['email'];
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Email</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4>Update Email</h4>
                </div>
                <div class="card-body">
                    <form action="update_email.php" method="post">
                        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                        <div class="form-group">
                            <label for="new_email"><b>New Email</b></label>
                            <input type="email" id="new_email" name="new_email" class="form-control" required value="<?php echo $current_email; ?>">
                        </div>
                        <button type="submit" name="update_email" class="btn btn-primary btn-block"><b>Update Email</b></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <form action="delete_account.php" method="post">
            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
            <button type="submit" name="delete_account" class="btn btn-outline-danger"><b>Delete Account</b></button>
        </form>
    </div>
</div>
<!-- Bootstrap JS and dependencies (Popper.js and jQuery) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
