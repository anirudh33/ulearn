<?php
/*
 * *************************** Creation Log ******************************* 
 * File Name 	- MainController.php 
 * Description 	- Main Controller Version - 1.0 
 * Created by	- Anirudh Pandita Created on - March 01, 2013 
 * **********************Update Log ***************************************
 * Sr.NO. Version Updated by Updated on Description 
 * ------------------------------------------------------------------------- 
 * 1 	1.0 	Anirudh Pandita March 08, 2013 paths corrected 
 * 2 	1.0 	Kawaljeet Singh March 15, 2013 Registration 
 * 3 	1.0 	Ujjwal Rawlley 	April 04, 2013 Mailing for contact us 
 * 4    1.0     Anirudh Pandita April 04, 2013 Comments done
 * 5	
 * ************************************************************************
 */

/* The Main controller for showing the Main View */
class MainController
{
    /* Any messages to be shown to user */
    private $_message;
    
    /* Guess: To check if authentication done or not
     * @todo anirudh: find usage
     */
    private $_authenticationStatus = 0;
	
    
    /*Gets the value of variable private $_authenticationStatus */
    public function getAuthenticationStatus ()
    {
        return $this->_authenticationStatus;
    }

    /*Sets the value of variable private $_authenticationStatus*/
    public function setauthenticationStatus ($authenticationStatus)
    {
        $this->_authenticationStatus = $authenticationStatus;
    }

    /*Gets the value of variable private private $_message */
    public function getMessage ()
    {
        return $this->_message;
    }

    /*Sets the value of variable private private $_message */
    public function setMessage ($message)
    {
        $this->_message = $message;
    }

    /* Shows home page */
    public function showMainView ()
    {
    	$lang=Language::getinstance();
        require_once "views/MainView.php";        
    }
    
    /* Starts login procedure by fetching username, password from POST */
    public function initiateLogin ()
    {
    	$authObject= new Authenticate();
    	
    /* Validate username password */
    	$authObject->validateLogin();
    	
        $fieldEmail = $_POST["fieldEmail"];
        $fieldPassword = $_POST["fieldPassword"];
       
        $objInitiateUser = new InitiateUser();
        
        $this->setAuthenticationStatus($objInitiateUser->login($fieldEmail, $fieldPassword));
       
        if ($this->getAuthenticationStatus() == 1) {
    /* Visitor date, ip, email logged */  	
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
    
    /* Method called on clicking the register button on homepage slider */
    public function registerClick ()
    {        
        $this->showRegisterView();
    }

    /* Shows new user registration page */
    public function showRegisterView ()
    {
    	$authObject= new Authenticate();
    	$authObject->addRegistrationCount(10000);
        require_once "./views/RegistrationView.php";
    }

    /* @todo kawal: Usage unknown... dont use confirm check box send mail directly
     * and use phpmailer */
    public function confirm()
    {
    	$email=$_GET['email'];
    	$pass=$_GET['passkey'];
    	$obj = new Registration();
    	$obj->confirmEmail($email,$pass);
    }
/************************************** Contact Us Mailing Function *************************************************/
    /* @todo ujjwal: use phpmailer */
    public function sendmail()
	{
	$name=$_POST["name"];
	$from=$_POST["email"];
	$message=$_POST["message"];

	$to = "ujjrawl@gmail.com";
	$subject = "enquiry";
	$headers = "From:" . $from;
	
	$bool = mail ( $to, $subject, $message, $headers );
			if ($bool == true) {
				
				//$_SESSION["SuccessMessage"]='';
				$_SESSION["SuccessMessage"].="Mail sent, 
						it will take some time to reach your mailbox if traffic is high <br>";
				
				} else {
					
					//$_SESSION["ErrorMessage"]='';
					$_SESSION["ErrorMessage"].="Mail not sent, we are working to sort the issue <br>";					
			}
			header ( "Location:http://" . $_SESSION ["DOMAIN_PATH"] . "/index.php");
			//@todo chetan sir: doesnt show error message if die isnt written reason unknown
			die;
    }

    /* Called when user submits the registration form */
    public function registerUser ()
    {
    	
    	
    	//$authObject= new Authenticate();
    	//$authObject->validateRegistration();
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
 
        
        /* Confirmation Mail */
		/*	$to = $_POST ["email"];
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
		*/
		
		if ($_POST ["usertype"] == "student") {
			// echo"student";
			$obj = new Registration ();
			$obj->newStudentRegistration ( $email, $password, $firstname, $lastname, $phone, $address, $qualification, $gender, $date, $usertype, $status, $profilepicture, $confirm_code );
		} elseif ($_POST ["usertype"] == "teacher") {
			$obj = new Registration ();
			$obj->newTeacherRegistration ( $email, $password, $firstname, $lastname, $phone, $address, $qualification, $gender, $date, $usertype, $status, $profilepicture, $confirm_code );
		}
		/*@todo anirudh: Count no of times registration done from this ip */
		
	}
	
	/* Logs out the user by destroying session */
	public function logout() {
		session_destroy ();
		header ( "Location:http://" . $_SESSION ["DOMAIN_PATH"] . "/index.php" );
	}
}
?>
