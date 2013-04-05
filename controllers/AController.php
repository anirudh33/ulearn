<?php
/*
 * *************************** Creation Log *******************************
* File Name     -     MainController.php
* Description   -     Main Controller Version - 1.0
* Created by    -     Anirudh Pandita Created on - March 01, 2013
* **********************Update Log ***************************************
* Sr.NO. Version Updated by Updated on Description
* -------------------------------------------------------------------------
* 1 	1.0 	Anirudh Pandita March 28, 2013 Functions added
* 2     1.0     Anirudh Pandita April 04, 2013 Comments done
* ************************************************************************
*/

/**
 * @author anirudhpandita
 * The Abstract controller class containing all common functions for
 * AdminController, StudentController, TeacherController
 */
abstract class AController {
    
	/**
	 * @var 
	 */
	protected $_requiredType = "";
	protected $_objUser = "";
	
	public function getRequiredType() 
	{
		return $this->_requiredType;
	}
	protected function setRequiredType($requiredType) 
	{
		$this->_requiredType = $requiredType;
	}
	
	public function __construct() 
	{
		
		$authObject = new Authenticate ( );
		$authObject->checkIPExists();
		
		$authObject->setRequiredType($this->getRequiredType () );
		if ($authObject->isValidUser () != 1) {
			$_SESSION["ErrorMessage"].=$authObject->getMessage (). "<br>";
		    header ( "Location:http://" . $_SESSION ["DOMAIN_PATH"] . "/index.php?msg=" . $authObject->getMessage () . "" );
			
		}
	}
	public function process() 
	{
		$this->createUser ();
		
		$this->showView ();
		
	}
	

 	public function showView ()
    {        
        $this->showProfile();
    }
	/**
	 */
	protected function createUser() {
		$this->_objUser = UserFactory::createUser ( ucfirst ( $_SESSION ["userType"] ) ); // user is created by calling the createUser method of the UserFactory class.
		$this->_objUser->setFirstName ( $_SESSION ["emailID"] );
	}
	public function logout() {
		session_destroy ();
		header ( "Location:http://" . $_SESSION ["DOMAIN_PATH"] . "/index.php" );
	}
}
?>
