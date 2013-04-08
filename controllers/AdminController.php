<?php
/*  ************************** Creation Log *****************************

File Name                   - AdminController.php
Description                 - Admin Controller controlls all the events related to Admin
Version                     -  1.0
Created by                  -  Ujjwal Rawlley
Created on                  -  March 28, 2013
* **************************** Update Log ********************************
Sr.NO.  Version	  Updated by        Updated on          Description
-------------------------------------------------------------------------
1		1.1		Anirudh Pandita		April 6 2013		Fixed variable not set notice
2		1.1		Anirudh Pandita		April 8 2013		Added error/success messages,
														Fixed insertion of balnk phone no and showing of address fields   
* ************************************************************************
*/

class AdminController extends AController
{

    /**
     * @var Stores required type of user to check for Admin controller
     */
    protected  $_requiredType = "admin";
    
    /**
     * @param unknown $teacherdata
     * @param unknown $teacherRecordsCount
     * Requires view with list of teachers to be seen and managed
     */
public function getMessage() {
		return $this->_message;
	}

public function setMessage($_message) {
		
		$this->_message .= $_message."<br>";
		$this->setCustomMessage("ErrorMessage", $_message);
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


public function alluserreport($studentreportcount,$teacherreportcount)
{
	$studentreportdata=$studentreportcount;
	$teacherreportdata=$teacherreportcount;

	require_once $_SESSION["SITE_PATH"].'/views/AdminViews/AdminView.php';	
}


public function studentreport($studentreportcount)

{	
		
	
	require_once $_SESSION["SITE_PATH"].'/views/AdminViews/AdminView.php';
}

public function teacherreport($teacherreportcount)

{	
		
	
	require_once $_SESSION["SITE_PATH"].'/views/AdminViews/AdminView.php';
}

public function qualificationreport($studentqualificationcount,$teacherqualificationcount)
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
        	$_SESSION['NoticeMessage'].="Student Deleted (Soft delete data exists), can't login now <br>";
            die("1");
        } else {
        	$_SESSION['ErrorMessage'].="Student couldnt be Deleted  <br>";
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
    	$authObject= new Authenticate();
    	$authObject->validateEditProfile("Admin");
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
            	
            	$message="Profile updated :) <br>";
            	$this->setCustomMessage("SuccessMessage", $message);
            	$this->showProfile();
                //require_once $_SESSION["SITE_PATH"] . '/views/AdminViews/AdminView.php';
                
                
            } else {
            	
            	$message="Couldn't Update, Report issue to site admin <br>";
            	$this->setCustomMessage("ErrorMessage", $message);
            	$this->editProfileClick();
            	
            }
    	
    	
    	
    }
    public function showProfile ()
    {
    	 
    	$this->createUser();
    	$this->_objUser->fetchadminUser();
    	/* Showing Admin profile */
    	$this->showAdminProfileView($this->_objUser->getAdminProfiledata());
    
    }

  public function showreport()
{		

	
	$this->createUser();
	
	if(!isset($_POST["usertype"]) and !isset($_POST["choice"]) )
	{
			$message="Please select report category <br>";
            	$this->setCustomMessage("ErrorMessage", $message);
            	$this->generateReport();
		
	}




	if(isset($_POST["usertype"])) {
		
		
		$usertype = $_POST["usertype"];
		$choice=$_POST["usertype"];
		$this->_objUser->fetchStudentcount();
				$this->_objUser->fetchTeachercount();
		$this->alluserreport($this->_objUser->getTotalStudentRecords(),	$this->_objUser->getTotalTeacherRecords());
	}
	
	if(isset($_POST["choice"])) {	
	if ( $_POST["choice"]=="graduate") {
			$this->_objUser->fetchstudentqualification("graduate");
			$this->_objUser->fetchteacherqualification("graduate");

			$this->qualificationreport($this->_objUser->getStudentqualificationdata(),$this->_objUser->getTeacherqualificationdata());
	} elseif($_POST["choice"]=="postgraduate") {
				$this->_objUser->fetchstudentqualification("postgraduate");
				$this->_objUser->fetchteacherqualification("postgraduate");
						
				$this->qualificationreport($this->_objUser->getStudentqualificationdata(),$this->_objUser->getTeacherqualificationdata());
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
