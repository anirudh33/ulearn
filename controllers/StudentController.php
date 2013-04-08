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
* ************************************************************************
*/
class StudentController extends AController {
	protected $_requiredType = "student";
	
	public function showSubViews($viewName, $data, $data1 = array()) {
		require_once $_SESSION ["SITE_PATH"] . '/views/StudentViews/StudentView.php';
	}
	
	public function editProfileClick() {
		$this->createUser ();
		$this->_objUser->fetchUser ();
		$this->showSubViews ( "editProfile", $this->_objUser->getTdata () );
	}
	
	public function editStudentClick() {
		$authObject= new Authenticate();
		$authObject->validateEditProfile("Student");
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
	
	public function registerCourseButtonClick() {
		$coursename = $_POST ['coursenamelist']; // to be changed
		$objCourse = new Course ();
		$objCourse->registerStudentCourse ( $coursename );
	}
	public function messageClick() {
		$this->createUser ();
		$emailList = $this->_objUser->fetchEmailID ();
		$this->showSubViews ( "writeMessage", $emailList );
	}
	
	public function showProfile() {
		$this->createUser ();
		$studentdetails = $this->_objUser->fetchStudent ();
		/* Showing Teacher View with teacher data */
		$this->showSubViews ( "showProfile", $studentdetails );
	}
	public function downloadClick() {
		$objCourse = new Course ();
		$this->createUser ();
		$result = $objCourse->fetchStudentCoursename ();
		$result1 = $this->_objUser->fetchTeachername ( $result );
		if(!empty($result)) {
		$this->showSubViews ( "download", $result, $result1 );
		}else {
			$this->setCustomMessage("ErrorMessage","You havent chosen any courses yet<br> Register first");
		}
	}
	public function downloadFile() {
		$coursenamelist = $_POST ["coursenamelist"];
		$teachernamelist = $_POST ["teachernamelist"];
		$this->createUser ();
		$filelist = $this->_objUser->downloadContent ( $coursenamelist, $teachernamelist );
		
		$this->showSubViews ( "showContent", $filelist );
	}
}

?>