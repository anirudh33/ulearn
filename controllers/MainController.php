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
        require_once "./views/MainView.php";        
    }
    
    /* Starts login procedure by fetching username, password from POST */
    public function initiateLogin ()
    {
    	$authObject= new Authenticate();
    	//$authObject->logIP();
    	//$authObject->checkIPExists();
    	$authObject->validate();
    	
        $fieldEmail = $_POST["fieldEmail"];
        $fieldPassword = $_POST["fieldPassword"];
       
        $objInitiateUser = new InitiateUser();
        
        $this->setAuthenticationStatus(
            $objInitiateUser->login($fieldEmail, $fieldPassword));
       
        if ($this->getAuthenticationStatus() == 1) {
        		
            $this->showUserPanel();
        }
    }
    
    /* Shows respective User Panel (Admin/Teacher/Student) depending 
     * on user type logged in */
    public function showUserPanel ()
    {
        
        //@todo check to see if direct call has been made and throw 
        //respective error if session not set
        
    	
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
        require_once "./views/RegistrationView.php";
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
        $profilepicture = addslashes(file_get_contents
            ($_FILES["profilepicture"]["tmp_name"]));
       
  /* if(isset($_POST['checkmail']))
{
	$to = $_POST["email"];
	$subject = "Test mail";
	$message = "Hello! This is a simple email message.";
	$from = "kawaljeet.singh@osscube.com";
	$headers = "From:" . $from;
	mail($to,$subject,$message,$headers);
	echo "Mail Sent.";
	
 }
 else
{
   echo "not sent ";
}
        
    */  
        if(empty($_POST[""]))
        {
        
        	
        }
        	
        
        
        if ($_POST["usertype"] == "student") {
            // echo"student";
            $obj = new Registration();
            $obj->newStudentRegistration($_POST);
        } elseif ($_POST["usertype"] == "teacher") {
            $obj = new Registration();
            $obj->newTeacherRegistration($email, $password, $firstname, $lastname, $phone, $address, $qualification, $gender, $date, $usertype, $profilepicture);
        }
    }
}
?>