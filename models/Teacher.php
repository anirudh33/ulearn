<?php 
/*
       * Creation Log 
       * File Name - Teacher.php 
       * Description - Contains all functions to query database for teacher details
       * Version - 1.0 
       * Created by - Tanu trehan 
       * Created on - March 28, 2013
       */


class Teacher extends AUser {
	public function __construct() {
		parent::__construct ();
	}
	private $tdata = array ();
	
	/**
	 *
	 * @return the $tdata
	 */
	public function getTdata() {
		return $this->tdata;
	}
	
	/**
	 *
	 * @param multitype: $tdata        	
	 */
	private function setTdata($tdata) {
		$this->tdata = $tdata;
	}

/* method called to return teacher data from database for edit profile */

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
		$this->db->From ( "teacherdetails" );
		$this->db->Where ();
		$this->db->Select ();
		$this->setTdata ( $this->db->resultArray () );
	}
	
/* method called to return teacher details from database in show profile*/

	public function fetchTeacher() {
		
		DBConnection::Connect ();
		$this->db->Fields ( array (
				"firstname",
				"lastname",
				"phone",
				"profilepicture",
				"address",
				"qualification",
				"gender",
				"dob"
		) );
		$this->db->From ( "teacherdetails" );
		$this->db->Where (array (
				"user_id" => $_SESSION["userID"]));
		$this->db->Select ();
	
		$result=$this->db->resultArray () ;
		return $result;
	}
	
/* method called to insert edit profile teacher data in database */
	public function editTeacher($firstname, $lastname, $phone, $address, $qualification, $gender, $dob) {
		DBConnection::Connect ();
		$this->db->From ( "teacherdetails" );
		$this->db->Fields ( array (
				"firstname" => "$firstname",
				"lastname" => "$lastname",
				"phone" => "$phone",
				"address" => "$address",
				"qualification" => "$qualification",
				"gender" => "$gender",
				"dob" => "$dob" 
		) );
		$bool=$this->db->Update ();
		if($bool==true) {
			$this->setCustomMessage("SuccessMessage", "Profile Successfully updated ");
		}else {
			$this->setCustomMessage("ErrorMessage", "Profile couldnt be updated ");
		}
		
	}

/* method called to insert teacher message in database */

	public function messageSend($body, $subject, $sentto) {
		DBConnection::Connect ();
		
		/* fetch id of Teacher */
		$this->db->Fields ( array (
				"id"
		) );
		$this->db->From ( "teacherdetails" );
		$this->db->Where ( array (
				"user_id" => $_SESSION["userID"]
		) );
		$this->db->Select ();
		$id = $this->db->resultArray ();
		$sentfrom = $id [0] ['id'];
		
		/* fetch user_id of student */
		$this->db->Fields ( array (
				"user_id" 
		) );
		$this->db->From ( "userdetails" );
		$this->db->Where ( array (
				"email" => $sentto 
		) );
		$this->db->Select ();
		$userid = $this->db->resultArray ();
		
		$uid = $userid [0] ['user_id'];
	
		
		
		/* Fetch id from student details to whom to send the message */
		$this->db->Fields ( array (
				"id" 
		) );
		$this->db->From ( "studentdetails" );
		$this->db->Where ( array (
				"user_id" => $uid 
		) );
		$this->db->Select ();
		$studentid = $this->db->resultArray ();
		$sid = $studentid [0] ['id'];
		
		/* Sending message by insertion into techermessage table */
		$this->db->From ( "teachermessage" );
		$this->db->Fields ( array (
				//"message_id" => "$message_id",
				"body" => "$body",
				"subject" => "$subject",
				"sentfrom" => "$sentfrom",
				"sentto" => "$sid" 
		) );
		$bool=$this->db->Insert ();
		if($bool==true){
			return $bool;
		}else {
			return false;
		}
	}
	/* Fetching teacher id using emailID we have in session from teacher details table */
	public function fetchTeacherID()
	{
		$uid = $_SESSION ['userID'];
		DBConnection::Connect ();
		$this->db->Fields ( array (
				"id"
		) );
		$this->db->From ( "teacherdetails" );
		$this->db->Where ( array (
				"user_id" => $uid
		) );
		$this->db->Select ();
		$tIDArray = $this->db->resultArray ();
		$teacherID = $tIDArray [0] ["id"];
		return $teacherID;
	}
	
