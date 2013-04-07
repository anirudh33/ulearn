<?php
/*
 * *************************** Creation Log *******************************
* File Name     -     AController.php
* Description   -     Abstract Controller Version - 1.0
* Created by    -     Anirudh Pandita Created on - March 01, 2013
* **********************Update Log ***************************************
* Sr.NO. Version Updated by Updated on Description
* -------------------------------------------------------------------------
* 1 	1.0 	Anirudh Pandita March 28, 2013 Functions added
* 2     1.1     Anirudh Pandita April 04, 2013 Comments done
* ************************************************************************
*/

/**
 * @author anirudhpandita
 * The Abstract controller class containing all common functions for
 * AdminController, StudentController, TeacherController
 */
abstract class AController {
    
	/**
	 * @var For matching the type of user logged in matches the panel he/she logs in
	 */
	protected $_requiredType = "";
	/**
	 * @var User Object (Admin/Teacher/Student) created to access various methods
	 */
	protected $_objUser = "";
	
	/**
	 * @return To get the value of $_requiredType
	 */
	public function getRequiredType() 
	{
		return $this->_requiredType;
	}
	/**
	 * @param  $requiredType
	 * Sets the value of $_requiredType
	 */
	protected function setRequiredType($requiredType) 
	{
		$this->_requiredType = $requiredType;
	}
	
	/**
	 * Constructor called for all the controllers except MainController.
	 * Performs authentication on ip and invalid requests
	 */
	public function __construct() 
	{
		$_SESSION["ErrorMessage"]='';
		$_SESSION["SuccessMessage"]='';
		$_SESSION["NoticeMessage"]='';
		$authObject = new Authenticate ( );
		$authObject->checkIPExists();
		
		$authObject->setRequiredType($this->getRequiredType () );
		if ($authObject->isValidUser () != 1) {
			
			$_SESSION["ErrorMessage"].=$authObject->getMessage (). "<br>";
			
		    header ( "Location:http://" . $_SESSION ["DOMAIN_PATH"] . "/index.php?msg=" . $authObject->getMessage () . "" );
			
		}
	}
	
	/**
	 * Starts the processing in every controller with creation of user 
	 * to showing the respective view
	 */
	public function process() 
	{
		$this->createUser ();
		
		$this->showView ();
		
	}	

 	/**
 	 * Shows the mainpanel of user(Admin/Student/Teacher)
 	 */
 	public function showView ()
    {        
        $this->showProfile();
    }
    
	/**
	 * Invokes UserFactory to create an object of required type
	 * depending on session set which contains userType logging in
	 */
	protected function createUser() {
		//@todo anirudh: create and use setter
		$this->_objUser = UserFactory::createUser ( ucfirst ( $_SESSION ["userType"] ) ); // user is created by calling the createUser method of the UserFactory class.
		$this->_objUser->setFirstName ( $_SESSION ["emailID"] );
	}
	
	public function writeMessage() {
	
		$body = $_POST ["body"];
		$subject = $_POST ["subject"];
	
		$sentto = $_POST ["sentto"];
	
		$this->createUser ();
	
		if(($this->_objUser->messageSend ( $body, $subject, $sentto ))==false) {
			$this->setCustomMessage("ErrorMessage", "Problem in sending message to student");
		} else {
			$this->setCustomMessage("SuccessMessage", "Message sent successfully");
		}
	}
	/**
	 * Shows register course view to register for a course to provide educational content
	 */
	public function registerCourseClick() {
		$objCourse = new Course ();
		$result = $objCourse->fetchCoursename ();
		if (! empty ( $result )) {
			$this->showSubStudentViews ( "registerCourse", $result );
		} else {
			$message = "You cannnot register<br> No courses exist yet";
			$this->setCustomMessage ( "ErrorMessage", $message );
		}
	}
	
	public function viewMessageClick() {
		$this->createUser ();
		list ( $messages, $result2 ) = $this->_objUser->messageShow ();
		If (! empty ( $messages )) {
			$this->showSubStudentViews ( "viewMessage", $messages, $result2 );
		} else {
			$message = "No messages for you<br>Have a good day :)";
			$this->setCustomMessage ( "NoticeMessage", $message );
		}
	}
	
	public function subjectClick() {
		$aid = $_REQUEST ["msgid"];
		$this->createUser ();
		$result = $this->_objUser->messageBody ( $aid );
		$this->showSubStudentViews ( "MessageBody", $result );
	}
	/**
	 * @param unknown $messageType
	 * @param unknown $message
	 * Uses toast to show messages to user
	 */
	
	public function setCustomMessage($messageType,$message)
	{
		$_SESSION ["$messageType"] .= $message."<br>";
		$this->showView ();
	}
	
	/**
	 * Logs out the user by destroying the session and redirecting to main page
	 */
	public function logout() {
		session_destroy ();
		header ( "Location:http://" . $_SESSION ["DOMAIN_PATH"] . "/index.php" );
	}
}
?>
