<?php
/*  ************************** Creation Log *****************************

File Name                   - AdminController.php
Description                 - Admin Controller controlls all the events related 
                                to Admin
Version                     -  1.0
Created by                  -  Ujjwal Rawlley
Created on                  -  March 28, 2013
* **************************** Update Log ********************************
Sr.NO.  Version	  Updated by        Updated on          Description
-------------------------------------------------------------------------
1		1.1		Anirudh Pandita		April 6 2013		Fixed variable not set notice
2		1.1		Anirudh Pandita		April 8 2013		Added error/success messages,
														Fixed insertion of blank phone no and showing of address fields   
* ************************************************************************
*/
class AdminController extends AController {

	/**
	 *
	 * @var Stores any error messages produced
	 */
	protected $_message = "";
	
	/**
	 *
	 * @var Stores required type of user to check for Admin controller
	 */
	protected $_requiredType = "admin";
	
	/* to get message */
	public function getMessage() {
		return $this->_message;
	}
	/* to set message */
	public function setMessage($_message) {
		$this->_message = $_message . "<br>";
	}
	/*
	 * Requires view with list of teachers to be seen and managed
	 */
	public function showManageTeacherView($teacherData = array(), $teacherRecordsCount) {
		require_once $_SESSION ["SITE_PATH"] . '/views/AdminViews/AdminView.php';
	}
	/*
	 * Requires view with list of student to be seen and managed
	 */
	public function showManageStudentView($studentData = array(), $studentRecordsCount) {
		require_once $_SESSION ["SITE_PATH"] . '/views/AdminViews/AdminView.php';
	}
	/*
	 * Requires view to edit admin profile
	 */
	public function showManageAdminView($adminData = array()) {
		require_once SITE_PATH . '/views/AdminViews/AdminView.php';
	}
	/*
	 * Requires view to show admin profile
	 */
	public function showAdminProfileView($adminprofiledata = array()) {
		require_once SITE_PATH . '/views/AdminViews/AdminView.php';
	}
	/*
	 * Requires view to generate report
	 */
	public function showReportView($reportData = array()) {
		require_once SITE_PATH . '/views/AdminViews/AdminView.php';
	}
	/*
	 * method called to generate report
	 */
	public function generateReport() {
		$reportData = "report ";
		$this->createUser ();
		
		$this->showReportView ( $reportData );
	}
	/*
	 * method called to generate user report
	 */
	public function allUserReport($studentReportCount, $teacherReportCount) {
		$studentReportData = $studentReportCount;
		$teacherReportData = $teacherReportCount;
		
		require_once $_SESSION ["SITE_PATH"] . '/views/AdminViews/AdminView.php';
	}
	/*
	 * method called to show student report
	 */
	public function studentreport($studentreportcount) 

	{
		require_once $_SESSION ["SITE_PATH"] . '/views/AdminViews/AdminView.php';
	}
	/*
	 * method called to show teacher report
	 */
	public function teacherreport($teacherreportcount) 

