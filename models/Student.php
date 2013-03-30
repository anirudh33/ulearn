<?php
// session_start();
require_once ($_SESSION ["SITE_PATH"] . "/libraries/AUser.php");
class Student extends AUser {
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
		$this->db->From ( "studentdetails" );
		$this->db->Where ();
		$this->db->Select ();
		
		$this->setTdata ( $this->db->resultArray () );
	}
	

public function fetchStudent() {
		
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
		$this->db->Where (array (
				"user_id" => $_SESSION["userID"]));
		$this->db->Select ();
	
		$result=$this->db->resultArray () ;
		return $result;
	}

public function editStudent($firstname,$lastname,$phone,$address,$qualification,$gender,$dob)
	{
		DBConnection::Connect();
		$this->db->From("studentdetails");
		$this->db->Fields(array("firstname"=>"$firstname","lastname"=>"$lastname","phone"=>"$phone","address"=>"$address","qualification"=>"$qualification","gender"=>"$gender","dob"=>"$dob"));
		$this->db->Update();
		echo $this->db->lastQuery();
	}

public function registerCourse($course_id,$student_id)
	{
		DBConnection::Connect();
		$this->db->From("enrolls");
		$this->db->Fields(array("course_id"=>"$course_id","student_id"=>"$student_id"));
		$this->db->Insert();
		echo $this->db->lastQuery();
	}

public function messageSend($body,$subject,$sentto)
	{
		DBConnection::Connect();
		
		/* fetch id of Student */
		$this->db->Fields ( array (
				"id"
		) );
		$this->db->From ( "studentdetails" );
		$this->db->Where ( array (
				"user_id" => $_SESSION["userID"]
		) );
		$this->db->Select ();
		$id = $this->db->resultArray ();
		$sentfrom = $id [0] ['id'];
		
		$this->db->Fields(array("user_id"));
		$this->db->From("userdetails");
		$this->db->Where (array("email"=>$sentto));
		$this->db->Select ();
		$userid=$this->db->resultArray ();
		$uid=$userid[0]['user_id'];
	
		
		$this->db->Fields(array("id"));
		$this->db->From("teacherdetails");
		$this->db->Where (array("user_id"=>$uid));
		$this->db->Select ();
		$teacherid=$this->db->resultArray ();
		$tid=$teacherid[0]['id'];
		
		$this->db->From("studentmessage");
		$this->db->Fields(array(
				//"message_id"=>"$message_id",
				"body"=>"$body","subject"=>"$subject","sentfrom"=>"$sentfrom","sentto"=>"$tid"));
		$this->db->Insert();
		echo $this->db->lastQuery();
	}
	
	public function messageShow(){
		$uid=$_SESSION['userID'];
		DBConnection::Connect ();
		$this->db->Fields ( array (
				"id"
		) );
		$this->db->From ( "studentdetails" );
		$this->db->Where (array (
				"user_id"=>$uid));
		$this->db->Select ();
		$sIDArray=$this->db->resultArray ();
		$studentID=$sIDArray[0]["id"];
		$this->db->Fields ( array (
				"body",
				"subject",
				"sentfrom"
		) );
		$this->db->From ( "teachermessage" );
		$this->db->Where (array (
				"sentto"=>$studentID));
		$this->db->Select ();
		$result=$this->db->resultArray ();
		return $result;
	
	}
	
	public function fetchEmailID() {
		DBConnection::Connect ();
		$this->db->Fields ( array (
				"email"
		));
		$this->db->From ( "userdetails" );
		$this->db->Where (array (
				"user_type"=>'teacher'));
		$this->db->Select ();
		$result=$this->db->resultArray ();
		return $result;
	}
	

public function downloadContent(){
	
	
		}

}
?>
