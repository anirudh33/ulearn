<?php

class TeacherController extends AController
{

    protected  $_requiredType = "teacher";

          
    public function showSubTeacherViews ($viewName,$data,$result2)
    {  

       require_once $_SESSION["SITE_PATH"] . '/views/TeacherViews/TeacherView.php';
    	    
    }
 
    public function editProfileClick ()
    {
       
            $this->createUser();
            $this->_objUser->fetchUser();
            /* Showing Teacher View with teacher data */
            $this->showSubTeacherViews("editProfile",$this->_objUser->getTdata());
            
        
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
     $this->showSubTeacherViews("editCourse",$result1,$result2);
        
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
        $this->showSubTeacherViews("addCourse");
    }

    public function addCourseButtonClick ()
    {
        
        $objCourse= new Course();
        $objCourse->addCourse();
    }

    
public function registerCourseClick ()
    {
    	$objCourse= new Course();
    	$result=$objCourse->fetchCoursename();
        $this->showSubTeacherViews("registerCourse",$result);
        
    }
public function registerCourseButtonClick()
{ 

	$coursename=$_POST['coursenamelist'];//to be changed
	$objCourse= new Course();
    $objCourse->registerTeacherCourse($coursename);
	
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
	list($messages,$result2) = $this->_objUser->messageShow();

$this->showSubTeacherViews("viewMessage",$messages,$result2);
	 
}

public function subjectClick ()
{
	     $aid=$_REQUEST["msgid"];
		$this->createUser();
	     $result = $this->_objUser->messageBody($aid);
	     $this->showSubTeacherViews("MessageBody",$result);
  
	 
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
    
    public function showProfile ()
    {
    	$this->createUser();
    	$teacherdetails=$this->_objUser->fetchTeacher();
    	
    	/* Showing Teacher View with teacher data */
    	$this->showSubTeacherViews("showProfile",$teacherdetails,"");
    
    }
    

    public function uploadClick ()
    {

    	$objCourse= new Course();
    	$courseList=$objCourse->fetchCoursename();
    		    			
        $this->showSubTeacherViews("upload",$courseList);
    }

    public function uploadFile ()
    {
    	$lesson_no = $_POST["lesson_no"];
    	$lesson_name = $_POST["lesson_name"];
    	$coursenamelist = $_POST["coursenamelist"];
    	
        $this->createUser();
       
        $this->_objUser->uploadContent($lesson_no,$lesson_name);
        $this->_objUser->lesson($lesson_no,$lesson_name,$coursenamelist);
    }
}

?>