	{
		require_once $_SESSION ["SITE_PATH"] . '/views/AdminViews/AdminView.php';
	}
	/*
	 * method called to generate qualification report
	 */
	public function qualificationReport($studentQualificationCount, $teacherQualificationCount) {
		require_once $_SESSION ["SITE_PATH"] . '/views/AdminViews/AdminView.php';
	}
	/* method called to manage teacher details */
	public function manageTeachersClick() {
		$this->createUser ();
		
		$obj_paging = new paging ();
		
		if (isset ( $_GET ['page'] ))
			$page = $_GET ['page'];
		else
			$page = 1;
		$obj_paging->set_page ( $page );
		
		$limit = $obj_paging->get_limit ();
		$obj_paging->set_page_length ( 10 );
		$page_length = $obj_paging->page_length;
		$start_limit = $obj_paging->get_limit_start ();
		$limit = $start_limit . "," . $page_length;
		
		$this->_objUser->fetchTeacher ( $limit );
		
		$this->_objUser->fetchTeacherCount ();
		$this->showManageTeacherView ( $this->_objUser->getTeacherData (), $this->_objUser->getTotalTeacherRecords () );
	}
	/* method called to delete teacher in manage teacher */
	public function deleteTeacherClick() {
		$uid = $_POST ['id'];
		
		$this->createUser ();
		$objReturn = $this->_objUser->deleteTeacher ( $uid );
		if ($objReturn) {
			die ( "1" );
		} else {
			die ( "0" );
		}
	}
	/* method called to activate teacher in manage teacher */
	public function activateTeacherClick() {
		$uid = $_REQUEST ['id'];
		$this->createUser ();
		$objReturn = $this->_objUser->activateTeacher ( $uid );
		if ($objReturn) {
			die ( "1" );
		} else {
			die ( "0" );
		}
	}
	/* method called to delete student in manage teacher */
	public function deleteStudentClick() {
		$uid = $_REQUEST ['id'];
		
		$this->createUser ();
		$objReturn = $this->_objUser->deleteStudent ( $uid );
		if ($objReturn) {
			$_SESSION ['NoticeMessage'] .= "Student Deleted (Soft delete data exists), can't login now <br>";
			die ( "1" );
		} else {
			$_SESSION ['ErrorMessage'] .= "Student couldnt be Deleted  <br>";
			die ( "0" );
		}
	}
	/* method called to activate student in manage teacher */
	public function activateStudentClick() {
		$uid = $_REQUEST ['id'];
		$this->createUser ();
		$objReturn = $this->_objUser->activateStudent ( $uid );
		if ($objReturn) {
			die ( "1" );
		} else {
			die ( "0" );
		}
	}
	/* method called to manage student details */
	public function manageStudentsClick() {
		$this->createUser ();
		
		$obj_paging = new paging ();
		
		if (isset ( $_GET ['page'] ))
			$page = $_GET ['page'];
		else
			$page = 1;
		$obj_paging->set_page ( $page );
		
		$limit = $obj_paging->get_limit ();
		$obj_paging->set_page_length ( 10 );
		$page_length = $obj_paging->page_length;
		$start_limit = $obj_paging->get_limit_start ();
		$limit = $start_limit . "," . $page_length;
		
		$this->_objUser->fetchStudent ( $limit );
		
		$this->_objUser->fetchStudentCount ();
		$this->showManageStudentView ( $this->_objUser->getStudentData (), $this->_objUser->getTotalStudentRecords () );
	}
	/* method called to edit admin details in edit profile */
	public function editProfileClick() {
		$this->createUser ();
		$this->_objUser->fetchUser ();
		
		$this->showManageAdminView ( $this->_objUser->getAdminData () );
	}
	/* method called to update admin details in edit profile */
	public function editAdminClick() {
		$authObject = new Authenticate ();
		$authObject->validateEditProfile ( "Admin" );
		$firstname = $_POST ["firstname"];
		$lastname = $_POST ["lastname"];
		$phone = $_POST ["phone"];
		$address = $_POST ["address"];
		$qualification = $_POST ["qualification"];
		$gender = $_POST ["gender"];
		$dob = $_POST ["dob"];
		
		$this->createUser ();
		$var = $this->_objUser->editAdmin ( $firstname, $lastname, $phone, $address, $qualification, $gender, $dob );
		if ($var == true) {
			$message = "Profile updated :) <br>";
			$this->setCustomMessage ( "SuccessMessage", $message );
			$this->showProfile ();
		} else {
			$message = "Couldn't Update, Report issue to site admin <br>";
			$this->setCustomMessage ( "ErrorMessage", $message );
			$this->editProfileClick ();
		}
	}
	/* method called to show admin profile */
	public function showProfile() {
		$this->createUser ();
		$this->_objUser->fetchAdminUser ();
		$this->showAdminProfileView ( $this->_objUser->getAdminProfiledata () );
	}
	/* method called to show admin report */
	public function showReport() {
		$this->createUser ();
		
		if (! isset ( $_POST ["usertype"] ) and ! isset ( $_POST ["choice"] )) {
			
			$message = "Please select report category <br>";
			$this->setCustomMessage ( "ErrorMessage", $message );
			$this->generateReport ();
		}
		
		if (isset ( $_POST ["usertype"] )) {
			
			$userType = $_POST ["usertype"];
			$choice = $_POST ["usertype"];
			$this->_objUser->fetchStudentCount ();
			$this->_objUser->fetchTeacherCount ();
			$this->allUserReport ( $this->_objUser->getTotalStudentRecords (), $this->_objUser->getTotalTeacherRecords () );
		}
		
		if (isset ( $_POST ["choice"] )) {
			if ($_POST ["choice"] == "graduate") {
				$this->_objUser->fetchStudentQualification ( "graduate" );
				$this->_objUser->fetchTeacherQualification ( "graduate" );
				
				$this->qualificationReport ( $this->_objUser->getStudentQualificationData (), $this->_objUser->getTeacherQualificationData () );
			} elseif ($_POST ["choice"] == "postgraduate") {
				$this->_objUser->fetchStudentQualification ( "postgraduate" );
				$this->_objUser->fetchTeacherQualification ( "postgraduate" );
				$this->qualificationReport ( $this->_objUser->getStudentQualificationData (), $this->_objUser->getTeacherQualificationData () );
			}
		}
	}
	/* method called to generate report */
	public function reportGeneration() {
		$this->_objUser->fetchUser ();
		
		$this->showReportView ();
	}
	/* method called to manage admin profile */
	public function manageProfile() {
		$this->_objUser->fetchUser ();
		
		$this->showProfileView ();
	}
	public function updateP() {
		$obj = new Admin ();
		$obj->updatePassword ();
	}
}
?>
