<?php
// Deklarimi i vargut të doktorëve
//Perdorimi i vargut multidimensional
$doctors = [
    [
        "name" => "Soren Bo Bostian",
        "speciality" => "Clinic Owner",
        "image" => "images/doctor_01.jpg",
        "description" => "Hello guys, I am Soren from Sirbistana. I am senior art director and founder of Violetta."
    ],
    [
        "name" => "Bryan Saftler",
        "speciality" => "Internal Diseases",
        "image" => "images/doctor_02.jpg",
        "description" => "Hello guys, I am Bryan from Sirbistana. I specialize in internal diseases."
    ],
    [
        "name" => "Matthew Bayliss",
        "speciality" => "Orthopedics Expert",
        "image" => "images/doctor_03.jpg",
        "description" => "Hi, I am Matthew, an expert in orthopedics with a decade of experience."
    ],
    // Shtoni më shumë doktorë këtu sipas nevojës
];
?>

<div id="doctors" class="parallax section db" data-stellar-background-ratio="0.4" style="background:#fff;" data-scroll-id="doctors" tabindex="-1">
    <div class="container">
        <div class="heading">
            <span class="icon-logo"><img src="images/icon-logo.png" alt="#"></span>
            <h2>The Specialist Clinic</h2>
        </div>
        <div class="row dev-list text-center">
            <!-- Fillimi i loop-it të doktorëve -->
            <?php foreach($doctors as $doctor): ?>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 wow fadeIn">
                <div class="widget clearfix">
                    <img src="<?php echo $doctor['image']; ?>" alt="" class="img-responsive img-rounded">
                    <div class="widget-title">
                        <h3><?php echo $doctor['name']; ?></h3>
                        <small><?php echo $doctor['speciality']; ?></small>
                    </div>
                    <p><?php echo $doctor['description']; ?></p>
                    <div class="footer-social">
                        <a href="#" class="btn grd1"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="btn grd1"><i class="fa fa-github"></i></a>
                        <a href="#" class="btn grd1"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="btn grd1"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div><!--widget -->
            </div><!-- end col -->
            <?php endforeach; ?>
            <!-- Fundi i loop-it të doktorëve -->
        </div><!-- end row -->
    </div><!-- end container -->
</div>
