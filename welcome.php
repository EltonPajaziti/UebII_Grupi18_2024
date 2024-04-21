<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
         body {
            background-image: url("price-bg.png"); /* Sigurohuni që kjo është rruga e saktë */
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
    </style>
</head>
<body>
    <?php
    session_start(); // Starto sesionin

    // Kontrollo nëse përdoruesi është kyçur, nëse jo, ridrejto në faqen e kyçjes
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        header("Location: index.php");
        exit;
    }



// case-sensitive constant name
define("GREETING", "Welcome to the page dedicated only to Medical Staff!");
echo "<h1 style='color: green; font-size: 30px;'>" . GREETING . "</h1>";


    if (isset($_COOKIE['emri'])) {
        echo "<h2>Appointment Details</h2>";
        echo "<table>";
        echo "<tr><td>Name:</td><td>" . htmlspecialchars($_COOKIE['emri']) . "</td></tr>";
        echo "<tr><td>Email:</td><td>" . htmlspecialchars($_COOKIE['email']) . "</td></tr>";
        echo "<tr><td>Date:</td><td>" . htmlspecialchars($_COOKIE['data']) . "</td></tr>";
        echo "<tr><td>Time:</td><td>" . htmlspecialchars($_COOKIE['ora']) . "</td></tr>";
        echo "<tr><td>Doctor:</td><td>" . htmlspecialchars($_COOKIE['doktori']) . "</td></tr>";
        echo "<tr><td>Message:</td><td>" . htmlspecialchars($_COOKIE['mesazhi']) . "</td></tr>";
        echo "</table>";
    }

    if (isset($_COOKIE['daysUntilAppointment']) && isset($_COOKIE['patientName'])) {
        $daysLeft = $_COOKIE['daysUntilAppointment'];
        $patientName = $_COOKIE['patientName'];
        $dayWord = $daysLeft == 1 ? 'day' : 'days'; // Kontrolloni nëse duhet të përdorni njësinë në singular apo plural
        echo "<div class='appointment-info' style='color: green;'><strong>There are {$daysLeft} {$dayWord} left until {$patientName}'s appointment.</strong></div>";
    }

    $weeklyVisitors = [120, 200, 150, 300]; // Vendos këtu vizitorët e javës
    $GLOBALS['totalVisitorsGlobal'] = array_sum($weeklyVisitors);
    makeDecisionBasedOnVisitors();

    function makeDecisionBasedOnVisitors() {
        if ($GLOBALS['totalVisitorsGlobal'] > 1000) {
            echo "<p>We had more than 1000 visitors this week!</p>";
        } else {
            echo "<p>Visitor numbers are less than 1000 this week.</p>";
        }
    }
    ?>

    <a  style="text-decoration: none;" href='logout.php'>Log out</a>
</body>
</html>
