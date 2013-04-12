<?php 
/**
 **************************** Creation Log *******************************
* File Name 	- Student.php
* Description 	- Model class holding functionalities 
* 				  to be provided as a whole
* Version		- 1.0
* Created by	- Tanu  
* Created on 	- March 08, 2013
* **********************Update Log ***************************************
* Sr.NO. Version Updated by 		Updated on	 	Description
* -------------------------------------------------------------------------
* 1		1.1		Kawaljeet Singh		April 07, 2013 	Messaging function added
* ************************************************************************
*/
class Student extends AUser
{
	/**
	 * @var holds array of teacher details
	 */
	private $studentData = array ();
	
	/**
	 *
	 * @return the $tdata
	 */
	public function getStudentData()
	{
		return $this->studentData;
	}
	
	/**
	 *
	 * @param multitype: $tdata        	
	 */
	private function setStudentData($tdata)
	{
		$this->studentData = $tdata;
	}
	
	 /* Method called to return student data from database for edit profile */
	public function fetchUser()
	{
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
		$this->db->From ( "studentdetails" );
		$this->db->Where ();
		$this->db->Select ();
		$this->setStudentData ( $this->db->resultArray () );
	}
	
	 /* Method called to return student details from database in show profile */
	public function fetchStudent()
	{
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
		$this->db->From ( "studentdetails" );
		$this->db->Where ( array (
				"user_id" => $_SESSION ["userID"] 
		) );
		$this->db->Select ();
		$result = $this->db->resultArray ();
		return $result;
	}
	
	 /* Method called to insert edit profile student data in database */
	public function editStudent($firstname, $lastname, $phone, $address, $qualification, $gender, $dob)
	{
		DBConnection::Connect ();
		$this->db->From ( "studentdetails" );
		$this->db->Fields ( array (
				"firstname" => "$firstname",
				"lastname" => "$lastname",
				"phone" => "$phone",
				"address" => "$address",
				"qualification" => "$qualification",
				"gender" => "$gender",
				"dob" => "$dob" 
		) );
		$bool = $this->db->Update ();
		if ($bool) {
			$this->setCustomMessage ( "SuccessMessage", "Profile Successfully updated " );
		} else {
			$this->setCustomMessage ( "ErrorMessage", "Profile couldnt be updated " );
		}
	}
	
	 /* Method called to insert student message in database */
	public function messageSend($body, $subject, $sentTo)
	{
		DBConnection::Connect ();
		/* fetch id of Student */
		$this->db->Fields ( array (
				"id" 
		) );
		$this->db->From ( "studentdetails" );
		$this->db->Where ( array (
				"user_id" => $_SESSION ["userID"] 
		) );
		$this->db->Select ();
		$id = $this->db->resultArray ();
		$sentfrom = $id [0] ['id'];
		
		$this->db->Fields ( array (
				"user_id" 
		) );
		$this->db->From ( "userdetails" );
		$this->db->Where ( array (
				"email" => $sentTo 
		) );
		$this->db->Select ();
		$userid = $this->db->resultArray ();
		$uid = $userid [0] ['user_id'];
		
		$this->db->Fields ( array (
				"id" 
		) );
		$this->db->From ( "teacherdetails" );
		$this->db->Where ( array (
				"user_id" => $uid 
		) );
		$this->db->Select ();
		$teacherid = $this->db->resultArray ();
		$tid = $teacherid [0] ['id'];
		
		$this->db->From ( "studentmessage" );
		$this->db->Fields ( array (
				"body" => "$body",
				"subject" => "$subject",
				"sentfrom" => "$sentfrom",
				"sentto" => "$tid" 
		) );
		$bool = $this->db->Insert ();
		if ($bool) {
			return $bool;
		} else {
			return false;
		}
	}
	
	 /* Method called to return student messages from database */
	public function messageShow()
	{
		$uid = $_SESSION ['userID'];
		
		DBConnection::Connect ();
		$this->db->Fields ( array (
				"id" 
		) );
		$this->db->From ( "studentdetails" );
		$this->db->Where ( array (
				"user_id" => $uid 
		) );
		$this->db->Select ();
		$sIDArray = $this->db->resultArray ();
		
		$studentID = $sIDArray [0] ["id"];
		$this->db->Fields ( array (
				"message_id",
				"subject",
				"status" 
		) );
		$this->db->From ( "teachermessage" );
		$this->db->Where ( array (
				"sentto" => $studentID 
		) );
		$this->db->Select ();
		$result = $this->db->resultArray ();
		
		$this->db->Fields ( array (
				"sentfrom" 
		) );
		$this->db->From ( "teachermessage" );
		$this->db->Where ( array (
				"sentto" => $studentID 
		) );
		$this->db->Select ();
		$sentfrom = $this->db->resultArray ();
		
		if (! empty ( $sentfrom )) {
			$tid = $sentfrom [0] ["sentfrom"];
			
			$this->db->Fields ( array (
					"user_id" 
			) );
			$this->db->From ( "teacherdetails" );
			$this->db->Where ( array (
					"id" => $tid 
			) );
			$this->db->Select ();
			
			$uIDArray = $this->db->resultArray ();
			$u = $uIDArray [0] ["user_id"];
			
			$this->db->Fields ( array (
					"email" 
			) );
			$this->db->From ( "userdetails" );
			$this->db->Where ( array (
					"user_id" => $u 
			) );
			$this->db->Select ();
			$email = $this->db->resultArray ();
			return array (
					$result,
					$email 
			);
		}
	}
	
