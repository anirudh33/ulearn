<?php 

session_start();
require_once ($_SESSION["SITE_PATH"]."/libraries/AModel.php");
abstract class AUser extends AModel{
    protected $user_id;
    protected $password;
    protected $email;
    protected $user_type;

    
    public function __construct() {
        parent::__construct();
        }
    public function getUser_id() {
        return $this->user_id;
    }

    public function setUser_id($user_id) {
        $this->user_id = $user_id;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }
    public function getUseType() {
        return $this->user_type;
    }

    public function setUserType($user_type) {
        $this->user_type = $user_type;
    }

	
}
?>