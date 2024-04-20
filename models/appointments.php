<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


class AppointmentManager {
    private $appointments;

    public function __construct() {
        $this->appointments = [];
    }
 
    public function scheduleAppointment($patient, $doctor, $dateTime, $reason) {
        $appointment = [
            'patient' => $patient->getName(), 
            'doctor' => $doctor->getName(),   
            'dateTime' => $dateTime,
            'reason' => $reason
        ];
        $this->appointments[] = $appointment;
        return $appointment;
    }

    public function updateAppointment($appointmentIndex, $newDateTime) {
        if (isset($this->appointments[$appointmentIndex])) {
            $this->appointments[$appointmentIndex]['dateTime'] = $newDateTime;
            return true;
        }
        return false; 
    }

    public function cancelAppointment($appointmentIndex) {
        if (isset($this->appointments[$appointmentIndex])) {
            unset($this->appointments[$appointmentIndex]);
            $this->appointments = array_values($this->appointments);
            return true;
        }
        return false;
    }

   
    public function getAppointments() {
        return $this->appointments;
    }
}
?>
