<?php

/*
 * *************************** Creation Log ******************************* 
 * File Name - InitiateUser.php 
 * Description - Class file for initiating login of users 
 * Version - 1.0 
 * Created by - Anirudh Pandita
 * Created on - March 01, 2013 
 * *************************************************************************** 
 * Sr.NO. Version Updated by Updated on Description 
 * ------------------------------------------------------------------------- 
 * 1 1.0 Anirudh Pandita March 02, 2013 2 1.0 Anirudh Pandita March 08, 2013 Paths set 
 * ***************************************************************************
 */

/**
 * @author anirudhpandita
 *
 */
class InitiateUser extends AModel {
	private $_password;
	private $_result = array ();
	private $_userID;
	private $_userType;
	private $_emailID;
	
	public function __construct() {
		parent::__construct ();
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
	
	
	/**
	 * Called from login method when user credentials in the system 
	 * have been checked
	 * 
	 * Usage: Sets userid, user type and email id of user in session
	 * for further usage
	 */
	private function setSession() {
		$_SESSION ["userID"] = $this->getUserID ();
		
		$_SESSION ["userType"] = $this->getUserType ();
		
		$_SESSION ["emailID"] = $this->getEmailID ();
	}
	
	
	/**
	 * @author anirudh pandita
	 * @param Email id of user trying to log in: $fieldEmail
	 * @param Password of user trying to log in: $fieldPassword
	 * Called by: initiateLogin in MainController
	 * @return number 1 if entry exists by calling exists function
	 * Usage: Checks for valid login information
	 */
	public function login($fieldEmail, $fieldPassword) {
	
	
		if ($this->fieldsValid ( $fieldEmail, $fieldPassword )) {
			
			$this->setEmailID ( $fieldEmail );
			$this->setPassword ( $fieldPassword );
			if ($this->exists ( $this->getEmailID (), $this->encryptPassword ( $this->getPassword () ) ) == 1) {                                           
				$this->setSession ();
				return 1;
			} else {
				$msg = "Login Failed username or password does not exist";
				$this->setCustomMessage ( "ErrorMessage", $msg );
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
			if (! empty ( $this->_result )) {
				$status = $this->fetchStatus ( $this->_result [0] ["user_type"] . "details", $this->_result [0] ["user_id"] );
				
				if (! empty ( $this->_result [0] ["user_id"] ) && $status == true) {
					
					$this->_userID = $this->_result [0] ["user_id"];
					$this->_userType = $this->_result [0] ["user_type"];
					$this->_emailID = $this->_result [0] ["email"];
				} else {
					
					$bool = 0;
				}
			} else {
				$bool = 0;
			}
		}
		
		return $bool;
	}
	private function fetchStatus($table, $uid) {
		$this->db->Fields ( array (
				"status" 
		) );
		$this->db->Where ( array (
				"user_id" => $uid,
				"status" => "1" 
		) );
		$this->db->From ( $table );
		$bool = $this->db->select ();
		$result = $this->db->resultArray ();
		
		if (empty ( $result [0] ["status"] )) {
			return false;
		} else {
			return true;
		}
	}
	private function fieldsValid($fieldEmail, $fieldPassword) {
		$bool = TRUE;
		
		return $bool;
	}
	private function encryptPassword($password) {
	    
		//  return sha1($password);
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
