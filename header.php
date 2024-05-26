
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
                  //Perdorimi i variablave dhe casja e tyre
                  $about = "About us";
                  $doctors="Doctors"; ?>
<ul class="nav navbar-nav">
   <li><a class="active" href="index.php">Home</a></li>
   <li><a data-scroll href="#about"><?php echo $about; ?></a></li>
   <li><a data-scroll href="#service">Services</a></li>
   <li><a data-scroll href="#doctors"><?php echo $doctors; ?></a></li>
   <li><a data-scroll href="#price">Price</a></li>
   <li><a data-scroll href="#testimonials">Testimonials</a></li>
   <li><a data-scroll href="#getintouch">Contact</a></li>
   <li><a data-scroll href="users_fetch.php">Doctors List</a></li>


   <?php if(isset($_SESSION['user_id'])): ?>
      <li><a href="newEmail.php" class="btn btn-secondary">Update Email</a></li>
      <li><a href="XMLrequest.php" class="btn btn-secondary">Update User</a></li> 
      <li><a href="logout.php" class="btn btn-secondary">LogOut</a></li> 

   <?php else: ?>
   <li><a href="signup.php" class="btn btn-secondary">Sign Up</a></li> 
   <li><a href="login.php" class="btn btn-primary">Log In</a></li>
   <?php endif; ?>
 
       <!-- Button trigger modal -->
<li><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div></li>
</ul>

                  </div>
               </nav>
               <!-- <div class="serch-bar">
                  <div id="custom-search-input">
                     <div class="input-group col-md-12">
                        <input type="text" class="form-control input-lg" placeholder="Search" />
                        <span class="input-group-btn">
                        <button class="btn btn-info btn-lg" type="button">
                        <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                        </span>
                     </div>
                  </div>
               </div> -->
               <!-- <div class="login-signup">
  <div class="buttons">
    <a href="login.php" class="btn btn-primary">Log In</a>
    <a href="signup.php" class="btn btn-secondary">Sign Up</a>
  </div>
</div> -->
  <style>
   .login-signup .buttons {
  display: flex;
  gap: 10px; /* Or the space you want between the buttons */
}

/* Nëse ekziston një rregull për butonat që ndikon në shfaqjen e tyre, mund të duhet të shtoni stile shtesë këtu. */
.nav-item .nav-link {
    padding: 10px 15px; /* Adjust padding as needed */
    display: block;
    color: inherit; /* Inherit the text color from the parent */
    text-decoration: none; /* Remove underline from links */
}

.nav-item .nav-link:hover, .nav-item .nav-link:focus {
    background-color: #00b359; /* The green color on hover */
    color: white; /* Change text color on hover if needed */
}

  </style>
            </div>
         </div>