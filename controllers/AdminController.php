<?php

class AdminController extends AController
{

    protected  $_requiredType = "admin";

    protected function showView ($data = array())
    {  	
    	
        require_once $_SESSION["SITE_PATH"] . '/views/AdminViews/AdminView.php';
    }

    public function showManageTeacherView ($teacherdata = array(), $teacherRecordsCount)
    {
        require_once $_SESSION["SITE_PATH"] . '/views/AdminViews/AdminView.php';
    }

    public function showManageStudentView ($studentdata = array(), $studentRecordsCount)
    {
        require_once $_SESSION["SITE_PATH"] . '/views/AdminViews/AdminView.php';
    }

    public function showManageAdminView ($admindata = array())
    {
        require_once $_SESSION["SITE_PATH"] . '/views/AdminViews/AdminView.php';
    }
    public function showAdminProfileView ($adminprofiledata = array())
    {
    	require_once $_SESSION["SITE_PATH"] . '/views/AdminViews/AdminView.php';
    }
    
    public function manageTeachersClick ()
    {
        
            $this->createUser();
            // creating object of paging classs
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
            $this->showManageTeacherView($this->_objUser->getTeacherdata(), $this->_objUser->getTotalTeacherRecords());
        
    }

    public function deleteTeacherClick ()
    {
    	$uid=$_REQUEST['id'];
    	
    	
    	
    	
    		$this->createUser();
    		$this->_objUser->deleteTeacher($uid);
    	 	
    }
    public function activateTeacherClick ()
    {
    	$uid=$_REQUEST['id'];
    	 
    	 
    	 
    	 
    	$this->createUser();
    	$this->_objUser->activateTeacher($uid);
    	 
    }
    

    public function manageStudentsClick ()
    {
        
            $this->createUser();
            // creating object of paging classs
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
            $this->showManageStudentView($this->_objUser->getStudentdata(), $this->_objUser->getTotalStudentRecords());
        
    }

    public function editProfileClick ()
    {
       
            $this->createUser();
            $this->_objUser->fetchUser();
            /* Showing Teacher View with teacher data */
            $this->showManageAdminView($this->_objUser->getAdmindata());
        
    }

    public function editAdminClick ()
    {
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];
        $qualification = $_POST["qualification"];
        $gender = $_POST["gender"];
        $dob = $_POST["dob"];
        
        
            $this->createUser();
            
            $var = $this->_objUser->editAdmin($firstname, $lastname, $phone, $address, $qualification, $gender, $dob);
            if ($var == true) {
                require_once $_SESSION["SITE_PATH"] . '/views/AdminViews/AdminView.php';
            }
       
    }
    public function showProfile ()
    {
    	 
    	$this->createUser();
    	$this->_objUser->fetchadminUser();
    	/* Showing Teacher View with teacher data */
    	$this->showAdminProfileView($this->_objUser->getAdminProfiledata());
    
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