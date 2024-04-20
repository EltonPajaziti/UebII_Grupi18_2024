<?php
class Nurse extends User {
    private $nurse_department;

    public function __construct($id, $name, $username, $email, $password, $department) {
        parent::__construct($id, $name, $username, $email, $password);
        $this->nurse_department = $department;
    }

    public function getNurse_id() {
        return parent::getId();
    }

    public function setNurse_id($id) {
        parent::setId($id);
    }

    public function getNurse_name() {
        return parent::getName();
    }

    public function getNurse_username() {
        return parent::getUsername();
    }

    public function setNurse_username($username) {
        parent::setUsername($username);
    }

    public function getNurse_email() {
        return parent::getEmail();
    }

    public function getNurse_password() {
        return parent::getPassword();
    }

    public function setNurse_password($password) {
        parent::setPassword($password);
    }

    public function getDepartment() {
        return $this->nurse_department;
    }

    public function setDepartment($department) {
        $this->nurse_department = $department;
    }
}
?>