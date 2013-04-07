<?php
class Course extends AModel {
	public function courseExists($coursename) {
		/* fetch id of course */
		$this->db->Fields ( array (
				"course_id" 
		) );
		$this->db->From ( "course" );
		$this->db->Where ( array (
				"coursename" => $coursename 
		) );
		$this->db->Select ();
		
		$id = $this->db->resultArray ();
		
		if (! empty ( $id )) {
			return true;
		} else {
			return false;
		}
	}
	public function courseRegistered($courseid, $id, $table,$user) {
		/* fetch id of course */
		$this->db->Fields ( array (
				"course_id",
				$user
		) );
		$this->db->From ( $table );
		$this->db->Where ( array (
				"course_id" => $courseid,
				$user => $id 
		) );
		$this->db->Select ();
		
		$cid = $this->db->resultArray ();
		
		if (! empty ( $cid )) {
			return true;
		} else {
			return false;
		}
	}
	public function addCourse() {
		if (! $this->courseExists ( $_POST ["coursename"] )) {
			$flag = TRUE;
			/* Check if directory exists if not then create */
			if (! is_dir ( "uploads/" . $_SESSION ['emailID'] )) {
				$flag = mkdir ( "uploads/" . $_SESSION ['emailID'] );
			}
			if (! is_dir ( "uploads/" . $_SESSION ['emailID'] . "/" . $_POST ["coursename"] )) {
				$flag = mkdir ( "uploads/" . $_SESSION ['emailID'] . "/" . $_POST ["coursename"] );
			}
			/* Insert course information into course table */
			
			if ($flag == TRUE) {
				$this->db->From ( "course" );
				$this->db->Fields ( array (
						// "course_id" => "$course_id",
						"coursename" => $_POST ["coursename"],
						"description" => $_POST ["description"],
						"createdon" => date ( "Y/m/d" ) 
								) );
				$bool=$this->db->Insert ();
				if($bool==true) {				
				$this->registerTeacherCourse ( $_POST ["coursename"] );
				}else {
					$message="Directory created but Couldnt register course";
					$this->setCustomMessage("ErrorMessage", $message);
				}
			}
		} else {	
			$message="Couldnt create course directory <br> Course already exists";	
			$this->setCustomMessage("ErrorMessage", $message);
			}
	}
	public function registerTeacherCourse($coursename) {
				
		/* fetch id of Teacher */
		$this->db->Fields ( array (
				"id" 
		) );
		$this->db->From ( "teacherdetails" );
		$this->db->Where ( array (
				"user_id" => $_SESSION ["userID"] 
		) );
		$this->db->Select ();
		
		$id = $this->db->resultArray ();
		
		$tid = $id [0] ['id'];
		
		/* fetch id of course */
		$this->db->Fields ( array (
				"course_id" 
		) );
		$this->db->From ( "course" );
		$this->db->Where ( array (
				"coursename" => $coursename 
		) );
		$bool=$this->db->Select ();
		
		$id = $this->db->resultArray ();
		
		$cid = $id [0] ['course_id'];
		
		/*
		 * Insert record into teaches table showing which course is taught by teacher
		 */
		if (! empty ( $cid ) && ! empty ( $tid )) {
			if (! $this->courseRegistered ( $cid, $tid, "teaches","teacher_id" )) {
				$this->db->From ( "teaches" );
				$this->db->Fields ( array (
						"course_id" => $cid,
						"teacher_id" => $tid 
				) );
				$this->db->Insert ();
				
				$message= "Course Registered";
				$this->setCustomMessage("SuccessMessage", $message);
			} else {
				
				$message= 'Course already registered';
				$this->setCustomMessage("ErrorMessage", $message);
			}
		}
	}
	public function registerStudentCourse($coursename) {
		DBConnection::Connect ();
		// fetch cid and tid
		/* fetch id of Teacher */
		$this->db->Fields ( array (
				"id" 
		) );
		$this->db->From ( "studentdetails" );
		$this->db->Where ( array (
				"user_id" => $_SESSION ["userID"] 
		) );
		$this->db->Select ();
		$id = $this->db->resultArray ();
		$sid = $id [0] ['id'];
		
		/* fetch id of course */
		$this->db->Fields ( array (
				"course_id" 
		) );
		$this->db->From ( "course" );
		$this->db->Where ( array (
				"coursename" => $coursename 
		) );
		$this->db->Select ();
		$id = $this->db->resultArray ();
		$cid = $id [0] ['course_id'];
		if (! $this->courseRegistered ( $cid, $sid, "enrolls","student_id" )) {
			$this->db->From ( "enrolls" );
			$this->db->Fields ( array (
					"course_id" => $cid,
					"student_id" => $sid 
			) );
			$this->db->Insert ();
			//echo $this->db->lastQuery ();
			$message= 'Course registered';
			$this->setCustomMessage("ErrorMessage", $message);
		} else {
			$message= 'Course already registered';
			$this->setCustomMessage("ErrorMessage", $message);
		}
	}
	public function fetchTeacherCoursename() {
//@todo logic to fetch only registered courses as teacher must upload to his/her registered courses only
		DBConnection::Connect ();
$this->db->Fields ( array (
		"id"
) );
$this->db->From ( "teacherdetails" );
$this->db->Where ( array (
		"user_id" => $_SESSION ["userID"]
) );
$this->db->Select ();
$id = $this->db->resultArray ();
$tid = $id [0] ['id'];

$this->db->Fields ( array (
		"course_id"
) );
$this->db->From ( "teaches" );
$this->db->Where (array (
		"teacher_id" => $tid) );
$this->db->Select ();
$courseid = $this->db->resultArray ();
$cid = $courseid [0] ['course_id'];

$this->db->Fields ( array (
		"coursename"
) );
$this->db->From ( "course" );
$this->db->Where (array (
		"course_id" => $cid) );
$this->db->Select ();
$result = $this->db->resultArray ();
return $result;
}
	
