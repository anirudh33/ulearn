<?php
class Course extends AModel {
    
    public function courseExists($coursename)
    {
        /* fetch id of course */
        $this->db->Fields ( array (	"course_id") );
        $this->db->From ( "course" );
        $this->db->Where ( array ("coursename" => $coursename	) );
        $this->db->Select ();
        
        $id = $this->db->resultArray ();
        
        
        if(!empty($id)) {
            return true;
        }
        else {
            return false;
        }
    }
	public function addCourse() {
	    if(!$this->courseExists($_POST ["coursename"])) {
	    $flag=TRUE;
	    /* Check if directory exists if not then create */
	    if (! is_dir ( "uploads/" . $_SESSION ['emailID'] )) {
	        $flag=mkdir ( "uploads/" . $_SESSION ['emailID'] );
	    }
	    if (! is_dir ( "uploads/" . $_SESSION ['emailID'] . "/" . $_POST ["coursename"] )) {
	        $flag=mkdir ( "uploads/" . $_SESSION ['emailID'] . "/" . $_POST ["coursename"]);
	    }
	    /* Insert course information into course table */
	    
		if($flag==TRUE) {
		    $this->db->From ( "course" );
		    $this->db->Fields ( array (
		        // "course_id" => "$course_id",
		        "coursename" => $_POST ["coursename"],
		        "description" => $_POST ["description"],
		        "createdon" => date ( "Y/m/d" )
		        //"createdon" => time ()
		    ) );
		    $this->db->Insert ();
		    //echo $this->db->lastQuery ();
		    	
		    $this->registerCourse($_POST ["coursename"]);
		}
	    }else {
	        echo "<script> alert('Course name already exists, please re-enter');</script>";
	    }
	}
	
	public function registerTeacherCourse($coursename) {
	    echo $coursename;
	
		/* fetch id of Teacher */
		$this->db->Fields ( array ("id"	) );
		$this->db->From ( "teacherdetails" );
		$this->db->Where ( array (	"user_id" => $_SESSION["userID"] ) );
		$this->db->Select ();
		
		$id = $this->db->resultArray ();
		
		$tid = $id [0] ['id'];
		
		/* fetch id of course */
		$this->db->Fields ( array (	"course_id") );
		$this->db->From ( "course" );
		$this->db->Where ( array ("coursename" => $coursename	) );
		$this->db->Select ();
		
		$id = $this->db->resultArray ();
				
		$cid = $id [0] ['course_id'];
		
		/* Insert record into teaches table showing which course 
		 * is taught by teacher */
		if(!empty($cid) && !empty($tid)) {
		$this->db->From ( "teaches" );
		$this->db->Fields ( array (
				"course_id" => $cid,
				"teacher_id" => $tid
		) );
		$this->db->Insert ();
		echo $this->db->lastQuery ();
		}
	}
	
	public function registerStudentCourse($coursename) {
		DBConnection::Connect ();
		//fetch cid and tid
		/* fetch id of Teacher */
		$this->db->Fields ( array (
				"id"
		) );
		$this->db->From ( "studentdetails" );
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
	
		$this->db->From ( "enrolls" );
		$this->db->Fields ( array (
				"course_id" => $cid,
				"student_id" => $tid
		) );
		$this->db->Insert ();
		echo $this->db->lastQuery ();
	}
	
	public function fetchCoursename() {
		DBConnection::Connect ();
		$this->db->Fields ( array (
				"coursename"
		) );
		$this->db->From ( "course" );
		$this->db->Where ();
		$this->db->Select ();
		$result = $this->db->resultArray ();
		return $result;
	}
}

?>