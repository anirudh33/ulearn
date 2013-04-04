<?php
/*  ************************** Creation Log *****************************

File Name                   - AdminController.php
Description                 - Admin Controller Version
Version                     -  1.0
Created by                  -  Ujjwal Rawlley
Created on                  -  March 28, 2013
* **************************** Update Log ********************************
Sr.NO.  Version	  Updated by        Updated on          Description
-------------------------------------------------------------------------

* ************************************************************************
*/

class AdminController extends AController
{

    protected  $_requiredType = "admin";

    protected function showView ($data = array())
    {  	
    	
        //require_once $_SESSION["SITE_PATH"] . '/views/AdminViews/AdminView.php';
        $this->showProfile();
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
    public function showreportView($reportdata=array())
{	
//	echo $reportdata;	

	//print_r($reportdata);
	
		require_once $_SESSION["SITE_PATH"].'/views/AdminViews/AdminView.php';
}




public function generateReport()
{
	$reportdata="report ";
	$this->createUser();
         
            $this->showreportView($reportdata);
        
	

}

public function studentreport($studentreportcount)

{	
		
	
	require_once $_SESSION["SITE_PATH"].'/views/AdminViews/AdminView.php';
}

public function teacherreport($teacherreportcount)

{	
		
	
	require_once $_SESSION["SITE_PATH"].'/views/AdminViews/AdminView.php';
}

public function studentqualificationreport($studentqualificationcount)
{	
	require_once $_SESSION["SITE_PATH"].'/views/AdminViews/AdminView.php';
}

public function teacherqualificationreport($teacherqualificationcount)
{	
	require_once $_SESSION["SITE_PATH"].'/views/AdminViews/AdminView.php';
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
       	$uid=$_POST['id'];
    	
    		$this->createUser();
    		$objReturn = $this->_objUser->deleteTeacher($uid);
    		if($objReturn) {
    			die("1");
    		} else {
    			die("0");
    		}
	}
    public function activateTeacherClick ()
    {
    	$uid=$_REQUEST['id'];
       	$this->createUser();
    	$objReturn = $this->_objUser->activateTeacher($uid);
    	if($objReturn) {
    		die("1");
    	} else {
    		die("0");
    	}
    	 
    }
    
    public function deleteStudentClick ()
    {
        $uid=$_REQUEST['id'];
         
        $this->createUser();
        $objReturn = $this->_objUser->deleteStudent($uid);
        if($objReturn) {
            die("1");
        } else {
            die("0");
        }
    }
    public function activateStudentClick ()
    {
        $uid=$_REQUEST['id'];
        $this->createUser();
        $objReturn = $this->_objUser->activateStudent($uid);
        if($objReturn) {
            die("1");
        } else {
            die("0");
        }
    
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

  public function showreport()
{		
	$this->createUser();
	$usertype = $_POST["usertype"];
	$choice=$_POST["choice"];
	//$qualification=$_POST["qualifications"];

	 if ($_POST["usertype"]=="student" and $_POST["choice"]=="registrations") 
		{
			//echo"recieved";

			 $this->_objUser->fetchStudentCount();
						
		$this->studentreport($this->_objUser->getTotalStudentRecords());
		}
		elseif($_POST["usertype"]=="teacher" and $_POST["choice"]=="registrations") 
			{
				$this->_objUser->fetchTeacherCount();
						
				$this->teacherreport($this->_objUser->getTotalTeacherRecords());
			}
	
	 if ($_POST["usertype"]=="student" and $_POST["choice"]=="graduate") 
		{
			$this->_objUser->fetchstudentqualification("graduate");
			$this->studentqualificationreport($this->_objUser->getStudentqualificationdata());
			}
		elseif($_POST["usertype"]=="student" and $_POST["choice"]=="postgraduate") 
			{
				$this->_objUser->fetchstudentqualification("postgraduate");
						
				$this->studentqualificationreport($this->_objUser->getStudentqualificationdata());
			}

		if($_POST["usertype"]=="teacher" and $_POST["choice"]=="graduate") 
			{
				$this->_objUser->fetchteacherqualification("graduate");
						
				$this->teacherqualificationreport($this->_objUser->getTeacherqualificationdata());
			}
			elseif($_POST["usertype"]=="teacher" and $_POST["choice"]=="postgraduate") 
			{
				$this->_objUser->fetchteacherqualification("postgraduate");
						
				$this->teacherqualificationreport($this->_objUser->getTeacherqualificationdata());
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
