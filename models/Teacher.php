<?php

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
		//echo $this->db->lastQuery ();
	}

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
		return $bool;
	}
	/*  */
	public function messageShow() {
		$uid = $_SESSION ['userID'];
		DBConnection::Connect ();
		/* Fetching teacher email id using userID we have in session */
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
		$result = $this->db->resultArray ();  			       		return $result;
	}


public function lessonExists($lesson_name) {
		/* fetch id of lesson*/
		$this->db->Fields ( array (
				"lesson_id" 
		) );
		$this->db->From ( "lesson" );
		$this->db->Where ( array (
				"lesson_name" => $lesson_name 
		) );
		$this->db->Select ();
		
		$id = $this->db->resultArray ();
		
		if (! empty ( $id )) {
			return true;
		} else {
			return false;
		}
	}

	
	 public function lesson($lesson_no,$lesson_name,$coursenamelist) {

	if (! $this->lessonExists ($lesson_name)) {
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
	 			"coursename" => $coursenamelist
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
	 	 				"teacher_id" => "$tid"
	 	 		) );
	 	 		$this->db->Insert ();
// 	 	 		echo $this->db->lastQuery ();
	}
		} else {
			?>
<script> confirm('Lesson name already exists, please re-enter')</script>
<?php
		
	}
	 		 	 	
	}
	
	public function downloadContent($coursenamelist)
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
		$files="";
		$path = $_SESSION['SITE_PATH']."/uploads/".$email."/".$coursenamelist;
		if ($handle = opendir($path)) {
			while (false !== ($file = readdir($handle)))
			{
				if ($file != "." && $file != "..")
				{
					$files .= '<a id="files" target="_blank" href="'."uploads/".$teachernamelist."/".$coursenamelist."/".$file.'">'.$file.'</a><br>';
				}
			}
			closedir($handle);
		}
	
		return $files;
	
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
	
	public function uploadContent($no,$lesson_name) {
		echo "<script>". 
		"$(document).ready(function(){"."$().toastmessage('showSuccessToast','Upload started');}); </script>";
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
						 ($_FILES ['upload'] ['type'] == "text/pdf") || 
						 ($_FILES ['upload'] ['type'] == "image/jpg")) && 
						 ($_FILES ['upload'] ['size'] < 1024000) || 
						 in_array ( $extension, $allowedExts )) {
						
					//@todo throw message if file format not supported or any other error
						$path = "uploads/" . $_SESSION ['emailID'] . "/" . $_POST ["coursenamelist"] . "/";
						$path = $path ."Lesson $no $lesson_name";
											
						if (move_uploaded_file ( $_FILES ['upload'] ['tmp_name'] [$i], $path)) {
							
							echo "<script>
						 $(document).ready(function(){
						 $().toastmessage('showSuccessToast','The file is uploaded ');}); </script>";
						} else {
							echo "Move upload failed";
						}
					} else{

 
						echo "<script>
						 $(document).ready(function() {
						 $().toastmessage('showErrorToast', 
								'File type not supported or size larger than 10mb');}); </script>";
					}
					
				} else {
					echo "not a valid file";
				}
			}
		}
	}
}
?>