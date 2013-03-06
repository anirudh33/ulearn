<?php

/*
 * *************************** Creation Log *******************************
  File Name                   -  MainController.php
  Description                 -  Main Controller 
  Version                     -  1.0
  Created by                  -  Anirudh Pandita
  Created on                  -  March 01, 2013
 * ***************************************************************************
 */
require_once $_SERVER["DOCUMENT_ROOT"] . '/ulearn/libraries/InitiateUser.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/ulearn/controllers/AdminController.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/ulearn/controllers/TeacherController.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/ulearn/controllers/StudentController.php';

//session_start();
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
        
        require_once $_SERVER["DOCUMENT_ROOT"] . '/ulearn/views/MainView.php';
        //$this->initiateLogin();
    }

    public function initiateLogin() {
        echo "initiating login";    
        echo $fieldEmail= $_POST["fieldEmail"];
        echo $fieldPassword = $_POST["fieldPassword"];
       

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
        
        echo "Going to show User Panel"; 
        $controllerName=ucfirst($_SESSION["userType"])."Controller";
        $objController= new $controllerName();
        
        
                
        
       
    }

}

if(isset($_REQUEST['method'])){
   
    $obj= new MainController();
    $obj->$_REQUEST['method']();
   
}
 else {

    // ECHO "<br>NAAAAAAA"; 
}
//$obj= new MainController();
//$obj->initiateLogin();
?>