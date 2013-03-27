<?php

class Admin extends AUser
{

		
    public function __construct ()
    {
        parent::__construct();
    }

    private $teacherdata = array();
    private $studentdata = array();
    private $admindata=array();
    private $totalTeacherRecords;
    private $totalStudentRecords;
    
  
  
    /**
	 * @return the $totalTeacherRecords
	 */
	public function getTotalTeacherRecords() {
		return $this->totalTeacherRecords;
	}

	/**
	 * @param field_type $totalTeacherRecords
	 */
	public function setTotalTeacherRecords($totalTeacherRecords) {
		$this->totalTeacherRecords = $totalTeacherRecords;
	}
	
	public function getTotalStudentRecords() {
		return $this->totalStudentRecords;
	}
	public function setTotalStudentRecords($totalStudentRecords) {
		$this->totalStudentRecords = $totalStudentRecords;
	}
	
    public function getStudentdata ()
    {
    	return $this->studentdata;
    }
    private function setStudentdata ($studentdata)
    {
    	$this->studentdata = $studentdata;
    }
    public function getTeacherdata ()
    {
        return $this->teacherdata;
    }

    
    private function setTeacherdata ($teacherdata)
    {
        $this->teacherdata = $teacherdata;
    }
    private function setAdmindata ($admindata)
    {
    	$this->admindata = $admindata;
    }
    public function getAdmindata ()
    {
    	return $this->admindata;
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
    	$this->db->From ( "admindetails" );
    	$this->db->Where ();
    	$this->db->Select ();
    
    	$this->setAdmindata ( $this->db->resultArray () );
    }

    public function fetchTeacher ($limit = "0,10")
    {        
    	if (empty($limit)) {
    		$limit="0,10";
    	}
    	
        DBConnection::Connect();
        $this->db->Fields(array(
        	"id",	
            "firstname",
            "lastname",
        		"status"
        ));
        $this->db->From("teacherdetails");
        $this->db->Where();

        $this->db->Limit($limit);
        $this->db->Select();
        $this->setTeacherdata($this->db->resultArray());
        //echo "<pre>";
        
        //echo $this->db->lastQuery();
        // $this->tdata=array("teacher1","teacher2");
    }
    
    public function fetchTeacherCount(){
    	
    	DBConnection::Connect();
    	$this->db->Fields(array(
    			"id",
    			"firstname",
    			"lastname",
    			"status"
    	));
    	$this->db->From("teacherdetails");
    	$this->db->Where();
    	$this->db->Limit("");
    	$this->db->Select();
    	
    	$this->setTotalTeacherRecords(count($this->db->resultArray()));
 
    }
    
    
    public function fetchStudent ($limit = "0,10")
    {
    	DBConnection::Connect();
    	$this->db->Fields(array(
    			"id",
    			"firstname",
    			"lastname",
    			"status"
    	));
    	$this->db->From("studentdetails");
    	$this->db->Where();
    	$this->db->Limit($limit);
    	$this->db->Select();
    
    	$this->setStudentdata($this->db->resultArray());
    
    	// $this->tdata=array("teacher1","teacher2");
    }
    public function fetchStudentCount(){
    	 
    	DBConnection::Connect();
    	$this->db->Fields(array(
    			"id",
    			"firstname",
    			"lastname",
    			"status"
    	));
    	$this->db->From("studentdetails");
    	$this->db->Where();
    	$this->db->Limit("");
    	$this->db->Select();
    	 
    	$this->setTotalStudentRecords(count($this->db->resultArray()));
    
    }
    public function editAdmin($firstname,$lastname,$phone,$address,$qualification,$gender,$dob)
    {
    	DBConnection::Connect();
    	$this->db->From("admindetails");
    	$this->db->Fields(array("firstname"=>"$firstname","lastname"=>"$lastname","phone"=>"$phone","address"=>"$address","qualification"=>"$qualification","gender"=>"$gender","dob"=>"$dob"));
    	$this->db->Update();
    	$this->db->lastQuery();
    	return true;
    }
    
    public function deleteTeacher()
    {
    	ECHO "HERE";
    	die;
    	DBConnection::Connect();
    	 $this->db->Fields(array(
            "status" => "0"
        ));
        $this->db->From("teacherdetails");
       
        $this->db->Update();
        echo $this->db->lastQuery();
    }
    
  /* public function fetchUserCount()
   {
   	DBConnection::Connect();
   	$this->db->Fields(array("id"));
   	$this->db->From("teacherdetails");
   	$this->db->Select();
   	$this->setcountData($this->db->resultArray());
   	
   }*/
    public function AddUser ()
    {
        $this->db->Fields(array(
            "firstname" => "newname",
            "lastname" => "nlastname"
        ));
        $this->db->From("users");
        $this->db->Insert();
        echo $this->db->lastQuery();
    }

    public function UpdateUser ()
    {
        $this->db->Fields(array(
            "firstname" => "haha"
        ));
        $this->db->From("users");
        $this->db->Where(array(
            "firstname" => "hihi"
        ));
        $this->db->Update();
        echo $this->db->lastQuery();
    }

    public function DeleteUser ()
    {
        $this->db->From("users");
        $this->db->Where(array(
            "id" => 42
        ));
        $this->db->Delete();
        echo $this->db->lastQuery();
    }

    public function doTransaction ()
    {
        $this->db->Fields(array(
            "firstname",
            "lastname",
            "email"
        ));
        $this->db->Where(array(
            "id >" => "40"
        ));
        $this->FindUsers();
        // echo "+++++".$this->db->lastQuery()."++++++";
        $this->db->startTransaction();
        echo $this->db->lastQuery();
        $this->AddUser();
        // $this->UpdateUser();
        // echo "<br> Adding-----------------------<br>";
        // $this->db->Fields(array("firstname","lastname","email"));
        // $this->db->Where(array("id >"=>"40"));
        // $this->FindUsers();
        $this->db->rollback();
        echo $this->db->lastQuery();
        
        // echo "<br> Rolling back-----------------------<br>";
        // $this->db->Fields(array("firstname","lastname","email"));
        // $this->db->Where(array("id >"=>"40"));
        // $this->FindUsers();
        // $this->AddUser();
        // echo "<br> Updating-----------------------<br>";
        // $this->UpdateUser();
        // $this->AddUser();
        // $this->db->commit();
        // echo $this->db->lastQuery();
        // echo "-----------------------<br>";
        
        $this->db->Fields(array(
            "firstname",
            "lastname",
            "email"
        ));
        $this->db->Where(array(
            "id >" => "40"
        ));
        $this->FindUsers();
    }

    public function showManageTeachersView ()
    {}

    public function showManageStudentsView ()
    {}

    public function showProfileView ()
    {}

    public function showreportView ()
    {}
}

?>