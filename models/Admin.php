<?php
/*
 * *************************** Creation Log *******************************
* File Name 	- Admin.php
* Description 	- Admin model class holds business logic methods 
* Version 		- 1.0
* Created by	- Anirudh Pandita Created on - March 01, 2013
* **********************Update Log ***************************************
* Sr.NO. Version Updated by Updated on Description
* -------------------------------------------------------------------------
* 
* ************************************************************************
*/
class Admin extends AUser {
	public function __construct() {
		parent::__construct ();
	}
	private $teacherData = array ();
	private $studentData = array ();
	private $adminData = array ();
	private $adminDrofileData = array ();
	private $totalTeacherRecords;
	private $totalStudentRecords;
	private $studentQualificationData;
	private $teacherQualificationData;
	
	/*
	 *
	 * @return the $totalTeacherRecords
	 */
	    public function getTotalTeacherRecords() {
		return $this->totalTeacherRecords;
	}
	
	/*
	 *
	 * @param field_type $totalTeacherRecords        	
	 */
	public function setTotalTeacherRecords($totalTeacherRecords) {
		$this->totalTeacherRecords = $totalTeacherRecords;
	}
	/*
	 *
	 * @return the $totalstudentRecords
	 */
	public function getTotalStudentRecords() {
		return $this->totalStudentRecords;
	}

	/*
	 *
	 * @param field_type $totalstudentRecords
	 */
	public function setTotalStudentRecords($totalStudentRecords) {
		$this->totalStudentRecords = $totalStudentRecords;
	}
	/*student details*/
	public function getStudentData() {
		return $this->studentData;
	}
	/*student details*/
	private function setStudentData($studentData) {
		$this->studentData = $studentData;
	}
	/*student qualification details*/
	private function setStudentQualificationData($studentQualificationData) {
		$this->studentQualificationData = $studentQualificationData;
	}
	/*student qualification details*/
	public function getStudentQualificationData() {
		return $this->studentQualificationData;
	}
	/*teacher qualification details*/
	private function setTeacherqualificationdata($teacherQualificationData) {
		$this->teacherQualificationData = $teacherQualificationData;
	}
	/*teacher qualification details*/
	public function getTeacherQualificationData() {
		return $this->teacherQualificationData;
	}
	/*teacher details*/
	public function getTeacherData() {
		return $this->teacherData;
	}
	/*teacher details*/
	private function setTeacherData($teacherData) {
		$this->teacherData = $teacherData;
	}
	/*admin details*/
	private function setAdminData($adminData) {
		$this->adminData = $adminData;
	}
	/*admin profile details*/
	private function setAdminProfileData($adminProfileData) {
		$this->adminProfileData = $adminProfileData;
	}
	/*admin details*/
	public function getAdminData() {
		return $this->adminData;
	}
	/*admin profile details*/
	public function getAdminProfileData() {
		return $this->adminProfileData;
	}
	
	/* method called to return admin data from database for edit profile */
	
