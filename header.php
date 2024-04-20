
<?php 
if(isset($_GET["set_font_cookies"])){
   if(isset($_GET["text-size"])){
      $fontSize = $_GET["text-size"];
      setcookie("font-size",$fontSize,time() + (86000 * 30),"/");
   } 
}
?>

<div class="header-top wow fadeIn">
    <div class="container">
        <a class="navbar-brand" href="index.php"><img src="images/logo.png" alt="image"></a>
        <div class="right-header">
            <div class="header-info">
                <div class="info-inner">
                    <span class="icontop"><img src="images/phone-icon.png" alt="#"></span>
                    <span class="iconcont"><a href="tel:800 123 456">800 123 456</a></span>	
                </div>
                <div class="info-inner">
                    <span class="icontop"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                    <span class="iconcont"><a data-scroll href="mailto:info@yoursite.com">info@Lifecare.com</a></span>	
                </div>
                <div class="info-inner">
                    <span class="icontop"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                    <span class="iconcont"><a data-scroll href="#">Daily: 7:00am - 8:00pm</a></span>	
                </div>
            </div>
        </div>
    </div>
</div>

<div class="header-bottom wow fadeIn">
    <div class="container">
        <nav class="main-menu">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"><i class="fa fa-bars" aria-hidden="true"></i></button>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <?php 
                // Perdorimi i variables dhe casja e saj
                $about = "About us"; 
                ?>
                <ul class="nav navbar-nav">
                    <li><a class="active" href="index.php">Home</a></li>
                    <li><a data-scroll href="#about"><?php echo $about; ?></a></li>
                    <li><a data-scroll href="#service">Services</a></li>
                    <li><a data-scroll href="#doctors">Doctors</a></li>
                    <li><a data-scroll href="#price">Price</a></li>
                    <li><a data-scroll href="#testimonials">Testimonials</a></li>
                    <li><a data-scroll href="#getintouch">Contact</a></li>
                    <li><a href="signup.php" class="btn btn-secondary">Sign Up</a></li> 
<li><a href="login.php" class="btn btn-primary">Log In</a></li>
                    <li style="position: absolute; right:10px; margin-top:10px;">
                        <!-- Button to open popup -->
                        <button class="open-popup-btn nav-item" id="open-popup-btn" style="background-color: lightblue; color:#fff; cursor:pointer; border:none; border-radius:10px; padding:7px 12px">Cant Read?</button>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>

<!-- Popup container -->
<div class="popup-overlay" id="popup-overlay"></div>
<div class="popup" id="popup">
    <h2>Select Text Size</h2>
    <form method="get" action="index.php" id="cookies-form">
        <label>
            <input type="radio" name="text-size" value="15px">
            Normal 
        </label><br>
        <label>
            <input type="radio" name="text-size" value="20px">
            Big
        </label><br>
        <button type="submit" name="set_font_cookies">Save</button>
    </form>
</div>

<style>
    .login-signup .buttons {
        display: flex;
        gap: 10px; 
    }

    /* Nëse ekziston një rregull për butonat që ndikon në shfaqjen e tyre, mund të duhet të shtoni stile shtesë këtu. */
    .nav-item .nav-link {
        padding: 10px 15px; 
        color: inherit; 
        text-decoration: none; 
    }

    .nav-item .nav-link:hover, .nav-item .nav-link:focus {
        background-color: #00b359; 
        color: white; 
    }

    /* Popup styles */
    .popup-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 9999;
    }

    .popup {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        z-index: 10000;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var openPopupBtn = document.getElementById('open-popup-btn');
        var popupOverlay = document.getElementById('popup-overlay');
        var popup = document.getElementById('popup');

        openPopupBtn.addEventListener('click', function() {
            popup.style.display = 'block';
            popupOverlay.style.display = 'block';
        });

        popupOverlay.addEventListener('click', function() {
            popup.style.display = 'none';
            popupOverlay.style.display = 'none';
        });
    });
</script>
