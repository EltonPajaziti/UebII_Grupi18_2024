<div id="home" class="parallax first-section wow fadeIn" data-stellar-background-ratio="0.4" style="background-image:url('images/slider-bg.png');">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="text-contant">
                    <h2>
                        <span class="center"><span class="icon"><img src="images/icon-logo.png" alt="#" /></span></span>
                        <?php
                        // Mesazhet që dëshironi të shfaqni
                        $messages = ["Welcome to Life Care", "we Care Your Health", "we are Expert!"];

                           // Var_dump para shfaqjes së mesazheve
                        //    echo "<pre>";
                        //    var_dump($messages);
                        //    echo "</pre>";
                           /*
                           Var dump perdoret per debuggim dhe nuk është zakonisht i përshtatshëm për shfaqje në një faqe në prodhim. Ju duhet të përdorni var_dump() gjatë zhvillimit për të kuptuar dhe kontrolluar strukturën e të dhënave. */
                        
                        // Shfaqni çdo mesazh
                        //Perdorimi i string funksionit ucfirst()
                        foreach ($messages as $message) {
                            echo "<span class='wrap'>" . ucfirst($message) . "</span><br>"; // Shtoni një <br> pas çdo mesazhi për të ndarë rreshtat
                        }
                        
                        ?>
                    </h2>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
