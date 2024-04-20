<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("user.php");

class AdministrativeStaff extends User {
    private $staff_department;

    public function __construct($id, $name, $username, $email, $password, $department) {
        parent::__construct($id, $name, $username, $email, $password);
        $this->department = $department;
    }
    public function getAS_id(){
        return parent::getId();

    }
    public function setAS_id($id)
  {
    parent::setId($id);
  }
  public function getAS_name()
  {
    return parent::getName();
  }
  public function getAS_username()
  {
    return parent::getUsername();
  }
  public function setAS_username($username)
  {
    parent::setUsername($username);
  }
  public function getAS_email()
  {
    return parent::getEmail();
  }

  public function getAS_password()
  {
    return parent::getPassword();
  }

  public function setAS_password($password)
  {
    parent::setPassword($password);
  }

    public function getDepartment() {
        return $this->staff_department;
    }

    public function setDepartment($staff_department) {
        $this->staff_department = $staff_department;
        
    }
}

?>