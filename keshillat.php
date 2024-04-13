<?php
// Marrim ditën aktuale të javës
$currentDay = date('l');

// Mesazhe të ndryshme për çdo ditë të javës
$weeklyTips = [
    'Monday' => 'Start your week with a healthy breakfast.',
    'Tuesday' => 'Remember to stay hydrated throughout the day.',
    'Wednesday' => 'Midweek is a great time for a check-up.',
    'Thursday' => 'Take a moment to relax and destress.',
    'Friday' => 'Finish the week strong with some exercise.',
    'Saturday' => 'Enjoy a well-deserved break and family time.',
    'Sunday' => 'Plan your upcoming week for success.'
];

// Përdorim një strukturë switch për të zgjedhur mesazhin bazuar në ditën aktuale
switch ($currentDay) {
    case 'Monday':
        $tip = $weeklyTips['Monday'];
        break;
    case 'Tuesday':
        $tip = $weeklyTips['Tuesday'];
        break;
        case 'Wednesday':
            $tip = $weeklyTips['Wednesday'];
            break;
            case 'Thursday':
                $tip = $weeklyTips['Thursday'];
                break;
                case 'Friday':
                    $tip = $weeklyTips['Friday'];
                    break;
                    case 'Saturday':
                        $tip = $weeklyTips['Saturday'];
                        break;
                        case 'Sunday':
                            $tip = $weeklyTips['Sunday'];
                            break;


    default:
        $tip = 'Welcome to our clinic!';
        break;
}
?>

<!-- Seksioni i Këshillave Javore -->
<div id="weekly-tips" class="section wow fadeIn" style="background:#fff;">
    <div class="container">
        <div class="heading">
            <span class="icon-logo"><img src="images/icon-logo.png" alt="Our Clinic"></span>
            <h2>Weekly Health Tip</h2>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <p class="weekly-tip"><?php echo $tip; ?></p>
            </div>
        </div>
    </div>
</div>
<!-- Fundi i Seksionit të Këshillave Javore -->
