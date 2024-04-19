<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


class AppointmentManager {
    private $appointments;

    public function __construct() {
        $this->appointments = [];
    }

    // Schedule a new appointment
    public function scheduleAppointment($patient, $doctor, $dateTime, $reason) {
        $appointment = [
            'patient' => $patient->getName(), // Assuming getName() method exists in User class
            'doctor' => $doctor->getName(),   // Assuming getName() method exists in User class
            'dateTime' => $dateTime,
            'reason' => $reason
        ];
        $this->appointments[] = $appointment;
        return $appointment;
    }

    // Update an existing appointment
    public function updateAppointment($appointmentIndex, $newDateTime) {
        if (isset($this->appointments[$appointmentIndex])) {
            $this->appointments[$appointmentIndex]['dateTime'] = $newDateTime;
            return true;
        }
        return false; // Appointment not found
    }

    // Cancel an appointment
    public function cancelAppointment($appointmentIndex) {
        if (isset($this->appointments[$appointmentIndex])) {
            unset($this->appointments[$appointmentIndex]);
            $this->appointments = array_values($this->appointments); // Re-index the appointments array
            return true;
        }
        return false; // Appointment not found
    }

    // Get all appointments
    public function getAppointments() {
        return $this->appointments;
    }
}

// Example usage:
$appointmentManager = new AppointmentManager();

// Assuming $doctor and $patient are instances of Doctor and Patient classes respectively
// Schedule a new appointment
$appointment1 = $appointmentManager->scheduleAppointment($patient, $doctor, "2024-04-20 10:00", "Routine checkup");

// Update an appointment
$appointmentManager->updateAppointment(0, "2024-04-20 11:00");

// Cancel an appointment
$appointmentManager->cancelAppointment(0);

// Get all appointments
$allAppointments = $appointmentManager->getAppointments();


?>
