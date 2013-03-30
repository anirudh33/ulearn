<?php
/*
 * *************************** Creation Log ******************************* File Name - Authenticate.php Description - Class file for Authentication of users credentials Version - 1.0 Created by - Anirudh Pandita Created on - March 02, 2013 *************************************************************************** Sr.NO. Version Updated by Updated on Description ------------------------------------------------------------------------- 1			1.0			Anirudh Pandita	28/04/2013	Being used in various controllers ************************************************************************
 */
class Authenticate {
	private $_message = "";
	private $_requiredType = "";
	
	/**
	 *
	 * @return the $_message
	 */
	public function getMessage() {
		return $this->_message;
	}
	
	/**
	 *
	 * @param string $_message        	
	 */
	public function setMessage($_message) {
		$this->_message .= $_message;
	}
	public function getRequiredType() {
		return $this->_requiredType;
	}
	public function setRequiredType($requiredType) {
		$this->_requiredType = $requiredType;
	}
	
	/* Check if user has logged in */
	public function isValidUser() {
		if ($this->sessionExists () == 1) {
			
			return 1;
		} else {
			
			$this->setMessage("Session has expired or doesnt exist");
			
			return 0;
		}
	}
	
	/* Check if user session exists */
	public function sessionExists() {
		
		// print_r($_SESSION);
		if (isset ( $_SESSION ['userID'] ) and isset ( $_SESSION ['userType'] ) and $_SESSION ['emailID']) {
			// echo "-----------session exists on controller ------";
			
			if ($this->isRequiredType () == 1) {
				
				return 1;
			} else {
				
				$this->_message = "You are not authorized to view this page";
				
				return 0;
			}
		} else {
			// echo "-----------session does not exist on controller ------";
			
			return 0;
		}
	}
	
	/* Check if user in session is of this particular type like Admin in this case */
	public function isRequiredType() {
		if ($_SESSION ['userType'] == $this->getRequiredType ()) {
			return 1;
		} else {
			return 0;
		}
	}
	/* Using PHP filters to validate login form input */
	public function validate() {
		if (array_filter ( $_POST )) {
			if (! filter_var ( $_POST ["fieldEmail"], FILTER_VALIDATE_EMAIL )) {
				$this->setMessage ( "Email not valid" );
			}
		} else {
			$this->setMessage ( "Fields cant be left empty" );
		}
		$msg = $this->getMessage ();
		if (! empty ( $msg )) {
			header ( "Location:http://" . $_SESSION ["DOMAIN_PATH"] . "/index.php?msg=" . $this->getMessage () . "" );
			die ();
		}
	}
	/* Function to validate Registration form data */
	public function validateRegistration() {
		
		
		if (array_filter ( $_POST )) {
			if (! filter_var ( $_POST ["email"], FILTER_VALIDATE_EMAIL )) {
				$this->setMessage ( "Email not valid" );
			}
			if (! filter_var ( $_POST ["phone"], FILTER_VALIDATE_INT)) {
				$this->setMessage ( "Phone no not valid, enter numbers only" );
			}
			
			$securimage = new Securimage();
			if ($securimage->check($_POST['captcha_code']) == false) {
				$this->setMessage ( "The security code entered was incorrect.<br /><br />" );
				
			}
				
			
		}else {
			$this->setMessage ( "Fields cant be left empty" );
		}
		$msg = $this->getMessage ();
		if (! empty ( $msg )) {
			header ( "Location:http://" . $_SESSION ["DOMAIN_PATH"] . 
			"/index.php?method=registerClick&controller=Main&msg=" . $this->getMessage () . "" );
			die ();
		}
	}
	
	public function logIP(){
		echo "<pre>".$_SERVER['REMOTE_ADDR'];
		$_SESSION["logged"][]=$_SERVER['REMOTE_ADDR'];
	}
	public function checkIPExists()
	{
		print_r($_SESSION["logged"]);
		foreach ($_SESSION["logged"] as $key=>$value)
		{
			if($_SERVER[REMOTE_ADDR]==$value)
			{
				echo "disallow";
			}
			else {
				echo "allow";
			}
		}
		die;
	}
}

?>