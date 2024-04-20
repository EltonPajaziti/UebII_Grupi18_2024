<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("user.php");

class Doctor extends User{
    private $dr_specialization;

    public function __construct($specialization_id, $specialization_name, $specialization_username, $specialization_email, $specialization_password)
    {
        parent::__construct($specialization_id, $specialization_name, $specialization_username, $specialization_email, $specialization_password);
        $this->specialization = $specialization;
    }
    public function getDoctor_id(){
        return parent::getId();

    }
    public function setDoctor_id($id)
  {
    parent::setId($id);
  }
  public function getDoctor_name()
  {
    return parent::getName();
  }
  public function getDoctor_username()
  {
    return parent::getUsername();
  }
  public function setDoctor_username($username)
  {
    parent::setUsername($username);
  }
  public function getDoctor_email()
  {
    return parent::getEmail();
  }

  public function getDoctor_password()
  {
    return parent::getPassword();
  }

  public function setDoctor_password($password)
  {
    parent::setPassword($password);
  }
    public function getSpecialization()
    {
        return $this->dr_specialization;
    }

    public function setSpecialization($dr_specialization)
    {
        $this->dr_specialization = $dr_specialization;
     
    }
}
