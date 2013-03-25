<?php

class TeacherController
{

    private $_requiredType = "teacher";

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

    public function showTeacherView ($data = array())
    {
    	
    	require_once $_SESSION["SITE_PATH"] . '/views/TeacherViews/TeacherView.php';
    }

    public function showSubTeacherViews ($viewName)
    {
    	 
    	require_once $_SESSION["SITE_PATH"] . '/views/TeacherViews/TeacherView.php';
    }
    public function process ()
    {
        
        if ($this->isValidUser() == 1) {
            $this->createUser();
            $this->showTeacherView();
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

    public function editProfileClick ()
    {
         if ($this->isValidUser() == 1) {
            $this->createUser();
            $this->_objUser->fetchUser();
            /* Showing AdminView with teacher data */
            $this->showTeacherView($this->_objUser->getTdata());
        }
        
    }

public function editTeacherClick()
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
              		
    $this->_objUser->editTeacher($firstname,$lastname,$phone,$address,$qualification,$gender,$dob);
    	}
    	}

    
    public function addCourseClick (){
    	$this->showSubTeacherViews("addCourse");

    
}
public function addCourseButtonClick()
    {
    	$course_id=$_POST["course_id"];
    	$coursename=$_POST["coursename"];
    	$description=$_POST["description"];
  	
 	
if ($this->isValidUser() == 1) {
            $this->createUser();
              		
    $this->_objUser->addCourse($course_id,$coursename,$description);
    	}
    	}

public function messageClick ()
    {
    	$this->showSubTeacherViews("message");
    	
    
}

public function writeMessage()
    {
    	$message_id=$_POST["message_id"];
     $body=$_POST["body"];
    	$subject=$_POST["subject"];
     $sentfrom=$_POST["sentfrom"];
     $sentto=$_POST["sentto"];


 	
if ($this->isValidUser() == 1) {
            $this->createUser();
              		
    $this->_objUser->messageSend($message_id,$body,$subject,$sentfrom,$sentto);
    	}
    	}

public function uploadClick ()
    {
    	
    	$this->showSubTeacherViews("upload");
}

public function uploadFile ()
    {
    	
    	$this->createUser();
    	$this->_objUser->uploadContent();
}


}

?>