<?php

/*
 * *************************** Creation Log ******************************* File Name - MainController.php Description - Main Controller Version - 1.0 Created by - Anirudh Pandita Created on - March 01, 2013 *************************************************************************** Sr.NO. Version Updated by Updated on Description ------------------------------------------------------------------------- 1 1.0 Anirudh Pandita March 08, 2013 paths corrected ************************************************************************
 */
require_once ($_SESSION["SITE_PATH"] . "/libraries/InitiateUser.php");
require_once ($_SESSION["SITE_PATH"] . "/controllers/AdminController.php");
// require_once ($_SESSION["SITE_PATH"]."/controllers/TeacherController.php");
require_once ($_SESSION["SITE_PATH"]."/controllers/StudentController.php");

// The main controller for showing the main
class MainController
{

    private $_message;

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

    public function __construct ()
    {}

    public function showMainView ()
    {
        require_once "./views/MainView.php";
        // $this->initiateLogin();
    }

    /*Starts login procedure by fetching username password from POST*/
    public function initiateLogin ()
    {
        $fieldEmail = $_POST["fieldEmail"];
        $fieldPassword = $_POST["fieldPassword"];
        
        $objInitiateUser = new InitiateUser();
        
        $this->setAuthenticationStatus
        ($objInitiateUser->login($fieldEmail, $fieldPassword));
        if ($this->getAuthenticationStatus() == 1) {
            $this->showUserPanel();
        }
    }

    public function showUserPanel ()
    {
        
        // echo "Going to show User Panel";
        $controllerName = ucfirst($_SESSION["userType"]) . "Controller";
        $objController = new $controllerName();
        $objController->process();
    }

    public function setLanguageClick ()
    {
        $objInitiateUser = new InitiateUser();
        
        $objInitiateUser->setLanguage($_REQUEST["value"]);
    }

    public function registerClick ()
    {
      
        // header('Location: http://localhost/ulearn/branches/development/index.php');
        $this->showRegisterView();
    }

    public function showRegisterView ()
    {
        require_once "./views/RegistrationView.php";
    }
    public function registerUser()
    {
    	
    	
    	$email=$_POST["email"];
    	$password=$_POST["password"];
    	$firstname=$_POST["firstname"];
    	$lastname=$_POST["lastname"];
    	$phone=$_POST["phone"];
    	$address=$_POST["address"];
    	$qualification=$_POST["qualification"];
    	$gender=$_POST["gender"];
    	$date=$_POST["date"];
    	$usertype=$_POST["usertype"];
    	
    	if($_POST["usertype"]=="student")
    	{
    		//echo"student";
    		$obj=new Registration();
    		$obj->newStudentRegistration($email,$password,$firstname,$lastname,$phone,$address,$qualification,$gender,$date,$usertype);
    	}
    	elseif($_POST["usertype"]=="teacher") 
    	{
    		$obj=new Registration();
    		$obj->newTeacherRegistration($email,$password,$firstname,$lastname,$phone,$address,$qualification,$gender,$date,$usertype);
    	}
    }
}

// $obj= new MainController();
// $obj->initiateLogin();
?>