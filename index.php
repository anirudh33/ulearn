<?php
/*
 * *************************** Creation Log ******************************* 
 * File Name - authentication.php Description - Class file for Authentication of users credentials 
 * Version - 1.0 Created by - Anirudh Pandita Created on - March 02, 2013 
 * *************************************************************************** 
 * Sr.NO. Version Updated by Updated on Description 
 * ------------------------------------------------------------------------- 
 * 1 1.0 Anirudh Pandita March 08, 2013 paths,language set in session 
 * ************************************************************************
 */

/*Starting session and creating session variables to store paths and default database*/
session_start ();
$_SESSION ["SITE_PATH"] = getcwd ();
$_SESSION ["DOMAIN_PATH"] = $_SERVER ["SERVER_NAME"] . "/ulearn/branches/development";
$_SESSION ["DB_NAME"] = "ulearndb";
require_once ($_SESSION ["SITE_PATH"] . '/libraries/AUser.php');
require_once ($_SESSION ["SITE_PATH"] . '/libraries/Language.php');
require_once ($_SESSION ["SITE_PATH"] . "/libraries/UserFactory.php");
require_once ($_SESSION ["SITE_PATH"] . "/controllers/MainController.php");
require_once ($_SESSION ["SITE_PATH"] . "/controllers/AdminController.php");
require_once ($_SESSION ["SITE_PATH"] . "/models/Admin.php");
require_once ($_SESSION ["SITE_PATH"] . "/models/Teacher.php");
require_once ($_SESSION ["SITE_PATH"] . "/models/Student.php");

/*Getting default Language*/
$lang = Language::getinstance ();

/* --------------------------------------- Method Handling from Views --------------------------------- */
if (isset ( $_REQUEST ['method'] )) {
	if (isset ( $_REQUEST ["controller"] )) {
		if ($_REQUEST ["controller"] == "Admin") {
			$obj1 = new AdminController ();
		} elseif ($_REQUEST ["controller"] == "Student") {
			$obj1 = new StudentController ();
		} elseif ($_REQUEST ["controller"] == "Teacher") {
			$obj1 = new TeacherController ();
		} 

		elseif ($_REQUEST ["controller"] == "Main") {
			$obj1 = new MainController ();
		}
		// echo "2";die;
	}
	
	$obj1->$_REQUEST ['method'] ();
}

$obj = new MainController ();
if (isset ( $_REQUEST ["msg"] )) {
	$message = $_REQUEST ["msg"];
}
if (isset ( $_SESSION ["userType"] )) {
	$obj->showUserPanel ();
} elseif (isset ( $_SESSION ["register"] )) {
	$obj->showRegisterView ();
	unset ( $_SESSION ["register"] );
} else {
	// echo "showing main view";*/
	$obj->showMainView ();
}

?>




