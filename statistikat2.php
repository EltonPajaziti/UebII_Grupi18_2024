<?php
// Deklarimi i vargut numerik për vizitorët javorë
$weeklyVisitors = [120, 200, 150, 300];

// Sortimi i vizitorëve në mënyrë rritëse të vlerave
sort($weeklyVisitors);
// Për të sortuar në mënyrë zbritëse, zëvendësoni sort() me rsort() në kodin e mëposhtëm
// rsort($weeklyVisitors);

// rsort($weeklyVisitors);
$lastWeekVisitors = $weeklyVisitors[3]; 

// Kontrollojmë nëse numri i vizitorëve të javës së kaluar është më i lartë se 200
//Perdorimi i if else
if ($lastWeekVisitors > 200) {
    $promoMessage = "Thank you for helping us reach over 200 visitors last week! As a thank you, we're offering free blood pressure screenings on Friday.";
} else {
    $promoMessage = "Join us this week for a special discount on wellness check-ups.";
}

//Perdorimi i funksioneve 
function calculateTotalVisitors($visitors) {
    $totalVisitors = array_sum($visitors);
    if ($totalVisitors > 2000) {
        echo "Considering hiring more staff for next month.";
    }
   
}

$totalVisitorsThisWeek = calculateTotalVisitors($weeklyVisitors);




?>

<!-- Seksioni i Statistikave të Vizitorëve Javorë -->
<div id="weekly-visitors" class="section wow fadeIn" style="background:#fff;">
    <div class="container">
        <div class="heading">
            <span class="icon-logo"><img src="images/icon-logo.png" alt="Our Clinic"></span>
            <h2>Weekly Visitor Statistics</h2>
        </div>
        <div class="row">
            <?php foreach ($weeklyVisitors as $index => $visitorCount): ?>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="visitor-statistic-box">
                        <div class="week-number">Week <?php echo $index + 1; ?></div>
                        <div class="visitor-count"><?php echo number_format($visitorCount); ?> Visitors</div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="promo-message">
            <p><?php echo $promoMessage; ?></p>
        </div>
        <div class="promo-message">
            <p><?php echo $totalVisitorsThisWeek; ?></p>
        </div>

    </div>
</div>
<!-- Fundi i Seksionit të Statistikave të Vizitorëve Javorë -->
