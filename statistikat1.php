<?php
// Deklarimi i vargut asociativ për statistika me përshkrimet përkatëse
$clinicStatistics = [
    'Treated Patients' => 3200, 
    'Successful Operations' => 1200,
    'Staff Members' => 25
];

// asort($clinicStatistics);// ne baze te vlerave
// ksort($clinicStatistics);// ne baze te celesit ne menyre rritese
// arsort($clinicStatistics);// Sorton vargun asociativ në bazë të vlerave në mënyrë zbritëse, duke ruajtur çelësat e asociuar me vlerat e tyre.
krsort($clinicStatistics);//Sorton vargun asociativ në bazë të çelësave në mënyrë zbritëse.


?>

<!-- Seksioni i Statistikave -->
<div id="clinic-statistics" class="section wow fadeIn" style="background:#fff;">
    <div class="container">
        <div class="heading">
            <span class="icon-logo"><img src="images/icon-logo.png" alt="#"></span>
            <h2>Our Clinic in Numbers</h2>
        </div>
        <div class="row">
        
        <?php foreach ($clinicStatistics as $description => $number): ?>
       
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <div class="statistic-box wow fadeInUp">
            <div class="statistic-value">
                <img src="images/icon-<?php 
                // Perdorimi i String Funksioneve
                echo strtolower(str_replace(' ', '-', $description)); ?>.png" alt="" class="img-responsive">
                <h2><?php echo number_format($number); ?></h2>
                <p><?php echo strtoupper($description); ?></p>
            </div>
        </div>
    </div>
<?php endforeach; ?>

        </div>
    </div>
</div>
<!-- Fundi i Seksionit të Statistikave -->
