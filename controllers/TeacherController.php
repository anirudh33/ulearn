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
        $firstName = $_POST["firstname"];
        $lastName = $_POST["lastname"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];
        $qualification = $_POST["qualification"];
        $gender = $_POST["gender"];
        $dob = $_POST["dob"];
                
            $this->createUser();
            
            $this->_objUser->editTeacher($firstName, $lastName, $phone, $address, $qualification, $gender, $dob);
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
            
            $courseName=$objCourse->fetchCourse($limit);
            
            $courseNameCount=count($courseName);
            if(!empty($courseNameCount)) {
     		$this->showSubViews("editCourse",$courseName,$courseNameCount);
            }else {
            	$this->setCustomMessage("ErrorMessage", "NO courses exist !");
            	$this->showView();
            }        
    }
    
    /* method called on delete course click in edit course view */
	public function deleteCourseClick ()
    {
    	
        $courseName=$_REQUEST['id'];
         $objCourse= new Course();
        
        $objReturn = $objCourse->deleteCourse($courseName);
        
        if($objReturn) {
            die("1");
        } else {
            die("0");
        }
    }
    
    /*method called on activate course click in edit course view  */
    public function activateCourseClick ()
    {
    	
        $courseName=$_REQUEST['id'];
        $objCourse= new Course();

        $objReturn = $objCourse->activateCourse($courseName);
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
		$courseName = $_POST ['coursenamelist']; // to be changed
		$objCourse = new Course ();
		$objCourse->registerTeacherCourse ( $courseName );
		$this->registerCourseClick();	
	}
	
	/* method called on write message click in teacher view */	
	public function messageClick() {
		$this->createUser ();
		$emailList = $this->_objUser->fetchEmailID ();
		$this->showSubViews ( "writeMessage", $emailList, '' );
	}
	
	/* method called to show profile in teacher view after login */
	public function showProfile() {
		$this->createUser ();
		$teacherDetails = $this->_objUser->fetchTeacher ();
		
		/* Showing Teacher View with teacher data */
		$this->showSubViews ( "showProfile", $teacherDetails, '' );
	}
	
	/* method called on view study material click in teacher view */
	public function downloadClick() {
		$objCourse = new Course ();
		$this->createUser ();
		$courseName = $objCourse->fetchTeacherCoursename ();
		if(!empty($courseName)) {
		$this->showSubViews ( "download", $courseName );
		} else {
			$this->setCustomMessage("ErrorMessage","You havent chosen any courses yet<br> Register first");
		}
	}
	
	/* method called on submitting study material view */
	public function downloadFile() {
		$courseName = $_POST ["coursenamelist"];
		
		$this->createUser ();
		$fileList = $this->_objUser->downloadContent ( $courseName );
		if(!empty($fileList)) {
		$this->showSubViews ( "showContent", $fileList );
		} else {
			$this->setCustomMessage("ErrorMessage", "No files have been uploaded yet");
			$this->showView();
		}
		
	}
	
	/* method called on upload study material click in teacher view */
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
	
	/* method called on submitting upload view */
	public function uploadFile() {
		$lessonNo = $_POST ["lesson_no"];
		$lessonName = $_POST ["lesson_name"];
		$courseName = $_POST ["coursenamelist"];
		
		$this->createUser ();
		
		$path=$this->_objUser->uploadContent ( $lessonNo, $lessonName,$courseName );
		
		if($path!=false) {
			
		$this->_objUser->lesson ( $lessonNo, $lessonName, $courseName,$path );
		$this->showView();
		
		}else {
			$this->uploadClick();
		}
			
		
	}
	/* When teacher clicks on delete file link against any file teacher wants deleted from system */
	public function ondeleteFileClick() {
		$location=$_GET["location"];
		$this->createUser();
		$bool=$this->_objUser->deleteFile($location);
		
		if($bool==true) {
			$this->showView();
		}
	}
}

?>