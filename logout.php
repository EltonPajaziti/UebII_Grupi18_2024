<?php
session_start(); // Starto sesionin

// Shkatërro të gjitha të dhënat e sesionit
$_SESSION = array();
session_destroy(); // Shkatërro sesionin

// Ridrejto në faqen kryesore (index.php)
header("Location: index.php");
exit;
?>
