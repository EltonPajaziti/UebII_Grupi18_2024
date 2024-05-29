<?php
// Deklarimi i vargut asociativ për statistika me përshkrimet përkatëse
$clinicStatistics = [
    'Treated Patients' => 3200, 
    'Successful Operations' => 1200,
    'Staff Members' => 25
];

// Funksioni që përcjell vlerën përmes referencës dhe shton 5 në numrin e Staff Members
function increaseStaffMembers(&$statistics) {
    $statistics['Staff Members'] += 5;
}

// Thirrja e funksionit për të rritur numrin e Staff Members
increaseStaffMembers($clinicStatistics);

// Kthimi i një reference për vlerën e Staff Members
function &getStaffMembersReference(&$statistics) {
    return $statistics['Staff Members'];
}

// Marrja e referencës për Staff Members
$staffMembers = &getStaffMembersReference($clinicStatistics);

// Ndryshimi i referencës së Staff Members
$staffMembers = 30;

// Largimi i referencës për Staff Members duke përdorur unset()
unset($staffMembers);

// Rendisja e vargut në bazë të çelësave në mënyrë zbritëse
krsort($clinicStatistics);

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
