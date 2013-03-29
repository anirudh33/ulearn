<?php
class Course extends AModel {
	public function addCourse() {
		DBConnection::Connect ();
		$this->db->From ( "course" );
		$this->db->Fields ( array (
				// "course_id" => "$course_id",
				"coursename" => $_POST ["coursename"],
				"description" => $_POST ["description"],
				"createdon" => date ( "Y/m/d" )
				//"createdon" => time () 
		) );
		$this->db->Insert ();
		echo $this->db->lastQuery ();
		
		/* Check if directory exists if not then create */
		if (! is_dir ( "uploads/" . $_SESSION ['emailID'] )) {
			mkdir ( "uploads/" . $_SESSION ['emailID'] );
		}
		if (! is_dir ( "uploads/" . $_SESSION ['emailID'] . "/" . $_POST ["coursename"] )) {
			mkdir ( "uploads/" . $_SESSION ['emailID'] . "/" . $_POST ["description"]);
		}
		$this->registerCourse($_POST ["coursename"]);
	}
	
	public function registerCourse($coursename) {
		DBConnection::Connect ();
		//fetch cid and tid
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
		$tid = $id [0] ['id'];
		
		/* fetch id of course */
		$this->db->Fields ( array (
				"id"
		) );
		$this->db->From ( "course" );
		$this->db->Where ( array (
				"name" => $coursename
		) );
		$this->db->Select ();
		$id = $this->db->resultArray ();
		$cid = $id [0] ['id'];
		
		$this->db->From ( "teaches" );
		$this->db->Fields ( array (
				"course_id" => $cid,
				"teacher_id" => $tid
		) );
		$this->db->Insert ();
		echo $this->db->lastQuery ();
	}
}

?>