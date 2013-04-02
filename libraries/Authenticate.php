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
			
			$this->setMessage ( "Session has expired or doesnt exist" );
			
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
			if (! filter_var ( $_POST ["phone"], FILTER_VALIDATE_INT )) {
				$this->setMessage ( "Phone no not valid, enter numbers only" );
			}
			
			$securimage = new Securimage ();
			if ($securimage->check ( $_POST ['captcha_code'] ) == false) {
				$this->setMessage ( "The security code entered was incorrect.<br /><br />" );
			}
		} else {
			$this->setMessage ( "Fields cant be left empty" );
		}
		$msg = $this->getMessage ();
		if (! empty ( $msg )) {
			header ( "Location:http://" . $_SESSION ["DOMAIN_PATH"] . 
			"/index.php?method=registerClick&controller=Main&msg=" . $this->getMessage () . "" );
			die ();
		}
	}
	/*logs ip addresses with date and session*/
	public function logIP() {
		$line = date ( 'Y-m-d H:i:s' ) . "," . session_id () . "," . 
		$_SERVER ['REMOTE_ADDR'].",".$_SESSION["emailID"];
		file_put_contents ( 'visitors.log', $line . PHP_EOL, FILE_APPEND );
	}
	public function checkIPExists() {
	    fopen("visitors.log","a");
		if (file ( 'visitors.log' ) == false) {
			//die ( "file not found" );
		}
		$lines = file ( 'visitors.log' );
		$i = 0;
		$flag = 0;
		
		foreach ( $lines as $key => $value ) {
			$visitors [] = explode ( ',', $value );
			
			if (trim ( $visitors [$i] [2], PHP_EOL ) == trim ( $_SERVER ['REMOTE_ADDR'], " " )) {
				if(trim ( $visitors [$i] [3], PHP_EOL)==$_SESSION["emailID"] ) {
				if ($visitors [$i] [1] == session_id ()) {
					$dt = $visitors [$i] [0];
					$flag = 0;
				} elseif (! empty ( $dt )) {
					
					$flag = 1;
				}
				}
			}
			$i ++;
		}
		if ($flag == 1) {
			$o=new MainController ();
			$o->logout ();
		}
		$dt = "";
	}
	//Logs IP for registration count and prevents registration if greater than 10
	public function addRegistrationCount($noOfAttempts)
	{
		fopen("register.log","a");
		$regArray=file('register.log');
		$i = 0;
		$flag=0;
		$count = 1;
		
		
		if(!empty($regArray)) {
			$flag=1;
			
		foreach ( $regArray as $key => $value ) {
			
			
		
			if(trim($value,PHP_EOL)==$_SERVER["REMOTE_ADDR"]) {
			
				$count++;
			}elseif(trim($value,PHP_EOL)!=date( "w")) {
				fopen("register.log","w");
			}
			
			
			$i++;
		}
		}
		if($count>=$noOfAttempts) {
			
			$this->setMessage("Registration not allowed, max no of attempts 
					to register from a ip are <b>$noOfAttempts</b>");
			$msg = $this->getMessage ();
			if (! empty ( $msg )) {
				header ( "Location:http://" . $_SESSION ["DOMAIN_PATH"] .
				"/index.php?msg=" . $this->getMessage () . "" );
				die ();
			}
			
		}
			
			//logging user ip 
			if($flag==1) {
				$register=$_SERVER["REMOTE_ADDR"];
				
				file_put_contents ( 'register.log', $register . PHP_EOL, FILE_APPEND );
			}else {
				
				file_put_contents ( 'register.log', date( "w") . PHP_EOL, FILE_APPEND );
			}
			
		
		
		
		
	    
	}
	
}

?>