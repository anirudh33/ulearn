<?php

class AdminController
{

    private $_requiredType = "admin";

    private $_objUser;
   

    private $_message = "";

    public function getRequiredType ()
    {
        return $this->_requiredType;
    }

    public function setRequiredType ($requiredType)
    {
        $this->_requiredType = $requiredType;
    }

    public function __construct ()
    {
        
        // $this->process();
    }

    public function showAdminView ($data = array())
    {
    	 
    	require_once $_SESSION["SITE_PATH"] . '/views/AdminViews/AdminView.php';
    }
    public function showManageTeacherView ($teacherdata = array(),$teacherRecordsCount)
    {
    	
        require_once $_SESSION["SITE_PATH"] . '/views/AdminViews/AdminView.php';
    }
    public function showManageStudentView ($studentdata = array(),$studentRecordsCount)
    {
    	 
    	require_once $_SESSION["SITE_PATH"] . '/views/AdminViews/AdminView.php';
    }
    
    public function showManageAdminView ($admindata = array())
    {
    
    	require_once $_SESSION["SITE_PATH"] . '/views/AdminViews/AdminView.php';
    }

    public function process ()
    {
        
        if ($this->isValidUser() == 1) {
            $this->createUser();
            $this->showAdminView();
        } else {
            header("Location:http://" . $_SESSION["DOMAIN_PATH"] . "/index.php?msg=" . $this->_message . "");
        }
    }

    /**
     */
    private function createUser ()
    {
        
        $this->_objUser = UserFactory::createUser(ucfirst($_SESSION["userType"])); // user is created by calling the createUser method of the UserFactory class.
        $this->_objUser->setFirstName($_SESSION["emailID"]);
    }
    
    /*Check if user has logged in*/
    public function isValidUser ()
    {
     
        if ($this->sessionExists() == 1) {
            
            return 1;
        } else {
            
            $this->_message .= "Session has expired or doesnt exist";
            
            return 0;
        }
    }
/*Check if user session exists*/
    public function sessionExists ()
    {
        
        // print_r($_SESSION);
        if (isset($_SESSION['userID']) and isset($_SESSION['userType']) and $_SESSION['emailID']) {
            // echo "-----------session exists on controller ------";
            
            if ($this->isRequiredType() == 1) {
                
                return 1;
            } else {
                
                $this->_message = "You are not authorized to view this page";
                
                return 0;
            }
        } else {
            // echo "-----------session does not exist on controller ------";
            
            return 0;
        }
    }
/*Check if user in session is of this particular type like Admin in this case*/
    public function isRequiredType ()
    {
        if ($_SESSION['userType'] == $this->getRequiredType()) { // If the session has been maintained and the user type is of Admin then an instance of Admin
            return 1;
        } else {
            
            return 0;
        }
    }

    public function logout ()
    {
        session_destroy();
        header("Location:http://" . $_SESSION["DOMAIN_PATH"] . "/index.php");
    }

    public function manageTeachersClick ()
    {
         if ($this->isValidUser() == 1) 
         {
            $this->createUser();
            //creating object of paging classs
            $obj_paging = new paging();
            
            if (isset($_GET['page']))
            	$page = $_GET['page'];
            else
            	$page = 1;
            $obj_paging->set_page($page);
            
            $limit = $obj_paging->get_limit();
            $obj_paging->set_page_length(10);
            $page_length = $obj_paging->page_length;
            $start_limit = $obj_paging->get_limit_start();
            $limit = $start_limit . "," . $page_length;
            
            $this->_objUser->fetchTeacher($limit);
         
            /* Showing AdminView with teacher data */
            $this->_objUser->fetchTeacherCount();
            $this->showManageTeacherView($this->_objUser->getTeacherdata(),$this->_objUser->getTotalTeacherRecords());
        }
    }
    public function deleteTeacherClick()
    {
    	echo "=====hellooo=====";
    	
    die;
    	
    	
    	if($this->isValidUser()==1)
    	{
    		$this->createUser();
    		$this->_objUser->deleteTeacher();
    		
    	}
    	
    }
    
    public function manageStudentsClick ()
    {
    if ($this->isValidUser() == 1) 
         {
            $this->createUser();
            //creating object of paging classs
            $obj_paging = new paging();
            
            if (isset($_GET['page']))
            	$page = $_GET['page'];
            else
            	$page = 1;
            $obj_paging->set_page($page);
            
            $limit = $obj_paging->get_limit();
            $obj_paging->set_page_length(10);
            $page_length = $obj_paging->page_length;
            $start_limit = $obj_paging->get_limit_start();
            $limit = $start_limit . "," . $page_length;
            
            $this->_objUser->fetchStudent($limit);
         
            /* Showing AdminView with teacher data */
            $this->_objUser->fetchStudentCount();
            $this->showManageStudentView($this->_objUser->getStudentdata(),$this->_objUser->getTotalStudentRecords());
        }
    }
    
    public function editProfileClick ()
    {
    	if ($this->isValidUser() == 1) {
    		$this->createUser();
    		$this->_objUser->fetchUser();
    		/* Showing Teacher View with teacher data */
    		$this->showManageAdminView($this->_objUser->getAdmindata());
    	}
    
    }
   
    public function editAdminClick()
    {
    	$firstname=$_POST["firstname"];
    	$lastname=$_POST["lastname"];
    	$phone=$_POST["phone"];
    	$address=$_POST["address"];
    	$qualification=$_POST["qualification"];
    	$gender=$_POST["gender"];
    	$dob=$_POST["dob"];
    	 
    	if ($this->isValidUser() == 1) {
    		$this->createUser();
    
    		$var=$this->_objUser->editAdmin($firstname,$lastname,$phone,$address,$qualification,$gender,$dob);
    		if($var==true)
    		{
    			require_once $_SESSION["SITE_PATH"] . '/views/AdminViews/AdminView.php';
    		}
    	}
    }
    public function reportGeneration ()
    {
        $this->_objUser->fetchUser();
        
        $this->showreportView();
    }

    public function manageProfile ()
    {
        $this->_objUser->fetchUser();
        
        $this->showProfileView();
    }
}

?>