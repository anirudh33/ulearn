<?php

/*
 * *************************** Creation Log *******************************
  File Name                   -  lang.php
  Project Name                -  Careerbook
  Description                 -  Class file for start
  Version                     -  1.0
  Created by                  -  Ujjwal Rawlley & Tanu Trehan
  Created on                  -  March 06, 2013
 * **************************** Update Log ********************************
  Sr.NO.        Version        Updated by           Updated on          Description
  -------------------------------------------------------------------------
    1            1.0            Anirudh Pandita     March 08, 2013      
 * ************************************************************************

 */
//session_start();

/*Class having functions to convert to desired language */

class Language {

    private static $_instance;   //store a instance of language class
    private $_langType;          //store user selected language type
    private $_languageConstants = array( 'EN'=>array(
        'TITLE'=>"Welcome to ulearn",
        'HOME' => "Home",
        'ABOUT US' => "About Us",
        'CONTACT' => "Contact Us",
        'RESOURCES' => "Resources",
        'WELCOME' => "Welcome",
        'USERNAME' => "Username",
        'PASSWORD' => "Password",
        'MEMBERLOGIN' => "Member Login",
        'NOTAMEMBERYET?' => "Not A Member Yet?",
        'SIGNUP' => "Sign Up",
        'VALIDATIONMESSAGE' => "Validation Messages",
        'LOGINREGISTER' => "Login | Register",
        'HELLOGUEST' => "Hello Guest",
        'CLOSEPANEL' => "Close Panel",
        'EMAILREQUIRED' => "Email Required",
        'PASSWORDREQUIRED' => "Password Required",
        'ENTERPASSWORD' => "Please enter your password",
        'NOTVALID' => "Not Valid",
        'LOSTPASSWORD' => "Lost you password",
        'REMEMBERME' => "Remember Me",
        'TO' => 'To',
        'HELLO' => 'Hello',
        'OPENPANEL' => "Open Panel",
        'FUNCTIONPERFORM' => "Functions you can perform",
        'CATEGORIES' => "Categories",
        'MANAGETEACHER' => "Manage Teacher Account",
        'MANAGESTUDENT' => "Manage Student Account",
        'VIEWEDITPROFILE' => "View / Edit Profile",
        'REPORT' => "Report Generation",
    ),
    'HINDI'=>array(
        'TITLE'=>"Ulearn में आपका स्वागत है",
        'HOME' => "Home in hindi",
        'ABOUTUS' => "About Us",
        'CONTACT' => "Contact Us",
        'RESOURCES' => "Resources",
        'WELCOME' => "Welcome",
        'USERNAME' => "Username",
        'PASSWORD' => "Password",
        'MEMBERLOGIN' => "Member Login",
        'NOTAMEMBERYETSIGNUP' => "Not A Member Yet? Sign Up",
        'VALIDATIONMESSAGE' => "Validation Messages",
        'LOGINREGISTER' => "Login | Register",
        'HELLOGUEST' => "Hello Guest",
        'CLOSEPANEL' => "Close Panel",
        'EMAILREQUIRED' => "Email Required",
        'PASSWORDREQUIRED' => "Password Required",
        'ENTERPASSWORD' => "Please enter your password",
        'NOTVALID' => "Not Valid",
        'LOSTPASSWORD' => "Lost you password",
        'REMEMBERME' => "Remember Me",
        'TO' => 'To',
        'HELLO' => 'Hello',
        'OPENPANEL' => "Open Panel",
        'FUNCTIONPERFORM' => "Functions you can perform",
        'CATEGORIES' => "Categories",
        'MANAGETEACHER' => "Manage Teacher Account",
        'MANAGESTUDENT' => "Manage Student Account",
        'VIEWEDITPROFILE' => "View / Edit Profile",
        'REPORT' => "Report Generation",
        'LOGIN'=>"login in hindi",
        'REGISTER'=>"register in hindi",
    ));

    private function __construct() {

      }

      public static function getinstance() {
      if (is_null(Language::$_instance)) {
      self::$_instance = new Language();
      }
      return self::$_instance;
      }

      public function __get($key){
      $this->getLangType();
      return $this->_languageConstants[$this->_langType][$key]; 

      }
      //this function fetch the user selected language type from session
      private function getLangType(){
      if(isset($_SESSION['lang'])){
      $this->_langType=$_SESSION['lang'];
      }
      else
      {
      $this->_langType='EN';
      }
      } 

//    public function setvalues() {
//        $fp = fopen('define.php', 'w');
//
//        foreach ($this->_lang as $key1 => $value) {
//
//            fwrite($fp, "   define('" . $key1 . "', '" . $value . "');\n");
//
//            //echo "\n";
//            //define('FIRSTNAME', 'first name*');
//            echo $key1;
//            echo $value;
//        }
// }

}
?>
 