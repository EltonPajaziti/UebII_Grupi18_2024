<div id="time-table" class="time-table-section">
         <div class="container">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
               <div class="row">
                  <div class="service-time one" style="background:#2895f1;">
                     <span class="info-icon"><i class="fa fa-ambulance" aria-hidden="true"></i></span>
                     <h3>Emergency Case</h3>
                     <p>In case of emergencies, our clinic provides immediate care and support. Our experienced medical team is available round the clock to handle urgent medical situations.</p>
                  </div>
               </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
               <div class="row">
                  <div class="service-time middle" style="background:#0071d1;">
                     <span class="info-icon"><i class="fa fa-clock-o" aria-hidden="true"></i></span> 
                     <h3>Working Hours</h3>
                     <div class="time-table-section">
                        <ul>
                 
                           <?php
                            // Deklarimi i vargut me oraret e punës
                            //Perdorimi i vargut asociativ 
                            $workingHours = [
                                "Monday - Friday" => "8.00 – 18.00",
                                "Saturday" => "8.00 – 16.00",
                                "Sunday" => "8.00 – 13.00"
                            ];

                            // Shfaqja e orareve të punës nga vargu
                            foreach($workingHours as $days => $hours): ?>
                                <li><span class="left"><?php echo $days; ?></span><span class="right"><?php echo $hours; ?></span></li>
                            <?php endforeach; ?>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
               <div class="row">
                  <div class="service-time three" style="background:#0060b1;">
                     <span class="info-icon"><i class="fa fa-hospital-o" aria-hidden="true"></i></span>
                     <h3>Clinic Timetable</h3>
                     <p>Our clinic timetable outlines our operating hours and appointment availability. We strive to accommodate your schedule by offering flexible appointment slots throughout the week.</p>
                  </div>
               </div>
            </div>
         </div>
      </div>