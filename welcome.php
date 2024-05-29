<?php
session_start();

include 'db.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

// Bashko emrin dhe mbiemrin për të marrë emrin e plotë të doktorit
$doctor_fullname = $_SESSION['user_name'] . " " . $_SESSION['user_lastname'];

$query = "SELECT * FROM appointments WHERE doctor_name = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$doctor_fullname]);
$appointments = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Doctor</title>
</head>
<body>
    <h1>Welcome, <?= htmlspecialchars($doctor_fullname) ?></h1>
    <h2>Your Appointments:</h2>
    <?php if ($appointments): ?>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Patient Name</th>
                <th>Patient Email</th>
                <th>Appointment Date</th>
                <th>Appointment Time</th>
                <th>Message</th> <!-- Shtoje këtë header -->
            </tr>
            <?php foreach ($appointments as $appointment): ?>
                <tr>
                    <td><?= htmlspecialchars($appointment['id']) ?></td>
                    <td><?= htmlspecialchars($appointment['patient_name']) ?></td>
                    <td><?= htmlspecialchars($appointment['patient_email']) ?></td>
                    <td><?= htmlspecialchars($appointment['appointment_date']) ?></td>
                    <td><?= htmlspecialchars($appointment['appointment_time']) ?></td>
                    <td><?= htmlspecialchars($appointment['message']) ?></td> <!-- Shfaq mesazhin -->
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>No appointments found.</p>
    <?php endif; ?>
    <a href='logout.php'>Log Out</a>
</body>
</html>
