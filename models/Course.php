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
				// "createdon" => time ()
								) );
				$this->db->Insert ();
				// echo $this->db->lastQuery ();
				
				$this->registerTeacherCourse ( $_POST ["coursename"] );
			}
		} else {
			?>
<script> confirm('Course name already exists, please re-enter')</script>
<?php
		
}
	}
	public function registerTeacherCourse($coursename) {
		echo $coursename;
		
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
		$this->db->Select ();
		
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
				echo $this->db->lastQuery ();
			} else {
				?>
<script> confirm('Course already registered')</script>
<?php
			
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
			echo $this->db->lastQuery ();
		} else {
			?>
<script> confirm('Course already registered')</script>
<?php
		
}
	}
	public function fetchCoursename() {
//@todo logic to fetch only registered courses as teacher must upload to his/her registered courses only
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
	
	public function fetchTeachername() {
		//@todo logic to fetch only registered courses as teacher must upload to his/her registered courses only
		DBConnection::Connect ();
		$this->db->Fields ( array (
				"email"
		) );
		$this->db->From ( "userdetails" );
		$this->db->Where ();
		$this->db->Select ();
		$result1 = $this->db->resultArray ();
		return $result1;
		
	}
}

?>