<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Patient extends User {
    private $medicalHistory;

    public function __construct($id, $name, $username, $email, $password, $medicalHistory) {
        parent::__construct($id, $name, $username, $email, $password);
        $this->medicalHistory = $medicalHistory;
    }
    public function getPatient_id(){
        return parent::getId();

    }
    public function setPatient_id($id)
  {
    parent::setId($id);
  }
  public function getPatient_name()
  {
    return parent::getName();
   
  }
  public function getPatient_username()
  {
    return parent::getUsername();
  }
  public function setPatient_username($username)
  {
    parent::setUsername($username);
  }
  public function getPatient_email()
  {
    return parent::getEmail();
  }

  public function getPatient_password()
  {
    return parent::getPassword();
  }
  public function setPatient_password($password)
  {
    parent::setPassword($password);
  }
    public function getMedicalHistory() {
        return $this->medicalHistory;
    }

    public function setMedicalHistory($medicalHistory) {
        $this->medicalHistory = $medicalHistory;
    }
}
?>