	public function fetchUser() {
		DBConnection::Connect ();
		$this->db->Fields ( array (
				"firstname",
				"lastname",
				
				"phone",
				"address",
				"qualification",
				"gender",
				"dob" 
		) );
		$this->db->From ( "admindetails" );
		$this->db->Where ();
		$this->db->Select ();
		
		$this->setAdminData ( $this->db->resultArray () );
	}
	/* method called to return admin details from database in show profile*/
	public function fetchAdminUser() {
		DBConnection::Connect ();
		$this->db->Fields ( array (
				"firstname",
				"lastname",
				"profilepicture",
				"phone",
				"address",
				"qualification",
				"gender",
				"dob" 
		) );
		$this->db->From ( "admindetails" );
		$this->db->Where ();
		$this->db->Select ();
		
		$this->setAdminProfileData ( $this->db->resultArray () );
	}
	/*updates any previous passwords to sha1*/
	public function updatePassword() {
	    DBConnection::Connect ();
	    $this->db->Fields ( array (
	        "password"
	        
	    ) );
	    $this->db->From ( "userdetails" );
	    $this->db->Where ();
	    $this->db->Select ();
	    $result=$this->db->resultArray () ;
	    echo"<pre>";
	    print_r($result);
	    
	    foreach($result as $key=>$value) {
	        
	    $pass=$value["password"];
	    echo "old:$pass<br>";
	    $a=sha1($pass);
	    echo "new-$a<br>";
	    
	    
	    
	    $this->db->Fields ( array (
	        "password"=>"$a"
	    
	    ) );
	    $this->db->From ( "userdetails" );
	    $this->db->Where ();
	    $this->db->Update ();
	    echo $this->db->lastQuery();
	    }
	    //echo $this->db->lastQuery();
	    die;
	}
	/* method called to return teacher details from database in manage teacher*/
	public function fetchTeacher($limit = "0,10") {
		if (empty ( $limit )) {
			$limit = "0,10";
		}
		
		DBConnection::Connect ();
		$this->db->Fields ( array (
				"id",
				"firstname",
				"lastname",
				"status" 
		) );
		$this->db->From ( "teacherdetails" );
		$this->db->Where ();
		
		$this->db->Limit ( $limit );
		$this->db->Select ();
		$this->setTeacherData ( $this->db->resultArray () );
	}
	/* method called to return teacher count from database in manage teacher*/
	public function fetchTeacherCount() {
		DBConnection::Connect ();
		$this->db->Fields ( array (
				"id",
				"firstname",
				"lastname",
				"status" 
		) );
		$this->db->From ( "teacherdetails" );
		$this->db->Where ();
		$this->db->Limit ( "" );
		$this->db->Select ();
		
		$this->setTotalTeacherRecords ( count ( $this->db->resultArray () ) );
	}
	/* method called to return student details from database in manage student*/
	public function fetchStudent($limit = "0,10") {
		DBConnection::Connect ();
		$this->db->Fields ( array (
				"id",
				"firstname",
				"lastname",
				"status" 
		) );
		$this->db->From ( "studentdetails" );
		$this->db->Where ();
		$this->db->Limit ( $limit );
		$this->db->Select ();
		
		$this->setStudentData ( $this->db->resultArray () );
	}
	/* method called to return student count from database in manage student*/
	public function fetchStudentCount() {
		DBConnection::Connect ();
		$this->db->Fields ( array (
				"id",
				"firstname",
				"lastname",
				"status" 
		) );
		$this->db->From ( "studentdetails" );
		$this->db->Where ();
		$this->db->Limit ( "" );
		$this->db->Select ();
		
		$this->setTotalStudentRecords ( count ( $this->db->resultArray () ) );
	}
	/* method called to return student qualification details from database in generate report*/
	public function fetchStudentQualification($qualification) {
		DBConnection::Connect ();
		$this->db->Fields ( array (
				
				"firstname",
				"lastname",
				"status" 
		) );
		$this->db->From ( "studentdetails" );
		$this->db->Where ( array (
				"qualification" => $qualification 
		) );
		$this->db->Limit ( "" );
		$this->db->Select ();
		$this->setStudentQualificationData ( count ( $this->db->resultArray () ) );
	}
	/* method called to return teacher qualification details from database in generate report*/
	public function fetchTeacherQualification($qualification) {
		DBConnection::Connect ();
		$this->db->Fields ( array (
				
				"firstname",
				"lastname",
				"status" 
		) );
		$this->db->From ( "teacherdetails" );
		$this->db->Where ( array (
				"qualification" => $qualification 
		) );
		$this->db->Limit ( "" );
		$this->db->Select ();
		$this->setTeacherQualificationData ( count ( $this->db->resultArray () ) );
	}
	/* method called to update admin details from database in edit profile*/
	public function editAdmin($firstname, $lastname, $phone, $address, $qualification, $gender, $dob) {
		DBConnection::Connect ();
		$this->db->From ( "admindetails" );
		$this->db->Fields ( array (
				"firstname" => "$firstname",
				"lastname" => "$lastname",
				"phone" => "$phone",
				"address" => "$address",
				"qualification" => "$qualification",
				"gender" => "$gender",
				"dob" => "$dob" 
		) );
		$this->db->Update ();
		$this->db->lastQuery ();
		
		return true;
	}
	/* method called to delete teacher from database in manage teacher*/
	public function deleteTeacher($uid) {
		DBConnection::Connect ();
		
		$this->db->From ( "teacherdetails" );
		
		$this->db->Where ( array (
				"id" => $uid 
		) );
		$this->db->Fields ( array (
				"status" => "2" 
		) );
		
		$objReturn = $this->db->Update ();
		return $objReturn;
	}
	/* method called to activate teacher from database in manage teacher*/
	public function activateTeacher($uid) {
		DBConnection::Connect ();
		
		$this->db->From ( "teacherdetails" );
		
		$this->db->Where ( array (
				"id" => $uid 
		) );
		$this->db->Fields ( array (
				"status" => "1" 
		) );
		
		$objReturn = $this->db->Update ();
		return $objReturn;
	}
	/* method called to delete student from database in manage student*/
	public function deleteStudent($uid) {
		DBConnection::Connect ();
		
		$this->db->From ( "studentdetails" );
		
		$this->db->Where ( array (
				"id" => $uid 
		) );
		$this->db->Fields ( array (
				"status" => "2" 
		) );
		
		
		
		
		$objReturn = $this->db->Update ();
		return $objReturn;
	}
	/* method called to activate student from database in manage student*/
	public function activateStudent($uid) {
		DBConnection::Connect ();
		
		$this->db->From ( "studentdetails" );
		
		$this->db->Where ( array (
				"id" => $uid 
		) );
		$this->db->Fields ( array (
				"status" => "1" 
		) );
		
		$objReturn = $this->db->Update ();
		return $objReturn;
	}
	
}
?>