	public function fetchStudentCoursename() {
		//@todo logic to fetch only registered courses as teacher must upload to his/her registered courses only
		DBConnection::Connect ();
		$this->db->Fields ( array (
				"id" 
		) );
		$this->db->From ( "studentdetails" );
		$this->db->Where ( array (
				"user_id" => $_SESSION ["userID"] 
		) );
		$this->db->Select ();
		$id = $this->db->resultArray ();
		$sid = $id [0] ['id'];
		
		$this->db->Fields ( array (
				"course_id"
		) );
		$this->db->From ( "enrolls" );
		$this->db->Where (array (
				"student_id" => $sid) );
		$this->db->Select ();
		$courseid = $this->db->resultArray ();
		$cid = $courseid [0] ['course_id'];
		
		$this->db->Fields ( array (
				"coursename"
		) );
		$this->db->From ( "course" );
		$this->db->Where (array (
				"course_id" => $cid) );
		$this->db->Select ();
		$result = $this->db->resultArray ();
		
		return $result;
	}
	
	public function fetchCoursename ()
	{
		DBConnection::Connect();
		$this->db->Fields(array(
				"coursename"
							));
		$this->db->From("course");
		$this->db->Where();
		
		$this->db->Select();
	
		$result=$this->db->resultArray();
		return $result;
	
	
	}
	
	
	public function fetchCourse ($limit = "0,10")
    {
        DBConnection::Connect();
        $this->db->Fields(array(
            "coursename",
            
            "status"
        ));
        $this->db->From("course");
        $this->db->Where();
        $this->db->Limit($limit);
        $this->db->Select();
        
        $result=$this->db->resultArray();
		return $result;
        
        
    }

public function deleteCourse($coursename)
    {
        DBConnection::Connect();
           
        $this->db->From("course");
         
         
        $this->db->Where(array(
            "coursename"=>$coursename
        ));
        $this->db->Fields(array(
            "status" => "2"
        ));
    
        $objReturn = $this->db->Update();
        
        
        
        return $objReturn;
           
    }
    
    public function activateCourse($coursename)
    {
    
        DBConnection::Connect();
    
    
        $this->db->From("course");
    
    
        $this->db->Where(array(
            "coursename"=>$coursename
        ));
        $this->db->Fields(array(
            "status" => "1"
        ));
    
        $objReturn = $this->db->Update();
        //echo $this->db->lastQuery();
        return $objReturn;
            
    }



}

?>