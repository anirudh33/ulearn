<?php
session_start();
require_once ($_SESSION["SITE_PATH"]."/models/Admin.php");
require_once ($_SESSION["SITE_PATH"]."/models/Teacher.php");
require_once ($_SESSION["SITE_PATH"]."/models/Student.php");
class UserFactory {
	public static function createUser($type) {
		$baseClass = 'AUser';
		$targetClass = ucfirst ( $type );
                //echo "-------------$targetClass---------".class_exists( $targetClass )."--------".is_subclass_of ( $targetClass, $baseClass )."------";
                
		if (class_exists ( $targetClass ) && is_subclass_of ( $targetClass, $baseClass )) {
			return new $targetClass ();
		} else {
			throw new Exception ( "The User type '$type' is not recognized." );
		}
	}
}
?>