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

          
    public function showSubViews ($viewName,$data,$result2='')
    {  

       require_once $_SESSION["SITE_PATH"] . '/views/TeacherViews/TeacherView.php';
    	    
    }
 
    public function editProfileClick ()
    {
       
            $this->createUser();
            $this->_objUser->fetchUser();
            /* Showing Teacher View with teacher data */
            $this->showSubViews("editProfile",$this->_objUser->getTdata(),'');          
        
    }

    public function editTeacherClick ()
    {
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


    public function addCourseClick ()
    {
        $this->showSubViews("addCourse",'','');
    }

    public function addCourseButtonClick ()
    {
        
        $objCourse= new Course();
        $objCourse->addCourse();
        /*Reload Add course view*/
        $this->showSubViews("addCourse",'','');
        
    }
    
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
		$coursenamelist = $_POST ["coursenamelist"];
		
		$this->createUser ();
		$filelist = $this->_objUser->downloadContent ( $coursenamelist );
		
		$this->showSubStudentViews ( "showContent", $filelist );
	}
	public function uploadClick() {
		$objCourse = new Course ();
		$courseList = $objCourse->fetchCoursename ();
		if (! empty ( $courseList )) {
			$this->showSubViews ( "upload", $courseList, '' );
		} else {
			$_SESSION ["ErrorMessage"] .= "No uploads for you! <br>Create Course first, no courses exist  <br>";
			$this->showView ();
		}
	}
	public function uploadFile() {
		$lesson_no = $_POST ["lesson_no"];
		$lesson_name = $_POST ["lesson_name"];
		$coursenamelist = $_POST ["coursenamelist"];
		
		$this->createUser ();
		
		$this->_objUser->uploadContent ( $lesson_no, $lesson_name );
		$this->_objUser->lesson ( $lesson_no, $lesson_name, $coursenamelist );
	}
}

?>