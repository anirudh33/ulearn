<?php
/* Creation Log

File Name                   -  StudentController.php
Description                 -  Controls all student related functions
Version                     -  1.0
Created by                  -  Tanu trehan
Created on                  -  March 28, 2013
* **************************** Update Log ********************************
Sr.NO.  Version	  Updated by        Updated on          Description
-------------------------------------------------------------------------
1		1.1		  Anirudh Pandita	April 07, 2013		Messages to be shown,
														miscellaneous notices fixed
2 		1.1		Kawaljeet Singh		April 10, 2013      Functions Added
* ************************************************************************
*/

class StudentController extends AController 
{
	/**
	 *
	 * @var Stores required type of user to check for Student controller
	 */
	protected $_requiredType = "student";
	
	 /* Method called to open all sub views in student view */
	public function showSubViews($viewName, $data, $data1 = '')
	{
		require_once $_SESSION ["SITE_PATH"] . '/views/StudentViews/StudentView.php';
	}
	
	 /* Method called on edit profile click in student view */
	public function editProfileClick()
	{
		$this->createUser ();
		$this->_objUser->fetchUser ();
		$this->showSubViews ( "editProfile", $this->_objUser->getStudentData () );
	}
	
	 /* Method called on submiting edit profile view */
	public function editStudentClick()
	{
		$authObject = new Authenticate ();
		$authObject->validateEditProfile ( "Student" );
		$firstname = $_POST ["firstname"];
		$lastname = $_POST ["lastname"];
		$phone = $_POST ["phone"];
		$address = $_POST ["address"];
		$qualification = $_POST ["qualification"];
		$gender = $_POST ["gender"];
		$dob = $_POST ["dob"];
		$this->createUser ();
		$this->_objUser->editStudent ( $firstname, $lastname, $phone, $address, $qualification, $gender, $dob );
	}
	
	 /* Method called on submitting register course view */
	public function registerCourseButtonClick()
	{
		$coursename = $_POST ['coursenamelist']; // to be changed
		$objCourse = new Course ();
		$objCourse->registerStudentCourse ( $coursename );
	}
	
	 /* Method called on write message click in student view */
	public function messageClick()
	{
		$this->createUser ();
		$emailList = $this->_objUser->fetchEmailID ();
		$this->showSubViews ( "writeMessage", $emailList );
	}
	
	 /* Method called to show profile in student view after login */
	public function showProfile()
	{
		$this->createUser ();
		$studentdetails = $this->_objUser->fetchStudent ();
		/* Showing Teacher View with teacher data */
		$this->showSubViews ( "showProfile", $studentdetails );
	}
	
	 /* Method called on view study material click in student view */
	public function downloadClick()
	{
		$objCourse = new Course ();
		$this->createUser ();
		$result = $objCourse->fetchStudentCoursename ();
		$result1 = $this->_objUser->fetchTeachername ( $result );
		if (! empty ( $result )) {
			$this->showSubViews ( "download", $result, $result1 );
		} else {
			$this->setCustomMessage ( "ErrorMessage", 
					"You havent chosen any courses yet<br> Register first" );
		}
	}
	
	 /* Method called on submitting study material view */
	public function downloadFile()
	{
		$coursenamelist = $_POST ["coursenamelist"];
		$teachernamelist = $_POST ["teachernamelist"];
		$this->createUser ();
		$filelist = $this->_objUser->downloadContent ( $coursenamelist, 
													   $teachernamelist );
		if (! empty ( $filelist )) {
			$this->showSubViews ( "showContent", $filelist );
		} else {
			$this->setCustomMessage ( "ErrorMessage", 
					"No files have been uploaded yet" );
			$this->showView ();
		}
	}
}
?>