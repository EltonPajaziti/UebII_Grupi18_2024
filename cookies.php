<?php
   //test
   //krijimi i nje cookie, vlerat
   $cookieName = "perdoruesi";
   $cookieValue = "Vlera";
   $expire = time() + (86000 * 30);  //cookie do te ekspire pas 30 ditesh
   $path = "/";  //kjo vlere e mundson me kon valide nqdo domain
   $domain = ""; //ne domainin aktual
   $cookie_dergimi= false;
   $cookieHttp = true;

   setcookie($cookieName, $cookieValue, $expire, $path, $domain, $cookie_dergimi, $cookieHttp);




?>

<?php
  //cookie consent

$cookieConsent = isset($_COOKIE['cookie_consent']) ? $_COOKIE['cookie_consent'] : null;  //kqyr a egziston consent i mehershem

if (isset($_POST['consent'])) {
    if ($_POST['consent'] === 'accept') {
        setcookie('cookie_consent', 'accepted', time() + (86400 * 30), '/'); // 30 dite
        $cookieConsent = 'accepted';
    } 
    elseif ($_POST['consent'] === 'decline') {
        setcookie('cookie_consent', 'declined', time() + (86400 * 30), '/');
        $cookieConsent = 'declined';
    }
    header("Location: " . $_SERVER['PHP_SELF']); //tkthen ne faqen ku je
    exit;

    if ($cookieConsent === null) {
            //pranimi/anulimi i cookies nga perdoruesi
        echo '<div id="cookie-banner" class="cookie-consent"> <p>This website uses cookies to enhance your experience. Do you accept our <a href="#">Cookie Policy</a>?</p>
                <a href="?consent=accept">Accept Cookies</a>
                <a href="?consent=decline">Decline Cookies</a>
              </div>';
    }
}
?>
<html>
<!--
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
-->
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




