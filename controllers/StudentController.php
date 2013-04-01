<?php

class StudentController extends AController
{

    protected  $_requiredType = "student";

  
    public function showView ($data = array())
    {
        require_once $_SESSION["SITE_PATH"] . '/views/StudentViews/StudentView.php';
    }

    public function showSubStudentViews ($viewName,$messages=array())
    {
        require_once $_SESSION["SITE_PATH"] . '/views/StudentViews/StudentView.php';
    }

     public function editProfileClick ()
    {
       
            $this->createUser();
            $this->_objUser->fetchUser();
            /* Showing AdminView with teacher data */
            $this->showView($this->_objUser->getTdata());
        
    }

    public function editStudentClick ()
    {
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];
        $qualification = $_POST["qualification"];
        $gender = $_POST["gender"];
        $dob = $_POST["dob"];
        
       
            $this->createUser();
            
            $this->_objUser->editStudent($firstname, $lastname, $phone, $address, $qualification, $gender, $dob);
        
    }
        
      public function registerCourseClick ()
    {
    	$objCourse= new Course();
    	$result=$objCourse->fetchCoursename();
        $this->showSubStudentViews("registerCourse",$result);
    }

    public function registerCourseButtonClick ()
    {
        
        $coursename=$_POST['coursenamelist'];//to be changed
        $objCourse= new Course();
        $objCourse->registerStudentCourse($coursename);
        
                                
    }

    public function messageClick ()
    {
    	
    		$this->createUser();
    		$emailList=$this->_objUser->fetchEmailID();
    	$this->showSubStudentViews("writeMessage",$emailList);
    	
    
}

public function viewMessageClick ()
{

		$this->createUser();

		$messages= $this->_objUser->messageShow();
	
	$this->showSubStudentViews("viewMessage",$messages);

}

public function writeMessage()
    {
        //$message_id = $_POST["message_id"];
        $body = $_POST["body"];
        $subject = $_POST["subject"];
        //$sentfrom = $_POST["sentfrom"];
        $sentto = $_POST["sentto"];
        
       
            $this->createUser();
            
            $this->_objUser->messageSend($body, $subject, $sentto);
       
    }
    
    public function showProfile ()
    {
    	$this->createUser();
    	$studentdetails=$this->_objUser->fetchStudent();
    	/* Showing Teacher View with teacher data */
    	$this->showSubStudentViews("showProfile",$studentdetails);
    
    }

    public function downloadClick ()
    {
        $this->showSubStudentViews("download");
    }

    public function downloadFile ()
    {
        $this->createUser();
        $this->_objUser->downloadContent();
    }
}

?>