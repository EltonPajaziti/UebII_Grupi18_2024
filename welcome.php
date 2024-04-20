<?php
session_start(); // Starto sesionin

// Kontrollo nëse përdoruesi është kyçur, nëse jo, ridrejto në faqen e kyçjes
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: index.php");
    exit;
}



// Kontrolloni nëse cookies ekzistojnë dhe nëse po, printojini ato.
if (isset($_COOKIE['emri'])) {
    echo "<h2>Detajet e Terminit</h2>";
    echo "<table>";
    echo "<tr><td>Emri:</td><td>" . htmlspecialchars($_COOKIE['emri']) . "</td></tr>";
    echo "<tr><td>Email:</td><td>" . htmlspecialchars($_COOKIE['email']) . "</td></tr>";
    echo "<tr><td>Data:</td><td>" . htmlspecialchars($_COOKIE['data']) . "</td></tr>";
    echo "<tr><td>Ora:</td><td>" . htmlspecialchars($_COOKIE['ora']) . "</td></tr>";
    echo "<tr><td>Doktori:</td><td>" . htmlspecialchars($_COOKIE['doktori']) . "</td></tr>";
    echo "<tr><td>Mesazhi:</td><td>" . htmlspecialchars($_COOKIE['mesazhi']) . "</td></tr>";
    echo "</table>";
}
?>





echo "<a href='logout.php'>Log out</a>";

?>