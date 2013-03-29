<?php

class TeacherController extends AController
{

    protected  $_requiredType = "teacher";

    public function showView ($data = array())
    {
        require_once $_SESSION["SITE_PATH"] . '/views/TeacherViews/TeacherView.php';
    }

    public function showSubTeacherViews ($viewName,$messages=array())
    {
    	
        require_once $_SESSION["SITE_PATH"] . '/views/TeacherViews/TeacherView.php';
       
    }

    public function editProfileClick ()
    {
       
            $this->createUser();
            $this->_objUser->fetchUser();
            /* Showing Teacher View with teacher data */
            $this->showView($this->_objUser->getTdata());
        
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
        
    }

    public function addCourseClick ()
    {
        $this->showSubTeacherViews("addCourse");
    }

    public function addCourseButtonClick ()
    {
        //$course_id = $_POST["course_id"];
        //$coursename = $_POST["coursename"];
        //$description = $_POST["description"];
        //$this->createUser();
        //$this->_objUser->addCourse($course_id, $coursename, $description);
        $objCourse= new Course();
        $objCourse->addCourse();
    }

    
public function registerCourseClick ()
    {
        $this->showSubTeacherViews("registerCourse");
    }
public function registerCourseButtonClick()
{ 

	$coursename=$_POST['course_id'];//to be changed
	$objCourse= new Course();
$objCourse->registerCourse($coursename);
	
}

public function messageClick ()
    {
    	 
    		$this->createUser();
    		$emailList=$this->_objUser->fetchEmailID();
    	$this->showSubTeacherViews("writeMessage",$emailList);
    	
    
}

public function viewMessageClick ()
{
	 
		$this->createUser();
	
		$messages= $this->_objUser->messageShow();
	
	$this->showSubTeacherViews("viewMessage",$messages);
	 
}

public function writeMessage()
    {
        //$message_id = $_POST["message_id"];
        $body = $_POST["body"];
        $subject = $_POST["subject"];
        //$sentfrom = $_POST["sentfrom"];
        $sentto = $_POST["sentto"];
        
         
            $this->createUser();
            
            $this->_objUser->messageSend($body, $subject,  $sentto);
        
    }

    public function uploadClick ()
    {

		 
    		$this->createUser();
    		$courseList=$this->_objUser->fetchCoursename();
    	
        $this->showSubTeacherViews("upload",$courseList);
    }

    public function uploadFile ()
    {
        $this->createUser();
       
        $this->_objUser->uploadContent();
    }
}

?>