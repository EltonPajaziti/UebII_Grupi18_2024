<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Cookie settings
$cookieName = "perdoruesi";
$cookieValue = "Vlera";
$expire = time() + (86400 * 30); // pas 30 ditesh
$path = "/";
$domain = ""; //domaini i tanishem
$secure = false; 
$httpOnly = true; 
setcookie($cookieName, $cookieValue, $expire, $path, $domain, $secure, $httpOnly);

// Handle cookie consent response
$cookieConsent = isset($_COOKIE['cookie_consent']) ? $_COOKIE['cookie_consent'] : null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['consent'])) {
    $consentType = $_POST['consent'];
    if ($consentType === 'accept') {
        setcookie('cookie_consent', 'accepted', $expire, '/');
        $cookieConsent = 'accepted';
    } elseif ($consentType === 'decline') {
        setcookie('cookie_consent', 'declined', $expire, '/');
        $cookieConsent = 'declined';
    }
    // Redirect to clear POST data
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cookie Consent Banner</title>
    <style>
        #cookie-consent-banner {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #333;
            color: white;
            padding: 20px;
            text-align: center;
            z-index: 1000;
            box-shadow: 0px -2px 5px rgba(0,0,0,0.2);
            font-family: Arial, sans-serif;
        }

        #cookie-consent-banner a {
            color: #4CAF50;
            text-decoration: none;
        }

        #cookie-consent-banner a:hover {
            text-decoration: underline;
        }

        #cookie-consent-banner button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            margin: 0 10px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        #cookie-consent-banner button:hover {
            background-color: #45a049;
        }
    
    </style>
</head>
<body>
   
<?php
   //e qet banner veq nese ska accept/hera e pare
if ($cookieConsent === null || $cookieConsent === 'declined') {
    echo '<div id="cookie-consent-banner">
            <p>This website uses cookies to enhance your experience. Do you accept our <a href="#">Cookie Policy</a>?</p>
            <form method="post">
                <button type="submit" name="consent" value="accept">Accept Cookies</button>
                <button type="submit" name="consent" value="decline">Decline Cookies</button>
            </form>
          </div>';
}
?>

</body>
</html>
<?php
//me bo ni button per me marr submit qfar lloj 
if(isset($_POST['fontSize'])) {
    $fontSize = '20px';
    setcookie('fontSize', $fontSize, time() + (86400 * 30), "/"); // Cookie valid for 30 days
}
?>                 <?php
$defaultFontSize = '16px'; // Default font size
if(isset($_COOKIE['fontSize'])) {
    $fontSize = $_COOKIE['fontSize'] . 'px'; // Append 'px' to the font size value
} else {
    $fontSize = $defaultFontSize;
}
?>




