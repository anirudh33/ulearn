<?php
// session_start();
require_once ($_SESSION ["SITE_PATH"] . "/libraries/AUser.php");
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
	
	public function fetchTeacher() {
		
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
		$this->db->Where (array (
				"user_id" => $_SESSION["userID"]));
		$this->db->Select ();
	
		$result=$this->db->resultArray () ;
		return $result;
	}
	
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
		$this->db->Update ();
		echo $this->db->lastQuery ();
	}
// 	public function registerCourse($course_id, $teacher_id) {
// 		DBConnection::Connect ();
// 		$this->db->From ( "teaches" );
// 		$this->db->Fields ( array (
// 				"course_id" => "$course_id",
// 				"teacher_id" => "$teacher_id" 
// 		) );
// 		$this->db->Insert ();
// 		echo $this->db->lastQuery ();
// 	}
// 	public function addCourse($course_id, $coursename, $description) {
// 		DBConnection::Connect ();
// 		$this->db->From ( "course" );
// 		$this->db->Fields ( array (
// 				"course_id" => "$course_id",
// 				"coursename" => "$coursename",
// 				"description" => "$description",
// 				"createdon" => date ( "Y/m/d" ) 
// 		) );
// 		$this->db->Insert ();
// 		echo $this->db->lastQuery ();
// 	}
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
		$this->db->Insert ();
		echo $this->db->lastQuery ();
	}
	public function messageShow() {
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
		$this->db->Fields ( array (
				"body",
				"subject",
				"sentfrom" 
		) );
		$this->db->From ( "studentmessage" );
		$this->db->Where ( array (
				"sentto" => $teacherID 
		) );
		$this->db->Select ();
		$result = $this->db->resultArray ();
		return $result;
	}
	
	 public function lesson($lesson_no,$lesson_name,$coursenamelist) {
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
	 			"coursename" => $coursenamelist
	 	) );
	 	$this->db->Select ();
	 	$id1 = $this->db->resultArray ();
	 	$cid = $id [0] ['id1'];
	 		 			 		
	 	 		$this->db->From ( "course" );
	 	 		$this->db->Fields ( array (
	 					"lesson_no" => "$lesson_no",
	 					"lesson_name" => "$lesson_name",
	 					"createdon" => date ( "Y/m/d" ),
	 	 				"course_id" => "$cid" ,
	 	 				"teacher_id" => "$tid"
	 	 		) );
	 	 		$this->db->Insert ();
	 	 		echo $this->db->lastQuery ();
	 		 	 	
	}
	 
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
	/* public function fetchCoursename() {
		DBConnection::Connect ();
		$this->db->Fields ( array (
				"coursename" 
		) );
		$this->db->From ( "course" );
		$this->db->Where ();
		$this->db->Select ();
		$result = $this->db->resultArray ();
		return $result;
	} */
	public function uploadContent() {
		$n = count ( $_FILES ['upload'] ['name'] );
		echo $n;
		for($i = 0; $i < $n; $i ++) {
			if ($_FILES ['upload'] ['name'] [$i]) {
				// if no errors...
				if (! $_FILES ['upload'] ['error'] [$i]) {
					$newname = strtolower ( $_FILES ['upload'] ['tmp_name'] [$i] );
					
					$allowedExts = array (
							"doc",
							"pdf",
							"jpg" 
					);
					$extension = end ( explode ( ".", $_FILES ['upload'] ['name'] [$i] ) );
					if ((($_FILES ['upload'] ['type'] == "/doc") || 

					($_FILES ['upload'] ['type'] == "text/pdf") || ($_FILES ['upload'] ['type'] == "image/jpg")) && ($_FILES ['upload'] ['size'] < 1024000) || in_array ( $extension, $allowedExts )) {
						
// 					//Check if directory exists if not then create 
// 						if (! is_dir ( "uploads/" . $_SESSION ['emailID'] )) {
// 						mkdir ( "uploads/" . $_SESSION ['emailID'] );
// 					}
// 					if (! is_dir ( "uploads/" . $_SESSION ['emailID'] . "/" . $_POST ["course_id"] )) {
// 					mkdir ( "uploads/" . $_SESSION ['emailID'] . "/" . $_POST ["course_id"] );
// 				}
						$path = "uploads/" . $_SESSION ['emailID'] . "/" . $_POST ["coursenamelist"] . "/";
						$path = $path . basename ( $_FILES ['upload'] ['name'] [$i] );
						
						if (move_uploaded_file ( $_FILES ['upload'] ['tmp_name'] [$i], $path . $_FILES ['upload'] ['name'] [$i] )) {
							
							echo "The file " . basename ( $_FILES ['upload'] ['name'] [$i] ) . " has been uploaded";
						} else {
							echo "there";
						}
					}
				} else {
					echo "not a valid file";
				}
			}
		}
	}
}
?>