	 /* Method called to change status of message */
	public function changestatus($messageId)
	{
		DBConnection::Connect ();
		$this->db->From ( "teachermessage" );
		$this->db->Where ( array (
				"message_id" => $messageId 
		) );
		$this->db->Fields ( array (
				"status" => "1" 
		) );
		$this->db->Update ();
		$this->db->lastQuery ();
	}
	
	 /* Method called to return student messages body from database */
	public function messageBody($messageId)
	{
		DBConnection::Connect ();
		
		$this->db->Fields ( array (
				"body",
				"subject",
				"sentfrom" 
		) );
		$this->db->From ( "teachermessage" );
		$this->db->Where ( array (
				"message_id" => $messageId 
		) );
		$this->db->Select ();
		$result = $this->db->resultArray ();
		
		$sentfrom = $result [0] ["sentfrom"];
		$this->db->Fields ( array (
				"user_id" 
		) );
		$this->db->From ( "teacherdetails" );
		$this->db->Where ( array (
				"id" => $sentfrom 
		) );
		$this->db->Select ();
		
		$uIDArray = $this->db->resultArray ();
		$u = $uIDArray [0] ["user_id"];
		
		$this->db->Fields ( array (
				"email" 
		) );
		$this->db->From ( "userdetails" );
		$this->db->Where ( array (
				"user_id" => $u 
		) );
		$this->db->Select ();
		$email = $this->db->resultArray ();
		return array (
				$result,
				$email 
		);
	}
	
	 /* Method called to return email of student from database for send message */
	public function fetchEmailID()
	{
		DBConnection::Connect ();
		$this->db->Fields ( array (
				"email" 
		) );
		$this->db->From ( "userdetails" );
		$this->db->Where ( array (
				"user_type" => 'teacher' 
		) );
		$this->db->Select ();
		$result = $this->db->resultArray ();
		return $result;
	}
	
	 /* Method called to return teacher name from database for view download files */
	public function fetchTeachername($result = array())
	{
		DBConnection::Connect ();
		$coursename = $result [0] ["coursename"];
		$this->db->Fields ( array (
				"course_id" 
		) );
		$this->db->From ( "course" );
		$this->db->Where ( array (
				"coursename" => $coursename 
		) );
		$this->db->Select ();
		$courseid = $this->db->resultArray ();
		
		if (! empty ( $courseid )) {
			$cid = $courseid [0] ["course_id"];
			
			$this->db->Fields ( array (
					"teacher_id" 
			) );
			$this->db->From ( "teaches" );
			$this->db->Where ( array (
					"course_id" => $cid 
			) );
			$this->db->Select ();
			$teacherid = $this->db->resultArray ();
			$tid = $teacherid [0] ['teacher_id'];
			
			$this->db->Fields ( array (
					"user_id" 
			) );
			$this->db->From ( "teacherdetails" );
			$this->db->Where ( array (
					"id" => $tid 
			) );
			$this->db->Select ();
			$userid = $this->db->resultArray ();
			$uid = $userid [0] ['user_id'];
			
			$this->db->Fields ( array (
					"email" 
			) );
			$this->db->From ( "userdetails" );
			$this->db->Where ( array (
					"user_id" => $uid 
			) );
			$this->db->Select ();
			$result1 = $this->db->resultArray ();
			
			return $result1;
		}
	}
	
	 /* Method called to return uploaded files from database */
	public function downloadContent($coursename, $email)
	{
		$files = array ();
		$path = SITE_PATH . "/uploads/" . $email . "/" . $coursename;
		if ($handle = opendir ( $path )) {
			while ( false !== ($file = readdir ( $handle )) ) {
				if ($file != "." && $file != "..") {
					$files [] = "uploads/" . $email . "/" . $coursename . "/" . $file;
				}
			}
			closedir ( $handle );
		}
		return $files;
	}
}
?>