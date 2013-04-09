<?php
/* Creation Log

File Name                   -  TeacherController.php
Description                 -  Controls all teacher related functions
Version                     -  1.0
Created by                  -  Tanu trehan
Created on                  -  March 28, 2013
* **************************** Update Log ********************************
Sr.NO.  Version	  Updated by        Updated on          Description
-------------------------------------------------------------------------
1		1.1		  Anirudh Pandita	April 07, 2013		Messages to be shown,
														miscellaneous notices fixed 
* ************************************************************************
*/
class TeacherController extends AController
{

    protected  $_requiredType = "teacher";

    /*method called to open all sub views in teacher view*/
    public function showSubViews ($viewName,$data,$result2='')
    {  

       require_once $_SESSION["SITE_PATH"] . '/views/TeacherViews/TeacherView.php';
    	    
    }
    /*method called on edit profile click in teacher view*/
    public function editProfileClick ()
    {
       
            $this->createUser();
            $this->_objUser->fetchUser();
            /* Showing Teacher View with teacher data */
            $this->showSubViews("editProfile",$this->_objUser->getTdata(),'');          
        
    }

    /*method called on submiting edit profile view*/
    public function editTeacherClick ()
    {
    	$authObject= new Authenticate();
    	$authObject->validateEditProfile("Teacher");
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];
        $qualification = $_POST["qualification"];
        $gender = $_POST["gender"];
        $dob = $_POST["dob"];
                
            $this->createUser();
            
            $this->_objUser->editTeacher($firstname, $lastname, $phone, $address, $qualification, $gender, $dob);
        	$this->showProfile();
    }
    /*method called on edit course click in teacher view*/
	public function editCourseClick ()
    {
        
            $this->createUser();
            // creating object of paging classs
            $obj_paging = new paging();
		  	$objCourse= new Course();
            
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
            
            $result1=$objCourse->fetchCourse($limit);
            
            $result2=count($result1);
     		$this->showSubViews("editCourse",$result1,$result2);
        
    }
    
    /* method called on delete course click in edit course view */
	public function deleteCourseClick ()
    {
    	
        $coursename=$_REQUEST['id'];
         $objCourse= new Course();
        
        $objReturn = $objCourse->deleteCourse($coursename);
        
        if($objReturn) {
            die("1");
        } else {
            die("0");
        }
    }
    
    /*method called on activate course click in edit course view  */
    public function activateCourseClick ()
    {
    	
        $coursename=$_REQUEST['id'];
        $objCourse= new Course();

        $objReturn = $objCourse->activateCourse($coursename);
        if($objReturn) {
            die("1");
        } else {
            die("0");
        }
    
    }


    /* method called on add course click in teacher view */
    public function addCourseClick ()
    {
        $this->showSubViews("addCourse",'','');
    }
    /* method called on submitting add course view */
    public function addCourseButtonClick ()
    {
    	$authObject= new Authenticate();
    	$authObject->validateaddcourse();
        
        $objCourse= new Course();
        $objCourse->addCourse();
        /*Reload Add course view*/
        $this->showSubViews("addCourse",'','');
        
    }
    /* method called on submitting register course view */
	public function registerCourseButtonClick() {
		$coursename = $_POST ['coursenamelist']; // to be changed
		$objCourse = new Course ();
		$objCourse->registerTeacherCourse ( $coursename );
		$this->registerCourseClick();	
	}
	public function messageClick() {
		$this->createUser ();
		$emailList = $this->_objUser->fetchEmailID ();
		$this->showSubViews ( "writeMessage", $emailList, '' );
	}
	
	public function showProfile() {
		$this->createUser ();
		$teacherdetails = $this->_objUser->fetchTeacher ();
		
		/* Showing Teacher View with teacher data */
		$this->showSubViews ( "showProfile", $teacherdetails, '' );
	}
	public function downloadClick() {
		$objCourse = new Course ();
		$this->createUser ();
		$result = $objCourse->fetchTeacherCoursename ();
		if(!empty($result)) {
		$this->showSubViews ( "download", $result );
		} else {
			$this->setCustomMessage("ErrorMessage","You havent chosen any courses yet<br> Register first");
		}
	}
	public function downloadFile() {
		$coursename = $_POST ["coursenamelist"];
		
		$this->createUser ();
		$filelist = $this->_objUser->downloadContent ( $coursename );
		
		$this->showSubViews ( "showContent", $filelist );
	}
	public function uploadClick() {
		
		$objCourse = new Course ();
		$courseList = $objCourse->fetchCoursename ();
		if (! empty ( $courseList )) {
			$this->showSubViews ( "upload", $courseList, '' );
			
		} else {
		    
			$message= "No uploads for you! <br>Create Course first, no courses exist  <br>";
			$this->setCustomMessage("ErrorMessage", $message);
			$this->showView ();
		}
	}
	public function uploadFile() {
		$lesson_no = $_POST ["lesson_no"];
		$lesson_name = $_POST ["lesson_name"];
		$coursenamelist = $_POST ["coursenamelist"];
		
		$this->createUser ();
		
		$bool=$this->_objUser->uploadContent ( $lesson_no, $lesson_name );
		
		if($bool==true) {
			
		$this->_objUser->lesson ( $lesson_no, $lesson_name, $coursenamelist );
		}
			
		
		$this->showView();
	}
	public function ondeleteFileClick() {
		$location=$_GET["location"];
		$this->createUser();
		$bool=$this->_objUser->deleteFile($location);
	}
}

?>