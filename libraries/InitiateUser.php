<?php

/*
 * *************************** Creation Log ******************************* File Name - MainController.php Description - Class file for Authentication of users credentials Version - 1.0 Created by - Ujjwal Rawlley Created on - March 01, 2013 *************************************************************************** Sr.NO. Version Updated by Updated on Description ------------------------------------------------------------------------- 1 1.0 Anirudh Pandita March 02, 2013 2 1.0 Anirudh Pandita March 08, 2013 Paths set ***************************************************************************
 */
// session_start();

class InitiateUser extends AModel {
	
	// put your code here
	private $_password;
	private $_result = array ();
	private $_userID;
	private $_userType;
	private $_emailID;
	public function __construct() {
		parent::__construct ();
		
		// echo "-----------Initiate con ------";
	}
	private function getPassword() {
		return $this->_password;
	}
	private function setPassword($password) {
		$this->_password = $password;
	}
	private function getResult() {
		return $this->_result;
	}
	private function setResult($result) {
		$this->_result = $result;
	}
	private function getUserID() {
		return $this->_userID;
	}
	private function setUserID($userID) {
		$this->_userID = $userID;
	}
	private function getUserType() {
		return $this->_userType;
	}
	private function setUserType($userType) {
		$this->_userType = $userType;
	}
	private function getEmailID() {
		return $this->_emailID;
	}
	private function setEmailID($emailID) {
		$this->_emailID = $emailID;
	}
	
	/* Ujjwal */
	
	// -------------------------------------------------//
	private function setSession() {
		
		// echo "-----------setting session ------";
		$_SESSION ["userID"] = $this->getUserID ();
		
		$_SESSION ["userType"] = $this->getUserType ();
		
		$_SESSION ["emailID"] = $this->getEmailID ();
	}
	
	/* Ujjwal */
	
	// -------------------------------------------------//
	public function login($fieldEmail, $fieldPassword) {
		// Takes the username and the password as parameters and matches with the database.
		if ($this->fieldsValid ( $fieldEmail, $fieldPassword )) {
			
			$this->setEmailID ( $fieldEmail );
			$this->setPassword ( $fieldPassword );
			if ($this->exists ( $this->getEmailID (), $this->encryptPassword ( $this->getPassword () ) ) == 1) { // If the entries matches then it will return the boolean vale aS TRUe or FALSE
			                                                                                             // and the page is redirected to the respective admin page.
			                                                                                             // echo "-----------session does not exist ------";
				$this->setSession ();
				return 1;
			} else {
				$msg = "Login Failed username or password does not exist";
				header ( "Location:http://" . $_SESSION ["DOMAIN_PATH"] . "/index.php?msg=$msg" );
			}
		} else {
			$msg = "Invaild Data Enter again";
			header ( "Location:index.php?msg={$msg}" );
		}
	}
	private function exists($email, $password) {
		if ($this->fetchUser ( $email, $password ) == true) {
			return 1;
		} else {
			return 0;
		}
	}
	
	/* Anirudh */
	
	// -------------------------------------------------//
	private function fetchUser($email, $password) {
		$this->db->Fields ( array (
				"user_id",
				"email",
				"user_type" 
		) );
		$this->db->Where ( array (
				"email" => $email,
				"password" => $password 
		) );
		$this->db->From ( "userdetails" );
		$bool = $this->db->select ();
		
		if ($bool == 1) {
			$this->_result = $this->db->resultArray ();
			
			if (! empty ( $this->_result [0] ["user_id"] )) {
				
				$this->_userID = $this->_result [0] ["user_id"];
				$this->_userType = $this->_result [0] ["user_type"];
				$this->_emailID = $this->_result [0] ["email"];
			} else {
				
				$bool = 0;
			}
		}
		
		return $bool;
	}
	private function fieldsValid($fieldEmail, $fieldPassword) {
		$bool = TRUE;
		
		return $bool;
	}
	private function encryptPassword($password) {
		return $password;
	}
	public function setLanguage($value) {
		$_SESSION ["lang"] = $value;
	}
	public function showRegistrationView() {
		require_once "./views/RegistrationView.php";
	}
}

?>
