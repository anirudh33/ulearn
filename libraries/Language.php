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
        'LOSTPASSWORD' => "Lost your password ?",
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
        'LOGIN'=>"Login",
        'REGISTER'=>"Register",
        'HELLOADMINISTRATOR'=>"Hello Administrator",
        'LOGOUT'=>"Log Out",
        'CHOOSEWORK'=>"Choose from the categories to start",
        'QUOTE'=>"Education's purpose is to replace an empty mind with an open one.",
        'WELCOMEADMINISTRATOR'=>"Welcome Administrator",
    ),
    'HINDI'=>array(
        'TITLE'=>"Ulearn में आपका स्वागत है",
        'HOME' => "होम ",
        'ABOUTUS' => "हमारे बारे में ",
        'CONTACT' => "हमसे संपर्क करें ",
        'RESOURCES' => "संसाधन ",
        'WELCOME' => "आपका स्वागत है ",
        'USERNAME' => "प्रयोक्ता नाम ",
        'PASSWORD' => "पासवर्ड ",
        'MEMBERLOGIN' => "सदस्य लॉगिन",
        'NOTAMEMBERYETSIGNUP' => "अभी तक प्रयोक्ता नहीं ? रजिस्टर करे  ",
        'VALIDATIONMESSAGE' => "वेलिडेशन संदेश ",
        'LOGINREGISTER' => "लॉग इन । रजिस्टर ",
        'HELLOGUEST' => "नमस्कार प्रयोक्ता ",
        'CLOSEPANEL' => "क्लोज पैनल ",
        'EMAILREQUIRED' => "ईमेल आवश्यक ",
        'PASSWORDREQUIRED' => "पासवर्ड आवश्यक  ",
        'ENTERPASSWORD' => "पासवर्ड दर्ज  करें  ",
        'NOTVALID' => "मान्य नहीं ",
        'LOSTPASSWORD' => "पासवर्ड खो गया है?",
        'REMEMBERME' => "मुझे याद रखें",
        'TO' => 'टू ',
        'HELLO' => 'नमस्कार ',
        'OPENPANEL' => "ओपन पैनल ",
        'FUNCTIONPERFORM' => "काम करना",
        'CATEGORIES' => "श्रेणियां",
        'MANAGETEACHER' => "शिक्षक खाते का प्रबंधन",
        'MANAGESTUDENT' => "छात्र खाते का प्रबंधन",
        'VIEWEDITPROFILE' => "देखने के / प्रोफ़ाइल संपादित",
        'REPORT' => "रिपोर्ट उत्पन्न",
        'LOGIN'=>"लॉग इन",
        'REGISTER'=>"रजिस्टर",
        'HELLOADMINISTRATOR'=>"नमस्ते व्यवस्थापक",
        'CHOOSEWORK'=>"काम चुनें",
        'QUOTE'=>" बिना शिक्षा प्राप्त किये कोई व्यक्ति अपनी परम ऊँचाइयों को नहीं छू सकता.",
        'WELCOMEADMINISTRATOR'=>"व्यवस्थापक आपका स्वागत है ",
        'LOGOUT'=>"Log Out Hindi",
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
 