<?php

/*
 * *************************** Creation Log *******************************
  File Name                   -  MainController.php
  Description                 -  Main Controller 
  Version                     -  1.0
  Created by                  -  Anirudh Pandita
  Created on                  -  March 01, 2013
 * ***************************************************************************
 * Sr.NO.        Version        Updated by           Updated on          Description
  -------------------------------------------------------------------------
    1            1.0            Anirudh Pandita     March 08, 2013      paths corrected
 * ************************************************************************
 */

  
require_once ($_SESSION["SITE_PATH"]."/libraries/InitiateUser.php");
require_once ($_SESSION["SITE_PATH"]."/controllers/AdminController.php");
//require_once ($_SESSION["SITE_PATH"]."/controllers/TeacherController.php");
//require_once ($_SESSION["SITE_PATH"]."/controllers/StudentController.php");


// The main controller for showing the main 
class MainController {
private $_message;
private $_authenticationStatus=0;

public function getAuthenticationStatus() {
    return $this->_authenticationStatus;
}
public function setauthenticationStatus($authenticationStatus) {
    $this->_authenticationStatus = $authenticationStatus;
}
public function getMessage() {
    return $this->_message;
}

public function setMessage($message) {
    $this->_message = $message;
}

    public function __construct() {
         
            }
    public function showMainView() {
        
        require_once "./views/MainView.php";
        //$this->initiateLogin();
    }
    

    public function initiateLogin() {
        //echo "initiating login"; 
        //die("i am here");  
        $fieldEmail= $_POST["fieldEmail"];
        $fieldPassword = $_POST["fieldPassword"];
       

        $objInitiateUser = new InitiateUser();
        //$objInitiateUser->login($fieldEmail, $fieldPassword);
        $this->setAuthenticationStatus($objInitiateUser->login($fieldEmail, $fieldPassword));
        if($this->getAuthenticationStatus()==1)
        {
            $this->showUserPanel();
            
        }
    }
    
    public function showUserPanel()
    {
        
        //echo "Going to show User Panel"; 
        $controllerName=ucfirst($_SESSION["userType"])."Controller";
        $objController= new $controllerName();
        $objController->process();
        
                
        
       
    }
    
   public function setLanguageClick()
   {
   
   	$objInitiateUser = new InitiateUser();
   	
   	$objInitiateUser->setLanguage($_REQUEST["value"]);
   } 
   
   public function registerClick()
   {
   	$_SESSION["register"]="active";
   	//header('Location: http://localhost/ulearn/branches/development/index.php');
   $this->showRegisterView();
   }
   
   public function showRegisterView()
   {
   	
   	require_once "./views/RegistrationView.php";
   	
   	
   }

}


//$obj= new MainController();
//$obj->initiateLogin();
?>