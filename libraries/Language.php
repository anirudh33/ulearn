<?php

/*
 * *************************** Creation Log ******************************* 
 * File Name - lang.php Project
 * Name - ulearn 
 * Description - Class file for language changing 
 * Version - 1.0 Created by - Ujjwal Rawlley & Tanu Trehan 
 * Created on - March 06, 2013 
 * **************************** Update Log ******************************** 
 * Sr.NO. Version Updated by Updated on Description 
 * -------------------------------------------------------------------------
 *  1 1.0 Anirudh Pandita March 08, 2013 
 *  ************************************************************************
 */


/* Class having functions to convert to desired language */
class Language
{

    private static $_instance; // store a instance of language class
    private $_langType; // store user selected language type
    private $_languageConstants = array(
        'EN' => array(
        		
            'TITLE' => "Welcome to ulearn",
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
            'VIEWPROFILE' => "View Profile",
            'REPORT' => "Report Generation",
            'LOGIN' => "Login",
            'REGISTER' => "Register",
            'HELLOADMINISTRATOR' => "Hello Administrator",
            'LOGOUT' => "Log Out",
            'CHOOSEWORK' => "Choose from the categories to start",
            'QUOTE' => "Education's purpose is to replace an empty mind with an open one.",
            'WELCOMEADMINISTRATOR' => "Welcome Administrator",
            'COURSES' => "Courses",
            'HINDI' => "हिंदी",
            'ENGLISH' => "English",
           
            'EDITPROFILE'=>"Edit Profile",
            'REPORTGENERATION'=>"Generate Reports",
            'MYPROFILE'=>"My Profile",
            'ABOUTME'=>"About Me",
            'REGISTEREDTEACHERDETAILS'=>"Registered Teacher Details",
            'ID'=>"Id",
            'FIRSTNAME'=>"First Name",
            'LASTNAME'=>"Last Name",
            'STATUS'=>"Status",
            'OPTIONS'=>"Options",
            'REGISTEREDSTUDENTDETAILS'=>"Registered Student Details",
            'PHONE'=>"Phone",
            'QUALIFICATION'=>"Qualification",
            'ADDRESS'=>"Address",
            'FURTHERINFO'=>"Further Information",
            "GENDER"=>'Gender',
            "BIRTHDATE"=>'Birthdate',
            "HELPFULINFO"=>'Helpful Information',
            "INSTRUCTION"=>'From now your email will be used as UserName',
            "TERMS"=>'Terms and Mailing',
            "ACCEPT"=>'I accept the',
            "CONDITIONS"=>'Terms and Conditions',
            "RECIEVE"=>'I want to receive personalized offers by your site',
            "EDIT"=>'Edit',
            'PERSONALDETAILS'=>"Personal Details ",
	    'COURSENAME'=>"Course Name",
		
            
            
        ),
        'HINDI' => array(
        'COURSENAME'=>"कोर्स का नाम",
        "EDIT"=>'संपादित करें',
        "RECIEVE"=>'हम अपनी साइट के द्वारा व्यक्तिगत प्रस्ताव प्राप्त करना चाहते हैं',
        "CONDITIONS"=>'नियम और शर्तें',
        "ACCEPT"=>'मैं स्वीकार करता हूँ',
        "TERMS"=>'शर्तें और मेलिंग',
        "INSTRUCTION"=>'अब से अपने ईमेल आगे के लिए शीर्ष उपयोगकर्ता नाम के रूप में इस्तेमाल किया जाएगा',
        
        "HELPFULINFO"=>'उपयोगी जानकारी',
        "BIRTHDATE"=>'जन्मतिथि',
        "GENDER"=>'लिंग',
        'FURTHERINFO'=>"अतिरिक्त जानकारी",
        'ADDRESS'=>"पता",
        'QUALIFICATION'=>"योग्यता",
        'PHONE'=>"फ़ोन",
        'PERSONALDETAILS'=>"व्यक्तिगत विवरण",
        'REGISTEREDSTUDENTDETAILS'=>"पंजीकृत छात्र विवरण",
        'FIRSTNAME'=>"प्रथम नाम",
        'LASTNAME'=>"सरनेम",
        'STATUS'=>"हैसियत",
        'OPTIONS'=>"विकल्प",
        'ID'=>"आईडी संख्या",
        'REGISTEREDTEACHERDETAILS'=>"पंजीकृत शिक्षक विवरण",
        'ABOUTME'=>"मेरे बारे में",
        'REPORTGENERATION'=>"उत्पन्न रिपोर्ट",
        'EDITPROFILE'=>"प्रोफ़ाइल संपादित करें",
        'MANAGESTUDENT'=>"छात्र के खाते का प्रबंधन",
        'MANAGETEACHER'=>"शिक्षक खाता प्रबंधित करें",
            'TITLE' => "Ulearn में आपका स्वागत है",
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
            'VIEWPROFILE' => "प्रोफ़ाइल देखें",
            'REPORT' => "रिपोर्ट उत्पन्न",
            'LOGIN' => "लॉग इन",
            'REGISTER' => "रजिस्टर",
            'HELLOADMINISTRATOR' => "नमस्ते व्यवस्थापक",
            'CHOOSEWORK' => "काम चुनें",
            'QUOTE' => " बिना शिक्षा प्राप्त किये कोई व्यक्ति अपनी परम ऊँचाइयों को नहीं छू सकता.",
            'WELCOMEADMINISTRATOR' => "व्यवस्थापक आपका स्वागत है ",
            'LOGOUT' => "लॉगआउट",
            'COURSES' => "पाठ्यक्रम",
            'HINDI' => "हिंदी",
            'ENGLISH' => "अंग्रेज़ी",
            'COURSES' => "पाठ्यक्रम",
            'HINDI' => "हिंदी",
            'ENGLISH' => "अंग्रेज़ी",
            'MYPROFILE'=>"मेरा प्रोफ़ाइल"
        )
    );

    private function __construct ()
    {}

    public static function getinstance ()
    {
        if (is_null(Language::$_instance)) {
            self::$_instance = new Language();
        }
        return self::$_instance;
    }

    public function __get ($key)
    {
        $this->getLangType();
        return $this->_languageConstants[$this->_langType][$key];
    }
    // this function fetch the user selected language type from session
    private function getLangType ()
    {
        if (isset($_SESSION['lang'])) {
            $this->_langType = $_SESSION['lang'];
        } else {
            $this->_langType = 'EN';
        }
    }
    
    // public function setvalues() {
    // $fp = fopen('define.php', 'w');
    //
    // foreach ($this->_lang as $key1 => $value) {
    //
    // fwrite($fp, " define('" . $key1 . "', '" . $value . "');\n");
    //
    // //echo "\n";
    // //define('FIRSTNAME', 'first name*');
    // echo $key1;
    // echo $value;
    // }
    // }
}
?>
 
