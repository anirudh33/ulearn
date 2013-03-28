<?php
abstract class AController {
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
		$authObject = new Authenticate ( $this->getRequiredType () );
		if ($authObject->isValidUser () != 1) {
			header ( "Location:http://" . $_SESSION ["DOMAIN_PATH"] . "/index.php?msg=" . $authObject->getMessage () . "" );
		}
	}
	public function process() 
	{
		$this->createUser ();
		
		$this->showView ();
	}
	
	protected function showView ($data = array())
	{
		
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
