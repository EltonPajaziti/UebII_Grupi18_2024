
<div id="service" class="services wow fadeIn">
         <div class="container">
            <div class="row">
               <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                  <div class="inner-services">
                     <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="serv">
                           <span class="icon-service"><img src="images/service-icon1.png" alt="#" /></span>
                           <h4>PREMIUM FACILITIES</h4>
                           <p>Lorem Ipsum is simply dummy text of the printing.</p>
                        </div>
                     </div>
                     <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="serv">
                           <span class="icon-service"><img src="images/service-icon2.png" alt="#" /></span>
                           <h4>LARGE LABORATORY</h4>
                           <p>Lorem Ipsum is simply dummy text of the printing.</p>
                        </div>
                     </div>
                     <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="serv">
                           <span class="icon-service"><img src="images/service-icon3.png" alt="#" /></span>
                           <h4>DETAILED SPECIALIST</h4>
                           <p>Lorem Ipsum is simply dummy text of the printing.</p>
                        </div>
                     </div>
                     <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="serv">
                           <span class="icon-service"><img src="images/service-icon4.png" alt="#" /></span>
                           <h4>CHILDREN CARE CENTER</h4>
                           <p>Lorem Ipsum is simply dummy text of the printing.</p>
                        </div>
                     </div>
                     <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="serv">
                           <span class="icon-service"><img src="images/service-icon5.png" alt="#" /></span>
                           <h4>FINE INFRASTRUCTURE</h4>
                           <p>Lorem Ipsum is simply dummy text of the printing.</p>
                        </div>
                     </div>
                     <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="serv">
                           <span class="icon-service"><img src="images/service-icon6.png" alt="#" /></span>
                           <h4>ANYTIME BLOOD BANK</h4>
                           <p>Lorem Ipsum is simply dummy text of the printing.</p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                  <div class="appointment-form">
                     <h3><span>+</span> Book Appointment</h3>
                     <div class="form">
                     <form action="index.php" method="post">
    <fieldset>
        <!-- Emri -->
        <div class="form-group">
            <input type="text" id="name" name="name" placeholder="Your Name" required />
        </div>

        <!-- Email -->
        <div class="form-group">
            <input type="email" placeholder="Email Address" id="email" name="email" required />
        </div>

        <!-- Dita -->
        <div class="form-group">
            <select class="form-control" name="day" required>
                <option value="">Day</option>
                <option value="Monday">Monday</option>
                <option value="Tuesday">Tuesday</option>
                <option value="Wednesday">Wednesday</option>
                <option value="Thursday">Thursday</option>
                <option value="Friday">Friday</option>
            </select>
        </div>

        <!-- Koha -->
        <div class="form-group">
        <label for="appointmentTime">Select Time:</label>
        <input type="time" id="appointmentTime" name="appointmentTime" required>
    </div>

        <!-- Emri i Mjekut -->
        <div class="form-group">
            <select class="form-control" name="doctorName" required>
                <option value="">Doctor Name</option>
                <option value="Soren Bo Bostian">Soren Bo Bostian</option>
                <option value="Bryan Saftler">Bryan Saftler</option>
                <option value="Matthew Bayliss">Matthew Bayliss</option>
            </select>
        </div>

        <!-- Mesazhi -->
        <div class="form-group">
            <textarea rows="4" id="textarea_message" class="form-control" name="message" placeholder="Your Message..." required></textarea>
        </div>

        <!-- Butoni Submit -->
        <div class="form-group">
            <div class="center"><button type="submit" name="submit">Submit</button></div>
        </div>
    </fieldset>
</form>

                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>



      <?php
if (isset($_POST['submit'])) {
    $errors = [];

    if (empty($_POST['name']) || !preg_match("/^[a-zA-Z-' ]*$/", $_POST['name'])) {
        $errors[] = "The name is required and must contain only letters and spaces.";
    }

    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "The email format is invalid.";
    }

    if (empty($_POST['day'])) {
        $errors[] = "The day is required.";
    }

    if (empty($_POST['appointmentTime'])) {
        $errors[] = "The hour is required.";
    }

    if (empty($_POST['doctorName'])) {
        $errors[] = "The doctor name is required.";
    }

    if (empty($_POST['message']) || !preg_match("/\S+/", $_POST['message'])) {
        $errors[] = "The message is required.";
    }

    if (empty($errors)) {
        // Përdorimi i htmlspecialchars për të evituar XSS
        $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
        $doctorName = htmlspecialchars($_POST['doctorName'], ENT_QUOTES, 'UTF-8');
        $day = htmlspecialchars($_POST['day'], ENT_QUOTES, 'UTF-8');
        $time = htmlspecialchars($_POST['appointmentTime'], ENT_QUOTES, 'UTF-8');

        // Përdorimi i JavaScript për të shfaqur një mesazh pop-up
        echo "<script>alert('The reservation was made successfully. $name has made an appointment with the doctor: $doctorName, on $day at $time.');</script>";
    } else {
        foreach ($errors as $error) {
            echo "<div class='error'>$error</div>";
        }
    }
}
?>