/* method called to return teacher messages from database */ 

	public function messageShow() {
		$teacherID =$this->fetchTeacherID();
		/* Fetching message ids and subjects */
		$this->db->Fields ( array (
				"message_id",
				"subject"
			 
		) );
		$this->db->From ( "studentmessage" );
		$this->db->Where ( array (
				"sentto" => $teacherID 
		) );
		$this->db->Select ();
		
		
		$result = $this->db->resultArray ();
		if(!empty($result)) {
		/* Fetching email id of student(s) who sent the message */
		$this->db->Fields ( array (
				"sentfrom"
				
				) );
		$this->db->From ( "studentmessage" );
		$this->db->Where ( array (
				"sentto" => $teacherID 
		) );
		$this->db->Select ();
		$sentfrom = $this->db->resultArray ();
		$sid=$sentfrom [0] ["sentfrom"];
		/* Fetching user id(s) of student who sent the message(s)*/
		$this->db->Fields ( array (
				"user_id" 
		) );
		$this->db->From ( "studentdetails" );
		$this->db->Where ( array (
				"id" => $sid 
		) );
		$this->db->Select ();

		$uIDArray = $this->db->resultArray ();
		$u=$uIDArray [0] ["user_id"];
		
		/* Fetching email id(s) of student who sent the message(s) */
		$this->db->Fields ( array (
				"email" 
		) );
		$this->db->From ( "userdetails" );
		$this->db->Where ( array (
				"user_id" => $u 
		) );
		$this->db->Select ();
		$email = $this->db->resultArray ();
		}else {
			return false;
		}
		return array($result,$email);
	}

/* method called to return teacher messages body from database */
	public function messageBody($aid) {
		DBConnection::Connect ();

		$this->db->Fields ( array (
				"body"
				) );
		$this->db->From ( "studentmessage" );
		$this->db->Where ( array (
				"message_id" => $aid 
		) );
		$this->db->Select ();
		$result = $this->db->resultArray ();  			       		
		return $result;
	}

/* method called to check if lesson already exists in database */
public function lessonExists($lesson_no,$courseID,$teacherID) {
		/* fetch id of lesson*/
		$this->db->Fields ( array (
				"lesson_id" 
		) );
		$this->db->From ( "lesson" );
		$this->db->Where ( array (
				"lesson_no" => $lesson_no,
				"course_id" => $courseID,
				"teacher_id" =>$teacherID
		) );
		$this->db->Select ();
		
		$id = $this->db->resultArray ();
		
		if (! empty ( $id )) {
			return true;
		} else {
			return false;
		}
	}

	/* method called to insert lesson name in database */

	 public function lesson($lesson_no,$lesson_name,$coursename,$path) {
	 	$teacherID=$this->fetchTeacherID();
	if (! $this->lessonExists ($lesson_no,$coursename,$teacherID)) {
			$flag = TRUE;
		if ($flag == TRUE) {

	 	DBConnection::Connect ();
	 	$this->db->Fields ( array (
	 			"id"
	 	) );
	 	$this->db->From ( "teacherdetails" );
	 	$this->db->Where ( array (
	 			"user_id" => $_SESSION["userID"]
	 	) );
	 	$this->db->Select ();
	 	$id = $this->db->resultArray ();
	 	$tid = $id [0] ['id'];
	 	
	 	$this->db->Fields ( array (
	 			"course_id"
	 	) );
	 	$this->db->From ( "course" );
	 	$this->db->Where ( array (
	 			"coursename" => $coursename
	 	) );
	 	$this->db->Select ();
	 	$id1 = $this->db->resultArray ();
	 	$cid = $id1 [0] ['course_id'];
	 		 			 		
	 	 		$this->db->From ( "lesson" );
	 	 		$this->db->Fields ( array (
	 					"lesson_no" => "$lesson_no",
	 					"lesson_name" => "$lesson_name",
	 					"createdon" => date ( "Y/m/d" ),
	 	 				"course_id" => "$cid" ,
	 	 				"teacher_id" => "$tid",
	 	 				"location"=>"$path"
	 	 		) );
	 	 		$this->db->Insert ();
	}
		} else {
				$message='Lesson name already exists, please re-enter';
				$this->setCustomMessage("ErrorMessage", $message);		
	}
	 		 	 	
	}
	
