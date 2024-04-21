<?php

class Termini {
    protected $emri;
    protected $email;
    protected $data;
    protected $ora;
    protected $doktori;
    protected $mesazhi;

    public function __construct($emri, $email, $data, $ora, $doktori, $mesazhi) {
        $this->emri = $emri;
        $this->email = $email;
        $this->data = $data;
        $this->ora = $ora;
        $this->doktori = $doktori;
        $this->mesazhi = $mesazhi;
    }

    // Getter and setter methods
    public function getEmri() { return $this->emri; }
    public function setEmri($emri) { $this->emri = $emri; }
    public function getEmail() { return $this->email; }
    public function setEmail($email) { $this->email = $email; }
    public function getData() { return $this->data; }
    public function setData($data) { $this->data = $data; }
    public function getOra() { return $this->ora; }
    public function setOra($ora) { $this->ora = $ora; }
    public function getDoktori() { return $this->doktori; }
    public function setDoktori($doktori) { $this->doktori = $doktori; }
    public function getMesazhi() { return $this->mesazhi; }
    public function setMesazhi($mesazhi) { $this->mesazhi = $mesazhi; }

    public function ruaj() {
        setcookie('emri', $this->emri, time() + 86400, "/");
        setcookie('email', $this->email, time() + 86400, "/");
        setcookie('data', $this->data, time() + 86400, "/");
        setcookie('ora', $this->ora, time() + 86400, "/");
        setcookie('doktori', $this->doktori, time() + 86400, "/");
        setcookie('mesazhi', $this->mesazhi, time() + 86400, "/");
    }
}

class TerminiDetajuar extends Termini {
    // Additional methods if needed
}
function calculateDaysUntilAppointment($appointmentDate) {
    $now = new DateTime(); // Current date and time
    $appointment = new DateTime($appointmentDate);
    return $now->diff($appointment)->days;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $termini = new TerminiDetajuar(
        $_POST['name'],
        $_POST['email'],
        $_POST['date'],
        $_POST['appointmentTime'],
        $_POST['doctorName'],
        $_POST['message']
    );

    $daysUntilAppointment = calculateDaysUntilAppointment($_POST['date']);
    $patientName = $_POST['name']; // Merrni emrin e pacientit nga forma
    setcookie('daysUntilAppointment', $daysUntilAppointment, time() + 86400, "/");
    setcookie('patientName', $patientName, time() + 86400, "/"); // Ruaj emrin e pacientit në cookie

    $termini->ruaj();

    header('Location: index.php');
    exit;
}

?>


<div id="service" class="services wow fadeIn">
         <div class="container">
            <div class="row">
               <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                  <div class="inner-services">
                     <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="serv">
                           <span class="icon-service"><img src="images/service-icon1.png" alt="#" /></span>
                           <h4>PREMIUM FACILITIES</h4>
                           <p> Experience the epitome of comfort and care with our premium facilities, where every detail is tailored to ensure your utmost satisfaction and well-being.</p>
                        </div>
                     </div>
                     <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="serv">
                           <span class="icon-service"><img src="images/service-icon2.png" alt="#" /></span>
                           <h4>LARGE LABORATORY</h4>
                           <p> Explore innovation in healthcare with our expansive laboratory, equipped with state-of-the-art technology.</p>
                        </div>
                     </div>
                     <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="serv">
                           <span class="icon-service"><img src="images/service-icon3.png" alt="#" /></span>
                           <h4>DETAILED SPECIALIST</h4>
                           <p>Uncover personalized care like never before with our team of meticulous specialists, each committed to providing comprehensive evaluations.</p>
                        </div>
                     </div>
                     <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="serv">
                           <span class="icon-service"><img src="images/service-icon4.png" alt="#" /></span>
                           <h4>CHILDREN CARE CENTER</h4>
                           <p>Delight in peace of mind knowing your little ones are in nurturing hands at our children's care center</p>
                        </div>
                     </div>
                     <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="serv">
                           <span class="icon-service"><img src="images/service-icon5.png" alt="#" /></span>
                           <h4>FINE INFRASTRUCTURE</h4>
                           <p>Immerse yourself in an ambiance of sophistication and tranquility with our fine infrastructure.</p>
                        </div>
                     </div>
                     <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="serv">
                           <span class="icon-service"><img src="images/service-icon6.png" alt="#" /></span>
                           <h4>ANYTIME BLOOD BANK</h4>
                           <p>Rest assured knowing life-saving resources are always within reach with our anytime blood bank.</p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                  <div class="appointment-form">
                     <h3><span>+</span> Book Appointment</h3>
                     <div class="form">
                     <form action="service.php" method="post">
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
        <!-- <div class="form-group">
            <select class="form-control" name="day" required>
                <option value="">Day</option>
                <option value="Monday">Monday</option>
                <option value="Tuesday">Tuesday</option>
                <option value="Wednesday">Wednesday</option>
                <option value="Thursday">Thursday</option>
                <option value="Friday">Friday</option>
            </select>
        </div> -->

          <!-- Dita (zëvendësuar me input të tipit date) -->
          <div class="form-group">
                    <label for="date">Day</label>
                    <input type="date" id="date" name="date" class="form-control" required />
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

    if (empty($_POST['date'])) {
        $errors[] = "The date is required.";
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
