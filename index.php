<?php
  session_start();

  function log_activity($action){

    if(!isset($_SESSION['activity_log'])){

        $_SESSION['activity_log']=array();
    }
    $_SESSION['activity_log'][]=array('timestamp'=>date('Y-m-d H:i:s'),'action'=>$action);



  }

  log_activity('Visited homepage');

?>


<!DOCTYPE html>
<html lang="en">
   <!-- Basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <!-- Mobile Metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   <!-- Site Metas -->
   <title>Life Care - Responsive HTML5 Multi Page Template</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <!-- Site Icons -->
   <link rel="shortcut icon" href="../images/fevicon.ico.png" type="image/x-icon" />
   <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="css/bootstrap.min.css">
   <!-- Site CSS -->
   <link rel="stylesheet" href="style.css">

   <!-- Colors CSS -->
   <link rel="stylesheet" href="css/colors.css">
 
   <!-- ALL VERSION CSS -->
   <link rel="stylesheet" href="css/versions.css">
   <!-- Responsive CSS -->
   <link rel="stylesheet" href="css/responsive.css">
   <!-- Custom CSS -->
   <link rel="stylesheet" href="css/custom.css">
   <!-- Modernizer for Portfolio -->
   <script src="js/modernizer.js"></script>
   <!-- [if lt IE 9] -->
   </head>
   <body class="clinic_version">
      <!-- LOADER -->
      <div id="preloader">
         <img class="preloader" src="images/loaders/heart-loading2.gif" alt="">
      </div>
      <!-- END LOADER -->
      <?php include 'header.php'; ?>
      <?php include 'home.php'; ?>
      <?php include 'hometable.php'; ?>
      <?php include 'about.php'; ?>
      <?php

    include 'service.php';

?>
      <?php include 'doctors.php'; ?>
      <?php include 'statistikat1.php'; ?>
      <?php include 'statistikat2.php'; ?>
      <?php include 'keshillat.php'; ?>
     
      <?php include 'testimonials.php'; ?>
      <?php include 'getintouch.php'; ?>
      <?php include 'footer.php'; ?>

      <div class="copyright-area wow fadeIn">
         <div class="container">
            <div class="row">
               <div class="col-md-8">
                  <div class="footer-text">
                     <p>© 2018. Distributed by <a id="tw" href="https://themewagon.com/" target="_blank">ThemeWagon</a></p>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="social">
                     <ul class="social-links">
                        <li><a href=""><i class="fa fa-rss"></i></a></li>
                        <li><a href=""><i class="fa fa-facebook"></i></a></li>
                        <li><a href=""><i class="fa fa-twitter"></i></a></li>
                        <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                        <li><a href=""><i class="fa fa-youtube"></i></a></li>
                        <li><a href=""><i class="fa fa-pinterest"></i></a></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end copyrights -->
      <a href="#home" data-scroll class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>
      <!-- all js files -->
      <script src="js/all.js"></script>
      <!-- all plugins -->
      <script src="js/custom.js"></script>
      <!-- map -->
     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCNUPWkb4Cjd7Wxo-T4uoUldFjoiUA1fJc&callback=myMap"></script>


     <?php 
     
     if (!isset($_SESSION['visit_count'])) {
   
   $_SESSION['visit_count'] = 1;
} else {

   $_SESSION['visit_count']++;
}

// Display the visit count
echo "Number of visits: " . $_SESSION['visit_count'];

?>

     
     <?php




if (isset($_SESSION['activity_log'])) {
    $last_activity = end($_SESSION['activity_log']);
    echo "<ul>";
    echo "<li>{$last_activity['timestamp']} - {$last_activity['action']}</li>";
    echo "</ul>";
}
?>







   </body>
</html>
