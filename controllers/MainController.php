<?php

/*
 * *************************** Creation Log ******************************* 
 * File Name - MainController.php Description - Main Controller Version - 1.0 
 * Created by - Anirudh Pandita Created on - March 01, 2013 
 * *************************************************************************** 
 * Sr.NO. Version Updated by Updated on Description 
 * ------------------------------------------------------------------------- 
 * 1 1.0 Anirudh Pandita March 08, 2013 paths corrected 
 * ************************************************************************
 * * *************************************************************************** 
 * Sr.NO. Version Updated by Updated on Description 
 * ------------------------------------------------------------------------- 
 * 1 1.0 Kawaljeet Singh March 15, 2013 Registration 
 * ************************************************************************
 */

/* The main controller for showing the main view */
class MainController
{

    private $_message;
    
    /**
     * Unknown usage of variable $_authenticationStatus
     */
    private $_authenticationStatus = 0;

    public function getAuthenticationStatus ()
    {
        return $this->_authenticationStatus;
    }

    public function setauthenticationStatus ($authenticationStatus)
    {
        $this->_authenticationStatus = $authenticationStatus;
    }

    public function getMessage ()
    {
        return $this->_message;
    }

    public function setMessage ($message)
    {
        $this->_message = $message;
    }

    /* Shows home page */
    public function showMainView ()
    {
        require_once "views/MainView.php";        
    }
    
    /* Starts login procedure by fetching username, password from POST */
    public function initiateLogin ()
    {
    	$authObject= new Authenticate();
    	
    	
    	$authObject->validate();
    	
        $fieldEmail = $_POST["fieldEmail"];
        $fieldPassword = $_POST["fieldPassword"];
       
        $objInitiateUser = new InitiateUser();
        
        $this->setAuthenticationStatus($objInitiateUser->login($fieldEmail, $fieldPassword));
       
        if ($this->getAuthenticationStatus() == 1) {
        	$authObject->logIP();	
            $this->showUserPanel();
        }
    }
    
    /* Shows respective User Panel (Admin/Teacher/Student) depending 
     * on user type logged in */
    public function showUserPanel ()
    {
        
        
        
    	
        $controllerName = ucfirst($_SESSION["userType"]) . "Controller";
        $objController = new $controllerName();
       
        $objController->process();
        
    }
    
    /* Change language called on clicking the desired language on mainview */
    public function setLanguageClick ()
    {
        $objInitiateUser = new InitiateUser();
        
        $objInitiateUser->setLanguage($_REQUEST["language"]);
    }

    public function registerClick ()
    {        
        $this->showRegisterView();
    }

    public function showRegisterView ()
    {
    	$authObject= new Authenticate();
    	$authObject->addRegistrationCount(100);
        require_once "./views/RegistrationView.php";
    }

    public function confirm()
    {
    	$email=$_GET['email'];
    	$pass=$_GET['passkey'];
    	$obj = new Registration();
    	$obj->confirmEmail($email,$pass);
    
    }
    
    public function registerUser ()
    {
    	$authObject= new Authenticate();
    	$authObject->validateRegistration();
        $email = $_POST["email"];
        $password = $_POST["password"];
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];
        $qualification = $_POST["qualification"];
        $gender = $_POST["gender"];
        $date = $_POST["date"];
        $usertype = $_POST["usertype"];
        $status='2';
        $profilepicture = addslashes(file_get_contents
            ($_FILES["profilepicture"]["tmp_name"]));
        $confirm_code=md5(uniqid(rand()));
		if (isset ( $_POST ['checkmail'] )) {
			$to = $_POST ["email"];
			$subject = "Confirmation Mail from Ulearn";
			$message = "http://localhost/ulearn/branches/development/index.php?method=confirm&controller=Main&passkey=$confirm_code&email=$email";
			$from = "kawaljeet.singh@osscube.com";
			$headers = "From:" . $from;
			$bool = mail ( $to, $subject, $message, $headers );
			if ($bool == true) {
				echo "Mail Sent.";
			} else {
				echo "Mail not sent";
			}
		}
		
		if ($_POST ["usertype"] == "student") {
			// echo"student";
			$obj = new Registration ();
			$obj->newStudentRegistration ( $email, $password, $firstname, $lastname, $phone, $address, $qualification, $gender, $date, $usertype, $status, $profilepicture, $confirm_code );
		} elseif ($_POST ["usertype"] == "teacher") {
			$obj = new Registration ();
			$obj->newTeacherRegistration ( $email, $password, $firstname, $lastname, $phone, $address, $qualification, $gender, $date, $usertype, $status, $profilepicture, $confirm_code );
		}
		/* Count no of times registration done from this ip */
		
	}
	public function logout() {
		session_destroy ();
		header ( "Location:http://" . $_SESSION ["DOMAIN_PATH"] . "/index.php" );
	}
}
?>