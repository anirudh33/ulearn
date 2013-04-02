<?php

/*
 * *************************** Creation Log ******************************* 
 * File Name - index.php 
 * Description - Landing page
 * Version - 1.0 Created by - Anirudh Pandita Created on - March 02, 2013 
 * *************************************************************************** 
 * Sr.NO. Version Updated by Updated on Description 
 * ------------------------------------------------------------------------- 
 * 1 1.0 Anirudh Pandita March 08, 2013 paths,language set in session 
 * 
 * ************************************************************************
 */

//@todo search filters on manage teacher view in Admin views
/* Starting session and creating session variables to store paths and default database */
session_start();

$_SESSION['SITE_PATH'] = getcwd();
$_SESSION['DOMAIN_PATH'] = $_SERVER['SERVER_NAME'] . '/ulearn/branches/development';
$_SESSION['DB_NAME'] = 'ulearndb';

/*log errors to a specific file*/
ini_set('log_errors',1);
ini_set('error_log',getcwd().'/errors.log');

/* Requiring all the necessary files controllers and libraries required */

/* Libraries */
require_once ($_SESSION['SITE_PATH'] . '/libraries/DBConnect.php');
require_once ($_SESSION['SITE_PATH'] . '/libraries/AModel.php');
require_once ($_SESSION['SITE_PATH'] . '/libraries/AUser.php');
require_once ($_SESSION['SITE_PATH'] . '/libraries/InitiateUser.php');
require_once ($_SESSION['SITE_PATH'] . '/libraries/Language.php');
require_once ($_SESSION['SITE_PATH'] . '/libraries/Paging.php');
require_once ($_SESSION['SITE_PATH'] . '/libraries/UserFactory.php');
require_once ($_SESSION['SITE_PATH'] . '/libraries/Authenticate.php');
require_once ($_SESSION['SITE_PATH'] . '/libraries/securimage/securimage.php');
require_once ($_SESSION['SITE_PATH'] . '/libraries/Authenticate.php');


/* Models */
require_once ($_SESSION['SITE_PATH'] . '/models/Admin.php');
require_once ($_SESSION['SITE_PATH'] . '/models/Teacher.php');
require_once ($_SESSION['SITE_PATH'] . '/models/Student.php');
require_once ($_SESSION['SITE_PATH'] . '/models/Registration.php');
require_once ($_SESSION['SITE_PATH'] . '/models/Course.php');

/* Controllers  */
require_once ($_SESSION['SITE_PATH'] . '/controllers/AController.php');
require_once ($_SESSION['SITE_PATH'] . '/controllers/MainController.php');
require_once ($_SESSION['SITE_PATH'] . '/controllers/AdminController.php');
require_once ($_SESSION['SITE_PATH'] . '/controllers/TeacherController.php');
require_once ($_SESSION['SITE_PATH'] . '/controllers/StudentController.php');


/* Getting default Language to be used in various views
 * Usage: Just use $lang->CONSTANTNAME to display the language specific value */
$lang = Language::getinstance();

/* Method Handling from called from Views */
if (isset($_REQUEST['method'])) {
    
    if (isset($_REQUEST['controller'])) {
        
        if ($_REQUEST['controller'] == 'Admin') {            
            $obj1 = new AdminController();
        } elseif ($_REQUEST['controller'] == 'Student') {
            $obj1 = new StudentController();
        } elseif ($_REQUEST['controller'] == 'Teacher') {
            $obj1 = new TeacherController();
        } elseif ($_REQUEST['controller'] == 'Main') {
            $obj1 = new MainController();
        }      
    }
    
    
    $obj1->$_REQUEST['method']();
}

/* Creating MainController Object as no method was called */
$obj = new MainController();


/*
 * Check if a user is logged in using session variable which is set everytime a 
 * user logs in
 */

if (isset($_SESSION['userType'])) {
	
    $obj->showUserPanel();
    die;
}

/* If no method has been called show the main view/homepage */
if (! isset($_REQUEST['method']) or isset($_REQUEST['language'])) {
	
    /*showing main view*/
    $obj->showMainView();
}

?>




