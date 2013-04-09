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
	
/*method called to open all sub views in student view*/

	public function showSubViews($viewName, $data, $data1 = array()) {
		require_once $_SESSION ["SITE_PATH"] . '/views/StudentViews/StudentView.php';
	}
	
/*method called on edit profile click in student view*/
	
public function editProfileClick() {
		$this->createUser ();
		$this->_objUser->fetchUser ();
		$this->showSubViews ( "editProfile", $this->_objUser->getTdata () );
	}
	
/*method called on submiting edit profile view*/

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
	
/* method called on submitting register course view */

	public function registerCourseButtonClick() {
		$coursename = $_POST ['coursenamelist']; // to be changed
		$objCourse = new Course ();
		$objCourse->registerStudentCourse ( $coursename );
	}

/* method called on write message click in student view */

	public function messageClick() {
		$this->createUser ();
		$emailList = $this->_objUser->fetchEmailID ();
		$this->showSubViews ( "writeMessage", $emailList );
	}
	
/* method called to show profile in student view after login */

	public function showProfile() {
		$this->createUser ();
		$studentdetails = $this->_objUser->fetchStudent ();
		/* Showing Teacher View with teacher data */
		$this->showSubViews ( "showProfile", $studentdetails );
	}

/* method called on view study material click in student view */

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

/* method called on submitting study material view */

	public function downloadFile() {
		$coursenamelist = $_POST ["coursenamelist"];
		$teachernamelist = $_POST ["teachernamelist"];
		$this->createUser ();
		$filelist = $this->_objUser->downloadContent ( $coursenamelist, $teachernamelist );
		
		$this->showSubViews ( "showContent", $filelist );
	}
}

?>