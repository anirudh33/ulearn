<?php
/*
 * *************************** Creation Log ******************************* 
 * File Name - authentication.php Description - Class file for Authentication of users credentials Version - 1.0 Created by - Anirudh Pandita Created on - March 02, 2013 
 * *************************************************************************** 
 * Sr.NO. Version Updated by Updated on Description 
 * ------------------------------------------------------------------------- 
 * 1 1.0 Anirudh Pandita March 08, 2013 paths,language set in session 
 * ************************************************************************
 */
session_start ();

$_SESSION ["SITE_PATH"] = getcwd ();

$_SESSION ["DOMAIN_PATH"] = $_SERVER ["SERVER_NAME"] . "/ulearn/branches/development";
$_SESSION ["DB_NAME"] = "ulearndb";
//$_SESSION ['lang'] = "EN";
require_once ($_SESSION ["SITE_PATH"] . "/controllers/MainController.php");

$obj = new MainController ();
if (isset ( $_REQUEST ["msg"] )) {
	$message = $_REQUEST ["msg"];
}
if (isset ( $_SESSION ["userType"] )) {
	$obj->showUserPanel ();
} else {
	// echo "showing main view";*/
	$obj->showMainView ();
}
?>