/* method called to return uploaded files from database */

	public function downloadContent($coursename)
	{
		$user_id = $_SESSION ["userID"];
		$this->db->Fields ( array (
				"email"
		) );
		$this->db->From ( "userdetails" );
		$this->db->Where (array("user_id" => $user_id));
		$this->db->Select ();
		$result1 = $this->db->resultArray ();
		$email = $result1 [0] ['email'];
		$files=array();
		$path = $_SESSION['SITE_PATH']."/uploads/".$email."/".$coursename;
		if ($handle = opendir($path)) {
			while (false !== ($file = readdir($handle)))
			{
				if ($file != "." && $file != "..")
				{
					$files[]= "uploads/".$email."/".$coursename."/".$file;
				}
			}
			closedir($handle);
		}
	
		return $files;
	
	}

/* method called to return email of teacher from database for send message */
	 
	public function fetchEmailID() {
		DBConnection::Connect ();
		$this->db->Fields ( array (
				"email" 
		) );
		$this->db->From ( "userdetails" );
		$this->db->Where ( array (
				"user_type" => 'student' 
		) );
		$this->db->Select ();
		$result = $this->db->resultArray ();
		return $result;
	}
	
	/* Uploads content to teachers respective directories under chosen course*/

	public function uploadContent($no,$lesson_name,$coursename) {
		$flag=false;
		$teacherID=$this->fetchTeacherID();
	if(!$this->lessonExists($no,$coursename,$teacherID)) {

		$n = count ( $_FILES ['upload'] ['name'] );
		
		for($i = 0; $i < $n; $i ++) {

			if ($_FILES ['upload'] ['name'] [$i]) {

				// if no errors...
				if (! $_FILES ['upload'] ['error'] [$i]) {

					$newname = strtolower ( $_FILES ['upload'] ['tmp_name'] [$i] );
					
					$allowedExts = array (
							"doc",
							"pdf",
							"jpg",
							"txt" 
					);

					$extension = end ( explode ( ".", $_FILES ['upload'] ['name'] [$i] ) );
					
					if ((($_FILES ['upload'] ['type'] == "/doc") || 
						 ($_FILES ['upload'] ['type'] == "text/pdf") || 
						 ($_FILES ['upload'] ['type'] == "image/jpg")) && 
						 ($_FILES ['upload'] ['size'] < 1024000) || 
						 in_array ( $extension, $allowedExts )) {
						
					//@todo throw message if file format not supported or any other error
						$path = "uploads/" . $_SESSION ['emailID'] . "/" . $coursename . "/";
						$path = $path ."Lesson $no $lesson_name";
						If(!file_exists($path)) {			
						if (move_uploaded_file ( $_FILES ['upload'] ['tmp_name'] [$i], $path)) {
							$message='The file uploaded successfully';
							$this->setCustomMessage("SuccessMessage", $message);
							
						} else {
							$message="Move upload failed";
							$this->setCustomMessage("ErrorMessage", $message);
							unset($path);
						}
						} else {
							$message='The file with same name already exists';
							$this->setCustomMessage("ErrorMessage", $message);
							unset($path);
						}
					} else{
							$message='File type not supported or size larger than 10 MB';
							$this->setCustomMessage("ErrorMessage", $message);
					}
					
				} else {
					$message= "Not a valid file";
					$this->setCustomMessage("ErrorMessage", $message);
				}
			}
		}
	} else {
		$message="Lesson no already exists";
		$this->setCustomMessage("ErrorMessage", $message);
		
	}
	if(isset($path))
	{
	return $path;
	} else {
		return false;
	}
	}
	
	public function deleteFile($location) {
		
		unlink($_SESSION['SITE_PATH']."/".$location);
		DBConnection::Connect ();
		
		$this->db->From ( "lesson" );
		$this->db->Where ( array (
				"location" => $location
		) );
		$this->db->Delete ();
		$result = $this->db->resultArray ();
		if($result==true){
			echo "deleted";
		}
	}
	
}
?>