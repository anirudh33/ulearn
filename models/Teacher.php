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

public function editTeacher($firstname,$lastname,$phone,$address,$qualification,$gender,$dob)
	{
		DBConnection::Connect();
		$this->db->From("teacherdetails");
		$this->db->Fields(array("firstname"=>"$firstname","lastname"=>"$lastname","phone"=>"$phone","address"=>"$address","qualification"=>"$qualification","gender"=>"$gender","dob"=>"$dob"));
		$this->db->Update();
		echo $this->db->lastQuery();
	}

public function addCourse($course_id,$coursename,$description)
	{
		DBConnection::Connect();
		$this->db->From("course");
		$this->db->Fields(array("course_id"=>"$course_id","coursename"=>"$coursename","description"=>"$description","createdon"=>date("Y/m/d")));
		$this->db->Insert();
		echo $this->db->lastQuery();
	}

public function messageSend($message_id,$body,$subject,$sentfrom,$sentto)
	{
		DBConnection::Connect();
		$this->db->From("teachermessage");
		$this->db->Fields(array("message_id"=>"$message_id","body"=>"$body","subject"=>"$subject","sentfrom"=>"$sentfrom","sentto"=>"$sentto"));
		$this->db->Insert();
		echo $this->db->lastQuery();
	}

public function uploadContent(){
	$n=count($_FILES['upload']['name']);
	echo $n;
	for($i=0;$i<$n;$i++)
	{
		if($_FILES['upload']['name'][$i])
		{
			//if no errors...
			if(!$_FILES['upload']['error'][$i])
			{
				$newname = strtolower($_FILES['upload']['tmp_name'][$i]);
	
				 
				$allowedExts = array("doc", "pdf", "jpg");
				$extension = end(explode(".", $_FILES['upload']['name'][$i]));
				if ((($_FILES['upload']['type'] == "/doc")
	
						|| ($_FILES['upload']['type'] == "text/pdf")
						|| ($_FILES['upload']['type'] == "image/jpg")
				)
				&& ($_FILES['upload']['size'] < 1024000)
				|| in_array($extension, $allowedExts))
				{
	
					$path="uploads/";
					$path=$path.basename( $_FILES['upload']['name'][$i]);
	
					if(move_uploaded_file($_FILES['upload']['tmp_name'][$i], $path.$_FILES['upload']['name'][$i])) {
	
						echo "The file ".  basename( $_FILES['upload']['name'][$i]).
						" has been uploaded";
					}
					else {
						echo "there";
					}
				}
			}
			else
			{
				echo "not a valid file";
			}
		}
	}
}
	

	
	
}
?>