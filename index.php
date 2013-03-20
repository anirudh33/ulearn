<?php
/*
 * *************************** Creation Log ******************************* File Name - authentication.php Description - Class file for Authentication of users credentials Version - 1.0 Created by - Anirudh Pandita Created on - March 02, 2013 *************************************************************************** Sr.NO. Version Updated by Updated on Description ------------------------------------------------------------------------- 1 1.0 Anirudh Pandita March 08, 2013 paths,language set in session ************************************************************************
 */

/*Starting session and creating session variables to store paths and default database*/
session_start();
$_SESSION["SITE_PATH"] = getcwd();
$_SESSION["DOMAIN_PATH"] = $_SERVER["SERVER_NAME"] . "/ulearn/branches/development";
$_SESSION["DB_NAME"] = "ulearndb";
require_once ($_SESSION["SITE_PATH"] . '/libraries/DBConnect.php');
require_once ($_SESSION["SITE_PATH"] . '/libraries/AModel.php');
require_once ($_SESSION["SITE_PATH"] . '/libraries/InitiateUser.php');
require_once ($_SESSION["SITE_PATH"] . '/libraries/AUser.php');
require_once ($_SESSION["SITE_PATH"] . '/libraries/Language.php');
require_once ($_SESSION["SITE_PATH"] . "/libraries/UserFactory.php");
require_once ($_SESSION["SITE_PATH"] . "/controllers/MainController.php");
require_once ($_SESSION["SITE_PATH"] . "/controllers/AdminController.php");
require_once ($_SESSION["SITE_PATH"] . "/models/Admin.php");
require_once ($_SESSION["SITE_PATH"] . "/models/Teacher.php");
require_once ($_SESSION["SITE_PATH"] . "/models/Student.php");

/* Getting default Language */
$lang = Language::getinstance();

/* --------------------------------------- Method Handling from Views --------------------------------- */
if (isset($_REQUEST['method'])) {
    if (isset($_REQUEST["controller"])) {
        if ($_REQUEST["controller"] == "Admin") {
            $obj1 = new AdminController();
        } elseif ($_REQUEST["controller"] == "Student") {
            $obj1 = new StudentController();
        } elseif ($_REQUEST["controller"] == "Teacher") {
            $obj1 = new TeacherController();
        } 

        elseif ($_REQUEST["controller"] == "Main") {
            $obj1 = new MainController();
        }
        // echo "2";die;
    }
   //@todo default authentication check method to be called before calling any method
    $obj1->$_REQUEST['method']();
}

/* Creating MainController Object as no method was called */
$obj = new MainController();

/* Getting any error messages set */
if (isset($_REQUEST["msg"])) {
    $message = $_REQUEST["msg"];
    
}

/*
 * Check if a user is logged in using session variable which is set everytime a user logs in
 */
if (isset($_SESSION["userType"])) {
    $obj->showUserPanel();
}

/* If no method has been called show the main view/homepage */
elseif (! isset($_REQUEST["method"])) {
    
    // echo "showing main view";*/
    $obj->showMainView();
}

?>




