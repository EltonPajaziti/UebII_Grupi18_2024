<?php
session_start(); // Starto sesionin

// Kontrollo nëse përdoruesi është kyçur, nëse jo, ridrejto në faqen e kyçjes
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: index.php");
    exit;
}

echo "<h1>Welcome " . $_SESSION['username'] . "!</h1>";
echo "<p>This is the welcome page.</p>";
echo "<a href='logout.php'>Log out</a>";
?>
